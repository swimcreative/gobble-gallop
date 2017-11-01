<div id="sidebar-race-list">
	<h4>Our Races</h4>
	<?php

	$gobble = 5;
	$tough = 45;
	$giddy = 47;

	$gobble_img = get_the_post_thumbnail_url($gobble);
	$tough_img = get_the_post_thumbnail_url($tough);
	$giddy_img = get_the_post_thumbnail_url($giddy);

	$gobble_link = get_the_permalink($gobble);
	$tough_link = get_the_permalink($tough);
	$giddy_link = get_the_permalink($giddy);

	 ?>
	<a href="<?php echo $gobble_link; ?>" style="background-image:url(<?php echo $gobble_img; ?>)">
		<h2>Gobble Gallop 5K »</h2>
	</a>
	<a href="<?php echo $tough_link; ?>" style="background-image:url(<?php echo $tough_img; ?>)">
		<h2>Tough Turkey 1M »</h2>
	</a>
	<a href="<?php echo $giddy_link; ?>" style="background-image:url(<?php echo $giddy_img; ?>)">
		<h2>Gobble Giddy Up ¼M »</h2>
	</a>
</div>
