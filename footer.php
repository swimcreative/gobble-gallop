<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GOBBLE
 */

?>

	</div>

	<?php do_action('after_content'); ?>


	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="inner-wrap"> <!-- inner wrap -->


		<?php get_template_part( 'components/footer/site', 'contact' ); ?>

		<?php get_template_part( 'components/footer/site', 'morefoot' ); ?>
		
		<?php// get_template_part( 'components/footer/site', 'credits' ); ?>

	</div> <!-- endf inner wrap -->

	</footer>
	<section class='sub-footer'>
		<div class="inner-wrap">
					<?php get_template_part( 'components/footer/site', 'info' ); ?>
				</div>
			</section>
</div>
<?php wp_footer(); ?>

</body>
</html>
