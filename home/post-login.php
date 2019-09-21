<?php 
session_start();
require_once './commons/utils.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
 header('location: '. $siteUrl . 'login.php');
 die;
}
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "select * 
		from users
		where email = '$email'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$user = $stmt->fetch();
if(!$user){
	header('location: '. $siteUrl . 'login.php?msg=Sai email không tồn tại!');
	die;
}
if(!password_verify($password, $user['password'])){
	header('location: '. $siteUrl . 'login.php?msg=Sai mật khẩu');
	die;
}
// $_SESSION['login'] = null;
$_SESSION['login'] = $user;
 ?>	

 <h3 style="color: green">Xin chúc mừng bạn ! Đăng nhập thành công!^^</h3>

 <script type="text/javascript">
 	setTimeout(function(){
 		window.location.href = '<?= $adminUrl ?>';
 	}, 1000);
 </script>