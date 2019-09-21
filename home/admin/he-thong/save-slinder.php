
<?php 
session_start();
require_once '../../commons/utils.php';
checkLogin();
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: ' . $adminUrl . 'he-thong/slinder.php');
	die;
}
$desccription = $_POST['desccription'];
$url = $_POST['url'];
$order_number = $_POST['order_number'];
$img = $_FILES['image'];
$ext = pathinfo($img['name'], PATHINFO_EXTENSION);
$filename = 'album/'.uniqid() . '.' . $ext;
move_uploaded_file($img['tmp_name'], '../../'.$filename);
$sql = "insert into slideshows
			(
			image,
			desccription ,
			url,
			order_number
			)
		values 
			(
			:image,
			:desccription,
			:url,
			:order_number
			)";
$stmt = $conn->prepare($sql);

$stmt->bindParam(":desccription", $desccription);
$stmt->bindParam(":url", $url);
$stmt->bindParam(":order_number",$order_number);
$stmt->bindParam(":image", $filename);
$stmt->execute();
header('location: ' . $adminUrl . 'he-thong/slinshow.php');
 ?>