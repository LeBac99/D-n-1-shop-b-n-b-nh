
<?php 
session_start();
require_once'./commons/utils.php';
checkLogin();
if($_SERVER['REQUEST_METHOD'] == "GET"){
	header('location: '. $siteUrl);
	die;
}

$pId = $_POST['id'];
$email = $_POST['email'];
$content = $_POST['content'];
$sql = "insert into " . TABLE_COMMENT
		. " (email, content, product_id) 
		values ('$email','$content',$pId)";
$stmt = $conn->prepare($sql);
$stmt->execute();

header('location: '. $siteUrl.'thongtin.php?sp_id='. $pId);


 ?>
