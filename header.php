<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package _tb
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php do_action( 'before' ); ?>
	
<header id="masthead" class="site-header" role="banner">
	<div class="container">
		<div class="row">
			<div class="site-header-inner col-sm-12">
				<div class="row">
					<?php $header_image = get_header_image();
					if ( ! empty( $header_image ) ) { ?>

	          <div id="title-description">
	            <?php $heading_main = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
	              <<?php echo $heading_main; ?> id="site-title">
	                <?php bloginfo( 'name' ); ?>
	              </<?php echo $heading_main; ?>>

	            <?php $heading_sub = ( is_home() || is_front_page() ) ? 'h4' : 'div'; ?>
	            	<<?php echo $heading_sub; ?> id="site-description">
	             		<?php bloginfo( 'description' ); ?>
	            	</<?php echo $heading_main; ?>>
	          </div><!-- ENDS #title-description -->
	          
	          <div id="logo" class="col-xs-12 col-md-7">
	              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" rel="home">
	                <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
	              </a>
	          </div><!-- ENDS #logo -->

		          <?php 
	      	} else { ?>

						<div class="site-branding col-xs-12 col-md-7">
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<h4 class="site-description"><?php bloginfo( 'description' ); ?></h4>
						</div>

						<?php 
					} ?>

	          <div class="header-widget col-xs-12 col-md-5">
	          	<?php if ( is_active_sidebar( 'header' ) ) : ?>
								<?php dynamic_sidebar( 'header' ); ?>
							<?php endif; ?>
	          </div><!-- ENDS .header-widget -->
      	</row>


			</div>
		</div>
	</div><!-- .container -->
</header><!-- #masthead -->
		
<nav class="site-navigation">		
	<div class="container">
		<div class="row">
			<div class="site-navigation-inner col-sm-12">
				<div class="navbar navbar-default">
					<div class="navbar-header">
				    <!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
				    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
				    	<span class="sr-only">Toggle navigation</span>
				      <span class="icon-bar"></span>
				      <span class="icon-bar"></span>
				      <span class="icon-bar"></span>
				    </button>
				
				    <!-- Your site title as branding in the menu -->
				    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				  </div>

			    <!-- The WordPress Menu goes here -->
	        <?php wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'container_class' => 'collapse navbar-collapse navbar-responsive-collapse',
                    'menu_class' => 'nav navbar-nav',
                    'fallback_cb' => '',
                    'menu_id' => 'main-menu',
                    'walker' => new wp_bootstrap_navwalker()
                )
            ); ?>
				
				</div><!-- .navbar -->
			</div>
		</div>
	</div><!-- .container -->
</nav><!-- .site-navigation -->

<div class="main-content">	
	<div class="container">
		<div class="row">
			<div id="content" class="main-content-inner col-sm-12 col-md-8">

