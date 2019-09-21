<?php 
session_start();
require_once '../../commons/utils.php';
checkLogin();
$cateId = $_GET['id'];
$sql = "select * from contact where id = $cateId";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cate = $stmt->fetch();
if(!$cate){
	header('location: ' . $adminUrl . "contact");
	die;
}
// xoa san pham thuoc ve danh muc nay
$sql = "delete from contact where id = $cateId";
$stmt = $conn->prepare($sql);
$stmt->execute();
// xoa danh muc
header('location: ' . $adminUrl . "contact");
 ?>

