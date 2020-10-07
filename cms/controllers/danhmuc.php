<?php
class danhmuc extends controller
{
   function __construct()
   {
       parent::__construct();
   }

   function index()
   {
       require 'layouts/header.php';
       $this->view->data = $this->model->getFetObj();
       $this->view->render('danhmuc/index');
       require 'layouts/footer.php';
   }

   function battat()
   {
       $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
       $this->model->battat($id);
       header('Location: ' . CMS . '/danhmuc');
   }

   function xoa()
   {
       $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
       $this->model->delObj($id);
       header('Location: ' . CMS . '/danhmuc');
   }

   function edit()
   {
       require 'layouts/header.php';
       $id                  = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
       $this->view->data    = $this->model->getrow($id);
       $danhmuc = $this->model->getFetObj();
   		 $this->view->menu = functions::dequy($danhmuc,0,0);
       $this->view->render('danhmuc/edit');
       require 'layouts/footer.php';
   }

   function editsave()
   {
       $id   = $_REQUEST['id'];
       $name = $_REQUEST['name'];
       if ($_REQUEST['url']=='')
          $url     = functions::convertname($name);
       else
          $url = $_REQUEST['url'];
       $tinhtrang = $_REQUEST['tinh_trang'];
       $cha = $_REQUEST['cha'];
        if ($_REQUEST['link_anh']=='') {
            $dir = ROOT_DIR.'/uploads/img/danhmuc/';
            if (isset($_FILES['hinh_anh']['name']) && ($_FILES['hinh_anh']['name']!='')) {  
              $file = $this->convert->uploadfile('hinh_anh',$dir,$name);
              $hinhanh =HOME.'/uploads/img/danhmuc/'.$file;
            }else
              $hinhanh = 'http://via.placeholder.com/360x225';
        }else
          $hinhanh = $_REQUEST['link_anh'];
       $data = array(
           'name' => $name,
           'url' => $url,
           'hinh_anh' =>$hinhanh,
           'danh_muc_cha' => $cha,
           'tinh_trang' =>$tinhtrang
       );
       if ($this->model->updateObj($id, $data))
           echo "<script>alert('Cập nhật thành công thành công!');window.location.assign('".CMS."/danhmuc');</script>";
       else
             echo "<script>alert('Cập nhật thất bại!');window.location.assign('".CMS."/danhmuc');</script>";
   }

   function add()
   {
       require 'layouts/header.php';
       $danhmuc = $this->model->getFetObj();
       $this->view->menu = functions::dequy($danhmuc,0,0);
       $this->view->render('danhmuc/add');
       require 'layouts/footer.php';
   }

   function addsave()
   {
       $name = $_REQUEST['name'];
       if ($_REQUEST['url']=='')
          $url     = functions::convertname($name);
       else
          $url = $_REQUEST['url'];
       $tinhtrang = $_REQUEST['tinh_trang'];
       $cha = $_REQUEST['cha'];
        if ($_REQUEST['link_anh']=='') {
            $dir = ROOT_DIR.'/uploads/img/danhmuc/';
            if (isset($_FILES['hinh_anh']['name']) && ($_FILES['hinh_anh']['name']!='')) {  
              $file = $this->convert->uploadfile('hinh_anh',$dir,$name);
              $hinhanh =HOME.'/uploads/img/danhmuc/'.$file;
            }else
              $hinhanh = 'http://via.placeholder.com/360x225';
        }else
          $hinhanh = $_REQUEST['link_anh'];
       $data = array(
           'name' => $name,
           'url' => $url,
           'hinh_anh' =>$hinhanh,
           'danh_muc_cha' => $cha,
           'tinh_trang' =>$tinhtrang
       );
       if ($this->model->addObj($data))
           echo "<script>alert('Thêm danh mục thành công!');window.location.assign('".CMS."/danhmuc');</script>";
       else
           echo "<script>alert('Thêm danh mục thất bại!');window.location.assign('".CMS."/danhmuc');</script>";
   }
}
?>
