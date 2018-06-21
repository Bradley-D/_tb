<?php
/**
 * _tb WooCommerce setup and custom functions
 *
 * @package _tb
 * @version 1.0
 */

/**
* WooCommerce setup starts now.
*/
// Disable WooCommerce CSS so we can add our own
// if ( version_compare( WOOCOMMERCE_VERSION, '2.1' ) >= 0 ) {
// 	add_filter( 'woocommerce_enqueue_styles', '__return_false' );
// } else {
// 	define( 'WOOCOMMERCE_USE_CSS', false );
// }

// Add theme support for the product gallery from WC2.7
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

// Unhook WooCommerce wrappers
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

// Hook in _tb WooCommerce Wrappers
function _tb_wrapper_start() {
  echo '<section class="product-container">';
}
add_action('woocommerce_before_main_content', '_tb_wrapper_start', 10 );

function _tb_wrapper_end() {
  echo '</section>';
}
add_action('woocommerce_after_main_content', '_tb_wrapper_end', 10 );
