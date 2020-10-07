<script type="text/javascript" src="libs/tinymce/tinymce.min.js"></script>
<div class="col-lg-12">
<div class="card">
    <form action="sanpham/addsave" method="post" enctype="multipart/form-data">
   <div class="card-header"><strong>Thêm mới</strong><small> Sản phẩm</small></div>
   <div class="card-body card-block">
      <div class="row form-group">
         <div class="col-6">
            <div class="form-group"><label for="city" class=" form-control-label">Tên</label><input type="text" id="name" name="name" placeholder="Nhập tên" class="form-control" required="required"></div>
         </div>
         <div class="col-6">
            <div class="form-group"><label for="postal-code" class=" form-control-label">Url</label><input type="text" name="url" placeholder="Url" class="form-control"></div>
         </div>
      </div>
      <div class="row form-group">
         <div class="col-3">
            <div class="form-group"><label for="city" class=" form-control-label">Link ảnh đại diện</label><input type="text" id="link_anh" name="link_anh" placeholder="Hình ảnh" class="form-control"></div>
         </div>
         <div class="col-3">
            <div class="form-group"><label for="city" class=" form-control-label">Hình ảnh đại diện</label><input type="file" id="hinh_anh" name="hinh_anh" placeholder="Hình ảnh" class="form-control"></div>
         </div>
         <div class="col-6">
            <div class="form-group"><label for="postal-code" class=" form-control-label">Giá niêm yết</label><input type="number" name="gia" placeholder="Giá bán" class="form-control"></div>
         </div>
      </div>
      <div class="row form-group">
         <div class="col-3">
            <div class="form-group"><label for="city" class=" form-control-label">Link ảnh chi tiết 1</label><input type="text" id="link_anh_1" name="link_anh_1" placeholder="Link ảnh chi tiết 1" class="form-control"></div>
         </div>
         <div class="col-3">
            <div class="form-group"><label for="city" class=" form-control-label">Hình ảnh chi tiết 1</label><input type="file" id="hinh_anh_1" name="hinh_anh_1" placeholder="Hình ảnh chi tiết 1" class="form-control"></div>
         </div>
         <div class="col-6">
            <div class="form-group"><label for="postal-code" class=" form-control-label">Giá đã giảm</label><input type="number" name="giam_gia" placeholder="Giảm giá" class="form-control"></div>
         </div>
      </div>
      <div class="row form-group">
         <div class="col-3">
            <div class="form-group"><label for="city" class=" form-control-label">Link ảnh chi tiết 2</label><input type="text" id="link_anh_2" name="link_anh_2" placeholder="Link ảnh chi tiết 2" class="form-control"></div>
         </div>
         <div class="col-3">
            <div class="form-group"><label for="city" class=" form-control-label">Hình ảnh chi tiết 2</label><input type="file" id="hinh_anh_2" name="hinh_anh_2" placeholder="Hình ảnh chi tiết 2" class="form-control"></div>
         </div>
         <div class="col-6">
            <div class="form-group"><label for="postal-code" class=" form-control-label">Danh mục</label>
            	<select name="danh_muc" class="form-control">
            		<?php foreach ($this->danhmuc as $item) {
            			$char='';
                        for ($j=0;$j<$item['level'];$j++)
                        $char.='|---';
                    	echo '<option value="'.$item['id'].'">'.$char.' '.$item['name'].'</option>';
            		} ?>
            	</select>
            </div>
         </div>
      </div>
       <div class="row form-group">
         <div class="col-3">
            <div class="form-group"><label for="city" class=" form-control-label">Link ảnh chi tiết 3</label><input type="text" id="link_anh_3" name="link_anh_3" placeholder="Link ảnh chi tiết 3" class="form-control"></div>
         </div>
         <div class="col-3">
            <div class="form-group"><label for="city" class=" form-control-label">Hình ảnh chi tiết 3</label><input type="file" id="hinh_anh_3" name="hinh_anh_3" placeholder="Hình ảnh chi tiết 3" class="form-control"></div>
         </div>
         <div class="col-6">
            <div class="form-group"><label for="postal-code" class=" form-control-label">Sắp xếp</label><input type="number" name="sap_xep" placeholder="Sắp xếp" class="form-control"></div>
         </div>
      </div>
      <div class="row form-group">
         <div class="col-6">
            <div class="form-group"><label for="city" class=" form-control-label">Tình trạng</label>
              <select class="form-control" name="tinh_trang">
                <option value="1" selected="selected">Bật</option>
                <option value="0">Tắt</option>
              </select>
            </div>
         </div>
         <div class="col-6">
            <div class="form-group"><label for="postal-code" class=" form-control-label">Mô tả</label><input type="text" placeholder="Mô tả" name="mo_ta" class="form-control"></div>
         </div>
      </div>
      <div class="row form-group">
         <div class="col-6">
            <div class="form-group"><label for="postal-code" class=" form-control-label">Bảo hành</label><input type="text" placeholder="Bảo hành" name="bao_hanh" class="form-control"></div>
         </div>
         <div class="col-6">
            <div class="form-group"><label for="postal-code" class=" form-control-label">Xuất xứ</label><input type="text" placeholder="Xuất xứ" name="xuat_xu" class="form-control"></div>
         </div>
      </div>
      <div class="row form-group">
         <div class="col-6">
            <div class="form-group"><label for="postal-code" class=" form-control-label">Công suất(BTU)</label><input type="number" placeholder="Công suất" name="cong_suat" class="form-control"></div>
         </div>
         <div class="col-6">
            <div class="form-group"><label for="postal-code" class=" form-control-label">Phạm vi làm lạnh(m2)</label><input type="number" placeholder="Phạm vi" name="pham_vi" class="form-control"></div>
         </div>
      </div>
      <div class="row form-group">
         <div class="col-12">
             <div class="form-group"><label for="city" class=" form-control-label">Thông số kỹ thuật</label>
             	<textarea rows="10" class="form-control" name="tskt"></textarea>
             </div>
         </div>
      </div>
      <div class="row form-group">
         <div class="col-12 center">
            <button type="submit" class="btn btn-lg btn-info btn-block">
            <i class="ti-settings"></i>&nbsp;
            <span id="payment-button-amount">CẬP NHẬP</span>
         </div>
      </div>
   </div>
   </form>
</div>
<script>
          tinymce.init({
                        mode: "textareas",
                        entity_encoding : "raw",
                        plugins: ["advlist autolink lists link image charmap print preview anchor",
                                    "searchreplace visualblocks code fullscreen textcolor", "media",
                                    "insertdatetime media table contextmenu paste jbimages","fullscreen","moxiemanager"],
                        image_advtab: true,
                        paste_data_images: true,
                        browser_spellcheck : true,
                        relative_urls:false,
                        remove_script_host : false,
                        //convert_urls : true,
                        image_dimensions: false,
                        forced_root_block : false,
                        force_br_newlines : true,
                        force_p_newlines : false,
                        toolbar: " undo redo | styleselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media insertfile |  fontsizeselect | forecolor backcolor | fullscreen"
            });

        </script>
