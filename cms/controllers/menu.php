<?php
class menu extends controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        require 'layouts/header.php';
        $this->view->data = $this->model->getFetObj(); 
        $this->view->render('menu/index');
        require 'layouts/footer.php';
    }

    function edit()
    {
        require 'layouts/header.php';
        $id                 = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
        $this->view->data   = $this->model->getrow($id);
        $this->view->render('menu/edit');
        require 'layouts/footer.php';
    }

    function editsave()
    {
        $id   = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $url  = $_REQUEST['url'];
        $tinhtrang = $_REQUEST['tinh_trang'];
        $thutu = $_REQUEST['thu_tu'];
        $data  = array(
            'name' => $name,
            'url' => $url,
            'tinh_trang' => $tinhtrang,
            'sap_xep' => $thutu
        );
        if ($this->model->updateObj($id, $data))
            echo "<script>alert('Cập nhập menu thành công!');window.location.assign('".CMS."/menu');</script>";
        else
            echo "<script>alert('Cập nhập menu thất bại!');window.location.assign('".CMS."/menu');</script>";
    }

    function add()
    {
        require 'layouts/header.php';
        $this->view->render('menu/add');
        require 'layouts/footer.php';
    }

    function addsave()
    {
        $name = $_REQUEST['name'];
        $url  = $_REQUEST['url'];
        $tinhtrang = $_REQUEST['tinh_trang'];
        $thutu = $_REQUEST['thu_tu'];
        $data  = array(
            'name' => $name,
            'url' => $url,
            'tinh_trang' => $tinhtrang,
            'sap_xep' => $thutu
        );
        if ($this->model->addObj($data))
            echo "<script>alert('Thêm menu thành công!');window.location.assign('".CMS."/menu');</script>";
        else
            echo "<script>alert('Cập nhập thông tin thất bại!');window.location.assign('".CMS."/menu');</script>";
    }


    function del()
    {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
        $this->model->delObj($id);
        echo "<script>window.location.assign('".CMS."/menu');</script>";
    }
}
?>
