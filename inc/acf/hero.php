<section id="page-hero" class="hero">
  <div class="hero-bg" <?php if(get_the_post_thumbnail()) : echo 'style="background-image:url('.get_the_post_thumbnail_url().')"';
else :  echo 'style="background-image:url('.STYLEDIR.'/assets/img/gallop-turkey-hat.jpg)"'; endif; ?>></div>
  <div class="inner-wrap">
    <div class="hero-content">
      <h1><?php echo get_the_title(); ?>
        <?php
        if(is_page('gobble-gallop')) : echo ' <span>5K</span>';
        elseif(is_page('tough-turkey')) : echo ' <span>1M</span>';
        elseif(is_page('gobble-giddyup')) : echo ' <span>¼M</span>';
        endif;
        echo '</h1>'; ?>
    </div>
  </div>
</section>
