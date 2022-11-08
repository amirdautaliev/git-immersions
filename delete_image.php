<?php
require_once "function.php";
require_once "is_user.php";
is_logged_in();
$edit_user_id= $_GET['id'];
$logged_user_id = $_SESSION['id'];
$user = get_user_by_id($edit_user_id);
$image =$user['image'];
is_author($edit_user_id,$logged_user_id);
unlink($user['image']);
delete_image($edit_user_id);






?>