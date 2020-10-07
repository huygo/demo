<?php
    if (isset($_REQUEST['key'])) {
         $keyword = $_REQUEST['key'];
         $danhmuc = $_REQUEST['danhmuc'];
    }else{
        $keyword = 'Chưa nhập từ khóa tìm kiếm';
    }
    $search = $data->search_post($keyword,$danhmuc);
    $search1 = $data->search_post1($keyword,$danhmuc);
    $tongbv= count($search1);
    $sotrang=ceil($tongbv/16);
    if (isset($_GET['p'])) {
     $trang= $_GET['p'];
    }else{
     $trang=1;
    } 
   
   // $baivietmoi = $data->get_baivietmoi();
   ?>

<!-- mens -->
<?php if ($tongbv>0) { ?>
<div class="men-wear">
  <div class="container">
    <div class="col-md-4 products-left">
      
      <div class="css-treeview">
        <h4>Danh mục sản phẩm</h4>
        <ul class="tree-list-pad">
          <?php foreach ($danhmuccha as $value) {
            echo '<li><a href="product/1/'.$value['url'].'">'.$value['name'].'</a></li>';
          }?>
          </ul>
      </div>
      
      <div class="clearfix"></div>
    </div>
    <div class="col-md-8 products-right">
      <h5>Tìm kiếm: <?=$keyword?></h5>
      <div class="sort-grid">
        <div class="sorting">
          <h6>Lọc theo</h6>
          <select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
            <option value="null">Default</option>
            <option value="null">Name(A - Z)</option> 
            <option value="null">Name(Z - A)</option>
            <option value="null">Price(High - Low)</option>
            <option value="null">Price(Low - High)</option> 
            <option value="null">Model(A - Z)</option>
            <option value="null">Model(Z - A)</option>          
          </select>
          <div class="clearfix"></div>
        </div>
        
        <div class="clearfix"></div>
      </div>
      
      <div class="men-wear-bottom">
        <div class="col-sm-4 men-wear-left">
          <img class="img-responsive" src="<?=$search[0]['hinh_anh']?>" alt=" " style="width: 100%;height: 245px;" />
        </div>
        <div class="col-sm-8 men-wear-right">
          <!-- <h4>Exclusive Women's Collections</h4> -->
          <p><?=$thongtin['gioi_thieu']?></p>
        </div>
        <div class="clearfix"></div>
      </div>
       
        
        
        
       
    </div>
    <div class="clearfix"></div>
    <div class="single-pro">
      <?php foreach ($search as $value) { ?>
      <div class="col-md-3 product-men" style="height: 419px;">
        <div class="men-pro-item simpleCart_shelfItem">
          <div class="men-thumb-item">
            <img src="<?=$value['hinh_anh']?>" alt="" class="pro-image-front" style="width: 100%;height: 249px;object-fit: cover;">
            <img src="<?=$value['hinh_anh']?>" alt="" class="pro-image-back" style="width: 100%;height: 249px;object-fit: cover;">
              <div class="men-cart-pro">
                <div class="inner-men-cart-pro">
                  <a href="#" class="link-product-add-cart">Thêm vào giỏ</a>
                </div>
              </div>
              <?php if ($value['discount']>0) { ?>
                                 <span class="product-new-top">-<?=ceil(((($value['price']-$value['discount'])/$value['price'])*100))?>%</span>
                              <?php }else{ ?>
                                 <span class="product-new-top">New</span>
                              <?php } ?>      
          </div>
          <div class="item-info-product ">
            <h4><a href="single.html"><?=$value['name']?></a></h4>
            <div class="info-product-price">
              <?php if ($value['discount']>0) { ?>
                                 <span class="item_price"><?=number_format($value['discount'])?> VND</span>
                                 <del><?=number_format($value['price'])?></del>
                              <?php }else{ ?>
                              <span class="item_price"><?=number_format($value['price'])?> VND</span>
                              <?php } ?>
            </div>
            <a href="product/<?=$value['url']?>" class="item_add single-item hvr-outline-out button2">Mua Ngay</a>                  
          </div>
        </div>
      </div>
      <?php } ?>
      <div class="clearfix"></div>
    </div>
    <div class="pagination-grid text-right">
      <ul class="pagination paging">
        <?php if ($trang>1 && $sotrang>1) {
          echo '<li><a href="search?key='.$keyword.'&p='.($trang-1).'" aria-label="Previous"><span aria-hidden="true">«</span></a></li>';
        }else{
          echo '<li><a aria-label="Previous"><span aria-hidden="true">«</span></a></li>';
        } ?>
        <?php for ($i=1; $i <=$sotrang ; $i++) { 
           if ($trang==$i) {
              echo '<li class="active"><a >'.$i.'<span class="sr-only">(current)</span></a></li>';
           }else{
            echo '<li><a href="search?key='.$keyword.'&p='.$i.'">'.$i.'</a></li>';
           }
        } ?>
        <?php if ($trang<$sotrang) {
          echo '<li><a href="search?key='.$keyword.'&p='.($trang+1).'" aria-label="Next"><span aria-hidden="true">»</span></a></li>';
        }else{
          echo '<li><a aria-label="Next"><span aria-hidden="true">»</span></a></li>';
        } ?>
        
      </ul>
    </div>
  </div>
</div> 
<?php }else{ ?> 
  <h1 style="text-align: center;margin-top: 20px;">Không tìm thấy kết quả phù hợp <a href="<?=HOME?>">Về trang chủ</a></h1>
<?php } ?>