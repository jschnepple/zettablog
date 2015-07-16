<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

	<div id="content" class="new narrowcolumn" style="width:630px;">

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle helv" style="font-size: 26px;margin-bottom: 20px;text-align:left;margin-top:0">Search Results for: <?php the_search_query(); ?></h2>

		<?php while (have_posts()) : the_post(); 
		$excerpt = substr(strip_tags(get_the_content(),'<p>'),0,155);
		?>

			<div class="result" style="display: block;margin: 15px 0;padding-bottom: 15px;border-bottom: 1px dotted #CCC;">
            			<h2 style="font-size: 18px;margin-bottom: 12px;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		                <div class="clear"></div>
		                <div class="text" style="font-size: 14px;line-height: 22px;color: #555;"><?php the_time('M j, Y'); ?>... <?php echo $excerpt.'...'; ?></div>
                		<div class="clear"></div>
		        </div>
            		

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">No posts found. Try a different search?</h2>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div></div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>