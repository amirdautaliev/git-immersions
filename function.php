<?php
require_once "is_user.php";
is_logged_in();
function get_user_by_email($email)
{
  $pdo = new PDO("mysql:host=localhost;dbname=new_project", "mysql", "mysql");
  $sql = "SELECT * FROM users WHERE email=:email";
  $statement = $pdo->prepare($sql);
  $statement->execute(["email" => $email]);
  $users = $statement->fetch(PDO::FETCH_ASSOC);
  return $users;
}

function add_user($email, $password)
{
  $pdo = new PDO("mysql:host=localhost;dbname=new_project", "mysql", "mysql");
  $sql = "INSERT INTO users(email,password) VALUES (:email,:password)";
  $statement = $pdo->prepare($sql);
  $statement->execute([
    "email" => $email,
    "password" => password_hash($password, PASSWORD_DEFAULT)
  ]);
  //return $pdo->lastInsertId();
}

function login($email,$password){
  $user = get_user_by_email($email);
  if(empty($user)){
    $_SESSION["danger"] ="Пароль или логин не верно";
    redirect_to("page_login.php");
  exit;
  }
  if (!password_verify($password, $user["password"])) {
    $_SESSION["danger"] ="Пароль или логин не верно";
    redirect_to("page_login.php");
    exit;
  }
  }

function get_user_by_id($id){

	$pdo = new PDO("mysql:host=localhost;dbname=new_project","mysql","mysql");
	$sql=  "SELECT * FROM users WHERE id=:id";
	$statement= $pdo->prepare($sql);
	$statement->execute(["id"=>$id]);
	$users_id=$statement->fetch(PDO::FETCH_ASSOC);
	return $users_id;
}
function edit_info($id, $username, $position,$phone_number,$address)
{
  $pdo = new PDO("mysql:host=localhost;dbname=new_project", "mysql", "mysql");
  $sql = "UPDATE users SET username = :username, position= :position,phone_number=:phone_number,address =:address WHERE id=:id";
  $statement = $pdo->prepare($sql);
  $statement->execute([
    "id" => $id,
    "username" => $username,
    "position" => $position,
    "address" => $address,
    "phone_number" => $phone_number
  


  ]);

}




function status_edit($id,$status){
  $pdo =new pdo("mysql:host=localhost;dbname=new_project","mysql","mysql");
  $sql ="UPDATE users SET status=:status WHERE id=:id";
  $statement=$pdo->prepare($sql);
  $statement->execute([
    "id"=>$id,
    "status"=>$status
  ]);
  
}
function edit_social($id,$vk,$telegram,$instagram){
  $pdo =new pdo("mysql:host=localhost;dbname=new_project","mysql","mysql");
  $sql = "UPDATE users SET vk=:vk,telegram=:telegram,instagram=:instagram WHERE id=:id";
  $statement=$pdo->prepare($sql);
  $statement->execute([
   "id"=>$id,
   "vk"=>$vk,
   "telegram"=>$telegram,
   "instagram"=>$instagram
  ]);
}
function avatar_upload($id,$images){
  $result =pathinfo($images['name']);
  $filename = uniqid() . "." . $result["extension"];
  $pdo =new pdo("mysql:host=localhost;dbname=new_project","mysql","mysql");
  $sql = "UPDATE users SET image=:image WHERE id=:id ";
  $statement=$pdo->prepare($sql);
  $statement->execute([
    "id"=>$id,
    "image"=>"avatar/".$filename]);

    move_uploaded_file($_FILES['images']["tmp_name"], "avatar/".$filename);

}

function edit_secruity($id,$email){
	$pdo = new pdo("mysql:host=localhost;dbname=new_project","mysql","mysql");
	$sql = "UPDATE users SET email=:email WHERE id=:id";
	$statement=$pdo->prepare($sql);
	$statement->execute([
		"id"=>$id,
		"email"=>$email]);
}
function edit_password($id,$passsword){
	$pdo = new PDO("mysql:host=localhost;dbname=new_project","mysql","mysql");
	$sql = "UPDATE users SET psassword=:password WHERE id=:id";
	$statement=$pdo->prepare($sql);
	$statement->execute([
		"id"=>$id,
		"password"=>password_hash($passsword,PASSWORD_DEFAULT)
	]);
}
function delete_image($id){
  $pdo =new PDO("mysql:host=localhost;dbname=new_project","mysql","mysql");
  $sql = "UPDATE users SET image=NULL WHERE id=:id";
  $statement=$pdo->prepare($sql);
  $statement->execute([
    "id"=>$id
  ]);
  }
function is_author($logged_user_id,$edit_user_id){
	if (is_not_admin() && $logged_user_id!=$edit_user_id){
	redirect_to("users.php");
}
}

function redirect_to($url)
{
  header("Location:" . $url);
}
?>