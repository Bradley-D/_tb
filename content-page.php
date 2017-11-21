<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package _tb
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php ssm_display_title(); ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', '_tb' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->