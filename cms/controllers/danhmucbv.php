<?php
class danhmucbv extends controller
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
       $this->view->render('danhmucbv/index');
       require 'layouts/footer.php';
   }


   function xoa()
   {
       $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
       $this->model->delObj($id);
       header('Location: ' . CMS . '/danhmucbv');
   }

   function edit()
   {
       require 'layouts/header.php';
       $id                  = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
       $this->view->data    = $this->model->getrow($id);
       $this->view->render('danhmucbv/edit');
       require 'layouts/footer.php';
   }

   function editsave()
   {
       $id   = $_REQUEST['id'];
       $name = $_REQUEST['name'];
       $mota = $_REQUEST['mo_ta'];
       $thutu  = $_REQUEST['vi_tri'];
       if ($_REQUEST['url']=='')
          $url     = functions::convertname($name);
       else
          $url = $_REQUEST['url'];
       $tinhtrang = $_REQUEST['tinh_trang'];
       if ($_REQUEST['link_anh']=='') {
            $dir = ROOT_DIR.'/uploads/img/danhmucbv/';
            if (isset($_FILES['hinh_anh']['name']) && ($_FILES['hinh_anh']['name']!='')) {  
              $file = $this->convert->uploadfile('hinh_anh',$dir,$name);
              $hinhanh =HOME.'/uploads/img/danhmucbv/'.$file;
            }else
              $hinhanh = 'http://via.placeholder.com/360x225';
        }else
          $hinhanh = $_REQUEST['link_anh'];
       $data = array(
                   'name' => $name,
                   'url' => $url,
                   'mo_ta' => $mota,
                   'thu_tu' => $thutu,
                   'hinh_anh' => $hinhanh,
                   'tinh_trang' =>$tinhtrang
        );
       if ($this->model->updateObj($id, $data))
            echo "<script>alert('Cập nhập danh mục thành công!');window.location.assign('".CMS."/danhmucbv');</script>";
       else
             echo "<script>alert('Cập nhập danh mục thất bại!');window.location.assign('".CMS."/danhmucbv');</script>";
   }

   function add()
   {
       require 'layouts/header.php';
       $this->view->render('danhmucbv/add');
       require 'layouts/footer.php';
   }

   function addsave()
   {
       $name = $_REQUEST['name'];
       $mota = $_REQUEST['mo_ta'];
       $thutu  = $_REQUEST['vi_tri'];
       if ($_REQUEST['url']=='')
          $url     = functions::convertname($name);
       else
          $url = $_REQUEST['url'];
       $tinhtrang = $_REQUEST['tinh_trang'];
       if ($_REQUEST['link_anh']=='') {
            $dir = ROOT_DIR.'/uploads/img/danhmucbv/';
            if (isset($_FILES['hinh_anh']['name']) && ($_FILES['hinh_anh']['name']!='')) {  
              $file = $this->convert->uploadfile('hinh_anh',$dir,$name);
              $hinhanh =HOME.'/uploads/img/danhmucbv/'.$file;
            }else
              $hinhanh = 'http://via.placeholder.com/360x225';
        }else
          $hinhanh = $_REQUEST['link_anh'];
       $data = array(
                   'name' => $name,
                   'url' => $url,
                   'mo_ta' => $mota,
                   'thu_tu' => $thutu,
                   'hinh_anh' => $hinhanh,
                   'tinh_trang' =>$tinhtrang
        );
       if ($this->model->addObj($data))
           echo "<script>alert('Thêm danh mục thành công!');window.location.assign('".CMS."/danhmucbv');</script>";
       else
           echo "<script>alert('Thêm danh mục thất bại!');window.location.assign('".CMS."/danhmucbv');</script>";
       require 'layouts/header.php';
   }
}
?>
