<?php 
session_start();
require_once'./commons/utils.php';
checkLogin();

$sql="select *from web_settings";
  $stmt=$conn->prepare($sql);
  $stmt->execute();
  $data= $stmt->fetch();
  $newBrands = "select * from brands ";
$stmt = $conn->prepare($newBrands);
$stmt->execute();
$newbrands = $stmt->fetchAll();
 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>lienhe</title>
<link rel="stylesheet" href="styly.css">
<script type="text/javascript" type="java.js"></script>
</head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

<body>


<div class="head">
<?php include'./_share/header.php' ?>
</div>
<div id="box">
<div class="lienhe">
	<br>
		<div class="map">
			<h1>Bản Đồ</h1>
			<?=$data['map']?>
		</div>
		<div class="giua">
			<img src="album/20150730065949-sieu-thi-the-gioi-di-dong.jpg" width="800" height="450">
		</div>

		<div class="dangky">
		
			<h1>
			Thông Tin
			</h1>
		 <form enctype="multipart/form-data" method="POST" action="<?=$siteUrl?>contact.php" id="formDemo">
		<table width="100%">	
			<tr>
				<td>Tên khách hàng</td>
			</tr>
			<tr>
				<td>
					 <input type="text" id="name" name="name" /><span id="a1"></span>
				</td>
			</tr>
			
			<tr>
				
			<tr>
				<td>Số Điện Thoại</td>
			</tr>
			<tr>
				<td>
				<input type="text" id="phone" name="phone"><span id="anh4"></span>
				</td>
			</tr>
			<tr>
				<td>Email</td>
			</tr>
			<tr>
				<td>
				<input type="text" id="email" name="email"><span id="anh1"></span>
				</td>
			</tr>
			<tr>
			<td>Địa chỉ</td>
			</tr>
			<tr>
				<td>
					<textarea type="password" id="mk" name="address"></textarea>
				</td>
			</tr>
			
			
			<tr>
				<td>
					<input type="submit" value="Đăng Ký" id="dk">
				</td>
				
			</tr>
		</table>
		</form>
		</div>
	</div>
	 </div>

			</div>

 <div class="giua2">
 <h1>CÁC NHÀ TÀI TRỢ</h1>
 </div>
 <div class="giua3">
 	<?php foreach ($newbrands as $row): ?>
 	<div class="d1">
 		<a href="#"><img src="<?=$siteUrl.$row['image'] ?>" width="400px" height="200"></a>
 	</div>
 	<?php endforeach ?>
 </div>
	<?php include './_share/footer.php' ?>
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
 
        //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
        $("#formDemo").validate({
            rules: {
               name: "required",
               	phone:{
               		required: true,
                    minlength:11,
               	},
               address: "required",
               	email:{
               		 required: true,
                     email: true
               	},
               
            },
            messages: {
                name: "Vui lòng nhập tên!",
                phone:{
                	required: "Vui lòng nhập số điện thoại",
                    minlength: "Vui lòng nhập đủ số",

                },
               address: "Vui lòng nhập địa chỉ",
         		email: "Vui lòng nhập email!",
         		 
            }
        });
    });
	</script>
	<style>
.map{
	width:35%;
	height: 400px;
	float: left;
	margin-left: 50px;
}
.dangky{
	width:50%;
	float:left;
	margin-left: 100px;
}
#b{
	width: 15px;
	height: 15px;
}
input{
	width: 400px;
	height: 30px;
}
#mk{
	width: 400px;
	height: 100px;
}

}.icon1 a{
		font-size: 29px;
		padding: 22px;
	}
#box{
	width: 100%;
	height: 510px;
}
#dk{
	width: 150px;
	height: 40px;
	background: gold;

}
.giua2{
	width: 100%;
	height: 60px;
	float: left;
}	
    label.error {
        display: inline-block;
        color:red;
        width: 200px;
    }
</style>
</body>
</html>
