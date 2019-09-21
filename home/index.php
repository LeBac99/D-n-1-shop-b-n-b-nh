<?php
session_start();
require_once './commons/utils.php';
checkLogin();
$sql="select *from web_settings";
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$data= $stmt->fetch();

$newProductsQuery = "select * 
						from ".TABLE_PRODUCT." 
						order by id desc 
						limit 4";
$stmt = $conn->prepare($newProductsQuery);
$stmt->execute();
$newProducts = $stmt->fetchAll();

$newProductsQuery = "select * 
						from ".TABLE_PRODUCT." 
						order by id desc 
						limit 8";
$stmt = $conn->prepare($newProductsQuery);
$stmt->execute();
$new = $stmt->fetchAll();

$newProductsQuery = "select * 
						from ".TABLE_PRODUCT." 
						order by views desc 
						limit 4";
$stmt = $conn->prepare($newProductsQuery);
$stmt->execute();
$newviews = $stmt->fetchAll();


$newBrands = "select * from brands ";
$stmt = $conn->prepare($newBrands);
$stmt->execute();
$newbrands = $stmt->fetchAll();


 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Trang chủ</title>

<link rel="stylesheet" href="styly.css">
<script src="java.js"></script>
<script language="javascript" src="js/jquery-1.9.1.min.js"></script>
		<script language="javascript" src="js/custom.js"></script>
</head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<script type="text/javascript">
	
</script>
<body>	<?php include './_share/header.php' ?>

<div class="head1">

	<?php include'./_share/slider.php' ?>
      <div class="bac">
    	<div class="a"><p>Lễ Hội Sam Sung
      	<br>
      	Giảm đến 4 triệu</p></div> 
      	<div class="a1"> <p>
      	Xăm Iphone Giá Hời<br>
      	Giảm đến 7 triệu
      </p></div>
     <div class="a2">
     	<p>OPPO Trả Góp 0%<br>
     	Giảm Giá Đến 500 Nghìn</p>
     </div>
     <div class="a3">
     	<p>
     		Phụ Kiện Giá Sốc<br>
     		Giảm Đến 49%
     	</p>
     </div>
      </div>
</div>
<br>
<div class="head2">
<div class="bao">
	<div class="tren">
		<h1>TIN CÔNG NGHỆ</h1>
	</div>
	<div class="ben">
	<br>
		<a href="#">Vinaphone Tặng 20% giá trị thẻ nạp -10/07</a>
	</div>
	</div>
	<br>
	<br>
	<div class="tintuc">
		<div class="anh">
			<img src="album/loi-ich-tuyet-voi-cua-am-nhac3_1446540233.jpg" width="100px" height="100">
		</div>
		<div class="anh1">
			<p>Bộ đôi NOKIA 2.1 &3 giá rẻ chính hãng ra mắt tại Việt Nam  </p>
			<b>Vừa Đăng</b>
		</div>
	</div>
	<br>
	<br>
	<div class="anh2">
		<img src="album/banner-quang-cao-du-khach-hang-hieu-qua-3.jpg" width="550" height="120px">
	</div>
	<br>
	<br>
	<div class="anh3">
		<h2>IPHONE 8-TRẢ GÓP 0%</h2>
		<h1>GIẢM NGAY 2 TRIỆU</h1>
	</div>
</div>
<br>
<br>
<div class="head4">
		<h1>SẢN PHẨM MỚI NHẤT </h1>
</div>
<hr>
<br>
<div class="than">
	<?php foreach ($newProducts as $row): ?>
	<div class="hinh1">
		<a href="thongtin.php?sp_id=<?=$row['id']?>&cate=<?=$row['cate_id']?>"><img src="<?=$siteUrl.$row['image'] ?>" width="200" height="230"></a>
		<center><a href="thongtin.php?sp_id=<?=$row['id']?>&cate=<?=$row['cate_id']?>"><h3><?=$row['product_name'] ?></h3></a>
		<b><?=$row['list_price']?>đ</b>
		<p><button>Mua</button> <a href="thongtin.php?sp_id=<?=$row['id']?>&cate=<?=$row['cate_id']?>"><button>Xem chi tiết</button></a></p>
		</center>
	</div>
	<?php endforeach ?>

