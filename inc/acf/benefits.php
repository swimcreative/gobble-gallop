<?php

$bennies = get_field('benefit_items', 2);

if($bennies) : ?>
<section id="benefits">
  <div class="inner-wrap">
      <div class="benefits-desc">
        <?php the_field("benefits_description", 2); ?>
      </div><?php get_template_part('/inc/acf/benefits-carousel'); ?>
  </div>
</section>

<?php endif; ?>
