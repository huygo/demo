<div class="col-lg-12">
<div class="card">
    <form action="danhmuc/addsave" method="post">
   <div class="card-header"><strong>Thêm mới</strong><small> danh mục sản phẩm</small></div>
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
         <div class="col-6">
            <div class="form-group"><label for="city" class=" form-control-label">Link ảnh</label><input type="text" id="link_anh" name="link_anh" placeholder="Hình ảnh" class="form-control"></div>
         </div>
         <div class="col-6">
            <div class="form-group"><label for="city" class=" form-control-label">Hình ảnh</label><input type="file" id="hinh_anh" name="hinh_anh" placeholder="Hình ảnh" class="form-control"></div>
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
            <div class="form-group"><label for="postal-code" class=" form-control-label">Danh mục cha</label>
            	<select name="cha" class="form-control">
            		<option value="0" selected="selected">Root</option>
            		<?php foreach ($this->menu as $item) {
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
         <div class="col-12 center">
            <button type="submit" class="btn btn-lg btn-info btn-block">
            <i class="ti-settings"></i>&nbsp;
            <span id="payment-button-amount">CẬP NHẬP</span>
         </div>
      </div>
   </div>
   </form>
</div>