<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GOBBLE
 */
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php

	if (is_active_sidebar( 'sidebar-2' ) ) {

		dynamic_sidebar( 'sidebar-2' );

	} ?>

	<!-- Register -->

	<section id="register-button" class="widget widget_register_button">
		<a target="_blank" class="btn btn-alt" href="http://www.tempotickets.com/gobblegallop2017">Register Now</a>
	</section>

	<!-- Race Details -->
	<section id="race-details" class="widget widget_race-details">
		<?php get_template_part('/components/race/sidebar/race-details'); ?>
	</section>

	<!-- benefits carousel widget -->
	<section id="benefits-carousel" class="widget widget_benefits_carousel">
		<?php
		if(!is_page('gobble-giddyup')) :
		get_template_part('/inc/acf/benefits-carousel');
	  endif; ?>
	</section>
	

	<?php //dynamic_sidebar( 'sidebar-1' ); ?>

</aside>
