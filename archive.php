<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package _tb
 */

get_header(); ?>

<div class="row">
	<div id="content" class="main-content-inner col-sm-12 col-md-8">

		<?php // add the class "panel" below here to wrap the content-padder in Bootstrap style ;) ?>	
		<div class="content-padder">
			
			<?php if ( have_posts() ) : ?>
		
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
		
					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>
		
				<?php endwhile; ?>
		
				<?php _tb_content_nav( 'nav-below' ); ?>
		
			<?php else : ?>
		
				<?php get_template_part( 'no-results', 'archive' ); ?>
		
			<?php endif; ?>
		
		</div><!-- .content-padder -->
	</div><!-- ENDS .main-content-inner -->
			
<?php get_sidebar(); ?>

</div><!-- ENDS .row -->
<?php get_footer(); ?>
