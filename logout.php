<?php 
session_start();
if( isset( $_SESSION['login_id'] ) ){
	session_unset($_SESSION['login_id']);
	session_destroy();
	header('location:login.php');
}else{
	header('location:login.php');
}



?>