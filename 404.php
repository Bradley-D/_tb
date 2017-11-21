<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package _tb
 */

get_header(); ?>

<div class="row">
	<div id="content" class="main-content-inner col-sm-12 col-md-8">

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
	</div><!-- ENDS .main-content-inner -->
		
	<?php get_sidebar(); ?>
	
</div><!-- ENDS .row -->

<?php get_footer(); ?>