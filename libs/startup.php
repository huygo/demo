<?php
	
	session_start();
	date_default_timezone_set("Asia/Ho_Chi_Minh");

	define('HOME', 'http://'.$_SERVER['HTTP_HOST'].'/Duan02');

	define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT'].'/Duan02');

	define('DB_TYPE', 'mysql');

	define('DB_HOST', 'localhost');

	define('DB_NAME', 'duan02');

	define('DB_USER', 'root');

	define('DB_PASS', '');

?>

