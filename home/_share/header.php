<?php 
require_once './commons/utils.php';
$sql="select *from web_settings";
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$data= $stmt->fetch();
 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../styly.css">
</head>

<body>
<style type="text/css">
.icon2{
	float:right;
	padding: 10px 0;

}
</style>
<div class="head">
	<div class="logo">
			<div class="logo1">
				<a href="index.php"><img src="<?=$siteUrl.$data['logo'] ?> "height="80" width="200"></a>
			</div>
			<div class="timkiem">
				<form  onsubmit="return kiem_tra()" method="GET" action="<?= $siteUrl ?>search.php "">
				<input type="text" placeholder="Tìm Kiếm...." id="c" name="search" required><span id="a1"></span>
				<button type="submit" name="seach">Tìm Kiếm</button>
				</form>
			</div>
		</div>
		<div class="icon1">
		<br>
			<a href="index.php">Điện Thoại</a>
			<a href="gioithieu.php">Giới Thiệu</a>
			<a href="lienhe.php">Liên Hệ</a>

	</div>
	<div class="icon2">
			<a href="logout.php"><i class="fas fa-sign-out-alt" style="font-size: 20px">Đăng Xuất</i></a>
		</div>
		</div>
<script src="../../js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script type="text/javascript">
		function kiem_tra(){
			var tk=document.getElementById("c").value;
			var d1=document.getElementById("a1");
			if(ten.length==0){
				d1.innerHTML="Bạn chưa nhập thông tin!";
				d1.style.color="red";
				return false;
			}else{
				d1.innerHTML="";
			}
		}
</script>
</body>
</html>

   