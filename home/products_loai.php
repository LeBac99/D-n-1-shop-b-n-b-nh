<?php 
session_start();
require_once './commons/utils.php';
checkLogin();
$sql="select *from web_setting";
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$data= $stmt->fetch();
$newProductsQuery = "select * 
						from ".TABLE_PRODUCT." 
						where cate_id=2";
$stmt = $conn->prepare($newProductsQuery);
$stmt->execute();
$newProducts = $stmt->fetchAll();

$newProductsQuery = "select * 
						from ".TABLE_PRODUCT." 
						where cate_id=1";
$stmt = $conn->prepare($newProductsQuery);
$stmt->execute();
$new = $stmt->fetchAll();

 ?>





<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Thông Tin</title>
<link rel="stylesheet" href="thongtin1.css">
</head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<body>
<div class="head">
	<div class="logo">
		<div class="logo1">
			<a href="index.php"><img src="<?=$data['logo']?>" height="80" width="200"></a>
		</div>
		<div class="timkiem">
			<input type="text" placeholder="Tìm Kiếm...." id="c">
			<button>Tìm Kiếm</button>
		</div>
	</div>
	<div class="icon1">
	
	<br>
		<a href="#">Điện Thoại</a>
		<a href="#">LapTop</a>
		<a href="#">Phụ Kiện</a>

	</div>
	<div class="icon2">
		<i class="fas fa-ambulance" style=" font-size: 70px"></i>+
	</div>
</div>
<div class="thanh">
<br>
	<a href="#">Iphone (Apple) X</a>
</div>
<div class="nav">
		<?php foreach ($newProducts as $row): ?>
		<div class="hinh1">
		<img src="<?=$siteUrl.$row['image']?>" width="200" height="250">
		<a href="#"><h1><?=$row['products_name'] ?></h1></a>
		<b style="color: red"><?=$row['list_price']?>đ</b>
		<p><img src="album/Star_Emoji.png" width="20" height="20">
		<img src="album/Star_Emoji.png" width="20" height="20">
		<img src="album/Star_Emoji.png" width="20" height="20">
		<img src="album/Star_Emoji.png" width="20" height="20">
		<img src="album/Star_Emoji.png" width="20" height="20">
		36 đánh giá
		</p>
		<p>
			<?=$row['sell_price'] ?>
		</p>
		<p>
			_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _  _ _ 
		</p>
		<p>
			<?=$row['detail'] ?>
		
		</p>
		<br>
		<a href="#"><button>Mua</button> <b><button>Mua Trả Góp</button></b></a>
	</div>
	<?php endforeach ?>
	
</div>
<!--hết phần iphone -->
<div class="thanh">
<br>
	<a href="#">SAM SUNG () X</a>
</div>
<div class="nav">
		<?php foreach ($new as $sam): ?>
		<div class="hinh1">
		<img src="<?=$siteUrl.$sam['image']?>" width="200" height="250">
		<a href="#"><h1><?=$sam['products_name'] ?></h1></a>
		<b style="color: red"><?=$sam['list_price']?>đ</b>
		<p><img src="album/Star_Emoji.png" width="20" height="20">
		<img src="album/Star_Emoji.png" width="20" height="20">
		<img src="album/Star_Emoji.png" width="20" height="20">
		<img src="album/Star_Emoji.png" width="20" height="20">
		<img src="album/Star_Emoji.png" width="20" height="20">
		36 đánh giá
		</p>
		<p>
			<?=$sam['sell_price'] ?>
		</p>
		<p>
			_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _  _ _ 
		</p>
		<p>
			<?=$sam['detail'] ?>
		
		</p>
		<br>
		<a href="#"><button>Mua</button> <b><button>Mua Trả Góp</button></b></a>
	</div>
	<?php endforeach ?>
	
</div>

 <div id="chua">
     <img src="<?=$data['logo']?>" width="200" height="150">
   <form>
   <a href="#">Apple Iphone</a>
   <p>Điện thoại mới</p>
   <p>Điện thoại cũ</p>
   <p>Mới nhập khẩu</p>
   </form>
   <form>
   <a href="#">Sam Sung</a>
    <p>Điện thoại mới</p>
   <p>Điện thoại cũ</p>
   <p>Mới nhập khẩu</p>
   </form>
   <form>
   <a href="#">Oppo</a>
    <p>Điện thoại mới</p>
   <p>Điện thoại cũ</p>
   <p>Mới nhập khẩu</p>
   </form>
   <form>
   <br>
   <p>Liên hệ quảng cáo:</p>
   <p>Email:Pakcop22799@gmai.com.vn</p>
   <p>ID của bạn:<br>
   113.114.115</p>
   </form>
   </div>
  	
</body>
</html>
