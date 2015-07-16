<?php
/**
 * @package WordPress
 * @subpackage Zetta_Theme
 */
get_header(); 
?>

							<div id="content" class="new narrowcolumn">
								<?php if (have_posts()) : ?>
									<?php while (have_posts()) : the_post(); ?>
                                    	<!-- START POST -->
										<div <?php post_class() ?> id="post-<?php the_ID(); ?>">											
											<p class="date"><?php the_time('F d, Y') ?> <!-- by <?php the_author() ?> --></p>
											<h4 class="postTitle helv"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
											<div class="entry new">
<?php if ( get_the_post_thumbnail($post_id) != '' ) {

  echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
   the_post_thumbnail();
  echo '</a>';

} else {

 echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
 echo '<img src="';
 echo catch_that_image();
 echo '" alt="" />';
 echo '</a>';

} ?>
												<?php the_excerpt(); ?>	
<div class="clear"></div>										
											</div>
                                            						<div class="clear"></div>
										</div>
                                        <!-- END POST -->
									<?php endwhile; ?>
									<div class="navigation">
											<?php wp_pagenavi(); ?>
									</div>
								<?php else : ?>
									<h2 class="center">Not Found</h2>
									<p class="center">Sorry, but you are looking for something that isn't here.</p>
									<?php get_search_form(); ?>
								<?php endif; ?>
							</div><!-- index.php -->
						</div> <!-- end col1of2 --><!-- index.php -->
						<?php get_sidebar(); ?>
						<?php get_footer(); ?>