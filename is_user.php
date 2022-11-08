<?php
session_start();
is_logged_in();
require_once("function.php");
function is_user_logged()
{
    return isset($_SESSION['email']);
}

function is_logged_in()
{
    if (!is_user_logged()){
        $_SESSION["error"]="Вы не авторизованы";
        redirect_to("page_login.php");
    }
}

function is_logged_admin()
{
    return ($_SESSION['role'] == 2);
}

function is_not_admin()
{
  return (!is_logged_admin());
    
}
