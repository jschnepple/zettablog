<?php

/*
  Plugin Name: ExpressCurate
  Plugin URI: http://www.expresscurate.com/products
  Description: ExpressCurate plugin is a content curation tool for WordPress. It enables you to create and publish high quality content within minutes.
  Version: 2.1.3
  Author: ExpressCurate
  Author URI: http://www.expresscurate.com
  License: GPLv3 or later
  License URI: http://www.gnu.org/licenses/gpl.html
 */

require_once(sprintf("%s/autoload.php", dirname(__FILE__)));


class ExpressCurate {

  /**
   * Construct the plugin object
   */


  public function __construct() {
    // Initialize Settings
    $expresscurate_actions = new ExpressCurate_Actions();
    $expresscurate_actions->add_options();

  }



  /**
   * Activate the plugin
   */
  public static function activate() {

    $cronManager = new ExpressCurate_CronManager();
    $cronManager->schedule_events();

    //initialize default settings
      if (get_option('expresscurate_pull_hours_interval') == ''){
          update_option('expresscurate_pull_hours_interval', '1');
      }

      if (get_option('expresscurate_hours_interval') == ''){
          update_option('expresscurate_hours_interval', '1');
      }
  }

  /**
   * Deactivate the plugin
   */
  public static function deactivate() {
      $cronManager = new ExpressCurate_CronManager();
      $cronManager->deactivate_events();
  }
}


if (class_exists('ExpressCurate')) {
  // Installation and uninstallation hooks
  add_filter('cron_schedules', 'cron_add_5min');
  register_activation_hook(__FILE__, array('ExpressCurate', 'activate'));
  register_deactivation_hook(__FILE__, array('ExpressCurate', 'deactivate'));
  require_once(sprintf("%s/ExpressCurate_SmartPublish.php", dirname(__FILE__)));
  add_action('expresscurate_publish_event', 'expresscurate_publish_event');
  add_action('expresscurate_pull_feeds', 'expresscurate_pull_feeds');
  add_action('expresscurate_content_alert', 'expresscurate_content_alert');
  add_action('expresscurate_sitemap_generate', 'expresscurate_sitemap_generate');
  add_action('expresscurate_sitemap_push', 'expresscurate_sitemap_push');

  function expresscurate_pull_feeds() {
    $feeds = new ExpressCurate_FeedManager();
    $feeds->get_feed_content();
  }

  function expresscurate_content_alert() {
      $feeds = new ExpressCurate_FeedManager();
      $feeds->send_content_alert();
  }
  function expresscurate_publish_event() {
    $expresscurate_smart_publish = new ExpressCurate_SmartPublish();
    $expresscurate_smart_publish->publish_event();
  }

  function expresscurate_sitemap_generate() {
      $expresscurate_sitemap = new ExpressCurate_Sitemap();
      $expresscurate_sitemap->generateSitemapScheduled();
  }

  function expresscurate_sitemap_push() {
      $expresscurate_sitemap = new ExpressCurate_Sitemap();
      $expresscurate_sitemap->pushSitemapScheduled();
  }



  function expresscurate_normalise_url( $url , $fullUrl=false ) {
      if(mb_substr($url, 0, 4) !== 'http'){
          $url = 'http://' . $url;
      }

      $parseURL = parse_url($url);
      $host = $parseURL['host'];
      $url_protocol = $parseURL['scheme'];
      $protocol = !empty($url_protocol)?$url_protocol:"http";
      if(mb_substr($host, 0, 3) == 'www'){
          $host = preg_replace('/(?:'.$protocol.'?:\/\/)?(?:www\.)?(.*)\/?$/i', '$1', $host);
      }
      $url = $protocol.'://' .$host;

      if($fullUrl &&  $parseURL['host'] && $parseURL['path']) {
          $url = $url.$parseURL['path'];
      }
      return $url;
  }

  function cron_add_5min($schedules) {
    $schedules['5min'] = array(
        'interval' =>  5 * 60,
        'display' => __('Once every five minutes')
    );
    return $schedules;
  }


  // instantiate the plugin class
  $expresscurate = new ExpressCurate();

  // Add a link to the settings page onto the plugin section
  if (isset($expresscurate)) {
    // Add the settings link to the plugins page
    function expresscurate_settings_link($links) {
      array_unshift($links, '<a href="http://bit.ly/expresscuratedonate" target="_blank">Donate</a>');
      array_unshift($links, '<a href="options-general.php?page=expresscurate_settings">Settings</a>');
      array_unshift($links, '<a href="admin.php?page=expresscurate_support">Support</a>');
      return $links;
    }

    $plugin = plugin_basename(__FILE__);
    add_filter("plugin_action_links_$plugin", 'expresscurate_settings_link');
  }
}
