<?php
/**
 * @package WordPress
 * @subpackage Zetta_Theme
 */
get_header();
?>
	<div id="content" class="narrowcolumn">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<h4><?php the_title(); ?></h4>
				<div class="authAv">
					<img src="/blog/wp-content/uploads/2014/05/Courtenay-Troxel.jpg" alt="<?php the_author() ?>" />
				</div>
				<p class="date"><?php the_time('F d, Y') ?> <!-- by <?php the_author() ?> --></p>
				<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
				<p class="authBlurb"><?php the_author_description(); if ( get_the_author_login() === "jwhitehead" ) {
					 echo( '<a href="http://www.twitter.com/'.get_the_author_login().'" onclick="window.open(\'http://www.twitter.com/'.get_the_author_login().'\'); return false;" target="_blank">Twitter: @'.get_the_author_login().'</a>' );
				} ?></p>
				<div class="entry">
					<?php the_content('Read the rest of this page &raquo;'); ?>
					<div class="twitterItems">
						<?php
						if ( get_the_author_login() === "jwhitehead" ) : ?>
							<a class="followMe" href="http://www.twitter.com/<?php the_author_login(); ?>" onclick="window.open('http://www.twitter.com/<?php the_author_login(); ?>'); return false;" target="_blank"><img src="/_wp/wp-content/twittersimplistic.png" alt="Follow <?php the_author(); ?> on Twitter." height="30" width="130" /></a>
						<?php endif; ?>
					</div>
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				</div>
			</div>
			<?php endwhile; endif; ?>
							</div><!-- page.php -->
						</div> <!-- end col1of2 --><!-- page.php -->
						<?php get_sidebar(); ?>
						<?php get_footer(); ?>
