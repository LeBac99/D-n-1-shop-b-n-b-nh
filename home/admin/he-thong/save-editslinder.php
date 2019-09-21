
<?php 
session_start();
require_once '../../commons/utils.php';
checkLogin();
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: ' . $adminUrl . 'he-thong/slinshow.php');
	die;

}

$id=$_POST['id'];
$desccription = $_POST['desccription'];
$url = $_POST['url'];
$status = $_POST['status'];
$order_number = $_POST['order_number'];
$img = $_FILES['image'];
$img1=$_POST['image1'];
$ext = pathinfo($img['name'], PATHINFO_EXTENSION);
$filename = 'album/products/'.uniqid() . '.' . $ext;
move_uploaded_file($img['tmp_name'], '../../'.$filename);

if($img['name']===""||$img['size']==0)
{$filename=$img1;}

$sql = "update " . TABLE_SLIDESHOW . " 
		set	image= :image,
			desccription = :desccription, 
			url= :url,
			status = :status,
			order_number = :order_number
			where id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":desccription", $desccription,  PDO::PARAM_STR);
$stmt->bindParam(":url", $url,  PDO::PARAM_STR);
$stmt->bindParam(":status", $status,  PDO::PARAM_INT);
$stmt->bindParam(":order_number", $order_number,  PDO::PARAM_INT);
$stmt->bindParam(":image", $filename);
$stmt->bindParam(":id", $id,  PDO::PARAM_INT);
$stmt->execute();
header('location: ' . $adminUrl . 'he-thong/slinshow.php');
 ?>