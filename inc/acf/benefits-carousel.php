<?php

$bennies = get_field('benefit_items', 2);

if($bennies) : ?>
<?php if(is_page_template('race-page.php')) : ?>
  <h5>Registration Benefits Include:</h5>
  <br>
<?php endif; ?>
<div class="benefits-carousel">
  <?php
  if(have_rows('benefit_items', 2)) :
  foreach($bennies as $b) : ?>
  <div class="item">
      <h6><?php echo $b['benefit_headline']; ?></h6>
      <img src="<?php echo $b['benefit_image']; ?>"/>
      <?php if($b['benefit_badge']) : ?>
      <span class="flash"><span class="flags-left"></span><?php echo $b['benefit_badge']; ?><span class="flags-right"></span></span>
      <?php endif; ?>
  </div>
<?php endforeach; endif; ?>
</div>
<?php endif; ?>
