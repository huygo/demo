<?php
class thongtin extends controller
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
       $this->view->data = $this->model->info();
       $this->view->render('thongtin/index');
       require 'layouts/footer.php';
   }

   function editsave()
   {
       $name      = $_REQUEST['name'];
       $diachi    = $_REQUEST['diachi'];
       $dienthoai = $_REQUEST['sdt'];
       $dienthoai1 = $_REQUEST['sdt1'];
       $email     = $_REQUEST['email'];
       $gioithieu    = $_REQUEST['gt'];
       $facebook  = $_REQUEST['facebook'];
       $twitter   = $_REQUEST['twitter'];
       $instagram = $_REQUEST['instagram'];
       $youtube   = $_REQUEST['youtube'];
       if ($_REQUEST['link_anh']=='') {
            $dir = ROOT_DIR.'/uploads/img/logo/';
            if (isset($_FILES['file']['name']) && ($_FILES['file']['name']!='')) {  
              $file = $this->convert->uploadfile('file',$dir,$name);
              $logo =HOME.'/uploads/img/logo/'.$file;
            }else
              $logo = 'http://via.placeholder.com/360x225';
        }else
          $logo = $_REQUEST['link_anh'];
       $data = array(
           'name' => $name,
           'dia_chi' => $diachi,
           'sdt' => $dienthoai,
           'sdt1' => $dienthoai1,
           'gmail' => $email,
           'gioi_thieu' => $gioithieu,
           'logo' => $logo,
           'facebook' => $facebook,
           'twitter' => $twitter,
           'instagram' => $instagram,
           'youtube' => $youtube
       );
       if ($this->model->updateObj($data)){
          echo "<script>alert('Cập nhập thông tin thành công!');window.location.assign('".CMS."/thongtin');</script>";
       }
       else
           echo "<script>alert('Cập nhập thông tin thất bại!');window.location.assign('".CMS."/thongtin');</script>";
       //require 'layouts/header.php';
       //require 'layouts/footer.php';
   }

}
?> 
