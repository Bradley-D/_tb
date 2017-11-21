<?php
/**
 * Template Name: No Sidebar
 * The template for displaying content without a sidebar.
 *
 * @package _tb
 */

get_header(); ?>

<div class="row">
	<div id="content" class="main-content-inner col-sm-12">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'page' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			?>

		<?php endwhile; // end of the loop. ?>

	</div><!-- ENDS .main-content-inner -->

</div><!-- ENDS .row -->

<?php get_footer(); ?>
