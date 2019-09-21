<?php 
session_start();
require_once'./commons/utils.php';
checkLogin();
$ma_id=$_GET['sp_id'];
$macate=$_GET['cate'];
$sql="select *from web_settings";
  $stmt=$conn->prepare($sql);
  $stmt->execute();
  $setting= $stmt->fetch();
 $newProductsQuery = "select 
    p.*,c.name
    from  ". TABLE_CATEGORY ." c
    join ". TABLE_PRODUCT ." p
    on c.id = p.cate_id where p.id=$ma_id
    group by p.id";
$newProductsQuery = "select * 
						from ".TABLE_PRODUCT." 
						where id='$ma_id'";						
$stmt = $conn->prepare($newProductsQuery);
$stmt->execute();
$data = $stmt->fetchAll();

$newProductsQuery = "select * from products where cate_id ='$macate' limit 4";						
$stmt = $conn->prepare($newProductsQuery);
$stmt->execute();
$datacate = $stmt->fetchAll();

$commentSql = "select * from ".TABLE_COMMENT."
				 where product_id= $ma_id order by id desc";
$stmt = $conn->prepare($commentSql);
$stmt->execute();
$comments = $stmt->fetchAll();



 ?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sam Sung</title>
<link rel="stylesheet" href="thongtin.css">

</head>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

<body>
	<div class="head">
		<div class="logo">
			<div class="logo1">
				<a href="index.php"><img src="<?=$siteUrl.$setting['logo']?>" height="80" width="200"></a>
			</div>
			<div class="timkiem">
				<input type="text" placeholder="Tìm Kiếm...." id="c">
				<button>Tìm Kiếm</button>
			</div>
		</div>
		<div class="icon1">
		
		<br>
			<a href="index.php">Điện Thoại</a>
			<a href="gioithieu.php">Giới thiệu</a>
			<a href="lienhe.php">Liên Hệ</a>

		</div>
		<div class="icon2">
			<i class="fas fa-ambulance" style=" font-size: 70px"></i>+
		</div>
	</div>
<div class="head1">
	<div class="thanh">
		<a href="index.php">Trang Chủ</a>>
		<a href="gioithieu.php">Điện Thoại </a>>
		<a href="#">Sam Sung</a>
	</div>
	<?php foreach ($data as $row): ?>
		
	<div class="thanh1">
		<h1><?=$row['product_name'] ?> <a href="#"></a><img src="album/Star_Emoji.png" width="30" height="30">
		<img src="album/Star_Emoji.png" width="30" height="30">
		<img src="album/Star_Emoji.png" width="30" height="30">
		<img src="album/Star_Emoji.png" width="30" height="30">
			<img src="album/Star_Emoji.png" width="30" height="30"> <b style="color: blue">1000 Đánh Giá</b></h1>
	</div>
	<div class="thanh2"><a href="#"><i class="fa fa-phone-square" aria-hidden="true" style="font-size: 40px"></i></a>
	<a href="#"><i class="fa fa-id-card" aria-hidden="true" style="font-size: 40px"></i></a></div>

	</div>
	<hr>
	<div class="head12">
		<div class="anh">
			<img src="<?=$siteUrl.$row['image'] ?>" width="460" height="500">
		</div>
		<div class="anh1">
			<div class="gia">
				<p><?=$row['list_price']?>đ<b style="background: #F7800B">Trả góp 0%</b></p>
				
			</div>
			<div class="anh2">
				<p><b><i class="fa fa-motorcycle" aria-hidden="true" style="font-size: 30px"></i>NHẬN HÀNG TRONG 1 GIỜ</b></p>
			</div>
			<div class="anh3">
				<h2>Khuyến Mại</h2>
				<p><b>V</b><?=$row['sell_price'] ?><a href="#">Xem chi tiết</a> </p>
				<p><b>V</b> Gói quà tặng Galaxy xem phim & uống cafe cuối tuần <a href="#">Xem chi tiết</a> </p>
				<p><b>V</b> ĐỘC QUYỀN: thu cũ đổi mới trợ <br>giá 500.000đ Xem chi tiết <a href="#">Xem chi tiết</a> </p>
				<p><b>V</b> ĐỘC QUYỀN: 90 ngày lỗi đổi mới <a href="#">Xem chi tiết</a> </p>
			</div>
			<div class="anh6">
				<button>Mua</button>
					
			</div>
		</div>
		<div class="anh4">
			<div class="ngoai">
				<a href="#"><i class="fa fa-street-view" aria-hidden="true"></i>
				 Kiểm tra hàng có ở nơi bạn ở không
