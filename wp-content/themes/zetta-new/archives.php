<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>
<div id="content" class="narrowcolumn">
	<!--<?php get_search_form(); ?>-->
	<h2 class="widgettitle">Archives by Month!:</h2>
	<ul>
		<?php wp_get_archives('type=monthly'); ?>
	</ul>
	<h2 class="widgettitle">Archives by Subject:</h2>
	<ul>
		 <?php wp_list_categories(); ?>
	</ul>
</div>
</div> <!-- end col1of2 --><!-- single.php -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
