
<?php 
session_start();
require_once '../../commons/utils.php';
checkLogin();
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: ' . $adminUrl . 'sanpham');
	die;

}

$id=$_POST['id'];
$name = $_POST['name'];
$img = $_FILES['image'];
$img1=$_POST['image1'];

$ext = pathinfo($img['name'], PATHINFO_EXTENSION);
$filename = 'album/products/'.uniqid() . '.' . $ext;
move_uploaded_file($img['tmp_name'], '../../'.$filename);

if($img['name']===""||$img['size']==0)
{$filename=$img1;}



$sql = "update " . TABLE_BRANDS . " 
		set
			name = :name, 
			image= :image
			where id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":name",$name,  PDO::PARAM_STR);
$stmt->bindParam(":image", $filename,  PDO::PARAM_STR);
$stmt->bindParam(":id", $id,  PDO::PARAM_INT);
$stmt->execute();
header('location: ' . $adminUrl . 'he-thong/brands.php');
 ?>
 ?>