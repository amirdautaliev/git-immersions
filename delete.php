<?
session_start();
require_once "is_user.php";
is_logged_in();
$logged_user_id = $_SESSION['id'];
$edit_user_id = $_GET['id'];
$user = get_user_by_id($edit_user_id);
is_author($edit_user_id,$logged_user_id);


if(!empty($user['image'])){
	unlink($user['image']);
exit;
}
delete_user($edit_user_id);
function delete_user($id){
	$pdo = new PDO("mysql:host=localhost;dbname=new_project","mysql","mysql");
	$sql = "DELETE FROM users WHERE id=:id";
	$statement=$pdo->prepare($sql);
	$statement->execute(["id"=>$id]);
}

if($edit_user_id!==$logged_user_id){
redirect_to("users.php");
$_SESSION['edit_user'] = "Пользователь успещно удален";
}
else{
require_once "logout.php";
$_SESSION['logged_user']="Вы успешно удалили ";
}

?>