<?php
/**
 * The template for displaying the home page (front-page).
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package _tb
 */

get_header(); ?>

<div id="content" class="main-content-inner col-sm-12">
	
	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'front-page' ); ?>

	<?php endwhile; // end of the loop. ?>

</div><!-- ENDS .main-content-inner -->

<?php get_footer(); ?>
