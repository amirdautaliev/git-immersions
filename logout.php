<?php 
session_start();
require_once("function.php");
function logout(){

if (isset($_SESSION['email'])) {
	unset($_SESSION['email']);
	session_destroy();
	redirect_to("page_login.php");
}

}
logout();
 ?>