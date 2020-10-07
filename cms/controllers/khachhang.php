<?php
class khachhang extends controller
{
   function __construct()
   {
       parent::__construct();
   }

   function index()
   {
       require 'layouts/header.php';
       $this->view->data = $this->model->getFetObj();
       $this->view->render('khachhang/index');
       require 'layouts/footer.php';
   }

   
   function del()
   {
       $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
       $this->model->delObj($id);
      echo "<script>window.location.assign('".CMS."/khachhang');</script>";
   }

  
}
?>
