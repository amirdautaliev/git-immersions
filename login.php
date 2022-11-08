<?php 
session_start();
$email = $_POST['email'];
$password = $_POST["password"];
require_once ("function.php");



$user = get_user_by_email($email);
$_SESSION['email']=$user['email'];
$_SESSION["role"] = $user['role'];
$_SESSION['id'] = $user['id'];
redirect_to("users.php");
login($email,$password);

 ?>