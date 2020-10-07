<div class="col-lg-12">
<div class="card">
    <form action="thongtin/editsave" method="post" enctype="multipart/form-data">
   <div class="card-header"><strong>Thông tin</strong><small> website</small></div>
   <div class="card-body card-block">
      <div class="row form-group">
         <div class="col-6">
            <div class="form-group"><label for="city" class=" form-control-label">Tên</label><input type="text" id="name" name="name" placeholder="Nhập tên" value="<?php echo $this->data['name'] ?>" class="form-control" required="required"></div>
         </div>
         <div class="col-6">
            <div class="form-group"><label for="postal-code" class=" form-control-label">Địa chỉ</label><input type="text" name="diachi" value="<?php echo $this->data['dia_chi'] ?>" placeholder="Địa chỉ" class="form-control"></div>
         </div>
      </div>
      <div class="row form-group">
         <div class="col-6">
            <div class="form-group"><label for="city" class=" form-control-label">Facebook</label><input type="text" placeholder="Facebook" name="facebook" class="form-control" value="<?php echo $this->data['facebook'] ?>"></div>
         </div>
         <div class="col-6">
            <div class="form-group"><label for="postal-code" class=" form-control-label">Email</label><input type="email" placeholder="Nhập email" name="email" class="form-control" value="<?php echo $this->data['gmail'] ?>"></div>
         </div>
      </div>
      <div class="row form-group">
         <div class="col-6">
            <div class="form-group"><label for="city" class=" form-control-label">Instagram</label><input type="text" placeholder="Instagram" name="instagram" value="<?php echo $this->data['instagram'] ?>" class="form-control"></div>
         </div>
         <div class="col-3">
            <div class="form-group"><label for="postal-code" class=" form-control-label">Số điện thoại</label><input type="text" placeholder="Số điện thoại" name="sdt" value="<?php echo $this->data['sdt'] ?>" class="form-control"></div>
         </div>
         <div class="col-3">
            <div class="form-group"><label for="postal-code" class=" form-control-label">Số điện thoại 2</label><input type="text" placeholder="Số điện thoại 2" name="sdt1" value="<?php echo $this->data['sdt1'] ?>" class="form-control"></div>
         </div>
      </div>
      <div class="row form-group">
         <div class="col-6">
            <div class="form-group"><label for="city" class=" form-control-label">Twitter</label><input type="text" placeholder="Twitter" name="twitter" value="<?php echo $this->data['twitter'] ?>" class="form-control"></div>
         </div>
         <div class="col-6">
            <div class="form-group"><label for="postal-code" class=" form-control-label">Giới thiệu</label><input type="text" placeholder="lời giới thiệu" name="gt" value="<?php echo $this->data['gioi_thieu'] ?>" class="form-control"></div>
         </div>
      </div>
      <div class="row form-group">
         <div class="col-6">
            <div class="form-group"><label for="city" class=" form-control-label">Logo</label><input type="file" id="file" name="file" class="form-control"></div>
         </div>
         <div class="col-6">
            <div class="form-group"><label for="postal-code" class=" form-control-label">Link</label><input type="text" placeholder="Link logo" name="link_anh" id="link_anh" value="<?php echo $this->data['logo'] ?>" class="form-control"></div>
         </div>
      </div>
      <div class="row form-group">
         <div class="col-6 center">
            <img src="<?php echo ($this->data['logo']!='')?$this->data['logo']:'https://via.placeholder.com/360x225'; ?>"
               height="60px" />
         </div>
         <div class="col-6">
            <div class="form-group"><label for="postal-code" class=" form-control-label">Youtube</label><input type="text" placeholder="Youtube" name="youtube" value="<?php echo $this->data['youtube'] ?>" class="form-control"></div>
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