<?php  
session_start();
require_once("function.php");
$email = $_POST['email1'];
$password = $_POST['password1']; 
$username= $_POST['username'];
$position = $_POST['position'];
$address = $_POST['address'];
$phone_number = $_POST["phone_number"];
$status = $_POST["status"];
$user=get_user_by_email($email);



 if (!empty($user)) {
   $_SESSION["dange"] ="Пользователь существует в базе";
   redirect_to("create_user.php");
   exit;
 } 
add_user($email,$password);
 $user_id=get_user_by_email($email);
 $id =$user_id["id"];
edit_info($id,$username,$position,$address,$phone_number);
status_edit($id,$status);
redirect_to("users.php");


?>