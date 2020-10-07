<div class="col-lg-12">
<div class="card">
    <form action="menu/editsave?id=<?php echo $this->data['id'] ?>" method="post">
   <div class="card-header"><strong>Cập nhập</strong><small> Menu</small></div>
   <div class="card-body card-block">
      <div class="row form-group">
         <div class="col-6">
            <div class="form-group"><label for="city" class=" form-control-label">Tên</label><input type="text" id="name" name="name" placeholder="Nhập tên" class="form-control" required="required" value="<?php echo $this->data['name'] ?>"></div>
         </div>
         <div class="col-6">
            <div class="form-group"><label for="postal-code" class=" form-control-label">Url</label><input type="text" name="url" placeholder="Url" class="form-control" required="required" value="<?php echo $this->data['url'] ?>"></div>
         </div>
      </div>
      <div class="row form-group">
         <div class="col-6">
            <div class="form-group"><label for="city" class=" form-control-label">Tình trạng</label>
                <select class="form-control" name="tinh_trang">
                    <?php if ($this->data['tinh_trang']==1) {
                        echo '<option value="1" selected="selected">Bật</option>
                    <option value="0">Tắt</option>';
                    }else{
                        echo '<option value="0" selected="selected">Tắt</option>
                    <option value="1">Bật</option>';
                    } ?>
                    
                </select>
            </div>
         </div>
         <div class="col-6">
            <div class="form-group"><label for="postal-code" class=" form-control-label">Thứ tự</label><input type="text" placeholder="Thứ tự" name="thu_tu" class="form-control" required="required" value="<?php echo $this->data['sap_xep'] ?>"></div>
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