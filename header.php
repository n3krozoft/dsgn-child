<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Designer
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php 

	/*
	 * <script src="//use.typekit.net/trz6wms.js"></script>
	 * <script>try{Typekit.load();}catch(e){}</script>
	*/


 ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
	/* Define header options */
	$toggle_color = get_option( 'designer_customizer_toggle', 'light' );
?>

<div class="sidebar-toggle <?php echo esc_attr( $toggle_color ); ?>">
	<div class="flyout-toggle"><i class="fa fa-bars"></i></div>
	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
</div><!-- .sidebar-toggle -->

<header id="masthead" class="site-header <?php if ( get_theme_mod( 'designer_show_sidebar' ) ) { echo 'sidebar-open'; } ?>" role="banner">

	<div class="flyout-toggle"><i class="fa fa-times"></i></div>

	<!-- Logo, description and main navigation -->
	<div id="secondary" class="widget-area" role="complementary">
		<div class="widget branding-widget">

			<!-- Use the Site Logo feature, if supported -->
			<?php if ( function_exists( 'the_site_logo' ) ) { ?>
				<h1 class="site-logo">
					<?php the_site_logo(); ?>
				</h1>
			<?php } else { ?>
				<!-- Use the standard Customizer logo -->
				<?php $logo = get_theme_mod( 'designer_customizer_logo' ); ?>
				<?php if ( ! empty( $logo ) ) { ?>
					<h1 class="site-logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" /></a>
					</h1>
				<?php } ?>
			<?php } ?>

			<div class="site-title-wrap">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>
		</div>

		<!-- Sidebar navigation -->
		<nav id="site-navigation" class="main-navigation widget" role="navigation">
			<?php wp_nav_menu( array(
				'theme_location' => 'primary'
			) );?>
		</nav><!-- #site-navigation -->

		<!-- Sidebar widgets -->
		<?php get_sidebar(); ?>

		
	</div><!-- #secondary .widget-area -->
</header><!-- #masthead -->

<div id="page" class="hfeed site container <?php if ( get_theme_mod( 'designer_show_sidebar' ) ) { echo 'sidebar-open'; } ?>">
	<div id="content" class="site-content animated-faster fadeIn">
