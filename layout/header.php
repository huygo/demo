<?php
  $danhmuccha=$data->danhmuc();
?>
<!--
Author: HG
-->
<!DOCTYPE html>
<html>
<head>
<title><?php echo $page['title'] ?></title>
<!-- for-mobile-apps -->
<base href="<?php echo HOME ?>/">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $thongtin['gioi_thieu']?>" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
    function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="templates/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- pignose css -->
<link href="templates/css/pignose.layerslider.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="templates/css/flexslider.css" type="text/css" media="screen" />


<!-- //pignose css -->
<link href="templates/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="templates/js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<script src="templates/js/imagezoom.js"></script>
<script src="templates/js/jquery.flexslider.js"></script>
<!-- cart -->
  <script src="templates/js/simpleCart.min.js"></script>
<!-- cart -->
<!-- for bootstrap working -->
  <script type="text/javascript" src="templates/js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
<script src="templates/js/jquery.easing.min.js"></script>
</head>
<body>
<!-- header -->
<div class="header">
  <div class="container">
    <ul>
      <li><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Giao hàng miễn phí và nhanh chóng</li>
      <li><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Miền phí vận chuyển cho đơn hàng từ 200k</li>
      <li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:<?=$thongtin['gmail']?>"><?=$thongtin['gmail']?></a></li>
    </ul>
  </div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
  <div class="container">
    <div class="col-md-3 header-left">
      <h1><a href="<?=HOME?>"><img src="<?=$thongtin['logo']?>" style="width: 186px;height: 74px;object-fit: cover;"></a></h1>
    </div>
    <div class="col-md-6 header-middle">
      <form method="post" action="search">
        <div class="search">
          <input type="search" value="Nhập từ khóa tìm kiếm..." name="key" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Nhập từ khóa tìm kiếm...';}" required="">
        </div>
        <div class="section_room">
          <select id="country" name="danhmuc" class="frm-field required">
            <?php foreach ($danhmuccha as $value) {
               echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
            } ?>
          </select>
        </div>
        <div class="sear-sub">
          <input type="submit" value=" ">
        </div>
        <div class="clearfix"></div>
      </form>
    </div>
    <div class="col-md-3 header-right footer-bottom">
      <ul>
        <li><a href="#" class="use1" data-toggle="modal" data-target="#myModal4"><span>Login</span></a>
          
        </li>
        <li><a class="fb" href="<?=$thongtin['facebook']?>" target="_blank"></a></li>
        <li><a class="twi" href="<?=$thongtin['twitter']?>" target="_blank"></a></li>
        <li><a class="insta" href="<?=$thongtin['instagram']?>" target="_blank"></a></li>
        <li><a class="you" href="<?=$thongtin['youtube']?>" target="_blank"></a></li>
      </ul>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<!-- //header-bot -->
<!-- banner -->
<div class="ban-top">
  <div class="container">
    <div class="top_nav_left">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav menu__list">
          <li class="active menu__item <?php if($url[0]=='') echo 'menu__item--current'; ?>"><a class="menu__link" href="<?=HOME?>">Trang chủ <span class="sr-only">(current)</span></a></li>
          <li class=" menu__item <?php if($url[0]=='about') echo 'menu__item--current'; ?>"><a class="menu__link" href="about">Giới thiệu</a></li>
          <li class="dropdown menu__item <?php if($url[0]=='product') echo 'menu__item--current'; ?>">
            <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sản phẩm  <span class="caret"></span></a>
              <ul class="dropdown-menu multi-column columns-3">
                <div class="row">
                  <div class="col-sm-8 multi-gd-img1 multi-gd-text ">
                    <a href="#"><img src="<?=$danhmuccha[0]['hinh_anh']?>" alt=" "/></a>
                  </div>
                  <div class="col-sm-4 multi-gd-img">
                    <ul class="multi-column-dropdown">
                      <?php foreach ($danhmuccha as $item) {
                         echo '<li><a href="product/1/'.$item['url'].'">'.$item['name'].'</a></li>';
                      } ?>
                    </ul>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </ul>
          </li>
          
          <li class=" menu__item <?php if($url[0]=='blog') echo 'menu__item--current'; ?>"><a class="menu__link" href="blog">Tin tức</a></li>
          <li class=" menu__item"><a class="menu__link" href="">Chính sách mua hàng</a></li>
          <li class=" menu__item <?php if($url[0]=='lienhe') echo 'menu__item--current'; ?>"><a class="menu__link" href="lienhe">Liên hệ</a></li>
          </ul>
        </div>
        </div>
      </nav>  
    </div>
    <div class="top_nav_right">
      <div class="cart box_1" id="carthead">
        <?php if (isset($_SESSION['cart'])) {
                     $numbercart=0;
                     foreach ($_SESSION['cart'] as $key => $item) {
                                          $numbercart ++;} ?>
            <a href="cart">
              <h3> <div class="total">
                <i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
                <span class=""><?=$numbercart?></span> sản phẩm</div>
                
              </h3>
            </a>
            <p><a href="cart" class="simpleCart_empty">giỏ hàng</a></p>
        <?php }else{ ?>
           <a >
              <h3> <div class="total">
                <i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
                <span class="">0</span> sản phẩm</div>
                
              </h3>
            </a>
            <p><a href="javascript:;" class="simpleCart_empty">giỏ hàng</a></p>
        <?php } ?>  
      </div>  
    </div>
    <div class="clearfix"></div>
  </div>
</div>