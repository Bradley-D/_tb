<?php
/**
 * The Template for displaying all single posts.
 *
 * @package _tb
 */

get_header(); ?>

<div class="row">
	<div id="content" class="main-content-inner col-sm-12 col-md-8">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php //_tb_content_nav( 'nav-below' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			?>

		<?php endwhile; // end of the loop. ?>

	</div><!-- ENDS .main-content-inner -->

	<?php get_sidebar(); ?>

</div><!-- ENDS .row -->

<?php get_footer(); ?>