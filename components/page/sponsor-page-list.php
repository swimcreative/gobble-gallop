<hr>
<?php
$sponsors = get_field('sponsors', 40);
if(have_rows('sponsors', 40)) : ?>
<ul style="padding:0" id="sponsors_list">
  <?php

  foreach ($sponsors as $s) :
  $gobble = $s['presenting_sponsor'][0];
  if($gobble == 'gobble') : ?>
  <?php include('sponsor-page-list-item.php'); ?>
  <?php endif;  endforeach; ?>

  <?php
  foreach ($sponsors as $s) :
  $gobble = $s['presenting_sponsor'][0];
  if($gobble == 'tough') : ?>
    <?php include('sponsor-page-list-item.php'); ?>
  <?php endif;  endforeach; ?>

  <?php
  foreach ($sponsors as $s) :
  $gobble = $s['presenting_sponsor'][0];
  if($gobble == 'giddy') : ?>
    <?php include('sponsor-page-list-item.php'); ?>
  <?php endif;  endforeach; ?>

  <?php
  foreach ($sponsors as $s) :
  $gobble = $s['presenting_sponsor'][0];
  if($gobble == '') : ?>
    <?php include('sponsor-page-list-item.php'); ?>
  <?php endif;  endforeach; ?>

</ul>
<?php endif; ?>