</div>
<div class="thanh"></div>
<div class="head4">
	
		<h1>ĐIỆN THOẠI <i class="fas fa-mobile-alt"></i> </h1>
	
</div>
<div id="cuoi">
<?php foreach ($new as $row ):?>
	<div class="may1">
		<br>
		<a href="thongtin.php?sp_id=<?=$row['id']?>&cate=<?=$row['cate_id']?>"><img src="<?=$siteUrl.$row['image'] ?>" width="200" height="230" >
		<center><a href="thongtin.php?sp_id=<?=$row['id']?>&cate=<?=$row['cate_id']?>"><h3><?=$row['product_name'] ?></h3></a>
		<b><?=$row['list_price']?>đ</b>
		<p><button>Mua</button> <a href="thongtin.php?sp_id=<?=$row['id']?>&cate=<?=$row['cate_id']?>"><button>Xem chi tiết</button></a></p>
		</center>
	</div>
	<?php endforeach ?>
</div>

 </div>
 <div class="thanh"></div>
 <br>	
 <div class="than">
 	<h1>Sản phẩm bán chạy</h1>
 	<br>
	<?php foreach ($newviews as $row): ?>
	<div class="hinh1">
		<a href="thongtin.php?sp_id=<?=$row['id']?>&cate=<?=$row['cate_id']?>"><img src="<?=$siteUrl.$row['image'] ?>" width="200" height="230"></a>
		<center><a href="thongtin.php?sp_id=<?=$row['id']?>&cate=<?=$row['cate_id']?>"><h3><?=$row['product_name'] ?></h3></a>
		<b><?=$row['list_price']?>đ</b>
		<p><button>Mua</button> <a href="thongtin.php?sp_id=<?=$row['id']?>&cate=<?=$row['cate_id']?>"><button>Xem chi tiết</button></a></p>
		</center>
	</div>
	<?php endforeach ?>

</div>
 
 <div class="giua3" style="height: 300px">
		<div class="giua2">
 <h1>CÁC NHÀ TÀI TRỢ</h1>
 </div>
 	<?php foreach ($newbrands as $row): ?>
 	<div class="d1" >
 		<a href="#"><img src="<?=$siteUrl.$row['image'] ?>" width="400px" height="200"></a>
 	</div>
 	<?php endforeach ?>
 </div>

  <?php include'./_share/footer.php' ?>
  <style>

	.hinh1 p button{
	width: 100px;
	height: 40px;}
	.hinh1{
		margin-left:50px;
	}
	.hinh1 p button:hover{
			background: #D9F702;
	}
	.may1 p button{
		width: 100px;
		height: 40px;
		background: white;
	}
	.may1 p button:hover{
			background: #D9F702;
	}
	#cuoi{
		width: 100%;
		height: 800px;
	}
	.may1{
		height: 380px;
		margin-left: 50px;
		margin-top: 40px;
	}
	.slide-holder{
margin:0 auto;
height: 210px;
}
.may1{
	width: 20%;
	float: left;
	border:#000000 1px solid;
}
.slide-container { /*slide-container là khối bao mà slide-stage có thể "trượt" bên trong */
height: 150px;
width: 100%;
overflow: hidden;
position:relative;
}
.slide-stage{
position: absolute;
}
.slide-image { /*Độ rộng của .slide-image có thể được thay đổi theo nhu cầu, ảnh hưởng đến độ rộng chung của slideshow*/
float:left;
width:280px;
height:150px;
text-align: center;
}
.slide-image img{
width:100%;
margin:0 auto;
}
.slide-pager{
position:relative;
}
.slide-control-prev {
position: absolute;
text-align: center;
width: 25px;
height: 60px;
background: orange;
line-height: 60px;
color: #fff;
cursor: pointer;
top: 35px;
left: -30px;
}
.slide-control-next{
position: absolute;
text-align: center;
width: 25px;
height: 60px;
background: orange;
line-height: 60px;
color: #fff;
cursor: pointer;
right: -30px;
top: 35px;
}
.hinh1{
	width: 20%;
	height: 300px;
	float: left
}
.giua3{
	float: left;
}
#cuoi{
	width: 100%;
	height: 1000px;
}
.than{
	height:400px; 
}
	</style>

</body>
</html>
