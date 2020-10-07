<?php
   $bannerhome= $data->bannerhome(1);
   $bannerhome2= $data->bannerhome2(2);
   $sanphammoi= $data->sanphammoi();
   $khuyenmai= $data->sanphamkhuyenmai();
?>
<div class="banner-grid">
   <div id="visual">
         <div class="slide-visual">
            <!-- Slide Image Area (1000 x 424) -->
            <ul class="slide-group">
               <?php foreach ($bannerhome as  $value) { 
                  echo '<li><img class="img-responsive" src="'.$value['hinh_anh'].'" alt="'.$value['name'].'" style="width: 1000px;height: 424px;object-fit: cover;" /></li>';
               }?>
               
            </ul>

            <!-- Slide Description Image Area (316 x 328) -->
            <div class="script-wrap">
               <ul class="script-group">
                  <?php foreach ($bannerhome as $item) {
                     echo '<li><div class="inner-script"><img class="img-responsive" src="'.$item['hinh_anh'].'" alt="'.$item['name'].'" style="width: 316px;height: 328px;object-fit: cover;"/></div></li>';
                  } ?>
                  <!-- <li><div class="inner-script"><img class="img-responsive" src="templates/images/baa1.jpg" alt="Dummy Image" /></div></li>
                  <li><div class="inner-script"><img class="img-responsive" src="templates/images/baa2.jpg" alt="Dummy Image" /></div></li>
                  <li><div class="inner-script"><img class="img-responsive" src="templates/images/baa3.jpg" alt="Dummy Image" /></div></li> -->
               </ul>
               <div class="slide-controller" >
                  <a href="#" class="btn-prev"><img src="templates/images/btn_prev.png" alt="Prev Slide" /></a>
                  <a href="#" class="btn-play"><img src="templates/images/btn_play.png" alt="Start Slide" /></a>
                  <a href="#" class="btn-pause"><img src="templates/images/btn_pause.png" alt="Pause Slide" /></a>
                  <a href="#" class="btn-next"><img src="templates/images/btn_next.png" alt="Next Slide" /></a>
               </div>
            </div>
            <div class="clearfix"></div>
         </div>
         <div class="clearfix"></div>
      </div>
   <script type="text/javascript" src="templates/js/pignose.layerslider.js"></script>
   <script type="text/javascript">
   //<![CDATA[
      $(window).load(function() {
         $('#visual').pignoseLayerSlider({
            play    : '.btn-play',
            pause   : '.btn-pause',
            next    : '.btn-next',
            prev    : '.btn-prev'
         });
      });
   //]]>
   </script>

</div>
<!-- //banner -->
<!-- content -->

<div class="new_arrivals">
   <div class="container">
      <h3>SẢN PHẨM<span> MỚI</span></h3>
      <p><?=$thongtin['name']?> luôn cập nhập sản phẩm mới</p>
      <div class="new_grids">
         <div class="col-md-4 new-gd-left">
            <img src="<?=$sanphammoi[0]['hinh_anh']?>" alt="<?=$sanphammoi[0]['name']?>" style="width: 100%;height: 458px;object-fit: cover;" />
            <div class="wed-brand simpleCart_shelfItem">
               <h4><?=$sanphammoi[0]['name']?></h4>
               <h5>Flat 50% Discount</h5>
               <p><i>$250</i> <span class="item_price">$500</span><a class="item_add hvr-outline-out button2" href="#">add to cart </a></p>
            </div>
         </div>
         <div class="col-md-4 new-gd-middle">
            <div class="new-levis">
               <div class="mid-img">
                  <img src="templates/images/levis1.png" alt=" " />
               </div>
               <div class="mid-text">
                  <h4>Sản phẩm <span>mới</span></h4>
                  <a class="hvr-outline-out button2" href="news">Xem ngay </a>
               </div>
               <div class="clearfix"></div>
            </div>
            <div class="new-levis">
               <div class="mid-text">
                  <h4>Sản phẩm bán <span>chạy</span></h4>
                  <a class="hvr-outline-out button2" href="product.html">Xem ngay </a>
               </div>
               <div class="mid-img">
                  <img src="templates/images/dig.jpg" alt=" " />
               </div>
               <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
         </div>
         <div class="col-md-4 new-gd-left">
            <img src="<?=$sanphammoi[1]['hinh_anh']?>" alt="<?=$sanphammoi[1]['name']?>" style="width: 100%;height: 458px;object-fit: cover;" />
            <div class="wed-brandtwo simpleCart_shelfItem">
               <h4>Spring / Summer</h4>
               <p>Shop Men</p>
            </div>
         </div>
         <div class="clearfix"></div>
      </div>
   </div>
</div>
<!-- //content -->

<!-- content-bottom -->

