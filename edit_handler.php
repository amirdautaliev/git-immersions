<?php
session_start();
require_once('function.php'); 
$id = $_POST['id'];
$username=$_POST['username'];
$position =$_POST['position'];
$phone_number =$_POST['phone_number'];
$address=$_POST['address'];


edit_info($id,$username,$position,$phone_number,$address);
redirect_to("edit.php?id=".$id);
$_SESSION['update']="Профиль успешно обновился";


?>