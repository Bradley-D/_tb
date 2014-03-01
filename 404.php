<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package _tb
 */

get_header(); ?>

	<?php // add the class "panel" below here to wrap the content-padder in Bootstrap style ;) ?>	
	<section class="content-padder error-404 not-found">

		<header class="page-header">
			<h2 class="page-title"><?php _e( 'Oops! Something went wrong here.', '_tb' ); ?></h2>
		</header><!-- .page-header -->

		<div class="page-content">

			<p><?php _e( 'Nothing could be found at this location. Maybe try a search?', '_tb' ); ?></p>

			<?php get_search_form(); ?>

		</div><!-- .page-content -->

	</section><!-- .content-padder -->
		
<?php get_sidebar(); ?>
<?php get_footer(); ?>