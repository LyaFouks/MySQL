<?php

	// session_start();


	// // $_SESSION['user_name'] = "Nik";

	// // echo $_SESSION['user_name'];

	// if($_SESSION['email']) {
	// 	echo "You are logged in";
	// } else {
	// 	header("Location: login-task.php");
	
	setcookie('user_id', '', time() + 60 * 60 * 24 * 7);
	$_COOKIE['user_id'] = 22222;
	echo $_COOKIE['user_id'];

?>