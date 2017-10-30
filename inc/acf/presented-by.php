<?php $sponsors = get_field('presenting_sponsors');
if(have_rows('presenting_sponsors')) : ?>
<section id="presented-by">
  <div class="inner-wrap">
    <div class="header-container">
      <h6>Presented By</h6>
    </div>
      <div class="logo-container">

        <?php foreach($sponsors as $sponsor) : ?>

        <a target="_blank" href="<?php echo $sponsor['link']; ?>" class="logo"><img src="<?php echo $sponsor['logo']; ?>"/></a>

      <?php endforeach; ?>
     </div>
  </div>
</section>

<?php endif; ?>
