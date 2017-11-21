<?php
/**
 * The Template for displaying all single posts.
 *
 * @package _tb
 */

get_header(); ?>

<div class="row">
	<div id="content" class="main-content-inner col-xs-12">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single-website-projects' ); ?>

			<?php _tb_content_nav( 'nav-below' ); ?>

		<?php endwhile; // end of the loop. ?>
	</div><!-- ENDS .main-content-inner -->
</div><!-- ENDS .row -->

<?php get_footer(); ?>