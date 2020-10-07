<?php
   if (isset($_POST['btngui'])) {
       $name = $_REQUEST['name'];
       $sdt = $_REQUEST['sdt'];
       $message = $_REQUEST['mess'];
       $ngay=date('Y-m-d H:i:s');
       $ok = $data->savekh($name,$sdt,$message,$ngay);
       $send= $data->sendmail($name,$sdt,$message);
       if ($send) {
      echo "<script>alert('Cảm ơn bạn đã gửi thông tin. Nhân viên tư vấn của chúng tôi sẽ liên hệ lại với quý khách qua Email hoặc Điện Thoại trong vòng 24 giờ tới.');</script>";
       }else{
          echo "<script>alert('Thất bại! vui lòng liên hệ với bộ phận HỖ TRỢ KHÁCH HÀNG theo số điện thoại ".$thongtin['sdt']." để được hỗ trợ trực tiếp!');</script>";
       }
   }
   ?>
<!-- banner -->
<?php
  $bannerlh=$data->banner(4);
?>
<div class="page-head" style="background: url(<?=$bannerlh['hinh_anh']?>) no-repeat center;">
  <div class="container">
    <h3>Liên hệ</h3>
  </div>
</div>
<!-- //banner -->
<!-- contact -->
  <div class="contact">
    <div class="container">
      <div class="contact-grids">
        <div class="col-md-4 contact-grid text-center animated wow slideInLeft" data-wow-delay=".5s">
          <div class="contact-grid1">
            <i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
            <h4><b>Địa chỉ</b></h4>
            <p></b><?=$thongtin['dia_chi']?></p>
          </div>
        </div>
        <div class="col-md-4 contact-grid text-center animated wow slideInUp" data-wow-delay=".5s">
          <div class="contact-grid2">
            <i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>
            <h4><b>Hotline</b></h4>
            <p style="color: red"><b><?php $sdt= $data->formatPhoneNumber($thongtin['sdt']);echo $sdt;?><span><?php $sdt1= $data->formatPhoneNumber($thongtin['sdt1']);echo $sdt1;?></span></b></p>
          </div>
        </div>
        <div class="col-md-4 contact-grid text-center animated wow slideInRight" data-wow-delay=".5s">
          <div class="contact-grid3">
            <i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
            <h4><b>Email</b></h4>
            <p><a href="mailto:<?=$thongtin['gmail']?>" ><?=$thongtin['gmail']?></a></p>
          </div>
        </div>
        <div class="clearfix"> </div>
      </div>
      <div class="map wow fadeInDown animated" data-wow-delay=".5s">
        <h3 class="tittle">Bản Đồ</h3>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.0102538168157!2d105.86017091469814!3d20.99222608601808!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac10674694c9%3A0xd9beb733cab7de77!2s18%20Tam%20Trinh!5e0!3m2!1svi!2s!4v1601724083427!5m2!1svi!2s" frameborder="0" style="border:0"></iframe>
      </div>
      <h3 class="tittle">Gửi thông tin liên hệ</h3>
      <form method="post">
        <div class="contact-form2">
          <input type="text" name="name" autofocus="" placeholder="Tên của bạn" required>
          <input type="text" name="sdt" placeholder="Số điện thoại"  required="">
          <textarea type="text" name="mess" placeholder="Lời nhắn..."></textarea>
          <input type="submit" name="btngui" value="Submit" >
        </div>
      </form>
    </div>
  </div>
  
<!-- //contact -->

