<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package _tb
 */

get_header(); ?>

<div class="row">
	<div id="content" class="main-content-inner col-sm-12 col-md-8">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'page' ); ?>

		<?php endwhile; // end of the loop. ?>

	</div><!-- ENDS .main-content-inner -->

	<?php get_sidebar(); ?>

</div><!-- ENDS .row -->

<?php get_footer(); ?>
