<?php
  $gioithieu=$data->gioithieu(7);
?>
<div class="page-head" style="background: url(<?=$gioithieu['hinh_anh']?>) no-repeat center;">
  <div class="container">
    <h3>Về chúng tôi</h3>
  </div>
</div>
<!-- //banner -->
<!-- contact -->
  <div class="contact">
    <div class="container">
      <?=$gioithieu['noi_dung']?>
    </div>
  </div>
  