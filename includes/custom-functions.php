<?php
/**
 * _tb custom functions
 *
 * @package _tb
 * @version 1.0
 */

/**
 * Post image sizes
 * @since 1.0
 */
function ssm_add_image_sizes() {
	add_image_size( 'archive-landscape', 720, 250, array( 'center', 'center' ) );
}
add_action( 'after_setup_theme', 'ssm_add_image_sizes' );

/**
 * Display / hide page title
 * @since 1.0
 */
function ssm_display_title() {
	if ( ! 'on' == get_post_meta( get_the_ID(), '_tb_display_title_check', true ) ) :
		echo '<header class="page-header"><h1 class="page-title">' . get_the_title() . '</h1></header><!-- .entry-header -->';
	endif;
}

/**
 * Feature image and display text
 * @since 1.0
 */
function ssm_feature_image() {

	if ( ! is_singular( 'website-projects' ) ) :
		if ( has_post_thumbnail() ) :
			$hero_image_array = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' );
			$hero_image = $hero_image_array[0];
		endif;
	endif;

		echo '<section class="hero-feature" style="background-image: url('. esc_url( $hero_image ) .');">';
		echo '<div class="container hero-feature-text">';

		//if ( !( is_single() || is_home() || is_archive() || is_tag() ) ) :
		if ( is_front_page() || is_page() || is_singular( array( 'website-projects', 'projects' ) ) ) :
			$ssm_feature_image_heading_text = get_post_meta( get_the_ID(), '_tb_feature_image_text_heading', true );
			$ssm_feature_image_sub_heading_text = get_post_meta( get_the_ID(), '_tb_feature_image_text_sub_heading', true );
			echo '<h1>' . $ssm_feature_image_heading_text . '</h1>';
			echo '<h2>' . $ssm_feature_image_sub_heading_text . '</h2>';

		elseif ( is_single() || is_home() ) :
			// We dont want anything here

		elseif ( is_category( ) ) :
			$cat_title = single_cat_title( '', false );
			echo '<h1>' . $cat_title . '</h1>';

		elseif ( is_tag() ) :
			$tag_title = single_tag_title( '', false );
			echo '<h1>' . $tag_title . '</h1>';

		else :

			if ( is_author() ) :
				/* Queue the first post, that way we know
				 * what author we're dealing with (if that is the case).
				*/
				the_post();
				printf( __( '<h1>Author: %s</h1>', '_tb' ), '<span class="vcard">' . get_the_author() . '</span>' );
				/* Since we called the_post() above, we need to
				 * rewind the loop back to the beginning that way
				 * we can run the loop properly, in full.
				 */
				rewind_posts();

			elseif ( is_day() ) :
				printf( __( '<h1>Day: %s</h1>', '_tb' ), '<span>' . get_the_date() . '</span>' );

			elseif ( is_month() ) :
				printf( __( '<h1>Month: %s</h1>', '_tb' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

			elseif ( is_year() ) :
				printf( __( '<h1>Year: %s</h1>', '_tb' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

			elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
				_e( '<h1>Asides</h1>', '_tb' );

			elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
				_e( '<h1>Images</h1>', '_tb');

			elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
				_e( '<h1>Videos</h1>', '_tb' );

			elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
				_e( '<h1>Quotes</h1>', '_tb' );

			elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
				_e( '<h1>Links</h1>', '_tb' );

			else :
				//_e( '<h1>Archives</h1>', '_tb' );

			endif;

			// Check if there is a description
			$term_description = term_description();
			if ( ! empty( $term_description ) ) :
				printf( '<div class="taxonomy-description">%s</div>', $term_description );
			endif;
		endif;

	echo '</div></section>';
}

/**
 * Featured projects - front page
 * @since 1.0
 */
function ssm_latest_work() {
	// WP_Query arguments
	$args = array (
		'post_type'       => 'website-projects',
		'order'           => 'DESC',
		'orderby'         => 'menu_order title',
		'posts_per_page'  => 3
	);

	// The Query
	$ssm_web_projects = new WP_Query( $args );

	// The Loop
	if ( $ssm_web_projects->have_posts() ) :
		while ( $ssm_web_projects->have_posts() ) :  $ssm_web_projects->the_post();
			if ( has_post_thumbnail() ) :
				echo '<div class="latest-work-item col-xs-12 col-md-4"><a class="feature-link" title="' . $feature_title . '" href="' . trailingslashit( get_permalink() ) . '">';
					the_post_thumbnail();
					$feature_title = get_the_title();
					echo '<div class="latest-work-intro">';
						echo $feature_title;
					echo '</div></a>';
				echo '</div>';
			endif;
		endwhile;
	else :
		// no posts found
	endif;
	wp_reset_postdata();
}

/**
 * Featured companies - front page
 * @since 1.0
 */
function ssm_companies() {
	// WP_Query arguments
	$args = array (
		'post_type'              => 'projects',
		'order'                  => 'DESC',
		'orderby'                => 'menu_order title',
	);

	// The Query
	$ssm_projects = new WP_Query( $args );

	// The Loop
	if ( $ssm_projects->have_posts() ) :
		while ( $ssm_projects->have_posts() ) :  $ssm_projects->the_post();
			if ( has_post_thumbnail() ) :
				echo '<div class="col-xs-6 col-md-3">';
					the_post_thumbnail();
				echo '</div>';
			endif;
		endwhile;
	else :
		// no posts found
	endif;
	wp_reset_postdata();
}
/**
 * Testimonials - front page
 * @since 1.0
 */
function ssm_testimonials() {
	// WP_Query arguments
	$args = array (
		'post_type'              => 'testimonial',
		'order'                  => 'DESC',
		'orderby'                => 'menu_order title',
	);

	// The Query
	$ssm_testimonials = new WP_Query( $args );

	// The Loop
	if ( $ssm_testimonials->have_posts() ) :
		while ( $ssm_testimonials->have_posts() ) {
			$ssm_testimonials->the_post();
			// Let's get the post meta
			$ssm_testimonial_client_name = get_post_meta( get_the_ID(), '_tb_testimonial_client_name', true );
			$ssm_testionial_client_position = get_post_meta( get_the_ID(), '_tb_testimonial_position', true );
			$ssm_testimonial_client_business = get_post_meta( get_the_ID(), '_tb_testimonial_business_name', true );
			$ssm_testimonial_client_url = get_post_meta( get_the_ID(), '_tb_testimonial_url', true );

			echo '<div class="row">';
				echo '<div class="testimonial-thumb col-xs-12 col-sm-2">';
				if ( has_post_thumbnail() ) :
					echo '<div class="testimonial-thumb-img">';
						the_post_thumbnail();
					echo '</div>';
					printf( '<span class="testimonial-name">%s</span> / <span class="testimonial-postion">%s</span><br/><span class="testimonial-business"><a title="%s" href="%s">%s</a></span>', $ssm_testimonial_client_name, $ssm_testionial_client_position, $ssm_testimonial_client_business, trailingslashit( $ssm_testimonial_client_url ), $ssm_testimonial_client_business );
				endif;
				echo '</div>';

				echo '<div class="testimonial-content col-xs-12 col-sm-10">';
					echo '<blockquote>';
						the_content();
					echo '</blockquote>';
				echo '</div>';
			echo '</div>';
		}
	else :
		// no posts found
	endif;
	wp_reset_postdata();
}

/**
 * Website Project Content - content-single-website-project.php
 * @since 1.0
 */
function _tb_website_project_content() {

	// get the meta we need
	$ssm_website_project_description = wpautop( get_post_meta( get_the_ID(), '_tb_project_wysiwyg', true ) );
	$ssm_website_project_name = get_post_meta( get_the_ID(), '_tb_project_name', true);
	$ssm_website_project_url = get_post_meta( get_the_ID(), '_tb_project_url', true );
	$ssm_project_designer_name = get_post_meta( get_the_ID(), '_tb_project_designer', true );
	$ssm_project_designer_url = get_post_meta( get_the_ID(), '_tb_project_designer_url', true );

	$ssm_website_project_services = get_post_meta( get_the_ID(), '_tb_project_services', true);
	$ssm_website_project_features = get_post_meta( get_the_ID(), '_tb_project_features', true);
	$ssm_project_price_range = get_post_meta( get_the_ID(), '_tb_project_price_range', true );

	printf( __('<div class="h2">Project Description</div>%s', '_tb'), $ssm_website_project_description );
	// Launch Project
	if ( ! $ssm_website_project_name == '' && ! $ssm_website_project_url == '' ) {
		echo '<a title="' . esc_attr( $ssm_website_project_name ) . '" href="' . esc_url( trailingslashit( $ssm_website_project_url ) ) . '" target="_blank"><button type="button" class="btn btn-warning">' . __( 'Launch: ', '_tb' ) . esc_attr( $ssm_website_project_name ) . '</button></a>';
	}
	printf( __( '<div class="h2">Project Details</div>', '_tb' ) );
	// Project Designer
	if ( ! $ssm_project_designer_name == '' ) {
		echo '<p><strong>Project Designer:</strong> ';
		if ( ! $ssm_project_designer_url == '' ) {
			echo '<a title="'. esc_attr( $ssm_project_designer_name ) .'" href="' . esc_url( trailingslashit(  $ssm_project_designer_url ) ) . '">' . esc_attr( $ssm_project_designer_name ) . '</a></p>';
		} else {
			echo esc_attr( $ssm_project_designer_name ) . '</p>';
		}
	}

	// Project Price Range
	if ( ! $ssm_project_price_range == '' ) {
		foreach ( $ssm_project_price_range as $price ) {
			echo '<p><strong>Project Price Range:</strong> ' . esc_attr( $price ) . '</p>';
		}
	}

	echo '<div class="row">';

	// Project Services
	if ( ! $ssm_website_project_services == '' ) {
		echo '<div class="col-xs-6"><strong>Services</strong>';
			echo '<ul>';
				foreach ( $ssm_website_project_services as $service) {
					echo '<li>'. esc_attr( $service ) . '</li>';
				}
			echo '<ul>';
		echo '</div>';
	}

	// Project Features
	if ( ! $ssm_website_project_features == '' ) {
		echo '<div class="col-xs-6"><strong>Features</strong>';
			echo '<ul>';
				foreach ( $ssm_website_project_features as $feature) {
					echo '<li>'. esc_attr( $feature ) . '</li>';
				}
			echo '</ul>';
		echo '</div>';
	}
	echo '</div>'; // End row
}

/**
 * Footer credits
 * @since 1.0
 */
function _tb_ssm_credits() {
	_e( 'Sixth Sense Marketing - <a title="Sixth Sense Marketing - WordPress & WooCommerce Solutions" href="/">WordPress & WooCommerce Solutions</a>', 'ssm' );
}
add_action( '_tb_credits', '_tb_ssm_credits' );
