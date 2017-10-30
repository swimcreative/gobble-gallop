<div class="site-contact">
	<?php
  if(get_custom_logo()) {
  	echo get_custom_logo() . '<br>';
		echo '<span class="contact-info-title">' . get_bloginfo('description') . '</span><br>';
  } else {
    echo '<span class="contact-info-title">' . get_bloginfo('name') . '</span><br>';
  }

	$address = nl2br(get_theme_mod('gobble_address'));
	if ($address != '') {
		//echo '<span class="contact-info-address">' . $address . '</span><br>';
	}
	if (get_theme_mod('gobble_phone') != '') {
		//echo '<span class="contact-info-phone"><abbr title="Phone Number">PH</abbr>: <a href="tel:' . get_theme_mod('gobble_phone'). '">' . get_theme_mod('gobble_phone') . '</a></span><br>';
	}
	if (get_theme_mod('gobble_email') !='' ) {
		//echo '<span class="contact-info-email"><abbr title="Email Address">E</abbr>: <a href="mailto:' . get_theme_mod('gobble_email'). '">' . get_theme_mod('gobble_email') . '</a></span>';
	}
	?>

</div><!-- .site-contact -->

<ul class="social">

	<?php if (is_active_sidebar( 'social' ) ) {

		dynamic_sidebar( 'social' );

	} ?>

</ul>

<?php

//GET ADDRESS LINE BY LINE
/*
$address = '';
$lines = explode("\n", get_theme_mod('gobble_address'));
$i = 1;
foreach ($lines as $line) {
  if($i == 1) {
    $address .= '<span>'.$line.'</span>';
  } else {
    $address .= '<br><span>'.$line.'</span>';
  }
  $i++;
}
*/

?>
