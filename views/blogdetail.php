<?php
   $blogdetail = $page['data'];
   $danhmuchome = $data->danhmuchome();
   // $danhmuc_all=$data->getdanhmuc_all();
   $baivietmoi = $data->get_baivietmoi($blogdetail['id']);
   $spmoi=$data->getspmoi();
   
   
   
   ?>
<style type="text/css">
    .abc img{
        width: 100%;
    }
</style>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=2945911152123762&autoLogAppEvents=1" nonce="eheKLcv5"></script>


<div id="body">
   <section class="mainContent">
      <div class="main_main">
         <div class="uk-container uk-container-center">
            <div class="main-articles ">
               <div class="articles_catalogues">
                  <div class="uk-grid uk-grid-collapse uk-flex-middle" style="display: block;">
                     <div class="uk-width-1-5">
                        <aside class="aside">
                           <section class="asideCategories">
                           <section class="panel-body">
                              <div class="box_cat_block" style="margin-bottom: 0; position: relative;height: 100%;">
                                 <div class="menu_aside"><a class="cl_2">Danh mục sản phẩm <i class="fa fa-bars" aria-hidden="false"></i></a></div>
                                 <ul id="sm_1" class="uk-list mainCat" data-uk-accordion="{showfirst: false}">
                                    <?php foreach ($danhmuchome as $value) { $danhmuc1 = $data->danhmuc1($value['id']); ?>
                                    <li>
                                       <a class="aaaa" href="danhmuc/<?=$value['url']?>" title="<?=$value['name']?>"> <img class="lv1-icon" src="templates/cdn.mediamart.vn/Menu/dieu-hoa-6C92KS.png" alt="Điều hòa"> <?=$value['name']?></a>
                                       <span class="parent"></span>
                                       <ul class="sub_menu_block">
                                          <?php foreach ($danhmuc1 as  $item) { $danhmuc2 = $data->danhmuc2($item['id']); ?>
                                          <li>
                                             <a href="product/1/<?=$item['url']?>" title="<?=$item['name']?>"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> <?=$item['name']?></a>
                                             <ul class="uk-list uk-clearfix subMenus">
                                                <?php foreach ($danhmuc2 as $dm2) { ?>
                                                <li><a href="product/1/<?=$dm2['url']?>" title="<?=$dm2['name']?>"><?=$dm2['name']?></a></li>
                                                <?php }  ?>
                                             </ul>
                                          </li>
                                       <?php } ?>
                                       </ul>
                                    </li>
                                 <?php } ?>
                                    <li> 
                                       <a class="" href="lienhe" title="Liên hệ"> <img class="lv1-icon" src="templates/cdn.mediamart.vn/Menu/dieu-hoa-6C92KS.png" alt=""> Liên hệ</a>
                                    </li>
                                   
                                 </ul>
                              </div>
                           </section>
                        </section>
                          
                           <section class="aside_block none768">
                                       <section class="panel-body">
                                          <div class="title_block_cat">
                                             Sản phẩm mới
                                          </div>
                                          <ul class="list_item_bl">
                                    <?php foreach ($spmoi as $value) { ?>
                                    <li>
                                       <div class="box_bl">
                                          <div class="img_bl">
                                             <a href="product/<?=$value['url']?>" title="<?=$value['name']?>">
                                             <img src="<?=$value['hinh_anh']?>" alt="<?=$value['name']?>">
                                             </a>
                                          </div>
                                          <div>
                                             <h3>
                                                <a href="product/<?=$value['url']?>" title="">
                                                <?=$value['name']?>
                                                </a>
                                             </h3>
                                             <?php if ($value['discount']>0) { ?>
                                                <strong class="oldprice" style="font-size: 14px;font-weight: normal;color: #999;display: inline-block;text-decoration: line-through;margin: 0;"><?php echo number_format($value['price']); ?>₫ </strong>
                                                <div class="item_price">
                                                   <span class="no-trike">Giá: <font><?php echo number_format(($value['price']-$value['discount'])); ?> đ</font></span>
                                                </div>
                                                <?php }else{ ?>
                                                   <strong class="oldprice">&ensp;</strong>
                                                <div class="item_price">
                                                   <span class="no-trike">Giá: <font><?php echo number_format($value['price']); ?> đ</font></span>
                                                </div>
                                                <?php } ?>
                                             <!-- <div class="item_price">
                                                <span class="no-trike">Giá: <font>24.800.000 đ</font></span>
                                             </div> -->
                                          </div>
                                       </div>
                                    </li>
                                 <?php } ?>
                                 </ul>
                                       </section>
                                    </section>
                        </aside>
                     </div>
                     <div class="uk-width-4-5 pl20">
                        <div class="breadcrumb">
                           <ul class="uk-breadcrumb">
                              <li><a href="<?=HOME?>" title="Trang chủ"><i class="fa fa-home"></i> Trang chủ</a></li>
                              <li class="uk-active"><a  title="<?=$blogdetail['danhmuc']?>"><?=$blogdetail['danhmuc']?></a></li>
                           </ul>
                        </div>
                        <section class="page-content">
                           <div class="box_right_content bgwhite p10px bor">
                              <div class="rightContent">
                                 <section class="uk-panel article-detail">
                                    <section class="panel-body">
                                       <h1 class="title"><?=$blogdetail['name']?></h1>
                                       <div class="meta uk-flex uk-flex-middle">
                                          <div class="time">Cập nhật: <?php echo date('d/m/Y',strtotime($blogdetail['ngay_dang'])); ?></div>
                                          <div class="viewed">Lượt xem: <?=$blogdetail['luot_xem']?></div>
                                       </div>
                                       <article class="article">
                                          <div class="description">
                                             <p><?=$blogdetail['mo_ta']?></p>
                                          </div>
                                          <div class="content">
                                             <p class="abc"><?=$blogdetail['noi_dung']?></p>
                                          </div>
                                       </article>
                                       <!-- .article -->
                                       <div class="clr"></div>
                                       <div class="action" style="width: 100%">
                                       <div class="fb-like" data-href="<?php echo HOME.'/'.$thisurl ?>" data-width="" data-layout="standard" data-action="like" data-size="large" data-share="true"></div>
                                       <div class="comments">
                                       <div class="fb-comments" data-href="<?php echo HOME.'/'.$thisurl ?>" data-numposts="5" data-width="100%"></div>
                                        </div>
                                        </div>
                                       <br>
                                      <!--  <div class="action">
                                          <div class="share-box uk-flex uk-flex-middle">
                                             <div class="facebook">
                                                <div class="fb-like" data-href="https://dieuhoanhapkhau.vn/lap-dat-dieu-hoa-tai-quan-hoan-kiem.html" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
                                             </div>
                                             <div class="plus">
                                                <div class="g-plusone" data-size="medium" data-href="lap-dat-dieu-hoa-tai-quan-hoan-kiem.html"></div>
                                             </div>
                                          </div> -->
                                          <!-- end .share-box -->
                                       <!-- </div>
                                       <div class="comments">
                                          <div class="fb-comments" data-href="https://dieuhoanhapkhau.vn/lap-dat-dieu-hoa-tai-quan-hoan-kiem.html" data-width="100%" data-numposts="3"></div>
                                       </div> -->
                                       <!-- end .comments -->
                                    </section>
                                 </section>
                                 <!-- .article-detail -->
                                 <section class="aside_block">
                                    <header class="panel-head">
                                       <div class="heading-6 p0"><span>Có thể bạn quan tâm</span></div>
                                    </header>
                                    <section class="panel-body">
                                       <div class="row10">
                                        <?php foreach ($baivietmoi as  $value) { ?>
                                          <div class="articlesDetailSupport">
                                             <div class="box_item">
                                                <div class="list_item_article article-1">
                                                   <h3 class="article-title"><a class="link" href="blog/<?=$value['url']?>" title="Anh Tùng"><?=$value['name']?></a> </h3>
                                                </div>
                                             </div>
                                          </div>
                                          <?php } ?>
                                         
                                       </div>
                                    </section>
                                 </section>
                              </div>
                              <!-- .main-content -->
                           </div>
                        </section>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="clr"></div>
   </section>
</div>
<!-- #body -->
<div class="clr"></div>