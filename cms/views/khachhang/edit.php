<div id="page-wrapper">
    <div class="main-page">
        <div class="bs-example widget-shadow" data-example-id="hoverable-table">
            <div class="panel-primary">
                <div class="panel-heading">
                    Cập nhật đơn hàng
                </div>
                <div class="panel-body">
									<form class="form-horizontal" action="khachhang/editsave?id=<?php echo $this->data['id'] ?>" method="post" enctype="multipart/form-data" >
											<div class="form-group">
													<label for="name" class="col-sm-2 control-label">Tên khách hàng</label>
													<div class="col-sm-8">
															<input type="text" class="form-control1" id="ho_ten" name="ho_ten" placeholder="Tên khách hàng"
															value="<?php echo $this->data['ho_ten']; ?>" <?php if ($_SESSION['user']['chuc_vu']!='sale') echo 'readonly' ?>>
													</div>
											</div>
											<div class="form-group">
													<label for="url" class="col-sm-2 control-label">Địa chỉ</label>
													<div class="col-sm-8">
															<input  type="text" class="form-control1" id="dia_chi" name="dia_chi" placeholder="Địa chỉ"
															value="<?php echo $this->data['dia_chi']; ?>" <?php if ($_SESSION['user']['chuc_vu']!='sale') echo 'readonly' ?> >
													</div>
											</div>
											<div class="form-group">
													<label for="mota" class="col-sm-2 control-label">Điện thoại</label>
													<div class="col-sm-8">
															<input type="text" class="form-control1" placeholder="Điện thoại" name="dien_thoai" id="dien_thoai"
															value="<?php echo $this->data['dien_thoai'] ?>" <?php if ($_SESSION['user']['chuc_vu']!='sale') echo 'readonly' ?>>
													</div>
											</div>
											<div class="form-group">
													<label for="vitri" class="col-sm-2 control-label">Mã đơn hàng</label>
													<div class="col-sm-8">
                            <input type="text" class="form-control1" placeholder="Mã đơn hàng" name="ma_don_hang" id="ma_don_hang"
                            value="<?php echo $this->data['ma_don_hang'] ?>" <?php if ($_SESSION['user']['chuc_vu']!='sale') echo 'readonly' ?>>
													</div>
											</div>
											<div class="form-group">
													<label for="vitri" class="col-sm-2 control-label">Gói sản phẩm</label>
													<div class="col-sm-8">
                            <select placeholder="Gói sản phẩm" id="combo" name="combo" class="form-control1" <?php if ($_SESSION['user']['chuc_vu']!='sale') echo 'readonly' ?>>
                            <?php
                                $opt=array('Single box','Combo 2','Combo 3');
                                  for ($i=0;$i<3;$i++) {
                                    echo '<option value="'.$i.'"';
                                    if ($this->data['goi_sp']==$i) echo 'selected';
                                    echo '>';
                                    echo $opt[$i].'</option>';
                                  }
                            ?>
                            </select>
													</div>
											</div>
                      <div class="form-group">
                          <label for="vitri" class="col-sm-2 control-label">Chiết khấu</label>
                          <div class="col-sm-8">
                              <input type="text" class="form-control1" placeholder="Chiết khấu trên 1 đơn vị sản phẩm" id="chiet_khau" name="chiet_khau"
                              value="<?php echo number_format($this->data['chiet_khau']); ?>" <?php if ($_SESSION['user']['chuc_vu']!='sale') echo 'readonly' ?>>
                          </div>
                      </div>
											<div class="form-group">
													<label for="update" class="col-sm-2 control-label">Số lượng</label>
													<div class="col-sm-8">
															<input type="text" class="form-control1" placeholder="Số lượng" id="so_luong" name="so_luong"
                              value="<?php echo $this->data['so_luong'] ?>" <?php if ($_SESSION['user']['chuc_vu']!='sale') echo 'readonly' ?>>
													</div>
											</div>
                      <div class="form-group">
                          <label for="url" class="col-sm-2 control-label">Thanh toán</label>
                          <div class="col-sm-8">
                            <select name="thanh_toan" id="thanh_toan" class="form-control1"  >
                            <?php
                                $opt=array('Tài khoản VDATA','COD');
                                  for ($i=0;$i<2;$i++) {
                                    echo '<option value="'.$i.'"';
                                    if ($this->data['thanh_toan']==$i) echo 'selected';
                                    if ($_SESSION['user']['chuc_vu']!='sale')  echo ' disabled ';
                                    echo '>';
                                    echo $opt[$i].'</option>';
                                  }
                            ?>
                            </select>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="url" class="col-sm-2 control-label">Tình trạng</label>
                          <div class="col-sm-8">
                            <select name="tinh_trang" id="tinh_trang" class="form-control1">
                            <?php
                                $opt=array('Hủy','Đang xử lý','Đã đặt cọc','Đang xuất kho','Đang giao hàng','Đã nhận hàng','Hoàn thành');
                                  for ($i=0;$i<7;$i++) {
                                    echo '<option value="'.$i.'"';
                                    if ($this->data['tinh_trang']==$i) echo 'selected';
                                    if (($_SESSION['user']['chuc_vu']!='sale') && ($i==0||$i==1||$i==2||$i==6)) echo ' disabled ';
                                    echo '>';
                                    echo $opt[$i].'</option>';
                                  }
                            ?>
                            </select>
                          </div>
                      </div>

											<div class="form-group">
													<label for="capnhat" class="col-sm-2 control-label"></label>
													<div class="col-sm-8">
													<input type="submit" value="Cập nhật" id="capnhat" name="capnhat">
												  </div>
											</div>

									</form>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
