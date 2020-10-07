<?php
class admin extends controller
{
   private $convert;
   function __construct()
   {
       parent::__construct();
       $this->convert = new convert();
   }

   function index()
   {
       require 'layouts/header.php';
       $this->view->data = $this->model->getFetObj();
       $this->view->render('admin/index');
       require 'layouts/footer.php';
   }


   function xoa()
   {
       $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
       $this->model->delObj($id);
       echo "<script>window.location.assign('".CMS."/admin');</script>";
   }

   function edit()
   {
       require 'layouts/header.php';
       $id                  = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
       $this->view->data    = $this->model->getrow($id);
       $this->view->render('admin/edit');
       require 'layouts/footer.php';
   }

   function editsave()
   {
       $id   = $_REQUEST['id'];
       $name = $_REQUEST['name'];
       $email = $_REQUEST['email'];
       $sdt  = $_REQUEST['sdt'];
       $ngaysinh = $_REQUEST['ngay_sinh'];
       $diachi = $_REQUEST['dia_chi'];
       $quyen = $_REQUEST['quyen'];
       $tinhtrang = $_REQUEST['tinh_trang'];
       $pass = $_REQUEST['pass'];
       $repass = $_REQUEST['re_pass'];
       if ($_REQUEST['link_anh']=='') {
            $dir = ROOT_DIR.'/uploads/img/admin/';
            if (isset($_FILES['hinh_anh']['name']) && ($_FILES['hinh_anh']['name']!='')) {  
              $file = $this->convert->uploadfile('hinh_anh',$dir,$name);
              $hinhanh =HOME.'/uploads/img/admin/'.$file;
            }else
              $hinhanh = 'http://via.placeholder.com/360x225';
        }else
          $hinhanh = $_REQUEST['link_anh'];
        if ($pass=='') {
           $data = array(
                   'name' => $name,
                   'email' => $email,
                   'sdt' => $sdt,
                   'ngay_sinh' => $ngaysinh,
                   'dia_chi' => $diachi,
                   'hinh_anh' => $hinhanh,
                   'quyen' => $quyen,
                   'tinh_trang' =>$tinhtrang
            );
           if ($this->model->updateObj($id, $data))
              echo "<script>alert('Cập nhập admin thành công!');window.location.assign('".CMS."/admin');</script>";
           else
             echo "<script>alert('Cập nhập admin thất bại!');window.location.assign('".CMS."/admin');</script>";
        }else{
            if ($pass==$repass) {
                $data = array(
                         'name' => $name,
                         'email' => $email,
                         'sdt' => $sdt,
                         'ngay_sinh' => $ngaysinh,
                         'dia_chi' => $diachi,
                         'hinh_anh' => $hinhanh,
                         'password' => md5(md5($pass)),
                         'quyen' => $quyen,
                         'tinh_trang' =>$tinhtrang
                );
               if ($this->model->addObj($data))
                   echo "<script>alert('Cập nhập admin thành công!');window.location.assign('".CMS."/admin');</script>";
               else
                 echo "<script>alert('Cập nhập admin thất bại!');window.location.assign('".CMS."/admin');</script>";
             }else{
                  echo "<script>alert('Mật khẩu nhập lại không chính xác!');window.location.assign('".CMS."/admin/add');</script>";
             }
        }
       
   }

   function add()
   {
       require 'layouts/header.php';
       $this->view->render('admin/add');
       require 'layouts/footer.php';
   }

   function addsave()
   {
       $name = $_REQUEST['name'];
       $email = $_REQUEST['email'];
       $sdt  = $_REQUEST['sdt'];
       $ngaysinh = $_REQUEST['ngay_sinh'];
       $diachi = $_REQUEST['dia_chi'];
       $quyen = $_REQUEST['quyen'];
       $tinhtrang = $_REQUEST['tinh_trang'];
       $pass = $_REQUEST['pass'];
       $repass = $_REQUEST['re_pass'];
       if ($_REQUEST['link_anh']=='') {
            $dir = ROOT_DIR.'/uploads/img/admin/';
            if (isset($_FILES['hinh_anh']['name']) && ($_FILES['hinh_anh']['name']!='')) {  
              $file = $this->convert->uploadfile('hinh_anh',$dir,$name);
              $hinhanh =HOME.'/uploads/img/admin/'.$file;
            }else
              $hinhanh = 'http://via.placeholder.com/360x225';
        }else
          $hinhanh = $_REQUEST['link_anh'];
       if ($pass==$repass) {
          $data = array(
                   'name' => $name,
                   'email' => $email,
                   'sdt' => $sdt,
                   'ngay_sinh' => $ngaysinh,
                   'dia_chi' => $diachi,
                   'hinh_anh' => $hinhanh,
                   'password' => md5(md5($pass)),
                   'quyen' => $quyen,
                   'ngay_tao' => date("Y-m-d"),
                   'tinh_trang' =>$tinhtrang
          );
         if ($this->model->addObj($data))
             echo "<script>alert('Thêm admin thành công!');window.location.assign('".CMS."/admin');</script>";
         else
             echo "<script>alert('Thêm thất bại!');window.location.assign('".CMS."/admin');</script>";
       }else{
            echo "<script>alert('Mật khẩu nhập lại không chính xác!');window.location.assign('".CMS."/admin/add');</script>";
       }
       
   }
}
?>
