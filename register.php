<?php 
session_start();
$email 	  =	$_POST['email'];
$password = $_POST['password'];
require_once ("function.php");

$user = get_user_by_email($email);


if (!empty($user)) {
	$_SESSION['danger']="Этот электронный адрес уже занят";
	redirect_to("page_register.php");
	exit;
}

 

add_user($email,$password);
$_SESSION['success'] = "Пользователь успешно зарегистрирован";
redirect_to("page_login.php");
?>
