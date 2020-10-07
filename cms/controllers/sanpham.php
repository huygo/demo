<?php
class sanpham extends controller
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
        $this->view->render('sanpham/index');
        require 'layouts/footer.php';
    }


    function xoa()
    {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
        $this->model->delObj($id);
        echo "<script>window.location.assign('".CMS."/sanpham');</script>";
    }

    function edit()
    {
        require 'layouts/header.php';
        $id                      = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
        $this->view->data        = $this->model->getrow($id);
        $this->view->danhmuc     = functions::dequy($this->model->getcate(),0,0);
        $this->view->render('sanpham/edit');
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
            $dir = ROOT_DIR.'/uploads/img/sanpham/';
            if (isset($_FILES['hinh_anh']['name']) && ($_FILES['hinh_anh']['name']!='')) {  
              $file = $this->convert->uploadfile('hinh_anh',$dir,$name);
              $hinhanh =HOME.'/uploads/img/sanpham/'.$file;
            }else
              $hinhanh = 'http://via.placeholder.com/360x225';
      }else
          $hinhanh = $_REQUEST['link_anh'];
      $gia  = $_REQUEST['gia'];
      if ($_REQUEST['link_anh_1']=='') {
            $dir = ROOT_DIR.'/uploads/img/sanpham/';
            if (isset($_FILES['hinh_anh_1']['name']) && ($_FILES['hinh_anh_1']['name']!='')) {  
              $file = $this->convert->uploadfile('hinh_anh_1',$dir,$name);
              $hinhanh1 =HOME.'/uploads/img/sanpham/'.$file;
            }else
              $hinhanh1 = '';
      }else
          $hinhanh1 = $_REQUEST['link_anh_1'];
      $giamgia   = $_REQUEST['giam_gia'];
      if ($_REQUEST['link_anh_2']=='') {
            $dir = ROOT_DIR.'/uploads/img/sanpham/';
            if (isset($_FILES['hinh_anh_2']['name']) && ($_FILES['hinh_anh_2']['name']!='')) {  
              $file = $this->convert->uploadfile('hinh_anh_2',$dir,$name);
              $hinhanh2 =HOME.'/uploads/img/sanpham/'.$file;
            }else
              $hinhanh2 = '';
      }else
          $hinhanh2 = $_REQUEST['link_anh_2'];
      $danhmuc = $_REQUEST['danh_muc'];
      if ($_REQUEST['link_anh_3']=='') {
            $dir = ROOT_DIR.'/uploads/img/sanpham/';
            if (isset($_FILES['hinh_anh_3']['name']) && ($_FILES['hinh_anh_3']['name']!='')) {  
              $file = $this->convert->uploadfile('hinh_anh_3',$dir,$name);
              $hinhanh3 =HOME.'/uploads/img/sanpham/'.$file;
            }else
              $hinhanh3 = '';
      }else
          $hinhanh3 = $_REQUEST['link_anh_3'];
      $sapxep = $_REQUEST['sap_xep'];
      $tinhtrang   = $_REQUEST['tinh_trang'];
      $mota    = $_REQUEST['mo_ta'];
      $baohanh    = $_REQUEST['bao_hanh'];
      $xuatxu    = $_REQUEST['xuat_xu'];
       $congsuat    = $_REQUEST['cong_suat'];
      $phamvi    = $_REQUEST['pham_vi'];
      $tskt = $_REQUEST['tskt'];
      $ngaydang= date("Y-m-d");
        $data = array(
                    'name' => $name,
                  'url' => $url,
                  'hinh_anh' => $hinhanh,
                  'hinh_anh_1' => $hinhanh1,
                  'hinh_anh_2' => $hinhanh2,
                  'hinh_anh_3' => $hinhanh3,
                  'price' => $gia,
                  'discount' => $giamgia,
                  'danh_muc' => $danhmuc,
                  'tinh_trang' => $tinhtrang,
                  'sap_xep' => $sapxep,
                  'mo_ta' => $mota,
                  'bao_hanh' => $baohanh,
                  'xuat_xu' => $xuatxu,
                  'cong_suat' => $congsuat,
                  'pham_vi' => $phamvi,
                  'thong_so_kt' => $tskt,
                  'ngay_dang' => $ngaydang
                );
        if ($this->model->updateObj($id, $data))
             echo "<script>alert('Cập nhập sản phẩm thành công!');window.location.assign('".CMS."/sanpham');</script>";
        else
           echo "<script>alert('Cập nhập sản phẩm thất bại!');window.location.assign('".CMS."/sanpham');</script>";
    }

    function add()
    {
        require 'layouts/header.php';
        $this->view->danhmuc     = functions::dequy($this->model->getcate(),0,0);
        $this->view->render('sanpham/add');
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
            $dir = ROOT_DIR.'/uploads/img/sanpham/';
            if (isset($_FILES['hinh_anh']['name']) && ($_FILES['hinh_anh']['name']!='')) {  
              $file = $this->convert->uploadfile('hinh_anh',$dir,$name);
              $hinhanh =HOME.'/uploads/img/sanpham/'.$file;
            }else
              $hinhanh = 'http://via.placeholder.com/360x225';
      }else
          $hinhanh = $_REQUEST['link_anh'];
      $gia  = $_REQUEST['gia'];
      if ($_REQUEST['link_anh_1']=='') {
            $dir = ROOT_DIR.'/uploads/img/sanpham/';
            if (isset($_FILES['hinh_anh_1']['name']) && ($_FILES['hinh_anh_1']['name']!='')) {  
              $file = $this->convert->uploadfile('hinh_anh_1',$dir,$name);
              $hinhanh1 =HOME.'/uploads/img/sanpham/'.$file;
            }else
              $hinhanh1 = '';
      }else
          $hinhanh1 = $_REQUEST['link_anh_1'];
      $giamgia   = $_REQUEST['giam_gia'];
      if ($_REQUEST['link_anh_2']=='') {
            $dir = ROOT_DIR.'/uploads/img/sanpham/';
            if (isset($_FILES['hinh_anh_2']['name']) && ($_FILES['hinh_anh_2']['name']!='')) {  
              $file = $this->convert->uploadfile('hinh_anh_2',$dir,$name);
              $hinhanh2 =HOME.'/uploads/img/sanpham/'.$file;
            }else
              $hinhanh2 = '';
      }else
          $hinhanh2 = $_REQUEST['link_anh_2'];
      $danhmuc = $_REQUEST['danh_muc'];
      if ($_REQUEST['link_anh_3']=='') {
            $dir = ROOT_DIR.'/uploads/img/sanpham/';
            if (isset($_FILES['hinh_anh_3']['name']) && ($_FILES['hinh_anh_3']['name']!='')) {  
              $file = $this->convert->uploadfile('hinh_anh_3',$dir,$name);
              $hinhanh3 =HOME.'/uploads/img/sanpham/'.$file;
            }else
              $hinhanh3 = '';
      }else
          $hinhanh3 = $_REQUEST['link_anh_3'];
      $sapxep = $_REQUEST['sap_xep'];
      $tinhtrang   = $_REQUEST['tinh_trang'];
      $mota    = $_REQUEST['mo_ta'];
      $baohanh    = $_REQUEST['bao_hanh'];
      $xuatxu    = $_REQUEST['xuat_xu'];
      $congsuat    = $_REQUEST['cong_suat'];
      $phamvi    = $_REQUEST['pham_vi'];
      $tskt = $_REQUEST['tskt'];
      $ngaydang= date("Y-m-d");
      $data = array(
                  'name' => $name,
                  'url' => $url,
                  'hinh_anh' => $hinhanh,
                  'hinh_anh_1' => $hinhanh1,
                  'hinh_anh_2' => $hinhanh2,
                  'hinh_anh_3' => $hinhanh3,
                  'price' => $gia,
                  'discount' => $giamgia,
                  'danh_muc' => $danhmuc,
                  'tinh_trang' => $tinhtrang,
                  'sap_xep' => $sapxep,
                  'mo_ta' => $mota,
                  'bao_hanh' => $baohanh,
                  'xuat_xu' => $xuatxu,
                  'cong_suat' => $congsuat,
                  'pham_vi' => $phamvi,
                  'thong_so_kt' => $tskt,
                  'ngay_dang' => $ngaydang
              );
        if ($this->model->addObj($data))
            echo "<script>alert('Thêm sản phẩm thành công!');window.location.assign('".CMS."/sanpham');</script>";
        else
            echo "<script>alert('Thêm sản phẩm thất bại!');window.location.assign('".CMS."/sanpham');</script>";
    }
}
?>
