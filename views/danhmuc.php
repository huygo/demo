<?php
    $danhmuchome = $data->danhmuchome();
    if (isset($_GET['key']) && ($_GET['key']!='')) {
       $key=$_GET['key'];
       $danhmuca=$data->timkiem($key,$url[1]);
    }else{
       $key='';
       $danhmuca=$page['data'];
       
    }
    
    if (count($danhmuca)>0) {
       $dem = $data->demsp($url[1]);
    }else{
      $dem=array();
    }
    
    $spmoi=$data->getspmoi();
   // $danhmuc_all=$data->getdanhmuc_all();
    $tongbv= count($dem);
    $sotrang=ceil($tongbv/52);
    if (isset($_GET['p'])) {
     $trang= $_GET['p'];
    }else{
     $trang=1;
    } 
   
   // $baivietmoi = $data->get_baivietmoi();
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
   @media (max-width: 479px)
         {
            .abc {
                display: block !important;
            }
         }
</style>
<div id="body">
   <section class="mainContent">
      <div class="main_main">
         <div class="uk-container uk-container-center">
            <div class="main-products">
               <div class="products_catalogues">
                  <div class="uk-grid uk-grid-collapse uk-flex-middle" style="display: block;">
                     <div class="uk-width-large-1-5">
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
                           <!-- .uk-panel -->
                           <aside class="aside-fillter">
                              <section class="fillter_bl">
                                 <div class="title_block_cat">Tìm kiếm</div>
                                 <div class="content_fillter">
                                    <div class="group-fillter fill-key-0">
                                       <div class="attribute-title">
                                          <label class="form-label tpInputLabel">LOẠI ĐIỀU HÒA</label>
                                       </div>
                                       <div class="attribute-group">
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="loai" value="001" id="item-34" <?php if (strlen(strstr($key, '001')) > 0) {
                                              echo 'checked';
                                            }  ?>  />
                                          <label for="item-34">1 chiều</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="loai" value="011" id="item-35" <?php if (strlen(strstr($key, '011')) > 0) {
                                              echo 'checked';
                                            }  ?>  />
                                          <label for="item-35">1 chiều inverter</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="loai" value="022" id="item-44" <?php if (strlen(strstr($key, '022')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-44">2 chiều inverter</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="loai" value="002" id="item-45" <?php if (strlen(strstr($key, '002')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-45">2 chiều</label>
                                          </label>
                                       </div>
                                    </div>
                                    <div class="group-fillter fill-key-1">
                                       <div class="attribute-title">
                                          <label class="form-label tpInputLabel">CHỌN HÃNG</label>
                                       </div>
                                       <div class="attribute-group">
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[chon-hang]" value="1110" id="item-46" <?php if (strlen(strstr($key, '1110')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-46">Panasonic</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[chon-hang]" value="1111" id="item-47" <?php if (strlen(strstr($key, '1111')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-47">Daikin</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[chon-hang]" value="1112" id="item-48" <?php if (strlen(strstr($key, '1112')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-48">LG</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[chon-hang]" value="1113" id="item-52" <?php if (strlen(strstr($key, '1113')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-52">Mitsubishi Hevy</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[chon-hang]" value="1114" id="item-54" <?php if (strlen(strstr($key, '1114')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-54">Midea</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[chon-hang]" value="1115" id="item-76" <?php if (strlen(strstr($key, '1115')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-76">Funiki</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[chon-hang]" value="1116" id="item-77" <?php if (strlen(strstr($key, '1116')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-77">Nagakawa</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[chon-hang]" value="1117" id="item-78" <?php if (strlen(strstr($key, '1117')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-78">Sumikura</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[chon-hang]" value="1118" id="item-79" <?php if (strlen(strstr($key, '1118')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-79">General</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[chon-hang]" value="1119" id="item-81" <?php if (strlen(strstr($key, '1119')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-81">Casper</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[chon-hang]" value="1120" id="item-82" <?php if (strlen(strstr($key, '1120')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-82">Fujeaire</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[chon-hang]" value="1121" id="item-83" <?php if (strlen(strstr($key, '1121')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-83">FUJITSU</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[chon-hang]" value="1122" id="item-84" <?php if (strlen(strstr($key, '1122')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-84">Chigo</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[chon-hang]" value="1123" id="item-87" <?php if (strlen(strstr($key, '1123')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-87">Gree</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[chon-hang]" value="1124" id="item-88" <?php if (strlen(strstr($key, '1124')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-88">Samsung</label>
                                          </label>
                                       </div>
                                    </div>
                                    <div class="group-fillter fill-key-2">
                                       <div class="attribute-title">
                                          <label class="form-label tpInputLabel">Giá sản phẩm</label>
                                       </div>
                                       <div class="attribute-group">
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[priceprd]" value="7000000" id="item-72" <?php if (strlen(strstr($key, '7000000')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-72">Dưới 7 triệu</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[priceprd]" value="9000000" id="item-73" <?php if (strlen(strstr($key, '9000000')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-73">Từ 7 tr - 9 triệu</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[priceprd]" value="11000000" id="item-74" <?php if (strlen(strstr($key, '11000000')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-74">Từ 9 tr - 11 triệu</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[priceprd]" value="12000000" id="item-75" <?php if (strlen(strstr($key, '12000000')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-75">Trên 11 triệu</label>
                                          </label>
                                       </div>
                                    </div>
                                    <div class="group-fillter fill-key-3">
                                       <div class="attribute-title">
                                          <label class="form-label tpInputLabel">CÔNG SUẤT LÀM LẠNH</label>
                                       </div>
                                       <div class="attribute-group">
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[cong-suat-lam-lanh]" value="9.000" id="item-56" <?php if (strlen(strstr($key, '9.000')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-56">≤ 9000 BTU</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[cong-suat-lam-lanh]" value="12.000" id="item-57" <?php if (strlen(strstr($key, '12.000')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-57">≤ 12.000 BTU</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[cong-suat-lam-lanh]" value="16.000" id="item-58" <?php if (strlen(strstr($key, '16.000')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-58">≤ 16.000 BTU</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[cong-suat-lam-lanh]" value="18.000" id="item-59" <?php if (strlen(strstr($key, '18.000')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-59">≤ 18.000 BTU</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[cong-suat-lam-lanh]" value="24.000" id="item-60" <?php if (strlen(strstr($key, '24.000')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-60">≤ 24.000 BTU</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[cong-suat-lam-lanh]" value="28.000" id="item-61" <?php if (strlen(strstr($key, '28.000')) > 0) {
                                              echo 'checked';
                                            }  ?>/>
                                          <label for="item-61">≤ 28.000 BTU</label>
                                          </label>
                                       </div>
                                    </div>
                                    <div class="group-fillter fill-key-4">
                                       <div class="attribute-title">
                                          <label class="form-label tpInputLabel">PHẠM VI HIỆU QUẢ</label>
                                       </div>
                                       <div class="attribute-group">
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[pham-vi-hieu-qua]" value="15m2" id="item-62"  <?php if (strlen(strstr($key, '15m2')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-62">Dưới 15m2</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[pham-vi-hieu-qua]" value="20m2" id="item-63" <?php if (strlen(strstr($key, '20m2')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-63">15 - 20m2</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[pham-vi-hieu-qua]" value="25m2" id="item-64" <?php if (strlen(strstr($key, '25m2')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-64">20 - 25m2</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[pham-vi-hieu-qua]" value="30m2" id="item-65" <?php if (strlen(strstr($key, '30m2')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-65">25 - 30m2</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[pham-vi-hieu-qua]" value="40m2" id="item-66" <?php if (strlen(strstr($key, '40m2')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-66">35 - 40m2</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[pham-vi-hieu-qua]" value="45m2" id="item-67" <?php if (strlen(strstr($key, '45m2')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-67">40 - 45m2</label>
                                          </label>
                                       </div>
                                    </div>
                                    <div class="group-fillter fill-key-5">
                                       <div class="attribute-title">
                                          <label class="form-label tpInputLabel">XUẤT XỨ</label>
                                       </div>
                                       <div class="attribute-group">
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[xuat-xu]" value="1234" id="item-68" <?php if (strlen(strstr($key, '1234')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-68">Việt Nam</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[xuat-xu]" value="1235" id="item-69" <?php if (strlen(strstr($key, '1235')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-69">Thái Lan</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[xuat-xu]" value="1236" id="item-70" <?php if (strlen(strstr($key, '1236')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-70">Trung Quốc</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[xuat-xu]" value="1237" id="item-71" <?php if (strlen(strstr($key, '1237')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-71">Malaysia</label>
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                              </section>
                           </aside>
                           <form class="uk-hidden" id="Formfilter" method="post" action="search" >
                              <input type="text" value="" name="attr" id="attr" class="confirm-filter" />
                              <input type="text" value="1" name="page" id="page" class="" />
                              <input type="text" value="150" name="cataloguesid" id="cataloguesid" class="" />
                              <input type="submit" value="" name="submit" id="filter_submit" class="" />
                           </form>
                           <script type="text/javascript">
                              $(document).ready(function(){
                                  
                                  // $('#Formfilter').on('submit',function(e){
                                  //     var attr = $('#attr').val();
                                  //     var page = $('#page').val();
                                  //     var cataloguesid = $('#cataloguesid').val();
                                  //     var postData = $(this).serializeArray();
                                  //     var formURL = 'products/ajax/products/filter.html';
                                  //     $.post(formURL, {
                                  //         post: attr, page:page,cataloguesid:cataloguesid},
                                  //         function(data){
                                  //             var json = JSON.parse(data);
                                  //             if(json.html.length){
                                  //                 $('#list-filter-ajax').html('').html(json.html);
                                  //             }else{
                                  //                 $('#list-filter-ajax').html('Không có dữ liệu phù hợp');
                                  //             }
                                              
                                  //         });
                                  //     return false;
                                  // });
                                  
                                  
                                  // $('.filter').change(function(e){
                                  //     var str = '';
                                  //     $('.filter').each(function(){
                                  //         if($(this).val() != 0  && $(this).prop('checked') == true){
                                  //             str = str + $(this).val() + '-';
                                  //         }
                                  //     });
                                  //     if(str.length > 0){
                                  //         str = str.substr(0, str.length - 1);
                                  //         $('#attr').val(str);
                                  //     }else{
                                  //         $('#attr').val('');
                                  //     }
                                  //     e.stopImmediatePropagation();
                                  //      $('#filter_submit').click();
                                  // });
                                  
                                  $('input.filter').click(function() {
                                      var id = $(this).prop('id');
                                      var name = $(this).prop('name');
                                      var loai = $(this).prop('value');
                                      var str = '';
                                      $('.filter').each(function(){
                                          if($(this).val() != 0  && $(this).prop('checked') == true){
                                              str = str + $(this).val() + '-';
                                          }
                                      });
                                      if(str.length > 0){
                                          str = str.substr(0, str.length - 1);
                                          $('#attr').val(str);
                                      }else{
                                          $('#attr').val('');
                                      }
                                      
                                      // alert(str);
                                      
                                      // 
                                      $('input[name="'+name+'"]:not(#'+id+')').prop('checked',false);
                                      window.location.href = "<?=HOME.'/'.'danhmuc/'.$url[1]?>?key="+str;
                                  });
                                  
                                  
                              });
                              
                              // $(function(){
                              //     $(document).on('click','#ajax-pagination li a',function(e){
                              //         var page = $(this).attr('data-ci-pagination-page');
                              //         $('#page').val(page);
                              //         e.stopImmediatePropagation();
                              //         $('#filter_submit').click();
                              //         return false;
                              //     });
                              // });


                              
                           </script> 
                           <section class="camket_bl uk-hidden">
                              <section class="panel-body">
                                 <div class="title_block_cat">
                                    Cam kết 
                                 </div>
                                 <ul class="list_item_ck">
                                    <li class="doitra">
                                       <h6><a href="#">Trả hàng</a></h6>
                                       <p>Trong vòng 2 ngày</p>
                                    </li>
                                    <li class="vanchuyen">
                                       <h6><a href="#">Miễn phí</a></h6>
                                       <p>Giao hàng</p>
                                    </li>
                                    <li class="thanhtoan">
                                       <h6><a href="#">Giao hàng</a></h6>
                                       <p>Nhận tiền</p>
                                    </li>
                                    <li class="baohanh">
                                       <h6><a href="#">Bảo hành</a></h6>
                                       <p>Hàng chính hãng</p>
                                    </li>
                                 </ul>
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
                                                   <span class="no-trike">Giá: <font><?php echo number_format($value['discount']); ?> đ</font></span>
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
                     <div class="uk-width-large-4-5 pl20">
                        <div class="breadcrumb">
                           <ul class="uk-breadcrumb">
                              <li><a href="<?=HOME?>" title=""><i class="fa fa-home"></i> Trang chủ</a></li>
                              <li class="uk-active"><a href="danhmuc/<?=$url[1]?>" title="<?php echo $page['danhmuc']; ?>"><?php echo $page['danhmuc']; ?></a></li>
                           </ul>
                        </div>
                        <div class="col-sm-3 my-col-sm-3 col-sm abc" style="display: none;">
   <p class="block-title show-mobile clearfix" id="layered-nav-title" style="margin-left: -10px;
    margin-right: -10px;
    /*width: 100%;*/
    font-weight: 700;
    text-transform: none;
    font-size: 18px;padding: 10px;
    background: #ffd504;
    font-weight: bold;
    text-align: center;
    border: solid 1px #f3f3f3;
    font-size: 12px;
    cursor: pointer;" onclick="toggleMobileFill()">Lọc sản phẩm <i class=" fa fa-angle-down pull-right"></i></p>
   <div id="pFill" class="fill" style="display: none;">
      
      <div class="attribute-title">
                                          <label class="form-label tpInputLabel" style="text-transform: uppercase;
    color: #fff;
    font-size: 14px;
    font-weight: bold;
    background: #49b8e8;
    width: 100% !important;
    padding-left: 10px;
    margin-bottom: 0;
    height: 36px;
    line-height: 36px;
    display: block; ">LOẠI ĐIỀU HÒA</label>
                                       </div>
                                       <div class="attribute-group">
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="loai" value="001" id="item-34" <?php if (strlen(strstr($key, '001')) > 0) {
                                              echo 'checked';
                                            }  ?>  />
                                          <label for="item-34">1 chiều</label>
                                          </label>
                                          
                                          
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="loai" value="002" id="item-45" <?php if (strlen(strstr($key, '002')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-45">2 chiều</label>
                                          </label>
                                       </div>
                                       <div class="group-fillter fill-key-1">
                                       <div class="attribute-title">
                                          <label class="form-label tpInputLabel" style="text-transform: uppercase;
    color: #fff;
    font-size: 14px;
    font-weight: bold;
    background: #49b8e8;
    padding-left: 10px;
    width: 100% !important;
    margin-bottom: 0;
    height: 36px;
    line-height: 36px;
    display: block; ">CHỌN HÃNG</label>
                                       </div>
                                       <div class="attribute-group">
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[chon-hang]" value="1110" id="item-46" <?php if (strlen(strstr($key, '1110')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-46">Panasonic</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[chon-hang]" value="1111" id="item-47" <?php if (strlen(strstr($key, '1111')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-47">Daikin</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[chon-hang]" value="1112" id="item-48" <?php if (strlen(strstr($key, '1112')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-48">LG</label>
                                          </label>
                                          
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[chon-hang]" value="1114" id="item-54" <?php if (strlen(strstr($key, '1114')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-54">Midea</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[chon-hang]" value="1119" id="item-81" <?php if (strlen(strstr($key, '1119')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-81">Casper</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[chon-hang]" value="1124" id="item-88" <?php if (strlen(strstr($key, '1124')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-88">Samsung</label>
                                          </label>
                                       </div>

                                    </div>
                                    <div class="group-fillter fill-key-2">
                                       <div class="attribute-title">
                                          <label class="form-label tpInputLabel" style="text-transform: uppercase;
    color: #fff;
    font-size: 14px;
    font-weight: bold;
    background: #49b8e8;
    padding-left: 10px;
    width: 100% !important;
    margin-bottom: 0;
    height: 36px;
    line-height: 36px;
    display: block; ">Giá sản phẩm</label>
                                       </div>
                                       <div class="attribute-group">
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[priceprd]" value="7000000" id="item-72" <?php if (strlen(strstr($key, '7000000')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-72">Dưới 7 triệu</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[priceprd]" value="9000000" id="item-73" <?php if (strlen(strstr($key, '9000000')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-73">Từ 7 tr - 9 triệu</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[priceprd]" value="11000000" id="item-74" <?php if (strlen(strstr($key, '11000000')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-74">Từ 9 tr - 11 triệu</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[priceprd]" value="12000000" id="item-75" <?php if (strlen(strstr($key, '12000000')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-75">Trên 11 triệu</label>
                                          </label>
                                       </div>
                                    </div>
                                    <div class="group-fillter fill-key-3">
                                       <div class="attribute-title">
                                          <label class="form-label tpInputLabel" style="text-transform: uppercase;
    color: #fff;
    font-size: 14px;
    font-weight: bold;
    background: #49b8e8;
    padding-left: 10px;
    width: 100% !important;
    margin-bottom: 0;
    height: 36px;
    line-height: 36px;
    display: block; ">CÔNG SUẤT LÀM LẠNH</label>
                                       </div>
                                       <div class="attribute-group">
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[cong-suat-lam-lanh]" value="9.000" id="item-56" <?php if (strlen(strstr($key, '9.000')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-56">≤ 9000 BTU</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[cong-suat-lam-lanh]" value="12.000" id="item-57" <?php if (strlen(strstr($key, '12.000')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-57">≤ 12.000 BTU</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[cong-suat-lam-lanh]" value="16.000" id="item-58" <?php if (strlen(strstr($key, '16.000')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-58">≤ 16.000 BTU</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[cong-suat-lam-lanh]" value="18.000" id="item-59" <?php if (strlen(strstr($key, '18.000')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-59">≤ 18.000 BTU</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[cong-suat-lam-lanh]" value="24.000" id="item-60" <?php if (strlen(strstr($key, '24.000')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-60">≤ 24.000 BTU</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[cong-suat-lam-lanh]" value="28.000" id="item-61" <?php if (strlen(strstr($key, '28.000')) > 0) {
                                              echo 'checked';
                                            }  ?>/>
                                          <label for="item-61">≤ 28.000 BTU</label>
                                          </label>
                                       </div>
                                    </div>
                                    <div class="group-fillter fill-key-6">
                                       <div class="attribute-title">
                                          <label class="form-label tpInputLabel" style="text-transform: uppercase;
    color: #fff;
    font-size: 14px;
    font-weight: bold;
    background: #49b8e8;
    padding-left: 10px;
    width: 100% !important;
    margin-bottom: 0;
    height: 36px;
    line-height: 36px;
    display: block; ">Inverter</label>
                                       </div>
                                       <div class="attribute-group">
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[inverter]" value="800007" id="item-72" <?php if (strlen(strstr($key, '800007')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-72">Có</label>
                                          </label>
                                          <label class="fillter-label tpInputLabel">
                                          <input class="filter" type="checkbox" name="attr[inverter]" value="800008" id="item-73" <?php if (strlen(strstr($key, '800008')) > 0) {
                                              echo 'checked';
                                            }  ?> />
                                          <label for="item-73">Không</label>
                                          </label>
                                          
                                       </div>
                                    </div>
   </div>
   
</div>
                        <div class="hearder_cat">
                           <h1>
                              <span>
                              <img src="templates/frontend/resources/img/icon_sofas.png" alt="icon">
                              </span>
                              <?php if (count($danhmuca)>0) {
                                  echo $page['danhmuc'];
                              }else{
                                echo 'Chưa có sản phẩm nào';
                              } ?>
                           </h1>
                        </div>
                        <?php if (count($danhmuca)>0) { ?>
                        <section class="page-content">
                           <section class="panel-body catalogues_products">
                              <div class="row10" id="list-filter-ajax">
                                 <div class="uk-grid lib-grid-0 uk-grid-width-1-2 uk-grid-width-medium-1-3 uk-grid-width-xlarge-1-4 listProductptops" data-uk-grid-match="{target: '.box_box_categories .product-title'}">
                                    <?php foreach ($danhmuca as $value) { ?>
                                    <div class="p10" style="margin-bottom: 10px;">
                                       <div class="box_box_categories">
                                          <div class="img_box_categories">
                                             <a href="product/<?=$value['url']?>" title="<?=$value['name']?>">
                                             <img src="<?=$value['hinh_anh']?>" alt="<?=$value['name']?>">
                                             </a>
                                            <?php if ($value['discount']>0) { ?>
                                                <span class="labelshock-top" >Giảm đến <?php $pt=((($value['price']-$value['discount'])/$value['price'])*100);echo ceil($pt); ?>%</span>
                                                <?php } ?>
                                          </div>
                                          <div class="content_box_categories">
                                             <h3 class="product-title">
                                                <a href="product/<?=$value['url']?>" title="">
                                                <?=$value['name']?>
                                                </a>
                                             </h3>
                                              <?php if ($value['discount']>0) { ?>
                                                <strong class="oldprice" style="font-size: 14px;font-weight: normal;color: #999;display: inline-block;text-decoration: line-through;margin: 0;"><?php echo number_format($value['price']); ?>₫ </strong>
                                                <div class="item_price_box_categories">
                                                   <span class="no-trike">Giá: <font><?php echo number_format($value['discount']); ?> đ</font></span>
                                                </div>
                                                <?php }else{ ?>
                                                   <strong class="oldprice">&ensp;</strong>
                                                <div class="item_price_box_categories">
                                                   <span class="no-trike">Giá: <font><?php echo number_format($value['price']); ?> đ</font></span>
                                                </div>
                                                <?php } ?>
                                             <div class="dathang">                                                              
                                                <a href="product/<?=$value['url']?>" class="btn-addtocart-home ajax-addtocart" data-quantity="1" title="Chi tiết" >Chi tiết</a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                     <?php } ?>
                                 </div>
                              </div>
                              <!-- .panel-body -->
                           </section>
                           <!-- .product-catalogue -->
                           <div class="pagination">
                              <ul class="uk-pagination uk-pagination-left">
                                 <?php if ($trang>1 && $sotrang>1) {
                                    echo '<li><a href="danhmuc/'.$url[1].'?p='.($trang-1).'" data-ci-pagination-page="1" rel="prev">&lt;</a></li>';
                                 } ?>
                                 <?php for ($i=1; $i <=$sotrang ; $i++) { 
                                    if ($trang==$i) {
                                       echo '<li class="uk-active"><a>'.$i.'</a></li>';
                                    }else
                                     echo '<li><a href="danhmuc/'.$url[1].'?p='.$i.'" data-ci-pagination-page="'.$i.'" rel="start">'.$i.'</a></li>';
                                 } ?>
                                 
                                 <?php if ($trang<$sotrang) {
                                    echo '<li><a href="danhmuc/'.$url[1].'?p='.($trang+1).'" data-ci-pagination-page="'.$trang.'" rel="next">&gt;</a></li>';
                                    echo '<li><a href="danhmuc/'.$url[1].'?p='.$sotrang.'" data-ci-pagination-page="'.$sotrang.'">Trang Cuối &rsaquo;</a></li>';
                                 } ?>
                                 
                              </ul>
                           </div>
                        </section>
                   
                        <!-- .main-content -->
                    <?php }else{
                        echo '<center><h1>Về <a href="'.HOME.'">trang chủ</a></h1></center>';
                    } ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<!-- #body -->
<div class="clr"></div>
<script type="text/javascript">
  function toggleMobileFill(){jQuery("#pFill").slideToggle()}
</script>