<?php
class index extends controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        require 'layouts/header.php';
        $this->view->render('index/index');
        require 'layouts/footer.php';
    }

    function doimatkhau()
    {
        require 'layouts/header.php';
        $this->view->render('index/doimatkhau');
        require 'layouts/footer.php';
    }
    function changepass()
    {
        $oldpass = md5(md5($_REQUEST['oldpass']));
        $newpass = md5(md5($_REQUEST['newpass']));
        $userid  = $_SESSION['user']['id'];
        if ($this->model->checkold($userid, $oldpass))
            if ($this->model->changepass($userid, $newpass))
                 echo "<script>alert('Đổi mật khẩu thành công, vui lòng đăng nhập lại bằng mật khẩu mới!');window.location.assign('".CMS."/index/logout');</script>";
            else
                 echo "<script>alert('Đổi mật khẩu không thành công, vui lòng thử lại!');window.location.assign('".CMS."/index/doimatkhau');</script>";
        else
             echo "<script>alert('Mật khẩu cũ không đúng, vui lòng thử lại!');window.location.assign('".CMS."/index/doimatkhau');</script>";

    }

    function logout()
    {
        // session_start();
        session_destroy();
        echo "<script>window.location.assign('".CMS."/login');</script>";
        exit;
    }
}
?>
