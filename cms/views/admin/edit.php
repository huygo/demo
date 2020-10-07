<div class="col-lg-12">
<div class="card">
    <form action="admin/editsave?id=<?php echo $this->data['id']; ?>" method="post" enctype="multipart/form-data">
   <div class="card-header"><strong>Cập nhập</strong><small> tài khoản quản trị</small></div>
   <div class="card-body card-block">
      <div class="row form-group">
         <div class="col-6">
            <div class="form-group"><label for="city" class=" form-control-label">Tên</label><input type="text" id="name" name="name" placeholder="Nhập tên" value="<?php echo $this->data['name']; ?>" class="form-control" required="required"></div>
         </div>
         <div class="col-6">
            <div class="form-group"><label for="postal-code" class=" form-control-label">Email</label><input type="text" name="email" placeholder="Email" value="<?php echo $this->data['email']; ?>" class="form-control" required="required"></div>
         </div>
      </div>
      <div class="row form-group">
         <div class="col-3">
            <div class="form-group"><label for="city" class=" form-control-label">Link ảnh</label><input type="text" id="link_anh" name="link_anh" value="<?php echo $this->data['hinh_anh']; ?>" placeholder="Hình ảnh" class="form-control"></div>
         </div>
         <div class="col-3">
            <div class="form-group"><label for="city" class=" form-control-label">Hình ảnh</label><input type="file" id="hinh_anh" name="hinh_anh" placeholder="Hình ảnh" class="form-control"></div>
         </div>
         <div class="col-3">
            <div class="form-group"><img src="<?php echo $this->data['hinh_anh']; ?>" style="width: 80px;height: 80px;object-fit: cover;"></div>
         </div>
         <div class="col-3">
            <div class="form-group"><label for="postal-code" class=" form-control-label">Số điện thoại</label><input type="number" name="sdt" value="<?php echo $this->data['sdt']; ?>" placeholder="Số điện thoại" class="form-control" required></div>
         </div>
      </div>
      <div class="row form-group">
         <div class="col-3">
            <div class="form-group"><label for="city" class=" form-control-label">Ngày sinh</label><input type="date" id="ngay_sinh" name="ngay_sinh" value="<?php echo $this->data['ngay_sinh']; ?>" placeholder="Ngày sinh" class="form-control"></div>
         </div>
         <div class="col-3">
            <div class="form-group"><label for="city" class=" form-control-label">Địa chỉ</label><input type="text" id="dia_chi" name="dia_chi" value="<?php echo $this->data['dia_chi']; ?>" placeholder="Địa chỉ" class="form-control"></div>
         </div>
         <div class="col-3">
            <div class="form-group"><label for="postal-code" class=" form-control-label">Quyền</label>
              <select name="quyen" class="form-control">
                <?php if ($this->data['quyen']==0) {
                  echo '
                      <option value="0" selected>Admin</option>
                      <option value="1">Quản lý</option>
                      <option value="2">Nhân viên</option>
                  ';
                }elseif ($this->data['quyen']==1) {
                  echo '
                      <option value="0" >Admin</option>
                      <option value="1" selected>Quản lý</option>
                      <option value="2">Nhân viên</option>
                  ';
                }else{
                  echo '
                      <option value="0">Admin</option>
                      <option value="1">Quản lý</option>
                      <option value="2" selected>Nhân viên</option>
                  ';
                } ?>
              </select>
            </div>
         </div>
         <div class="col-3">
            <div class="form-group"><label for="city" class=" form-control-label">Tình trạng</label>
              <select class="form-control" name="tinh_trang">
                <?php if ($this->data['tinh_trang']==0) {
                    echo '
                        <option value="1">Bật</option>
                        <option value="0" selected="selected">Tắt</option>
                    ';
                }else{
                    echo '
                      <option value="1" selected="selected">Bật</option>
                        <option value="0">Tắt</option>
                    ';
                } ?>
                
              </select>
            </div>
         </div>
      </div>
      <div class="row form-group">
         <div class="col-6">
            <div class="form-group"><label for="postal-code" class=" form-control-label">Mật khẩu</label><input type="password" placeholder="Để trống nếu không muốn reset" name="pass" class="form-control"></div>
         </div>
         <div class="col-6">
            <div class="form-group"><label for="postal-code" class=" form-control-label">Nhập lại mật khẩu</label><input type="password" placeholder="Để trống nếu không muốn reset" name="re_pass" class="form-control"></div>
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