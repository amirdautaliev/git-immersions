<?
session_start();
require_once "function.php";
$id= $_POST['id'];
$images= $_FILES['image'];
$tmp_name = $_FILES['image']['tmp_name'];
if(!empty($images["name"])){
	upload_image($id,$images);
	$_SESSION["upload_image"] = "Картинка успешно загружен";
	redirect_to("media.php?id=".$id);
}


function upload_image($id,$images){
$result = pathinfo($images['name']);
$filename = uniqid() . ".". $result["extension"];
$path  = "image/".$filename;
move_uploaded_file($_FILES["image"]["tmp_name"], "image/".$filename);
$pdo = new PDO("mysql:host=localhost;dbname=new_project","mysql","mysql");
$sql = "UPDATE users SET image=:image WHERE id=:id";
$statement=$pdo->prepare($sql);
$statement->execute([
	"id"=>$id,
	"image"=>"image/" .$filename

]);
}
?>
