



        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Menu</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo CMS; ?>">Trang chủ</a></li>
                            <li class="active">Đổi mật khẩu</li>
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
                                <strong class="card-title">Đổi mật khẩu</strong>
                            </div>
                            <div class="card-body">
                                <form action="index/changepass" method="post" enctype="multipart/form-data">
                   <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="oldpass">Mật khẩu cũ</label>
                            <input type="password" class="form-control" id="name" name="oldpass" required="required">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="newpass">Mật khẩu mới</label>
                            <input type="password" class="form-control" id="newpass" name="newpass" required="required">
                        </div>
                    </div><div class="form-row">
                        <button type="submit" class="btn btn-primary">Cập nhật</button> &nbsp;&nbsp;&nbsp;
                        <a href="dashboard" type="button" class="btn btn-danger ">Bỏ qua</a>
                    </div>
                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->



    
