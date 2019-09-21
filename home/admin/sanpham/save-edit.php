
<?php 
session_start();
require_once '../../commons/utils.php';
checkLogin();
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: ' . $adminUrl . 'sanpham');
	die;

}

$id=$_POST['id'];
$product_name = $_POST['product_name'];
$detail = $_POST['detail'];
$list_price = $_POST['list_price'];
$sell_price = $_POST['sell_price'];
$cate_id = $_POST['cate_id'];
$img = $_FILES['image'];
$img1=$_POST['image1'];
$ext = pathinfo($img['name'], PATHINFO_EXTENSION);
$filename = 'album/products/'.uniqid() . '.' . $ext;
move_uploaded_file($img['tmp_name'], '../../'.$filename);

if($img['name']===""||$img['size']==0){
	$filename=$img1;
}
$sql = "update " . TABLE_PRODUCT . " 
		set
			cate_id = :cate_id, 
			product_name= :product_name,
			detail = :detail,
			list_price = :list_price,
			sell_price = :sell_price,
			image= :image
			where id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":cate_id", $cate_id,  PDO::PARAM_INT);
$stmt->bindParam(":product_name", $product_name,  PDO::PARAM_STR);
$stmt->bindParam(":detail", $detail,  PDO::PARAM_STR);
$stmt->bindParam(":list_price", $list_price,  PDO::PARAM_INT);
$stmt->bindParam(":sell_price", $sell_price,  PDO::PARAM_STR);
$stmt->bindParam(":image", $filename);
$stmt->bindParam(":id", $id,  PDO::PARAM_INT);
$stmt->execute();
header('location: ' . $adminUrl . 'sanpham');
 ?>