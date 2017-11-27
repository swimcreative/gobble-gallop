<?php $sponsors = get_field('sponsors', 40);
if(have_rows('sponsors', 40)) : ?>
<section id="sponsors">
  <div class="inner-wrap">
    <div class="header-container">
      <h5><?php echo date('Y'); ?> Sponsors</h5>
    </div>
    <div class="logo-container">
      <?php foreach($sponsors as $s) : ?>
        <a target="_blank" href="<?php echo $s['sponsor_link']; ?>" class="logo" style="background-image:url(<?php echo $s['sponsor_logo']; ?>)"></a>
      <?php endforeach; ?>
   </div>
  </div>
</section>

<?php endif; ?>
