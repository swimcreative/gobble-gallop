<section id="home-hero" class="hero">
  <?php $slides = get_field('hero_carousel');
  if(have_rows('hero_carousel')) :
  foreach ($slides as $slide) : ?>
  <div class="item">
  <div class="hero-bg" style="background-image:url(<?php echo $slide['background_image']; ?>)"></div>
  <div class="inner-wrap">
      <div class="hero-content">
        <?php echo $slide['slide']; ?>
     </div>
  </div>
 </div>
 <?php endforeach; endif;  ?>
</section>
