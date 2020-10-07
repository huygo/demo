<?php
  $danhmuc=$page['data'];
  $danhmuccha= $data->getdanhmuccha($danhmuc['danh_muc_cha']);
  //if (count($danhmuccha)>0) {
     $getsanpham= $data->getsanpham($danhmuc['id']);
  // }else{
  //     $getsanpham= $data->getsanpham($danhmuc['id']);
  // }
 
?>
<style type="text/css">
   .labelshock-top{
      vertical-align: middle;
    position: absolute;
    /*z-index: 3;*/
    right: 0;
    top: 5px;
    color: #fff;
    font-weight: 600;
    background: #f51212;
    border-radius: 3px;
    padding: 3px 8px;
    margin: 1px 10px 0 5px;
    height: 25px;
    text-decoration: none;
    font-size: 11px;
   }
</style>
<div id="body">
   <section class="mainContent">
      <div class="uk-container uk-container-center">
         <div class="breadcrumb">
            <ul class="uk-breadcrumb uk-margin-remove">
               <li><a href="<?=HOME?>" title="Trang chủ" class="link">Trang chủ</a></li>
               <?php if (count($danhmuccha)>0) {
                  echo '<li class="uk-active"><a href="product/1/'.$danhmuccha[0]['url'].'"  title="'.$danhmuccha[0]['name'].'" class="link">'.$danhmuccha[0]['name'].'</a></li>';
               } ?>
               <li class="uk-active"><a href="product/1/<?=$danhmuc['url']?>" onclick="return false;" title="<?=$danhmuc['name']?>" class="link"><?=$danhmuc['name']?></a></li>
            </ul>
         </div>
         <!-- end .breadcrumb -->
         <div class="panel skin-2 products-catalogue uk-margin-large-bottom">
            <h1 class="catalogue-heading mb25 mt10"><span class="text">
               <?=$danhmuc['name']?>    </span>
            </h1>
            <div class="panel-head mb30 uk-flex uk-flex-middle uk-flex-space-between">
            </div>
            <!-- end .panel-head -->
            <div class="row10">
               <div class="uk-grid lib-grid-0 uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-xlarge-1-5 listProductptops" data-uk-grid-match="{target: '.box_box_categories .product-title'}">
                <?php foreach ($getsanpham as  $item) { ?>
                  <div class="p10" style="margin-bottom: 20px;">
                     <div class="box_box_categories">
                        <div class="img_box_categories">
                           <a href="product/<?=$item['url']?>" title="<?=$item['name']?>">
                           <img src="<?=$item['hinh_anh']?>">
                           </a>
                           <?php if ($item['discount']>0) { ?>
                                                <span class="labelshock-top" >Giảm đến <?php $pt=((($item['price']-$item['discount'])/$item['price'])*100);echo ceil($pt); ?>%</span>
                                                <?php } ?>
                        </div>
                        <div class="content_box_categories">
                           <h3 class="product-title">
                              <a href="product/<?=$item['url']?>" title="">
                             <?=$item['name']?>                </a>
                           </h3>
                           <?php if ($item['discount']>0) { ?>
                                                <strong class="oldprice" style="font-size: 14px;font-weight: normal;color: #999;display: inline-block;text-decoration: line-through;margin: 0;"><?php echo number_format($item['price']); ?>₫ </strong>
                                                <div class="item_price_box_categories">
                                                   <span class="no-trike">Giá: <font><?php echo number_format($item['discount']); ?> đ</font></span>
                                                </div>
                                                <?php }else{ ?>
                                                   <strong class="oldprice">&ensp;</strong>
                                                <div class="item_price_box_categories">
                                                   <span class="no-trike">Giá: <font><?php echo number_format($item['price']); ?> đ</font></span>
                                                </div>
                                                <?php } ?>
                           <div class="dathang">                                
                              <a href="product/<?=$item['url']?>" class="btn-addtocart-home ajax-addtocart"  title="Xem chi tiết">Chi tiết</a>
                           </div>
                        </div>
                     </div>
                  </div>
                <?php } ?>
                
               </div>
               <!-- end .uk-grid -->
            </div>
            <!-- end .panel-body -->
         </div>
         <!-- end .panel -->
      </div>
      <!-- end .uk-container -->    
   </section>
</div>
<!-- #body -->
<div class="clr"></div>