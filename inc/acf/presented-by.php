<!--<?php $sponsors = get_field('presenting_sponsors');
if(have_rows('presenting_sponsors')) : ?>
<section id="presented-by">
  <div class="inner-wrap">
    <div class="header-container">
      <h6>Presented By</h6>
    </div>
      <div class="sponsor_logo-container">

        <?php foreach($sponsors as $sponsor) : ?>

        <a target="_blank" href="<?php echo $sponsor['sponsor_link']; ?>" class="sponsor_logo"><img src="<?php echo $sponsor['sponsor_logo']; ?>"/></a>

      <?php endforeach; ?>
     </div>
  </div>
</section>

<?php endif; ?> -->


<section id="presented-by">
  <div class="inner-wrap">
    <div class="header-container">
      <h6>Presented By</h6>
    </div>
      <div class="logo-container">

        <?php

        $gobble_page = 5;
      	$tough_page = 45;
      	$giddy_page = 47;


        $sponsors = get_field('sponsors', 40);
        if(have_rows('sponsors', 40)) : ?>
          <?php

          foreach ($sponsors as $s) :
          $gobble = $s['presenting_sponsor'][0];
          if( $gobble == 'gobble') : ?>
          <?php if(is_front_page() || is_page($gobble_page)) : ?>
            <a target="_blank" href="<?php echo $s['sponsor_link']; ?>" class="logo"><img src="<?php echo $s['sponsor_logo']; ?>"/></a>
          <?php endif; endif;  endforeach; ?>

          <?php
          foreach ($sponsors as $s) :
          $gobble = $s['presenting_sponsor'][0];
          if($gobble == 'tough') : ?>
            <?php if(is_page($tough_page)) : ?>
              <a target="_blank" href="<?php echo $s['sponsor_link']; ?>" class="logo"><img src="<?php echo $s['sponsor_logo']; ?>"/></a>
          <?php  endif; endif;  endforeach; ?>

          <?php
          foreach ($sponsors as $s) :
          $gobble = $s['presenting_sponsor'][0];
          if($gobble == 'giddy') : ?>
            <?php if(is_page($giddy_page)) : ?>
              <a target="_blank" href="<?php echo $s['sponsor_link']; ?>" class="logo"><img src="<?php echo $s['sponsor_logo']; ?>"/></a>
          <?php endif ;endif;  endforeach; ?>

        <?php endif; ?>

     </div>
  </div>
</section>
