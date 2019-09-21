<?php 
session_start();
require_once '../../commons/utils.php';session_start();
checkLogin();
$cateId = $_GET['id'];
$sql = "select * from users where id=$cateId";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cate = $stmt->fetch();
if(!$cate){
	header('location: ' . $adminUrl . "tai-khoan");
	die;
}
// xoa san pham thuoc ve danh muc nay
$sql = "delete from users where id=$cateId ";
$stmt = $conn->prepare($sql);
$stmt->execute();
// xoa danh muc
header('location: ' . $adminUrl . "tai-khoan");
 ?>