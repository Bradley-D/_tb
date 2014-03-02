<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package _tb
 */
?>
			</div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
		</div><!-- close .row -->
	</div><!-- close .container -->
</div><!-- close .main-content -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container">
		<div class="row">
			<div class="site-footer-inner col-sm-12">
				<div class="footer-widget-full">
					<?php if ( is_active_sidebar( 'footer-full' ) ) : ?>
						<?php dynamic_sidebar( 'footer-full' ); ?>
					<?php endif; ?>
				</div><!-- ENDS .footer-widget-full -->
				<div class="row">
					<div class="footer-widget-1 col-md-3">
						<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
							<?php dynamic_sidebar( 'footer-1' ); ?>
						<?php endif; ?>
					</div><!-- ENDS .footer-widget-1 -->
					<div class="footer-widget-2 col-md-3">
						<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
								<?php dynamic_sidebar( 'footer-2' ); ?>
							<?php endif; ?>
					</div><!-- ENDS .footer-widget-2 -->
					<div class="footer-widget-3 col-md-3">
						<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
							<?php dynamic_sidebar( 'footer-3' ); ?>
						<?php endif; ?>
					</div><!-- ENDS .footer-widget-3 -->
					<div class="footer-widget-4 col-md-3">
						<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
							<?php dynamic_sidebar( 'footer-4' ); ?>
						<?php endif; ?>
					</div><!-- ENDS .footer-widget-4 -->
				</div>
				<div class="site-info">
					<?php do_action( '_tb_credits' ); ?>
					<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', '_tb' ); ?>" rel="generator"><?php printf( __( 'Powered by %s', '_tb' ), 'WordPress' ); ?></a>
					<?php _e( ' | ', '_tb' ); ?>
					<?php printf( __( 'Theme: %1$s by %2$s.', '_tb' ), '_tb', '<a title="WordPress Developer" href="http://bradley-davis.com/">Bradley Davis</a>' ); ?>
				</div><!-- close .site-info -->
			
			</div>	
		</div>
	</div><!-- close .container -->
</footer><!-- close #colophon -->

<?php wp_footer(); ?>

</body>
</html>