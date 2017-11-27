<div class="race-details">

<table>

<?php $open = get_field('registration_open');

if($open) : ?>

<tr>
<td><span class="genericons genericon-month"></span></td>
<td><h6>Open Registration</h6>
  <span><?php the_field('open_registration'); ?></span></td>
<tr>
<td><span style="font-family:sans-serif;font-weight:bold;padding-left:8px;font-size:40px" class="genericons">$</span></td>
<td><h6>Registration Fee</h6><span><?php the_field('registration_fee'); ?></td>
</tr>
<tr>
<td><span class="genericons genericon-time"></span></td>
<td><h6>Race Time</h6><span><?php the_field('race_date'); ?><br><?php the_field('race_time'); ?></span></td>
</tr>

<?php else : ?>

  <tr>
  <td style="border:none;padding-top:33px"><span class="genericons genericon-month"></span></td>
  <td style="border:none;padding-top:42px;"><h6 style="margin:0">Registration Closed</h6>
  <tr>


<?php endif; ?>
</table>

</div>
