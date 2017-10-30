<?php

//CONTACT INFO
class gobble_contact_info extends WP_Widget {

	function __construct() {
		// Instantiate the parent object
		parent::__construct( false, 'Contact Info' );
	}

	function widget( $args, $instance ) {

    extract($args, EXTR_SKIP);

    echo $before_widget;
    $title = empty($instance['title']) ? 'Contact Info' : apply_filters('widget_title', $instance['title']);

    if ($title === ' ') {
      //do nothing
	} else {
		echo $before_title . $title . $after_title;
	}

  //echo '<span class="contact-info-title">' . get_bloginfo('name') . '</span><br>';
	echo '<span class="contact-info-title"><a target="_blank" href="http://duluthrunning.com">Duluth Running Co.</a></span><br>';
	echo '<span class="contact-info-address">' . nl2br(get_theme_mod('gobble_address')) . '</span><br>';
	echo '<span class="contact-info-phone"><abbr title="Phone Number">PH</abbr>: ' . get_theme_mod('gobble_phone') . '</span><br>';
	echo '<span class="contact-info-email"><abbr title="Email Address">E</abbr>: <a href="mailto:'.get_theme_mod('gobble_email').'">' . get_theme_mod('gobble_email') . '</a></span>';

	echo $after_widget;

    }

	function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }

	 function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title = $instance['title'];
	?>
	  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
	<?php
	  }
}


function gobble_register_widgets() {
	register_widget( 'gobble_contact_info' );
}

add_action( 'widgets_init', 'gobble_register_widgets' );
