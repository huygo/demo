<?php
class baiviet extends controller
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
        $this->view->data    = $this->model->getFetObj();
        $this->view->render('baiviet/index');   
        require 'layouts/footer.php';
    }


    function xoa()
    {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
        $this->model->delObj($id);
        echo "<script>window.location.assign('".CMS."/baiviet');</script>";
    }

    function edit()
    {
        require 'layouts/header.php';
        $id                      = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
        $this->view->data        = $this->model->getrow($id);
        $this->view->danhmuc     = $this->model->danhmuc();
        $this->view->render('baiviet/edit');
        require 'layouts/footer.php';
    }

    function editsave()
    {
        $id      = $_REQUEST['id'];
         $name    = $_REQUEST['name'];
      if ($_REQUEST['url']=='')
         $url     = functions::convertname($name);
      else
         $url = $_REQUEST['url'];
      if ($_REQUEST['link_anh']=='') {
            $dir = ROOT_DIR.'/uploads/img/baiviet/';
            if (isset($_FILES['hinh_anh']['name']) && ($_FILES['hinh_anh']['name']!='')) {  
              $file = $this->convert->uploadfile('hinh_anh',$dir,$name);
              $hinhanh =HOME.'/uploads/img/baiviet/'.$file;
            }else
              $hinhanh = 'http://via.placeholder.com/360x225';
      }else
          $hinhanh = $_REQUEST['link_anh'];
      $mota  = $_REQUEST['mo_ta'];
      $danhmuc = $_REQUEST['danh_muc'];
      $sapxep = $_REQUEST['com'];
      $tinhtrang   = $_REQUEST['tinh_trang'];
      $noidung = $_REQUEST['noi_dung'];
      $ngaydang= date("Y-m-d");
      $data = array(
                  'name' => $name,
                  'url' => $url,
                  'hinh_anh' => $hinhanh,
                  'danh_muc' => $danhmuc,
                  'tinh_trang' => $tinhtrang,
                  'com' => $sapxep,
                  'mo_ta' => $mota,
                  'noi_dung' => $noidung,
                  'ngay_dang' => $ngaydang
              );
        if ($this->model->updateObj($id,$data))
            echo "<script>alert('Cập nhập bài viết thành công!');window.location.assign('".CMS."/baiviet');</script>";
        else
            echo "<script>alert('Cập nhập bài viết thất bại!');window.location.assign('".CMS."/baiviet');</script>";
    }

    function add()
    {
        require 'layouts/header.php';
        $this->view->danhmuc     = $this->model->danhmuc();
        $this->view->render('baiviet/add');
        require 'layouts/footer.php';
    }

    function addsave()
    {
      $name    = $_REQUEST['name'];
      if ($_REQUEST['url']=='')
         $url     = functions::convertname($name);
      else
         $url = $_REQUEST['url'];
      if ($_REQUEST['link_anh']=='') {
            $dir = ROOT_DIR.'/uploads/img/baiviet/';
            if (isset($_FILES['hinh_anh']['name']) && ($_FILES['hinh_anh']['name']!='')) {  
              $file = $this->convert->uploadfile('hinh_anh',$dir,$name);
              $hinhanh =HOME.'/uploads/img/baiviet/'.$file;
            }else
              $hinhanh = 'http://via.placeholder.com/360x225';
      }else
          $hinhanh = $_REQUEST['link_anh'];
      $mota  = $_REQUEST['mo_ta'];
      $danhmuc = $_REQUEST['danh_muc'];
      $sapxep = $_REQUEST['com'];
      $tinhtrang   = $_REQUEST['tinh_trang'];
      $noidung = $_REQUEST['noi_dung'];
      $ngaydang= date("Y-m-d");
      $data = array(
                  'name' => $name,
                  'url' => $url,
                  'hinh_anh' => $hinhanh,
                  'danh_muc' => $danhmuc,
                  'tinh_trang' => $tinhtrang,
                  'com' => $sapxep,
                  'mo_ta' => $mota,
                  'noi_dung' => $noidung,
                  'ngay_dang' => $ngaydang
              );
        if ($this->model->addObj($data))
            echo "<script>alert('Thêm bài viết thành công!');window.location.assign('".CMS."/baiviet');</script>";
        else
            echo "<script>alert('Thêm bài viết thất bại!');window.location.assign('".CMS."/baiviet');</script>";
    }
}
?>
