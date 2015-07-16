<?php
/**
 * @package WordPress
 * @subpackage Zetta_Theme
 */
get_header();

/*function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
    $first_img = "/images/zettanewbig.png";
  }
  return $first_img;
}*/
?>
	<div id="content" class="narrowcolumn">
    	<div class="post">
	    	<?php $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author')); ?>
    		<h1 class="authorTitle helv">Articles by <?php echo $curauth->display_name; ?></h1>
            <div class="authorBox">
            	<div class="authPhoto"><?php echo get_avatar( $curauth->ID, 130); ?></div>
                <div class="authDetails">
                	<span class="biography"><?php echo $curauth->description; ?></span>
                    <span class="follow">Follow <?php echo $curauth->display_name; ?>:</span>
                    <div class="followLinks">
                    <?php if (get_the_author_meta( 'googleplus', $curauth->ID ) != '') { ?>
                    	<a href="https://plus.google.com/<?php echo get_the_author_meta( 'googleplus', $curauth->ID ); ?>"><img src="<?php bloginfo('template_url'); ?>/images/iconGoogle.png" alt="GooglePlus" /></a>
                    <?php } ?>
                    <?php if (get_the_author_meta( 'twitter', $curauth->ID ) != '') { ?>
                    	&nbsp;<a href="https://twitter.com/<?php echo get_the_author_meta( 'twitter', $curauth->ID ); ?>"><img src="<?php bloginfo('template_url'); ?>/images/iconTwitter.png" alt="Twitter" /></a>
                        &nbsp;<span class="followURL"><a href="https://twitter.com/<?php echo get_the_author_meta( 'twitter', $curauth->ID ); ?>">@<?php echo get_the_author_meta( 'twitter', $curauth->ID ); ?></a></span>
                    <?php } ?>
                    </div>
                </div>
            	<div style="clear:both; display:block;"></div>
            </div>
            <hr style="color:#9ccfe3; background: #9ccfe3; border:none; border-top: 1px solid #9ccfe3;" />
        </div>
		<?php 
		query_posts('showposts=2');
		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="post author" id="post-<?php the_ID(); ?>">
            	<?php the_date('F j, Y', '<span class="date">', '</span>'); ?>
				<h2 class="helv"><?php the_title(); ?></h2>
				<div class="entry">
					<?php the_content('READ MORE'); ?>				
				</div>
                <div style="clear:both; display:block;"></div>
			</div>
			<?php endwhile; endif; ?>
		</div><!-- page.php -->
	</div> <!-- end col1of2 --><!-- page.php -->
						<?php get_sidebar(); ?>
						<?php get_footer(); ?>
