<?php 
session_start();
require_once '../../commons/utils.php';
checkLogin(USER_ROLES['admin']);

if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: ' . $adminUrl . 'tai-khoan');
	die;
$email1=$_get['email'];
}
$email = $_POST['email'];
$fullname = $_POST['fullname'];
$password = $_POST['password'];
$role = $_POST['role'];
$img = $_FILES['image'];
$ext = pathinfo($img['name'], PATHINFO_EXTENSION);
$filename = 'album/avatar/'.uniqid() . '.' . $ext;
move_uploaded_file($img['tmp_name'], '../../'.$filename);

	 $conn = mysqli_connect('localhost', 'root', '', 'home') or die ('Lỗi kết nối');
    mysqli_set_charset($conn, "utf8");
    mysqli_set_charset($conn, "utf8");

 $sql1 = "SELECT * FROM users WHERE fullname = '$fullname' OR email = '$email'";
  $result = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($result) > 0)
    {
        // Sử dụng javascript để thông báo
        echo '<script language="javascript">alert("Bạn không được đăng nhập trùng mật khẩu $ Name"); window.location="add.php";</script>';	 
        // Dừng chương trình
        die ();
    }else{
// mật khẩu có nằm trong khoảng từ 6-20 ký tự không
$password = password_hash($password, PASSWORD_DEFAULT);
 $sql = "INSERT INTO users (email, fullname,password,role,avatar) VALUES ('$email','$fullname','$password','$role', '$filename')";
   
        if (mysqli_query($conn, $sql)){
            echo '<script language="javascript">alert("Đăng ký thành công"); window.location="index.php";</script>';
        }
        else {
            echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="add.php";</script>';
        }
        }
 ?>
 