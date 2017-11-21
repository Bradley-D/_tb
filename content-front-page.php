<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package _tb
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php ssm_display_title(); ?>
	
	<section id="latest-work" class="entry-content latest-work">
			<div class="row">
				<div class="h1"><?php _e( 'Featured Web Projects', '_tb' ); ?></div>

				<?php ssm_latest_work(); ?>

		</div><!-- ENDS .row -->
	</section>
	<section id="testimonial-wrapper" class="entry-content testimonial-wrapper">
			<div class="row">
				<div class="h1"><?php _e( 'What Our Clients Say', '_tb' ); ?></div>
				<div class="testimonials">

				<?php ssm_testimonials(); ?>

				</div><!-- ENDS .testimonial -->
		</div><!-- ENDS .row -->
	</section>

</article><!-- #post-## -->