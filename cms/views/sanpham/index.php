
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Sản phẩm</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo CMS; ?>">Trang chủ</a></li>
                            <li class="active">Sản phẩm</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Danh sách sản phẩm</strong>
                                <a href="sanpham/add" type="button" class="btn btn-primary btn-sm">
                                        <i class="fa fa-plus-circle"></i> Thêm mới
                                </a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                          <th>Stt</th>
                                            <th>Name</th>
                                            <th>Hình ảnh</th>
                                            <th>Giá bán</th>
                                            <th>Danh mục</th>
                                            <th>Ngày đăng</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                       $sanpham=$this->data;
                                       $i=0;
                                      ?>
                                      <?php foreach ($sanpham as $value) { $i++;?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $value['name']; ?></td>
                                            <td><img src="<?php echo $value['hinh_anh']; ?>" height="60px" /></td>
                                            <td><?php echo number_format($value['price']) ; ?> VND</td>
                                            <td><?php echo $value['danhmuc']; ?></td>
                                            <td><?php echo date("d-m-Y", strtotime($value['ngay_dang']));?></td>
                                            <td><a href="sanpham/edit?id=<?=$value['id'];?>" type="button" class="btn btn-warning btn-sm">
                                              <i class="fa fa-edit"></i> Sửa
                                          </a> 
                                          <button class="btn btn-danger btn-sm" onclick="xoa(<?php echo $value['id']; ?>)"><i class="fa fa-trash-o"></i> Xóa</button>
                                      </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

<script>
function xoa(id) {
  if (confirm("Bạn có chắc chắn muốn xóa?"))
      window.location.href = 'sanpham/xoa?id='+id;
}
</script>



    
