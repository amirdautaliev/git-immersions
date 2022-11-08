<?php
session_start();
require_once "function.php";
$id = $_POST['id'];
$status_id = $_POST['status'];

status_edit($id,$status_id);
$_SESSION["status_update"]= "Ваш статус успешно обновлен";
redirect_to("status.php?id=".$id);

?>