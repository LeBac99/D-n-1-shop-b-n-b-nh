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
						limit 3";
$stmt = $conn->prepare($newProductsQuery);
$stmt->execute();
$newProducts = $stmt->fetchAll();

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>HTML5</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" href="styly.css">
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
		<script language="javascript" src="js/jquery-1.9.1.min.js"></script>
		<script language="javascript" src="js/custom.js"></script>
</head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

<body>
<section class="container">
<div class="head">
<?php include './_share/header.php' ?>
	</div>
	<div class="baner">
		<img src="album/1_3.jpg">
	</div>
	<h1>Giới Thiệu<i class="fas fa-mobile-alt"></i></h1>
	
	<main style="height:400px">
		<p>
			1. Quá trình hình thành:Công ty TNHH Thế Giới Di Động (Mobile World Co. Ltd) thành lập vào tháng 03/2004 bởi 5 thành viên đồng sáng lập là Trần Lê Quân, Nguyễn Đức Tài, Đinh Anh Huân, Điêu Chính Hải Triều và Trần Huy Thanh Tùng, lĩnh vực hoạt động chính của công ty bao gồm: mua bán sửa chữa các thiết bị liên quan đến điện thoại di động, thiết bị kỹ thuật số và các lĩnh vực liên quan đến thương mại điện tử.Bằng trải nghiệm về thị trường điện thoại di động từ đầu những năm 1990, cùng với việc nghiên cứu kỹ tập quán mua hàng của khách hàng Việt Nam, thegioididong.com đã xây dựng một phương thức kinh doanh chưa từng có ở Việt Nam trước đây. Công ty đã xây dựng được một phong cách tư vấn bán hàng đặc biệt nhờ vào một đội ngũ nhân viên chuyên nghiệp và trang web www.thegioididong.com hỗ trợ như là một cẩm nang về điện thoại di động và một kênh thương mại điện tử hàng đầu tại Việt Nam.Hiện nay, số lượng điện thoại bán ra trung bình tại thegioididong.com khoảng 300.000 máy/tháng chiếm khoảng 15% thị phần điện thoại chính hãng cả nước. Trung bình một tháng bán ra hơn 10.000 laptop trở thành Nhà bán lẻ bán ra số lượng laptop lớn nhất cả nước.Việc bán hàng qua mạng và giao hàng tận nhà trên phạm vi toàn quốc đã được triển khai từ đầu năm 2007, hiện nay lượng khách hàng mua laptop thông qua website www.thegioididong.com và tổng đài 1900.561.292 đã tăng lên đáng kể, trung bình 5.000 - 6.000 đơn hàng mỗi tháng. Đây là một kênh bán hàng tiềm năng và là một công cụ hữu hiệu giúp các khách hàng ở những khu vực xa mua được một sản phẩm ưng ý khi không có điều kiện xem trực tiếp sản phẩm.www.thegioididong.com là website thương mại điện tử lớn nhất Việt Nam với số lượng truy cập hơn 1.200.000 lượt ngày, cung cấp thông tin chi tiết về giá cả, tính năng kĩ thuật của hơn 500 model điện thoại và 200 model laptop của tất cả các nhãn hiệu chính thức tại Việt Nam.Thegioididong.com đã nhận được nhiều giải thưởng do người tiêu dùng cũng như các đối tác bình chọn trong nhiều năm liền. Một số giải thưởng tiêu biểu.
		
		</p>
		
	</main>		
<div class="slide-holder">
	<h1>Các mặt hàng liên quan</h1>
			<div class="slide-pager">
				<div class="slide-control-prev">«</div>
				<div class="slide-control-next">»</div>
			</div>
			<div class="slide-container">
				<div class="slide-stage">

					<div class="slide-image"><img src="album/cach-doi-hinh-nen-may-tinh-13.jpg" height="200px" /></div>
					<div class="slide-image"><img src="album/Canadiens_Coreset_FrontRight_MineralSilver_win10.jpg" height="200px" /></div>
					<div class="slide-image"><img src="album/t5SfT.jpg" height="200px" /></div>
					<div class="slide-image"><img src="album/J 7 (1).jpg" height="200px" /></div>
				</div>
			</div>
		</div>
	<?php include'_share/footer.php' ?>
</section>
<style type="text/css">
.baner{
	padding: 20px 75px;
}
h1{
	font-size: 30px;
	padding: 10px 10px;
	color: red;

}
main p{
	color:white;
	line-height: 30px;
	padding: 0px 0px;
	margin-left: 5px;
	}
.slide-holder{
margin:0 auto;
height: 210px;
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
article {
	width: 32%;
	height: 480px;
	border: 1px solid yellow;
	position: relative;
	float: left;
	margin-left: 10px;
	margin-top: 10px;
	overflow: hidden;
	background: white;
}
.sp button{
	width: 150px;
	height: 70px;
	background: gold;
	color: white;
	font-size: 28px;	
}
.imgbox img{
	height: 400px;
	width: 200px;
	padding: 10px 0px;
}
</style>
</body>

</html>