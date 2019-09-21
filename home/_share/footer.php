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
</head>
<link rel="stylesheet" type="text/css" href="../styly.css">
<body>

<div id="chua">
     <img src="<?=$siteUrl.$data['logo'] ?>" width="200" height="150">
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
   <p>Email: <?=$data['email'] ?></p>
   <p>Số điện thoại: <?=$data['hotline'] ?><br>
   113.114.115</p>
   </form>
   </div>
 </body>
</html>