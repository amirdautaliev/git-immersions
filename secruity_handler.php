<?php
session_start();
require_once("function.php");
$id = $_POST['id'];
$email =$_POST['email'];
$passsword= $_POST['password'];
$user=get_user_by_email($email);


if(!empty($user) AND $id!==$user['id']){
	redirect_to("security.php?id=".$id);
	$_SESSION['secruity_danger']="Пользователь существует в базе";
	exit;
}
edit_secruity($id,$email);
if(!empty($passsword)){
	edit_password($id,$password);
}
$_SESSION['secruity_sucsess'] = "Успешно обновлен!";
redirect_to("security.php?id=".$id);

	?>