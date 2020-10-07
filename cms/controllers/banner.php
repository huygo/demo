<?php
class banner extends controller
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
       $this->view->render('banner/index');
       require 'layouts/footer.php';
   }


   function xoa()
   {
       $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
       $this->model->delObj($id);
       echo "<script>window.location.assign('".CMS."/banner');</script>";
   }

   function edit()
   {
       require 'layouts/header.php';
       $id                  = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
       $this->view->data    = $this->model->getrow($id);
       $this->view->render('banner/edit');
       require 'layouts/footer.php';
   }

   function editsave()
   {
       $id   = $_REQUEST['id'];
       $name = $_REQUEST['name'];
       $mota = $_REQUEST['mo_ta'];
       $vitri  = $_REQUEST['vi_tri'];
       $url = $_REQUEST['url'];
       $tinhtrang = $_REQUEST['tinh_trang'];
       if ($_REQUEST['link_anh']=='') {
            $dir = ROOT_DIR.'/uploads/img/banner/';
            if (isset($_FILES['hinh_anh']['name']) && ($_FILES['hinh_anh']['name']!='')) {  
              $file = $this->convert->uploadfile('hinh_anh',$dir,$name);
              $hinhanh =HOME.'/uploads/img/banner/'.$file;
            }else
              $hinhanh = 'http://via.placeholder.com/360x225';
        }else
          $hinhanh = $_REQUEST['link_anh'];
       $data = array(
                   'name' => $name,
                   'url' => $url,
                   'mo_ta' => $mota,
                   'vi_tri' => $vitri,
                   'hinh_anh' => $hinhanh,
                   'tinh_trang' =>$tinhtrang
        );
       if ($this->model->updateObj($id, $data))
            echo "<script>alert('Cập nhập banner thành công!');window.location.assign('".CMS."/banner');</script>";
       else
             echo "<script>alert('Cập nhập banner thất bại!');window.location.assign('".CMS."/banner');</script>";
   }

   function add()
   {
       require 'layouts/header.php';
       $this->view->render('banner/add');
       require 'layouts/footer.php';
   }

   function addsave()
   {
       $name = $_REQUEST['name'];
       $mota = $_REQUEST['mo_ta'];
       $vitri  = $_REQUEST['vi_tri'];
       $url = $_REQUEST['url'];
       $tinhtrang = $_REQUEST['tinh_trang'];
       if ($_REQUEST['link_anh']=='') {
            $dir = ROOT_DIR.'/uploads/img/banner/';
            if (isset($_FILES['hinh_anh']['name']) && ($_FILES['hinh_anh']['name']!='')) {  
              $file = $this->convert->uploadfile('hinh_anh',$dir,$name);
              $hinhanh =HOME.'/uploads/img/banner/'.$file;
            }else
              $hinhanh = 'http://via.placeholder.com/360x225';
        }else
          $hinhanh = $_REQUEST['link_anh'];
       $data = array(
                   'name' => $name,
                   'url' => $url,
                   'mo_ta' => $mota,
                   'vi_tri' => $vitri,
                   'hinh_anh' => $hinhanh,
                   'tinh_trang' =>$tinhtrang
        );
       if ($this->model->addObj($data))
           echo "<script>alert('Thêm banner thành công!');window.location.assign('".CMS."/banner');</script>";
       else
           echo "<script>alert('Thêm thất bại!');window.location.assign('".CMS."/banner');</script>";
       require 'layouts/header.php';
   }
}
?>