<div class="content-bottom">
   <div class="col-md-7 content-lgrid">
      <div class="col-sm-6 content-img-left text-center">
         <div class="content-grid-effect slow-zoom vertical">
            <div class="img-box"><img src="<?=$khuyenmai[0]['hinh_anh']?>" alt="image" class="img-responsive zoom-img" style="width: 100%;height: 329px;object-fit: cover;"></div>
               <div class="info-box">
                  <div class="info-content simpleCart_shelfItem">
                           <h4><?=$khuyenmai[0]['name']?></h4>
                           <span class="separator"></span>
                           <p><span class="item_price"><?=number_format($khuyenmai[0]['discount'])?> VND</span></p>
                           <span class="separator"></span>
                           <a class="item_add hvr-outline-out button2" href="product/<?=$khuyenmai[0]['url']?>">xem thêm </a>
                  </div>
               </div>
         </div>
      </div>
      <div class="col-sm-6 content-img-right">
         <h3>Ưu đãi đặc biệt<span>Giảm giá</span> 50%</h3>
      </div>
      
      <div class="col-sm-6 content-img-right">
         <h3>Cho đơn hàng <span> Free Ship</span> trên 200k</h3>
      </div>
      <div class="col-sm-6 content-img-left text-center">
         <div class="content-grid-effect slow-zoom vertical">
            <div class="img-box"><img src="<?=$khuyenmai[1]['hinh_anh']?>" alt="image" class="img-responsive zoom-img" style="width: 100%;height: 329px;object-fit: cover;"></div>
               <div class="info-box">
                  <div class="info-content simpleCart_shelfItem">
                     <h4><?=$khuyenmai[1]['name']?></h4>
                     <span class="separator"></span>
                     <p><span class="item_price"><?=number_format($khuyenmai[1]['discount'])?> VND</span></p>
                     <span class="separator"></span>
                     <a class="item_add hvr-outline-out button2" href="product/<?=$khuyenmai[1]['url']?>">xem thêm </a>
                  </div>
               </div>
         </div>
      </div>
      <div class="clearfix"></div>
   </div>
   <div class="col-md-5 content-rgrid text-center">
      <div class="content-grid-effect slow-zoom vertical">
            <div class="img-box"><img src="<?=$khuyenmai[2]['hinh_anh']?>" alt="image" class="img-responsive zoom-img" style="width: 100%;height: 658px;object-fit: cover;"></div>
               <div class="info-box">
                  <div class="info-content simpleCart_shelfItem">
                           <h4><?=$khuyenmai[2]['name']?></h4>
                           <span class="separator"></span>
                           <p><span class="item_price"><?=number_format($khuyenmai[2]['discount'])?> VND</span></p>
                           <span class="separator"></span>
                           <a class="item_add hvr-outline-out button2" href="product/<?=$khuyenmai[2]['url']?>">xem thêm </a>
                  </div>
               </div>
         </div>
   </div>
   <div class="clearfix"></div>
</div>
<!-- //content-bottom -->
<!-- product-nav -->
<div class="product-easy">
   <div class="container">
      
      <script src="templates/js/easyResponsiveTabs.js" type="text/javascript"></script>
      <script type="text/javascript">
                     $(document).ready(function () {
                        $('#horizontalTab').easyResponsiveTabs({
                           type: 'default', //Types: default, vertical, accordion           
                           width: 'auto', //auto or any width like 600px
                           fit: true   // 100% fit in a container
                        });
                     });
                     
      </script>
      <div class="sap_tabs">
         <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
            <ul class="resp-tabs-list">
               <?php foreach ($danhmuccha as $key => $value) {
                  echo '<li class="resp-tab-item" aria-controls="tab_item-'.$key.'" role="tab"><span  style="text-transform: uppercase;">'.$value['name'].'</span></li> ';
               } ?>
               
            </ul>              
            <div class="resp-tabs-container">
               <?php foreach ($danhmuccha as $key1 => $item) { $sanphamhome=$data->sanphamhome($item['id']); ?>
               <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-<?=$key1?>">
                  <?php foreach ($sanphamhome as $sp) { ?>
                  <div class="col-md-3 product-men" style="height: 419px;">
                     <div class="men-pro-item simpleCart_shelfItem">
                        <div class="men-thumb-item">
                           <img src="<?=$sp['hinh_anh']?>" alt="" class="pro-image-front" style="width: 100%;height: 249px;object-fit: cover;">
                           <img src="<?=$sp['hinh_anh']?>" alt="" class="pro-image-back" style="width: 100%;height: 249px;object-fit: cover;">
                              <div class="men-cart-pro">
                                 <div class="inner-men-cart-pro">
                                    <a onclick="addcart(<?=$sp['id']?>)" class="link-product-add-cart">Thêm vào giỏ</a>
                                 </div>
                              </div>
                              <?php if ($sp['discount']>0) { ?>
                                 <span class="product-new-top">-<?=ceil(((($sp['price']-$sp['discount'])/$sp['price'])*100))?>%</span>
                              <?php }else{ ?>
                                 <span class="product-new-top">New</span>
                              <?php } ?>
                                 
                              
                        </div>
                        <div class="item-info-product ">
                           <h4><a href="product/<?=$sp['url']?>"><?=$sp['name']?></a></h4>
                           <div class="info-product-price">
                              <?php if ($sp['discount']>0) { ?>
                                 <span class="item_price"><?=number_format($sp['discount'])?> VND</span>
                                 <del><?=number_format($sp['price'])?></del>
                              <?php }else{ ?>
                              <span class="item_price"><?=number_format($sp['price'])?> VND</span>
                              <?php } ?>
                           </div>
                           <a href="product/<?=$sp['url']?>" class="item_add single-item hvr-outline-out button2">xem thêm</a>                         
                        </div>
                     </div>
                  </div>
                  <?php } ?>
                  <div class="clearfix"></div>
               </div>
               <?php } ?>
                 
            </div>   
         </div>
      </div>
   </div>
</div>