<?php
/**
 * @package WordPress
 * @subpackage Zetta_Theme
 */
get_header();
$d = "Y-m-d G:i-s";
$e = "h:i a";
$f = "F jS, Y";
?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<div <?php post_class('newSingle') ?> id="post-<?php the_ID(); ?>">
			<p class="date">
				<time datetime="<?php echo get_post_time( $d ); ?>">
  					<?php echo get_post_time( $e ); ?> on <?php echo get_post_time( $f ); ?>
				</time>
			</p>
			<h1 style = "font-size: 26px; letter-spacing:-1px; color: #177caf; line-height: 28px; display: block; padding-bottom: 0px;" class="postTitle helv entry-title"><a style = "color: #177caf;" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
            <?php if (get_the_author() == "Courtenay Troxel"){?><span class="theAuthor">by <a href = "http://www.zetta.net/author/courtenay" rel="author" class="author"><?php the_author() ?></a></span> <?php } elseif (get_the_author() == "Laura Knight") {?><span class="theAuthor">by <a href = " http://www.zetta.net/author/laura-knight/" rel="author" class="author"><?php the_author() ?></a></span> <?php } elseif (get_the_author() == "Maggie Getova") {?><span class="theAuthor">by <a href = "http://www.zetta.net/author/maggie" rel="author" class="author"><?php the_author() ?></a></span> <?php } else {?> <span class="theAuthor">by <a href = "http://www.zetta.net/management.php" rel="author"><?php the_author() ?></a></span> <?php  } ?>

			<div class="entry">
				<?php the_content(); ?>
			</div>
<div class="clear"></div>
            
            
	<?php if (get_the_author() == "Courtenay Troxel"){?>
            <div class="authorBox" style="display: block; padding: 12px; background: #eef5f8; margin: 25px 0;">
                <div class="authPhoto" style="padding: 4px 5px 4px 4px; background: #fff; border: 1px solid #dbdcdd; display: block; float: left; width: 130px;"><?php userphoto_the_author_photo(); ?></div>
                <div class="authDetails" style="display: block; float: right; width: 460px;">
                <span class="theAuthor" style = "font-size: 18px; font-weight: bold; color: #0d5977; padding: 0px; display: block; border-bottom: 1px dotted #0d5977;">About the Author</span>    
		<span class="biography" style="font-size: 14px; color: #303030; line-height: 19px; padding: 14px 0 10px; display: block;">Courtenay is Zetta.net's content creator, marketing strategist, and ninja in training.</span>
		<div class="followLeft">
	            <span class="follow" style="display: block; font-size: 13px; color: #2395c0; font-weight: bold; margin-bottom: 6px;">Follow Courtenay Troxel:</span>
                    <div class="followLinks" style="position:relative;">
                        <a href="https://plus.google.com/112984684458931521551?rel=author" target="_blank"><img src="http://pages.zetta.net/rs/zetta/images/iconGoogle.png" alt="GooglePlus"></a>
                    </div>
		</div>
		<div class="followRight">
	            <span class="follow" style="display: block; font-size: 13px; color: #2395c0; font-weight: bold; margin-bottom: 6px;">Follow Zetta:</span>
                    <div class="followLinks" style="position:relative;">
                    	<a class="social facebook" target="_blank" href="https://www.facebook.com/zettastorage"></a>
                        <a class="social linked" target="_blank" href="http://www.linkedin.com/company/zetta-inc."></a>
                        <a class="social twitter" target="_blank" href="https://twitter.com/zettanet"></a>
                        <a class="social google" target="_blank" href="https://plus.google.com/+ZettaNetBackup/posts"></a>
                        <a class="social other" target="_blank" href="http://community.spiceworks.com/pages/zetta"></a>
			<a class="social youtube" target="_blank" href="https://www.youtube.com/user/zettabackup"></a>
                    </div>
		</div>
                </div>
                <div style="clear:both; display:block;"></div>
            </div>
<?php } ?>

