
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Tài khoản</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo CMS; ?>">Trang chủ</a></li>
                            <li class="active">Tài khoản quản trị</li>
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
                                <strong class="card-title">Danh sách tài khoản</strong>
                                <a href="admin/add" type="button" class="btn btn-primary btn-sm">
                                        <i class="fa fa-plus-circle"></i> Thêm mới
                                </a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                        	<th>Stt</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Hình ảnh</th>
                                            <th>Quyền</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
                                    	 $admin=$this->data;
                                    	 $i=0;
                                    	?>
                                    	<?php foreach ($admin as $value) { $i++;?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $value['name']; ?></td>
                                            <td><?php echo $value['email']; ?></td>
                                            <td><img src="<?php echo $value['hinh_anh']; ?>" height="60px" /></td>
                                            <td><?php if ($value['quyen']==0) {
                                                echo "Admin";
                                            }elseif ($value['quyen']==1) {
                                                echo "Quản lý";
                                            }else{
                                                echo "Nhân viên";
                                            } ?></td>
                                            <td><a href="admin/edit?id=<?=$value['id'];?>" type="button" class="btn btn-warning btn-sm">
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
			window.location.href = 'admin/xoa?id='+id;
}
</script>



    
