<?php
class bootstrap
{
	 function __construct()
	 {
			 if (isset($_SESSION[SID])) {
					 $url    = isset($_GET['url']) ? $_GET['url'] : null;
					 $url    = rtrim($url, '/');
					 $url    = explode('/', $url);
					 $module = (empty($url[0])) ? 'index' : $url[0];
					 if (file_exists('controllers/' . $module . '.php')) {
							 require 'controllers/' . $module . '.php';
							 $controller = new $module;
							 $controller->loadModel($module); // load model tương ứng
							 $method = (isset($url[1])) ? $url[1] : 'index';
							 if (method_exists($controller, $method)) {
									 if (isset($url[2]))
											 $controller->{$method}($url[2]);
									 else
											 $controller->{$method}();
							 } else {
								 		require 'controllers/thongbao.php';
										$controller = new thongbao;
										$controller->nomethod();
							 }
					 } else {
							 require 'controllers/thongbao.php';
							 $controller = new thongbao;
							 $controller->nomodule();
					 }
			 } else {
					 $this->view = new view();
					 if (isset($_REQUEST['email'])) {
							 $username    = $_REQUEST['email'];
							 $password    = md5(md5($_REQUEST['pass']));
							 $this->db    = new database();
							 $this->model = new model();
							 $query       = $this->db->query("SELECT *
								 	 FROM users WHERE tinh_trang=1 AND email = '$username'  AND password  = '$password' ");
							 $query1       = $this->db->query("SELECT *
								 	 FROM users WHERE tinh_trang=1 AND email = '$username'");
							 if ($query1) {
							 	$a = $query1->fetchAll(PDO::FETCH_ASSOC);
							 }else
							 {
							 	$a = array();
							 }
							 if (empty($a)) {
							 	echo "<script>alert('Tên tài khoản không tồn tại!');</script>";
								$this->view->render('index/login');
							 }else{
							 	if ($query)
									 $userdata = $query->fetchAll(PDO::FETCH_ASSOC);
							 	else
									 $userdata = array();
							 	if (empty($userdata)) {
									
							 	    echo "<script>alert('Bạn đã nhập sai mật khẩu!');</script>";
									 $this->view->render('index/login');
							 	} else {
									 $_SESSION[SID]    = true;
									 $_SESSION['user'] = $userdata[0];
									 $userid           = $_SESSION['user']['id'];
									 //$userip           = $_SERVER["REMOTE_ADDR"];
									 //$time             = date("Y-m-d H:i:s");
									 echo "<script>window.location.assign('".CMS."');</script>";
							 	}
							 }
							 
					 } else {
					 		 // echo "<script>window.location.assign('".CMS."/index/login');</script>";
							$this->view->render('index/login');
					 }
			 }
	 }
}



?>