<?php if (get_the_author() == "Laura Knight"){?>
            <div class="authorBox" style="display: block; padding: 12px; background: #eef5f8; margin: 25px 0;">
                <div class="authPhoto" style="padding: 4px 5px 4px 4px; background: #fff; border: 1px solid #dbdcdd; display: block; float: left; width: 130px;"><?php userphoto_the_author_photo(); ?></div>
                <div class="authDetails" style="display: block; float: right; width: 460px;">
                <span class="theAuthor" style = "font-size: 18px; font-weight: bold; color: #0d5977; padding: 0px; display: block; border-bottom: 1px dotted #0d5977;">About the Author</span>    
		<span class="biography" style="font-size: 14px; color: #303030; line-height: 19px; padding: 14px 0 10px; display: block;">Laura is Zetta.net's Content Marketing Manager. She writes, edits, designs and drinks too much coffee.</span>
		<div class="followLeft">
	            <span class="follow" style="display: block; font-size: 13px; color: #2395c0; font-weight: bold; margin-bottom: 6px;">Follow Laura Knight:</span>
                    <div class="followLinks" style="position:relative;">
                        <a href="https://plus.google.com/u/0/104107015378133237145/posts?rel=author" target="_blank"><img src="http://pages.zetta.net/rs/zetta/images/iconGoogle.png" alt="GooglePlus"></a>
                    </div>
		</div>
		<div class="followRight">
	            <span class="follow" style="display: block; font-size: 13px; color: #2395c0; font-weight: bold; margin-bottom: 6px;">Follow Zetta:</span>
                    <div class="followLinks" style="position:relative;">
                    	<a class="social facebook" target="_blank" href="https://www.facebook.com/zettastorage"></a>
                        <a class="social linked" target="_blank" href="http://www.linkedin.com/company/zetta-inc."></a>
                        <a class="social twitter" target="_blank" href="https://twitter.com/zettanet"></a>
                        <a class="social google" target="_blank" href="https://plus.google.com/+ZettaNetBackup/posts"></a>
                        <a class="social other" target="_blank" href="http://community.spiceworks.com/pages/zetta"></a>
			<a class="social youtube" target="_blank" href="https://www.youtube.com/user/zettabackup"></a>
                    </div>
		</div>
                </div>
                <div style="clear:both; display:block;"></div>
            </div>
<?php } ?>

<?php if (get_the_author() == "Maggie Getova"){?>
            <div class="authorBox" style="display: block; padding: 12px; background: #eef5f8; margin: 25px 0;">
                <div class="authPhoto" style="padding: 4px 5px 4px 4px; background: #fff; border: 1px solid #dbdcdd; display: block; float: left; width: 130px;"><?php userphoto_the_author_photo(); ?></div>
                <div class="authDetails" style="display: block; float: right; width: 460px;">
                <span class="theAuthor" style = "font-size: 18px; font-weight: bold; color: #0d5977; padding: 0px; display: block; border-bottom: 1px dotted #0d5977;">About the Author</span>    
        <span class="biography" style="font-size: 14px; color: #303030; line-height: 19px; padding: 14px 0 10px; display: block;">Maggie is Zetta.net’s junior content marketing contributor. When she’s not writing for the blog, she’s spending way too much time on the internet.</span>
        <!--<div class="followLeft">
                <span class="follow" style="display: block; font-size: 13px; color: #2395c0; font-weight: bold; margin-bottom: 6px;">Follow Maggie Getova:</span>
                    <div class="followLinks" style="position:relative;">
                        <a href="https://plus.google.com/u/0/104107015378133237145/posts?rel=author" target="_blank"><img src="http://pages.zetta.net/rs/zetta/images/iconGoogle.png" alt="GooglePlus"></a>
                    </div>
        </div>-->
        <div class="followRight">
                <span class="follow" style="display: block; font-size: 13px; color: #2395c0; font-weight: bold; margin-bottom: 6px;">Follow Zetta:</span>
                    <div class="followLinks" style="position:relative;">
                        <a class="social facebook" target="_blank" href="https://www.facebook.com/zettastorage"></a>
                        <a class="social linked" target="_blank" href="http://www.linkedin.com/company/zetta-inc."></a>
                        <a class="social twitter" target="_blank" href="https://twitter.com/zettanet"></a>
                        <a class="social google" target="_blank" href="https://plus.google.com/+ZettaNetBackup/posts"></a>
                        <a class="social other" target="_blank" href="http://community.spiceworks.com/pages/zetta"></a>
            <a class="social youtube" target="_blank" href="https://www.youtube.com/user/zettabackup"></a>
                    </div>
        </div>
                </div>
                <div style="clear:both; display:block;"></div>
            </div>
<?php } ?>

