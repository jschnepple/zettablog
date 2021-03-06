<?php
$content_list = array();
$feedManager = new ExpressCurate_FeedManager();
$contentList = $feedManager->get_feed_list();
$sorted_feeds = array();
function array_sort_by_column(&$arr, $col, $dir = SORT_DESC)
{
    $sort_col = array();
    foreach ($arr as $key => $row) {
        $sort_col[$key] = $row[$col];
    }
    array_multisort($sort_col, $dir, $arr);
}

if (!empty($contentList)) {
    $feed_content = $contentList['content'];
    if (is_array($feed_content) && count($feed_content) > 0) {
        foreach ($feed_content as $content) {
            $content['domain'] = parse_url($content['link'], PHP_URL_SCHEME) . "://" . parse_url($content['link'], PHP_URL_HOST);
            $content['desc'] = str_replace("&quot;","'",$content['desc']);
            $content['title'] = str_replace("&quot;","'",$content['title']);
            array_push($sorted_feeds, $content);
        }
    }
    array_sort_by_column($sorted_feeds, 'date');
}

$nextPullTime = human_time_diff(wp_next_scheduled('expresscurate_pull_feeds'), time());
?>
<input id="adminUrl" type="hidden" value="<?php echo get_admin_url(); ?>"/>
<div
    class="expresscurate_feed_list expresscurate_Styles wrap <?php if (get_option('expresscurate_feed_layout', '') == 'single') {
        echo 'expresscurate_singleColumn';
    } ?>">
    <div class="expresscurate_headBorderBottom expresscurate_OpenSansRegular">
        <a href="admin.php?page=expresscurate_support" class="expresscurate_writeUs">Suggestions? <span>Submit here!</span></a>

        <h2>Content Feed</h2>

        <div class="pageDesc">
            Content Feed brings content from your RSS feeds directly into ExpressCurate, providing you a convenient
            starting point
            for writing your curated posts. Pick an article (or multiple articles) and click on the curate button to
            create a post.
        </div>
        <div class="controlsWrap">
            <ul class="feedListControls expresscurate_preventTextSelection expresscurate_controls ">
                <li class="check">
                    <span class="tooltip">select / deselect</span>
                </li>
                <li class="remove expresscurate_floatRight">
                    <span class="tooltip">delete</span>
                </li>
                <li class="bookmark expresscurate_floatRight">
                    <span class="tooltip">bookmark</span>
                </li>
                <li class="quotes expresscurate_floatRight">
                    <span class="tooltip">curate</span>
                </li>
                <?php if (strlen(get_option('expresscurate_links_rss', '')) > 2) { ?>
                    <li class="pull active expresscurate_floatRight">
                        <span class="tooltip">pull</span>
                        <span class="loading"></span>
                    </li>
                    <li class="pullTime active expresscurate_floatRight">
                        next update:
                        <p>in <?php echo $nextPullTime; ?></p>
                    </li>
                <?php } ?>
                <li class="layout expresscurate_floatRight">
                    <span class="tooltip"><?php if (get_option('expresscurate_bookmark_layout', '') == 'single') {
                            echo 'view as grid';
                        } else {
                            echo 'view as list';
                        } ?></span>
                </li>
                <div class="expresscurate_clear"></div>
            </ul>
        </div>
    </div>
    <div class="expresscurate_clear"></div>
    <ul id="expresscurate_feedBoxes" class="expresscurate_feedBoxes expresscurate_masonryWrap">
    <?php
    if (!empty($sorted_feeds)) {
        $i = 0;
        ?>
        <?php
        foreach ($sorted_feeds as $key => $item) {
            ?>
            <li class="expresscurate_preventTextSelection expresscurate_masonryItem">
                <input id="uniqueId_<?php echo $i; ?>" class="checkInput" type="checkbox"/>
                <label for="uniqueId_<?php echo $i; ?>"></label>
                <textarea
                    class="expresscurate_displayNone expresscurate_feedData"><?php echo json_encode($item); ?></textarea>

                <ul class="keywords">
                    <?php if (!empty($item['media']['videos'])) {
                        echo '<li class="media videos"><span class="tooltip">Video(s):  ' . $item["media"]["videos"] . '</span></li>';
                    }
                    if (!empty($item['media']['images'])) {
                        echo '<li class="media images"><span class="tooltip">Image(s):  ' . $item["media"]["images"] . '</span></li>';
                    }
                    if (!empty($item['keywords'])) { ?>
                        <?php foreach ($item['keywords'] as $keyword => $stats) {
                            if ($stats['percent'] * 100 < 3) {
                                $color = 'blue';
                            } else if ($stats['percent'] * 100 > 5) {
                                $color = 'red';
                            } else {
                                $color = 'green';
                            }
                            ?>
                            <li class="<?php echo $color ?>"><?php echo $keyword; ?>
                                <span class="tooltip">
                      <div class="<?php echo $color ?>">Keyword match</div>
                    <span class="inTitle">title<p class=""><?php echo $stats['title'] ?></p></span><!--inTitle yes|no-->
                    <span class="inContent">content<p><?php echo $stats['percent'] * 100 ?>%</p></span>
                  </span>
                            </li>
                        <?php }
                    } ?>
                </ul>

                <a data-link="<?php echo $item['link']; ?>" class="postTitle" href="<?php echo $item['link'] ?>"
                   target="_blank"><?php echo $item['title'] ?></a><br/>
                <a class="url" href="<?php echo $item['link'] ?>"><?php echo $item['domain'] ?></a>
                <?php if (isset($item['author']) && '' != $item['author']) { ?>
                    <span class="curatedBy">/<?php echo $item['curated'] ? 'curated by' : 'author'; ?>
                        <span><?php echo $item['author']; ?></span> /</span>
                <?php } ?>
                <span
                    class="time"><?php echo human_time_diff(current_time('timestamp'), strtotime($item['date'])) . ' ago'; ?></span></br>

                <ul class="controls expresscurate_preventTextSelection">
                    <li class="curate"><a
                            href="<?php echo esc_url(get_admin_url() . "post-new.php?expresscurate_load_source=" . base64_encode(urlencode($item['link'])) . "&expresscurate_load_title=" . urlencode($item['title'])); ?>">Curate</a>
                    </li>
                    <li class="separator">-</li>
                    <li class="bookmark">Bookmark</li>
                    <li class="separator">-</li>
                    <li class="hide">Delete</li>
                </ul>
                <div class="expresscurate_clear"></div>
                <!--<span class="label label_<?php /*echo $item['type'] */ ?>"><?php /*echo $item['type'] */ ?></span>-->
            </li>

            <?php $i++;
        }
        ?><?php
    } ?>
    <label class="expresscurate_notDefined expresscurate_displayNone">Your content feed is
        empty. <?php echo (strlen(get_option('expresscurate_links_rss', '')) > 2) ? '' : 'Configure <a
            href="admin.php?page=expresscurate_feeds">RSS feeds</a> to
        start.'; ?></label>
    </ul>
    <form method="POST" action="<?php echo get_admin_url() ?>post-new.php#expresscurate_sources_collection"
          id="expresscurate_bookmarks_curate">
        <textarea name="expresscurate_bookmarks_curate_data" id="expresscurate_bookmarks_curate_data"
                  class="expresscurate_displayNone"></textarea>
        <input type="hidden" name="expresscurate_load_sources" value="1"/>
    </form>
</div>
