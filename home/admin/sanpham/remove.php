<?php 
session_start();
require_once '../../commons/utils.php';session_start();
checkLogin();
$cateId = $_GET['id'];
$sql = "select * from ".TABLE_PRODUCT." where id = $cateId";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cate = $stmt->fetch();
if(!$cate){
	header('location: ' . $adminUrl . "sanpham");
	die;
}
// xoa san pham thuoc ve danh muc nay
$sql = "delete from ".TABLE_PRODUCT." where id = $cateId";
$stmt = $conn->prepare($sql);
$stmt->execute();
// xoa danh muc
header('location: ' . $adminUrl . "sanpham");
 ?>