<?php if (get_the_author() == "Chris Schin"){?>
            <div class="authorBox" style="display: block; padding: 12px; background: #eef5f8; margin: 25px 0;">
                <div class="authPhoto" style="padding: 4px 5px 4px 4px; background: #fff; border: 1px solid #dbdcdd; display: block; float: left; width: 130px;"><?php userphoto_the_author_photo(); ?></div>
                <div class="authDetails" style="display: block; float: right; width: 460px;">
                <span class="theAuthor" style = "font-size: 18px; font-weight: bold; color: #0d5977; padding: 0px; display: block; border-bottom: 1px dotted #0d5977;">About the Author</span>    
		<span class="biography" style="font-size: 14px; color: #303030; line-height: 19px; padding: 14px 0 10px; display: block;">Chris is Zetta.net's vice president of products, responsible for product strategy, direction, and marketing.</span>
		<div class="followLeft">
	            <!--<span class="follow" style="display: block; font-size: 13px; color: #2395c0; font-weight: bold; margin-bottom: 6px;">Follow Courtenay Troxel:</span>
                    <div class="followLinks" style="position:relative;">
                        <a href="https://plus.google.com/112984684458931521551?rel=author" target="_blank" rel="author"><img src="http://pages.zetta.net/rs/zetta/images/iconGoogle.png" alt="GooglePlus"></a>
                    </div>-->
		</div>
		<div class="followRight">
	            <span class="follow" style="display: block; font-size: 13px; color: #2395c0; font-weight: bold; margin-bottom: 6px;">Follow Zetta:</span>
                    <div class="followLinks" style="position:relative;">
                    	<a class="social facebook" target="_blank" href="https://www.facebook.com/zettastorage"></a>
                        <a class="social linked" target="_blank" href="http://www.linkedin.com/company/zetta-inc."></a>
                        <a class="social twitter" target="_blank" href="https://twitter.com/zettanet"></a>
                        <a class="social google" target="_blank" href="https://plus.google.com/+ZettaNetBackup/posts"></a>
                        <a class="social other" target="_blank" href="http://community.spiceworks.com/pages/zetta"></a>
			<a class="social youtube" target="_blank" href="https://www.youtube.com/user/zettabackup"></a>
                    </div>
		</div>
                </div>
                <div style="clear:both; display:block;"></div>
            </div>
<?php } ?>

            <div id="aboutZettaBottom">
		<img src="<?php bloginfo('template_directory'); ?>/images/new_logo.png" alt="Zetta logo" class="zettalogo">
		<span>Zetta.net is an enterprise-grade cloud and local backup, archiving, and disaster recovery solution for small- and midsize businesses, MSPs, and VARs.</span>
	    </div>
            
            <div id="signupBox" style="height:76px;">
            	<span class="subtitle">SIGN UP NOW FOR</span>
                <span class="title">ENTERPRISE CLOUD BACKUP &amp; DISASTER RECOVERY</span>
                <a href="http://pages.zetta.net/free-trial.html" class="freeTrial"></a>
                <!-- <a href="http://pages.zetta.net/requestquoteservices.html" class="viewPricing helv">VIEW PRICING</a>
                <a href="http://pages.zetta.net/free-trial.html" class="seeTrial helv">SEE TRIAL DETAILS</a> -->
            </div>
		</div>        
        <?php comments_template(); ?> 
	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

    <?php endif; ?>
    
	</div><!-- single.php -->
</div> <!-- end col1of2 --><!-- single.php -->
<?php get_sidebar(); ?>

<?php get_footer(); ?>