<?php
/**
 * Content template used for single-website-projects.php
 * @package _tb
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content row">
		<div class="main-column col-xs-12 col-md-7">
			<?php the_content(); ?>
		</div>
		<div class="project-details col-xs-12 col-md-5">
			<?php _tb_website_project_content(); ?>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->