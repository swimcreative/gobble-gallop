<?php
$one = get_field('cta_1_content', 2);
$two = get_field('cta_2_content', 2);
if($one && $two) : ?>
<section id="lower-cta">
  <div class="inner-wrap">
      <div class="cta">
          <div class="cta-bg" style="background-image:url(<?php echo STYLEDIR.'/assets/img/volunteer-bg.jpg'; ?>)"></div>
          <div class="cta-content">
          <img src="<?php the_field('cta_1_icon', 2) ?>"/>
          <?php the_field('cta_1_content', 2); ?>
        </div>
      </div>
      <div class="cta">
        <div class="cta-bg" style="background-image:url(<?php echo STYLEDIR.'/assets/img/gift-bg.jpg'; ?>)"></div>
        <div class="cta-content">
          <img src="<?php the_field('cta_2_icon', 2) ?>"/>
            <?php the_field('cta_2_content', 2); ?>
        </div>
      </div>
  </div>
</section>
<?php endif; ?>
