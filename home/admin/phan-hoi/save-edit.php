
<?php 
session_start();
require_once '../../commons/utils.php';
checkLogin();
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: ' . $adminUrl . 'sanpham');
	die;

}

$id=$_POST['id'];
$hotline = $_POST['hotline'];
$map = $_POST['map'];
$email = $_POST['email'];
$sell_price = $_POST['fb'];
$img = $_FILES['image'];
$ext = pathinfo($img['name'], PATHINFO_EXTENSION);
$filename = 'album/products/'.uniqid() . '.' . $ext;
move_uploaded_file($img['tmp_name'], '../../'.$filename);

$sql = "update " . TABLE_WEB . " 
		set
			hotline = :hotline, 
			map= :map,
			email = :email,
			list_price = :list_price,
			sell_price = :sell_price,
			image= :image
			where id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":hotline", $hotline,  PDO::PARAM_STR);
$stmt->bindParam(":map", $map,  PDO::PARAM_STR);
$stmt->bindParam(":email", $detail,  PDO::PARAM_STR);
$stmt->bindParam(":list_price", $list_price,  PDO::PARAM_INT);
$stmt->bindParam(":sell_price", $sell_price,  PDO::PARAM_STR);
$stmt->bindParam(":image", $filename,  PDO::PARAM_STR);
$stmt->bindParam(":id", $id,  PDO::PARAM_INT);
$stmt->execute();
header('location: ' . $adminUrl . 'sanpham');
 ?>
 ?>