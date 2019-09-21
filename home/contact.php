<?php 
session_start();
require_once'./commons/utils.php';
checkLogin();
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: ' . $adminUrl . 'lienhe.php');
	die;
}
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address= $_POST['address'];
$sql = "insert into contact
			(Name, 
			email, 
			phone_number,
			address
			)
		values 
			(:name,
			:email,
			:phone,
			:address)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":name", $name);
$stmt->bindParam(":email", $email);
$stmt->bindParam(":phone", $phone);
$stmt->bindParam(":address", $address);
$stmt->execute();

 ?>	
  <h1 style="color: green; text-align: center;"> Đã gửi thành công!^^</h1>

 <script type="text/javascript">
 	setTimeout(function(){
 		window.location.href = '<?= $siteUrl ?>lienhe.php';
 	}, 1000);
 </script>