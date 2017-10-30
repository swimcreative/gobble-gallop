<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GOBBLE
 */


if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	//return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php if(!is_page('event-info')) : ?>
			  <?php get_template_part('sidebar-race-list'); ?>
	<?php endif; ?>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
  <?php get_template_part('/components/page/page-faq'); ?>
</aside>
