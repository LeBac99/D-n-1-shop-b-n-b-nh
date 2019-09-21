<?php 
session_start();
require_once '../../commons/utils.php';
checkLogin();
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: ' . $adminUrl . 'tai-khoan');
	die;
}
$id = $_POST['id'];
$email = $_POST['email'];
$fullname = $_POST['fullname'];
$role = $_POST['role'];
$phone_number = $_POST['phone_number'];
$img = $_FILES['image'];
$img1=$_POST['image1'];
$ext = pathinfo($img['name'], PATHINFO_EXTENSION);
$filename = 'album/avatar/'.uniqid() . '.' . $ext;
move_uploaded_file($img['tmp_name'], '../../'.$filename);

if($img['name']===""||$img['size']==0)
{$filename=$img1;}
$sql = "update users 
		set
			email = :email, 
			fullname = :fullname,
			phone_number = :phone_number,
			role = :role,
			avatar=:img
		where id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":email", $email, PDO::PARAM_STR);
$stmt->bindParam(":fullname", $fullname, PDO::PARAM_STR);
$stmt->bindParam(":role", $role, PDO::PARAM_INT);
$stmt->bindParam(":id", $id, PDO::PARAM_INT);
$stmt->bindParam(":phone_number", $phone_number, PDO::PARAM_INT);
$stmt->bindParam(":img", $filename);
$stmt->execute();
header('location: ' . $adminUrl . 'tai-khoan');
 ?>