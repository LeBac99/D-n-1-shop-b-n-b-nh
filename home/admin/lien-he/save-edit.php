
<?php 
session_start();
require_once '../../commons/utils.php';
checkLogin();
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: ' . $adminUrl . 'lien-he');
	die;

}


$hotline = $_POST['hotline'];
$map = $_POST['map'];
$email = $_POST['email'];
$fb = $_POST['fb'];
$img = $_FILES['image'];
$img1=$_POST['image1'];
$ext = pathinfo($img['name'], PATHINFO_EXTENSION);
$filename = 'album/products/'.uniqid() . '.' . $ext;
move_uploaded_file($img['tmp_name'], '../../'.$filename);
if($img['name']===""||$img['size']==0)
{$filename=$img1;}

$sql = "update " . TABLE_WEB . " 
		set logo= :image,
			hotline =:hotline, 
			map= :map,
			email = :email,
			fb = :fb
			";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":image", $filename);
$stmt->bindParam(":hotline", $hotline,  PDO::PARAM_STR);
$stmt->bindParam(":map", $map,  PDO::PARAM_STR);
$stmt->bindParam(":email", $email,  PDO::PARAM_STR);
$stmt->bindParam(":fb", $fb,  PDO::PARAM_STR);

$stmt->execute();
header('location: ' . $adminUrl . 'lien-he');
 ?>
 ?>