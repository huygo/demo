<?php
  $bannerdetail=$data->banner(5);
  $product_detail= $page['data'];
?>
<!-- banner -->
<div class="page-head" style="background: url(<?=$bannerdetail['hinh_anh']?>) no-repeat center;">
  <div class="container">
    <h3><?=$product_detail['name']?></h3>
  </div>
</div>
<!-- //banner -->
<!-- single -->
<div class="single">
  <div class="container">
    <div class="col-md-6 single-right-left animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
      <div class="grid images_3_of_2">
        <div class="flexslider">
          <!-- FlexSlider -->
            <script>
            // Can also be used with $(document).ready()
              $(window).load(function() {
                $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
                });
              });
            </script>
          <!-- //FlexSlider-->
          <ul class="slides">
            <?php if ($product_detail['hinh_anh']!='') {
               echo '<li data-thumb="'.$product_detail['hinh_anh'].'">
              <div class="thumb-image"> <img src="'.$product_detail['hinh_anh'].'" data-imagezoom="true" class="img-responsive"> </div>
              </li>';
            }
            if ($product_detail['hinh_anh_1']!='') {
              echo '<li data-thumb="'.$product_detail['hinh_anh_1'].'">
              <div class="thumb-image"> <img src="'.$product_detail['hinh_anh_1'].'" data-imagezoom="true" class="img-responsive"> </div>
              </li>';
            }
            if ($product_detail['hinh_anh_2']!='') {
              echo '<li data-thumb="'.$product_detail['hinh_anh_2'].'">
              <div class="thumb-image"> <img src="'.$product_detail['hinh_anh_2'].'" data-imagezoom="true" class="img-responsive"> </div>
              </li>';
            }
            if ($product_detail['hinh_anh_3']!='') {
              echo '<li data-thumb="'.$product_detail['hinh_anh_3'].'">
              <div class="thumb-image"> <img src="'.$product_detail['hinh_anh_3'].'" data-imagezoom="true" class="img-responsive"> </div>
             </li> ';
            } ?>
            
          </ul>
          <div class="clearfix"></div>
        </div>  
      </div>
    </div>
    <div class="col-md-6 single-right-left simpleCart_shelfItem animated wow slideInRight animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInRight;">
          <h3><?=$product_detail['name']?></h3>
          <?php if ($product_detail['discount']>0) {
            echo '<p><span class="item_price">'.number_format($product_detail['discount']).' VND</span> <del>'.number_format($product_detail['price']).'</del></p>';
          }else{
            echo '<p><span class="item_price">'.number_format($product_detail['price']).' VND</span></p>';
          } ?>
          
          <div class="rating1">
            <span class="starRating">
              <input id="rating5" type="radio" name="rating" value="5" checked="">
              <label for="rating5">5</label>
              <input id="rating4" type="radio" name="rating" value="4">
              <label for="rating4">4</label>
              <input id="rating3" type="radio" name="rating" value="3" >
              <label for="rating3">3</label>
              <input id="rating2" type="radio" name="rating" value="2">
              <label for="rating2">2</label>
              <input id="rating1" type="radio" name="rating" value="1">
              <label for="rating1">1</label>
            </span>
          </div>
          
          <div class="color-quality">
            <div class="color-quality-right">
              <h5>Số lượng :</h5>
              <input type="number" name="soluong" value="1" class="entry value" style="width: 60px;" min="1" max="50">
            </div>
          </div>
          <div class="occasional">
            <h5>Size :</h5>
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="false">Size S</a></li>
                <li class=""><a href="#tab2" data-toggle="tab" aria-expanded="false">Size M</a></li>
                <li class=""><a href="#tab3" data-toggle="tab" aria-expanded="false">Size L</a></li>
                <li class=""><a href="#tab4" data-toggle="tab" aria-expanded="true">Size XL</a></li>
              </ul>
              
            </div>
          <div class="occasional">
            <h5>Màu sắc :</h5>
            <div class="colr ert">
              <label class="radio"><input type="radio" name="radio" checked=""><i></i>Xanh</label>
            </div>
            <div class="colr">
              <label class="radio"><input type="radio" name="radio"><i></i>Đỏ</label>
            </div>
            <div class="colr">
              <label class="radio"><input type="radio" name="radio"><i></i>Trắng</label>
            </div>
            <div class="clearfix"> </div>
          </div>
          <div class="occasion-cart">
            <a onclick="addcart(<?=$product_detail['id']?>)" class="item_add hvr-outline-out button2">Thêm vào giỏ</a>
            <a onclick="addcart1(<?=$product_detail['id']?>)" class="item_add hvr-outline-out button2" style="margin-left: 10px;">Mua ngay</a>
          </div>
          <!-- <div class="description">
            <h5>Nhập mã khuyến mãi của bạn</h5>
            <input type="text" value="Mã khuyến mãi" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Mã khuyến mãi';}" required="">
            <input type="submit" value="Sử dụng">
          </div> -->
           
          
    </div>
        <div class="clearfix"> </div>

        <div class="bootstrap-tab animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
          <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Mô tả sản phẩm</a></li>
              <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Bình luận</a></li>
              <li role="presentation"><a href="#video" role="tab" id="video-tab" data-toggle="tab" aria-controls="video">Video</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
                <p><?=$product_detail['mo_ta']?></p>
              </div>
              <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="profile" aria-labelledby="profile-tab">
                <div class="bootstrap-tab-text-grids">
                  
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="video" aria-labelledby="video-tab">
                <div class="bootstrap-tab-text-grids">
                  <center><iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$product_detail['video']?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></center>
                </div>
              </div>
            </div>
          </div>
        </div>
  </div>
</div>
<!-- //single -->