</a>
			</div>
			<div class="ngoai1">
				<p><i class="fa fa-shopping-basket" aria-hidden="true"></i>
					Trong hộp có <a href="#">Pin ,Sạc Tai Nghe, Sách Hướng Dẫn</a></p>
					<hr>
					<p><i class="fa fa-sitemap" aria-hidden="true"></i>
					
					Bảo hành chính hãng 12 tháng <a href="#">Xem chi tiết</a></p>
					<hr>
					<p><i class="fa fa-registered" aria-hidden="true"></i>	
					Một đổi một nếu trong một tháng nếu lỗi <a href="#">Xem chi tiết</a></p>
				</div>
				<br>
				<div class="ngoai2">
						<h2>Ưu đãi thêm</h2>
				<p><b>V</b> Mua kèm pin sạc dự phòng, thẻ nhớ 16GB giảm 20%<a href="#">Xem chi tiết</a> </p>
				<p><b>V</b> <?=$row['sell_price'] ?> <a href="#">Xem chi tiết</a> </p>
				
				</div>
				<br>
				<div class="ngoai3">
					<div class="a"><img src="album/kinh-cuong-luc-samsung-galaxy-j7-pro-4d-full-man-hinh_vien-den_bengovn.jpg" width="100" height="100"></div>
					<div class="a1"><p>Ốp lưng <b>Samsung Galaxy J7</b> giảm sốc đến 30%. <a href="#">Mua ngay.</a></p></div>
				</div>
		</div>
		<br>
		<div class="anh5">
		<div class="bac">
			<h2>Đặc Điểm Nổi Bật Của Sam Sung GalaxyJ7</h2>
			<img src="<?=$siteUrl.$row['image'] ?>" width="500" height="500">
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<p>
				<h3></h3>
				<h1><?=$row['product_name'] ?></h1>
			
			</p>
		</div>
		<div class="bac1">
			<h3>Thông Số Kĩ Thuật</h3>
			<hr>
			<p>Màn hình:<a href="#"> Super AMOLED</a> , 5.6", HD+</p>
			<hr>
			<p>Hệ điều hành:<a href="#"> Android 8.1(Oreo)</a></p>
			<hr>
			<p>Camera sau:	13 MP</p>
			<hr>
			<p>
				Camera trước:	8 MP
			</p>
			<hr>
			<p>CPU:<a href="#">	Exynos 7870 8 nhân 64-bit</a></p>
			<hr>
			<p>RAM:	3 GB</p>
			<hr>
			<p>Chi Tiết : <?=$row['detail'] ?>
			</p>
		</div>
		</div>
		<div class="sanphamlp">
			<h1>Sản phẩm liên quan </h1>
			<br>
		<?php foreach ($datacate as $abc): ?>
		<div class="hinh1">
		<img src="<?=$siteUrl.$abc['image'] ?>" width="200" height="230">
		<center><a href="thongtin.php?sp_id=<?=$abc['id']?>&cate=<?=$row['cate_id']?>"><h3><?=$abc['product_name']?></h3></a>
		<b style="color: red"><?=$abc['list_price']?>đ</b>

		<p><button>Mua</button> <a href="thongtin.php?sp_id=<?=$abc['id']?>&cate=<?=$row['cate_id']?>"><button>Xem chi tiết</button></a></p>
		</center>
	</div>
	<?php endforeach ?>
</div>

		</div>
		<div id="comment">
				<div class="cm">
					<h1>Phản hồi</h1>
					<form action="submit_comment.php" method="post" id="formDemo">
						<input type="hidden" name="id" value="<?=$ma_id?>">
						<div class="form-group">
							<label>Email</label><br>
							 <input name="email" type="text" placeholder="Vui lòng nhập Email" required>
						</div>
						<div class="form-group">
							<label>Nội dung</label><br>
							<textarea class="form-control" rows="5" name="content" placeholder="Vui long nhap thong tin" required></textarea>
						</div>
						<div class="text-center">
							<br>
							<button type="submit" class="btn btn-sm btn-primary">Gửi phản hồi</button>
						</div>
					</form>
				</div>
    </div>

		</div>

		<div class="col">
			<h1>Phản Hồi</h1>
				<?php foreach ($comments as $c): ?>
					<div>

						<b>Email: <?= $c['email']?></b>
						<br>
						<br>
						<p>Coment: <?= $c['content']?></p>	
						<hr>
					</div>
				<?php endforeach ?>
				<?php 
        ?>
        </div>
</div>
</div>
        <div>

                <?php 
            // PHẦN HIỂN THỊ TIN TỨC
            ?>
        </div>

        <div class="pagination">

           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
           ?>
        </div>
    </div>
		<?php endforeach ?>
		<?php include'./_share/footer.php' ?>
		</body>
		<script type="text/javascript">
		$(document).ready(function() {
        //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
        $("#formDemo").validate({
            rules: {
                noidung: "required",
                email:{ required:true,
                	email:true},
            },
            messages: {
                email: "Vui lòng nhập email!",
                
                content: "Vui lòng nhập nội dung!",
              }
        });
    });
			</script>
<style type="text/css">
.col{
width:48%;
height: 300px;
float: left;

border:1px #999999 solid;
padding: 5px 5px 5px 5px;/* canh chinh noi dung va le the div*/
overflow:auto; /* thuoc tinh nay lam xuat hien thanh cuon*/
}
</style>
<style>
#comment{
	width: 50%;
	height: 400px;
	float: left;

}
.cm{
	margin-left: 100px;
}
#comment input{
	width: 400px;
	height: 40px;
}
textarea{
	width:400px;
	height:100px;
}
.text-center button{
	width: 100px;
	height: 40px;
	background:red;

	}


		.anh4{
	width: 389px;
	height: 500px;
	
	float: left;
}
.anh5{
	height: 700px;
}
label.error {
        display: inline-block;
        color:red;
        width: 200px;
  }
 .sanphamlp{
	width: 100%;
	height: 450px;
	border-bottom-color: brown;
	float: left;
}
.hinh1{
	width: 20%;
	height: 300px;
	float: left;
	margin-left: 60px;
}
.hinh1 img{
	margin-left: 30px;
}
.hinh1 p button{
	width: 100px;
	height: 40px;}
	.hinh1{
		margin-left:50px;
	}
		.hinh1 p button:hover{
			background: #D9F702;
	}
</style>
</html>
