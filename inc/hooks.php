<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package GOBBLE
 */

// HERO
 function hero() {
   if(is_page() && !is_front_page()) {
    get_template_part('/inc/acf/hero');
    } elseif(is_page()) {
    get_template_part('/inc/acf/hero-home');
    }
  }

  add_action('before_content','hero');

// PRESENTED BY
function presented_by() {
  if(is_page_template('race-page.php') || is_front_page()) {
   get_template_part('/inc/acf/presented-by');
   }
 }
 add_action('before_content','presented_by');

 // PRESENTED BY
 function benefits() {
   if(is_front_page()) {
    get_template_part('/inc/acf/benefits');
    }
  }
add_action('after_content','benefits');

// SPONSORS
function sponsors() {
  if(is_page() && !is_page('sponsors') || is_404() || is_search()) {
   get_template_part('/inc/acf/sponsors');
   }
 }
add_action('after_content','sponsors');

// LOWER CTA
function lower_ctas() {
  //if(is_page() || is_404() || is_search()) {
   get_template_part('/inc/acf/lower-cta');
  // }
 }
add_action('after_content','lower_ctas');


// hook the information after each race page content

add_filter( 'the_content', 'post_race_info' );

function post_race_info( $content ) {
   if ( is_page_template('race-page.php')) {
       ob_start();
       $more_info = get_template_part('/components/race/after-content-info');
       $content = $content.ob_get_clean();
   }
   return $content;
}

// page content FAQ

add_filter( 'the_content', 'content_faq' );

function content_faq( $content ) {
   if ( is_page_template('race-page.php') || is_page_template('event-page.php') && !is_front_page()) {
       ob_start();
       $faq = get_template_part('/components/page/page-faq');
       $content = $content.ob_get_clean();
   }
   return $content;
}


add_filter( 'the_content', 'become_sponsor', 2 );

function become_sponsor( $content ) {
   if ( is_page('sponsors')) {
       ob_start();
       $faq = get_template_part('/components/page/page-become-sponsor');
       $content = $content.ob_get_clean();
   }
   return $content;
}


// SPONSOR PAGE GRID

add_filter( 'the_content', 'sponsor_page_list', 1 );

function sponsor_page_list( $content ) {
   if ( is_page('sponsors')) {
       ob_start();
       $faq = get_template_part('/components/page/sponsor-page-list');
       $content = $content.ob_get_clean();
   }
   return $content;
}


// FAQ INSTRUCTIONS

add_action( 'edit_form_after_title', 'myprefix_edit_form_after_title' );

function myprefix_edit_form_after_title() {
   global $my_admin_page;
   global $post;
   $screen = get_current_screen();
   if ( is_admin() && $post->ID == 64) {
      echo '<h2 style="color:red;font-size:20px">For FAQ toggle functionality, please only use h4 tags for question titles.</h2>';
  }
}





 // Move Yoast to bottom
 function yoasttobottom() {
 	return 'low';
 }
 add_filter( 'wpseo_metabox_prio', 'yoasttobottom');
