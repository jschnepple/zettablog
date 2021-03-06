<?php

require_once(sprintf("%s/autoload.php", dirname(__FILE__)));

/*
  Author: ExpressCurate
  Author URI: http://www.expresscurate.com
  License: GPLv3 or later
  License URI: http://www.gnu.org/licenses/gpl.html
 */

class ExpressCurate_AjaxExportAPI
{


    private static $instance;

    function __construct()
    {

    }

    public static function getInstance()
    {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function get_terms()
    {
        $data = array();
        $data["title"] = get_bloginfo('name');
        $data["categories"] = array();
        $data["keywords"] = array();
        $data["featured_image"] = 0;
        $data["smart_publishing"] = get_option('expresscurate_publish', '') == 'on' ? get_option('expresscurate_manually_approve_smart', 'off') : 'off';
        $data["curated_from_prefix"] = get_option("expresscurate_curated_text", 'See full story on');
        $data["curated_link_target"] = get_option("expresscurate_curated_link_target", 'on');
        if (current_user_can('edit_posts')) {
            $categories = get_categories(array("hide_empty" => 0));
            foreach ($categories as $i => $category) {
                if ($category->category_nicename != 'uncategorized') {
                    $data["categories"][$i]["term_id"] = $category->term_id;
                    $data["categories"][$i]["name"] = $category->name;
                }
            }
            $defined_tags = get_option("expresscurate_defined_tags", '');
            if ($defined_tags) {
                $defined_tags = explode(",", $defined_tags);
                foreach ($defined_tags as $tag) {
                    $data["keywords"][] = trim($tag);
                }
            }
            if (get_option('expresscurate_featured', '')) {
                $data["featured_image"] = get_option('expresscurate_featured', '');
            }
        }

        //return $data;
        echo json_encode($data);
        die(); // this is required to return a proper result
    }

    public function check_auth()
    {
        $response = array();
        $current_user = wp_get_current_user();
        if ($current_user && $current_user->data && $current_user->data->user_login) {
            $response['logged_in'] = true;
            $response['can_edit_post'] = current_user_can('edit_posts');
            $response['username'] = $current_user->data->user_login;
        }
        echo json_encode($response);
        die();
    }

    public function check_images()
    {
        $data = $_REQUEST;
        if (!$data['img_url'] && !$data['img_url2']) {
            $data_check = array('status' => "error", 'msg' => "Data is empty!");
        } else {
            $content_manager = new ExpressCurate_HtmlParser($data['img_url'], true);
            $img = $content_manager->download();
            if ($content_manager->isHTTPStatusOK() === false) {
                $content_manager = new ExpressCurate_HtmlParser($data['img_url2'], true);
                $img = $content_manager->download();
            }
            
            if ($content_manager->isHTTPStatusOK() === false) {
                $data_check = array('status' => "error", 'msg' => "Images not found!");
            } else {
                $statusCode = $content_manager->getHTTPStatusCode();
                
                $data_check = array('status' => $statusCode == 200 ? 'success' : 'fail', 'statusCode' => $statusCode);
            }
        }
        echo json_encode($data_check);
        die();
    }

    public function download_images()
    {
        $data = $_REQUEST;
        if (!$data['images']) {
            $result = array('status' => "error", 'error' => "Data is empty!");
        } else {
            $downloaded_images = array();
            $upload_dir = wp_upload_dir();
            $images = $data['images'];
            $post_id = $data['post_id'];

            if (wp_mkdir_p($upload_dir['path'])) {
                $this->delete_dir($upload_dir['path'] . '/expresscurate_tmp/');
                mkdir($upload_dir['path'] . '/expresscurate_tmp/', 0777);
                mkdir($upload_dir['path'] . '/expresscurate_tmp/' . $post_id, 0777);
            } else {
                $this->delete_dir($upload_dir['basedir'] . '/expresscurate_tmp/');
                mkdir($upload_dir['basedir'] . '/expresscurate_tmp/', 0777);
                mkdir($upload_dir['basedir'] . '/expresscurate_tmp/' . $post_id, 0777);
            }

            if (count($images) > 0 && is_writable($upload_dir['path'])) {
                for ($i = 0, $len = count($images); $i < $len; $i++) {
                    $image = strtok($images[$i], '?');
                    
                    // TODO create new parser
                    // TODO get some referer
                    $content_manager = new ExpressCurate_HtmlParser($images[$i], true, $images[0]);
                    $image_data = $content_manager->download();
                    $filename[$i] = basename($image);
                    if (wp_mkdir_p($upload_dir['path'])) {
                        $file[$i] = $upload_dir['path'] . '/expresscurate_tmp/' . $post_id . '/' . $filename[$i];
                    } else {
                        $file[$i] = $upload_dir['basedir'] . '/expresscurate_tmp/' . $post_id . '/' . $filename[$i];
                    }
                    if (file_put_contents($file[$i], $image_data)) {
                        $file[$i] = substr($file[$i], ($pos = strpos($file[$i], '/wp-content')) !== false ? $pos + 1 : 0);
                        $downloaded_images[] = site_url() . '/' . $file[$i];
                    }
                }
                $result = array('status' => 'success', 'images' => $downloaded_images);
            } else {
                $result = array('status' => 'error', 'error' => 'Upload dir is not writable');
            }
        }
        echo json_encode($result);
        die();
    }

    public function check_source()
    {
        $data_check = array();
        $data = $_REQUEST;
        if (!$data['url']) {
            $data_check = array('status' => "error", 'msg' => "Data is empty!");
        }
        $curated_urls = $this->get_meta_values('_expresscurate_link_', $data['url']);
        if (isset($curated_urls[0]) && isset($curated_urls[0]['meta_value'])) {
            $data_check["status"] = "notification";
            $data_check["msg"] = "This page is already curated!";
            $data_check['permalink'] = get_permalink($curated_urls[0]["ID"]);
        }
        echo json_encode($data_check);
        die();
    }

    public function save_post()
    {
        if (!current_user_can('edit_posts')) {
            $result = json_encode(array('status' => "error", 'msg' => __('You do not have sufficient permissions to access this page.')));
            echo $result;
            die();
        }
        $result = false;
        $data = $_REQUEST;
        
        if (isset($data['force_draft']) && $data['force_draft'] === 1) {
            $post_status = 'draft';
        } else if(isset($data['publishing']) && (($publishingType = $data['publishing']) == 'date' || $publishingType == 'hour')) {
            $post_status = 'future';
        } else {
            $post_status = get_option('expresscurate_post_status', '') ? get_option('expresscurate_post_status', '') : 'draft';
        }
        if (isset($data['url'])) {
            $domain = parse_url($data['url']);
            $domain = $domain['host'];
            //$data['content'] .= '<div class="curated_from"><p>' . get_option('expresscurate_curated_text') . ' <a href = "' . $data['url'] . '">' . $domain . '</a><span class="expresscurated" data-curated-url="' . $data['url'] . '">&nbsp;</span></p></div>';
            if (isset($data['terms'])) {
                foreach ($data['terms'] as $i => $term) {
                    $term_id = get_cat_ID($term);
                    $data['terms'][$i] = $term_id;
                }
            }

            $post_id = $this->insert_update_post($data, $post_status);
            $post_tags = wp_get_post_tags($post_id, array('fields' => 'names'));

            $post_categories = wp_get_post_categories($post_id, array('fields' => 'names'));
            if ($post_id) {
                $post = get_post($post_id, ARRAY_A);
                $result = json_encode(array('status' => "success", 'post_status' => $post_status, 'post_id' => $post_id, 'postUrl' => post_permalink($post_id), 'post_categories' => $post_categories, 'post_tags' => $post_tags, 'post_modified' => $post['post_modified'], 'post_modified_gmt' => $post['post_modified_gmt'], 'msg' => "Post saved as " . $post_status . "."));
            } else {
                $result = json_encode(array('status' => "error", 'msg' => "Something went wrong!"));
            }
        } else {
            $result = json_encode(array('status' => "error", 'msg' => "Data is empty!"));
        }
        
        echo $result;
        die;
    }

    public function get_feed()
    {
        $feedManager = new ExpressCurate_FeedManager();
        $feed = $feedManager->filter_feeds_by_date();
        $result = array('status' => 'success', 'feeds' => $feed);
        echo json_encode($result);
        die;
    }

    public function lookup_rss() {
        $url = $_REQUEST['url'];

        if (isset($url)) {
            $feedManager = new ExpressCurate_FeedManager();
            echo $feedManager->doRssLookup($url);
        }

        die;
    }

    public function add_rss() {
        $url = $_REQUEST['url'];

        if (isset($url)) {
            $feedManager = new ExpressCurate_FeedManager();
            $lookup = json_decode($feedManager->doRssLookup($url));

            if (isset($lookup) && isset($lookup->responseStatus) && $lookup->responseStatus === 200) {
                $feedManager->add_feed($url, $lookup->responseData->url);
            } else {
                echo json_encode($lookup);
            }
        }

        die;
    }

    public function get_post()
    {
        $data = $_REQUEST;
        if (!isset($data['id'])) {
            $result = array('status' => "error", 'msg' => "ID is empty!");
        } else {
            $post = get_post($data['id'], ARRAY_A);
            if ($post) {
                $result = array('status' => "success", 'post_modified' => $post['post_modified'], 'post_modified_gmt' => $post['post_modified_gmt']);
            } else {
                $result = array('status' => "error", 'msg' => "Post not found");
            }
        }
        echo json_encode($result);
        die;
    }

    private function insert_update_post($data, $post_status)
    {
        $post_cats = array();
        if (!isset($data['terms']) || !count($data['terms'])) {
            $post_cats[] = get_option('expresscurate_def_cat');
        } else {
            $post_cats = $data['terms'];
        }
        
        $post_date = time();
        $publishingOptions = $data['publishing'];
        $publishingType = $publishingOptions['type'];
        $publishingValue = $publishingOptions['value'];
        
        if($publishingType == 'date') {
            $post_date = strtotime($publishingValue);
        } else if($publishingType == 'hour') {
            $post_date = strtotime('+' . $publishingValue . ' hours');
        }
        
        $details = array(
            'post_content'  => str_replace("&nbsp;", " ", $data['content']),
            'post_author'   => get_current_user_id(),
            'post_title'    => $data['title'],
            'post_status'   => $post_status,
            'post_category' => $post_cats,
            'post_type'     => get_option('expresscurate_def_post_type', 'post'),
            'post_date_gmt' => gmdate('Y-m-d H:i:s', $post_date)
        );

        if (isset($data['post_id']) && $data['post_id'] != 0 && strlen($data['post_id']) > 0) {
            $post_id = $details['ID'] = trim($data['post_id']);
            wp_update_post($details);
        } else {
            $post_id = wp_insert_post($details);
        }
        $meta_key = "expresscurate_chrome";
        $meta_value = 1;
        add_post_meta($post_id, $meta_key, $meta_value);
        if (isset($data['keywords']) && $data['keywords']) {
            update_post_meta($post_id, '_expresscurate_keywords', $data['keywords']);
        }
        if (isset($data['description']) && $data['description']) {
            update_post_meta($post_id, '_expresscurate_description', $data['description']);
        }
        if ($post_status == 'draft' && get_option('expresscurate_publish', '') == 'on') {
            $smartPublish = 1;

            if(get_option('expresscurate_manually_approve_smart') == 'on') {
                $smartPublishForced = ($publishingType == 'smartpublish') && ($publishingValue == 'true');
                $smartPublish = $smartPublishForced ? 1 : 0;
            }
            
            update_post_meta($post_id, '_expresscurate_smart_publish', $smartPublish);
        }
        
        // add source
        if(isset($data['source'])) {
            
            $expresscurate_sources_meta_value = array();
            $expresscurate_sources_meta_value[0]['title'] = $source['original_title'];
            $expresscurate_sources_meta_value[0]['link'] = $source['url'];
            $expresscurate_sources_meta_value[0]['domain'] = $source['domain'];
            
            update_post_meta($post_id, '_expresscurate_curated_data', wp_slash($expresscurate_sources_meta_value));
        }

        return $post_id;
    }

    public function get_meta_values($key = '', $url = '', $type = '', $post_id = null)
    {
        global $wpdb;
        if (empty($key))
            return;
        $metas_sql = "SELECT p.ID, p.guid, pm.meta_value FROM {$wpdb->postmeta} pm
         LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
         WHERE pm.meta_key LIKE '{$key}%'";
        if ($url) {
            $metas_sql .= " AND pm.meta_value = '{$url}'";
        }
        if ($type) {
            $metas_sql .= " AND p.post_type = '{$type}'";
        }
        if ($post_id) {
            $metas_sql .= " AND p.ID = '{$post_id}'";
        }
        $metas = $wpdb->get_results($metas_sql, ARRAY_A);
        return $metas;
    }

    public function delete_dir($dirPath)
    {
        if (!is_dir($dirPath)) {
            return;
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                $this->delete_dir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }

    public function send_google_key()
    {
        $data = $_REQUEST;
        if ($data['refresh_token']) {
            update_option('expresscurate_google_refresh_token', $data['refresh_token']);
            $result = array('status' => true, 'msg' => "Key is set");
            wp_redirect('admin.php?page=expresscurate_settings', 301);
        } else {
            $result = array('status' => false, 'msg' => "Key is not set");
        }
        echo json_encode($result);
        die;
    }
    
    public function save_buffer_token()
    {
        $data = $_REQUEST;
        if ($data['buffer_token']) {
            update_option('expresscurate_buffer_access_token', $data['buffer_token']);
            $result = array('status' => true, 'msg' => "Buffer Access Token Accepted.");
            wp_redirect('admin.php?page=expresscurate_settings', 301);
        } else {
            $result = array('status' => false, 'msg' => "Buffer Access Token was not found.");
        }
        echo json_encode($result);
        die;
    }

    public function generate_sitemap()
    {
        $sitemap = new ExpressCurate_Sitemap();
        if ($sitemap->generateSitemap()) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'error'));
        }
        die;
    }
}

?>
