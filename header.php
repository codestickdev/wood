<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wood-zoo
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header id="masthead" class="siteHeader">
		<div class="siteHeader__wrap container-lg">
			<a href="#page" class="siteHeader__logo">
				<img src="<?php echo get_template_directory_uri() . '/images/logo.svg'; ?>" />
			</a>
			<div class="siteHeader__menu">
				<a href="https://petgarden.pl/" target="_blank" class="outerlink">www.petgarden.pl</a>
				<div class="menuButton">
					<img src="<?php echo get_template_directory_uri() . '/images/menu_button.svg'; ?>" />
					<p>menu →</p>
				</div>
			</div>
		</div>

		<!-- <nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'wood' ); ?></button>
			
		</nav>#site-navigation -->
	</header><!-- #masthead -->

<div class="sideMenu">
	<div class="sideMenu__wrap">
		<div class="sideMenu__content">
			<div class="closeMenu">
				<p>close  x</p>
			</div>
			<div class="menu">
				<?php wp_nav_menu(array('menu_id' => 'primary-menu')); ?>
			</div>
			<div class="languages">
				<?php pll_the_languages( array( 'show_flags' => 0, 'show_names' => 0, 'display_names_as' => 'slug', 'hide_current' => 0 ) ); ?>
			</div>
		</div>
	</div>
</div>