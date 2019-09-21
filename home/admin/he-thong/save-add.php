
<?php 
session_start();
require_once '../../commons/utils.php';
checkLogin();
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: ' . $adminUrl . 'he-thong/brands.php');
	die;
}

$name = $_POST['name'];
$img = $_FILES['image'];
$ext = pathinfo($img['name'], PATHINFO_EXTENSION);
$filename = 'album/products/'.uniqid() . '.' . $ext;
move_uploaded_file($img['tmp_name'], '../../'.$filename);
$sql = "insert into brands
			(
			name, 
			image 
			)
		values 
			(
			:name, 
			:image 
			)";
$stmt = $conn->prepare($sql);

$stmt->bindParam(":name", $name);
$stmt->bindParam(":image", $filename);
$stmt->execute();
header('location: ' . $adminUrl . 'he-thong/brands.php');
 ?>