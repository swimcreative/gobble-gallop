<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GOBBLE
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'gobble' ); ?></a>

	<header id="masthead" class="site-header scroll-nav" role="banner">

		<div class="inner-wrap"><!-- inner wrap -->
			<div class="flag-left"><span></span></div>
				<div class="header-components">

					<?php get_template_part( 'components/header/site', 'branding' ); ?>
					<?php get_template_part( 'components/header/site', 'navigation' ); ?>

			</div>
		<div class="flag-right"><span></span></div>
	</div> <!-- end inner wrap -->

	</header>

	<?php do_action('before_content'); ?>

	<div id="content" class="site-content">
