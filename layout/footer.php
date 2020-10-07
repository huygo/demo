<?php
  $banner=$data->banner(3);
  if (isset($_POST['gui'])) {
       $name = 'footer';
       $sdt = $_REQUEST['sdt'];
       $message = 'Khách hàng đăng kí';
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
<div class="coupons" style="background: url(<?=$banner['hinh_anh']?>) no-repeat center; width: 100%; ">
  <div class="container">
    <div class="coupons-grids text-center">
      <div class="col-md-3 coupons-gd">
        <h3>MUA SẢN PHẨM CỦA BẠN MỘT CÁCH ĐƠN GIẢN</h3>
      </div>
      <div class="col-md-3 coupons-gd">
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
        <h4>ĐĂNG NHẬP VÀO TÀI KHOẢN CỦA BẠN</h4>
        
      </div>
      <div class="col-md-3 coupons-gd">
        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
        <h4>CHỌN MỤC MUỐN MUA</h4>
        
      </div>
      <div class="col-md-3 coupons-gd">
        <span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>
        <h4>THANH TOÁN</h4>
        
      </div>
      <div class="clearfix"> </div>
    </div>
  </div>
</div>
<style type="text/css">
  .back-to-top {
    position: fixed;
    top: auto;
    left: auto;
    right: 15px;
    bottom: 15px;
    font-size: 32px;
    opacity: 0.8;
    z-index: 9999;
    cursor: pointer;
}

.back-to-top:hover {
    opacity: 1;
}
</style>
<script>
              function addcart(id){
                alert('Đã thêm sản phẩm vào giỏ hàng');
                 $.post("cart",{'id':id}, function(data){
                   $("#carthead").load("<?=HOME?>/header #carthead");
                });
              }
              function suasl(id){
                num= $("#soluong_"+id).val();
                $.post("updatecart",{'id':id,'num':num}, function(data){
                   //load lại sau khi update
                   $("#giohang").load("<?=HOME?>/cart #giohang");
                   $("#tamtinh").load("<?=HOME?>/cart #tamtinh");
                });
              }
              function deletecart(id){
                $.post("updatecart",{'id':id,'num':0}, function(data){
                   //load lại sau khi update
                   $("#giohang").load("<?=HOME?>/cart #giohang");
                   $("#carthead").load("<?=HOME?>/header #carthead");
                   $("#tamtinh").load("<?=HOME?>/cart #tamtinh");
                  
                });
              }
              function addcart1(id){
                 $.post("cart",{'id':id}, function(data){
                  window.location.assign('cart');
                });
              }
            </script>
<!-- Scroll To Top -->
<div id="back-to-top" class="back-to-top" data-toggle="tooltip" data-placement="left" title="Trở lên đầu trang"><span class="glyphicon glyphicon-circle-arrow-up text-primary"></span></div>
<script type="text/javascript">
  $("#back-to-top").click(function(){return $("body, html").animate({scrollTop:0},400),!1});
$(function(){$('[data-toggle="tooltip"]').tooltip()});
</script>
<!-- End Scroll To Top -->
<!-- footer -->
<div class="footer">
  <div class="container">
    <div class="col-md-3 footer-left">
      <h2><a href="<?=HOME?>" title="<?=$thongtin['name']?>"><img src="<?=$thongtin['logo']?>"  style="width: 186px;height: 74px;object-fit: cover;" /></a></h2>
      <p><?=$thongtin['gioi_thieu']?></p>
    </div>
    <div class="col-md-9 footer-right">
      <div class="col-sm-6 newsleft">
        <h3>ĐĂNG KÝ NHẬN TIN !</h3>
      </div>
      <div class="col-sm-6 newsright">
        <form method="post" action=""> 
          <input type="text"  required="required" name="sdt" placeholder="Nhập số điện thoại">
          <input type="submit" name="gui" value="Submit">
        </form>
      </div>
      <div class="clearfix"></div>
      <div class="sign-grds">
        <div class="col-md-4 sign-gd">
          <h4>Hỗ trợ khách hàng</h4>
          <ul>
            <li><a href="">Chính sách đổi trả hàng và hoàn tiền</a></li>
            <li><a href="mens.html">Men's Wear</a></li>
            <li><a href="womens.html">Women's Wear</a></li>
            <li><a href="electronics.html">Electronics</a></li>
            <li><a href="codes.html">Short Codes</a></li>
            <li><a href="contact.html">Contact</a></li>
          </ul>
        </div>
        
        <div class="col-md-4 sign-gd-two">
          <h4>Về <?=$thongtin['name']?></h4>
          <ul>
            <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Address : <?=$thongtin['dia_chi']?></li>
            <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>Email : <a href="mailto:<?=$thongtin['gmail']?>"><?=$thongtin['gmail']?></a></li>
            <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>Phone : <?php $sdt= $data->formatPhoneNumber($thongtin['sdt']);echo $sdt;?></li>
          </ul>
        </div>
        <div class="col-md-4 sign-gd flickr-post">
          <h4>Danh mục</h4>
          <ul>
            <?php foreach ($danhmuccha as $value) {
              echo '<li><a href="product/1/'.$value['url'].'"><img src="'.$value['hinh_anh'].'" alt=" " class="img-responsive" style="width: 68px;height: 54px;object-fit: cover;" /></a></li>';
            } ?>
          </ul>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="clearfix"></div>
    <p class="copy-right">&copy 2020 <?=$thongtin['name']?>. All rights reserved | Design by <a href="http://w3layouts.com/">HG</a></p>
  </div>
</div>
<!-- //footer -->
<!-- login -->
      <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content modal-info">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>            
            </div>
            <div class="modal-body modal-spa">
              <div class="login-grids">
                <div class="login">
                  <div class="login-bottom">
                    <h3>Sign up for free</h3>
                    <form>
                      <div class="sign-up">
                        <h4>Email :</h4>
                        <input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required=""> 
                      </div>
                      <div class="sign-up">
                        <h4>Password :</h4>
                        <input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
                        
                      </div>
                      <div class="sign-up">
                        <h4>Re-type Password :</h4>
                        <input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
                        
                      </div>
                      <div class="sign-up">
                        <input type="submit" value="REGISTER NOW" >
                      </div>
                      
                    </form>
                  </div>
                  <div class="login-right">
                    <h3>Sign in with your account</h3>
                    <form>
                      <div class="sign-in">
                        <h4>Email :</h4>
                        <input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required=""> 
                      </div>
                      <div class="sign-in">
                        <h4>Password :</h4>
                        <input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
                        <a href="#">Forgot password?</a>
                      </div>
                      <div class="single-bottom">
                        <input type="checkbox"  id="brand" value="">
                        <label for="brand"><span></span>Remember Me.</label>
                      </div>
                      <div class="sign-in">
                        <input type="submit" value="SIGNIN" >
                      </div>
                    </form>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
<!-- //login -->
</body>
</html>
