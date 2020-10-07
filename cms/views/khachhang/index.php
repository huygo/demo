
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Khách hàng</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo CMS; ?>">Trang chủ</a></li>
                            <li class="active">Danh sách khách hàng đăng ký</li>
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
                                <strong class="card-title">Danh sách khách hàng</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Stt</th>
                                            <th>Tên</th>
                                            <th>Điện thoại</th>
                                            <th>Email</th>
                                            <th>Địa chỉ</th>
                                            <th>Tin nhắn</th>
                                            <th>Ngày giờ</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                         $khachhang=$this->data;
                                         $i=0;
                                        ?>
                                        <?php foreach ($khachhang as $value) { $i++;?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $value['name']; ?></td>
                                            <td><?php echo $value['sdt']; ?></td>
                                            <td><?php echo $value['email']; ?></td>
                                            <td><?php echo $value['dia_chi']; ?></td>
                                            <td><?php echo $value['tin_nhan']; ?></td>
                                            <td><?php echo date('d/m/Y H:i:s',strtotime($value['ngay_gio'])); ?></td>
                                            <td>
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
            window.location.href = 'khachhang/del?id='+id;
}
</script>



    
