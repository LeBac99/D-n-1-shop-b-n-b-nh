<?php 
session_start();
// hien thi danh sach danh muc cua he thong
$path = "../";
require_once $path.$path."commons/utils.php";
checkLogin();
$cateId = $_GET['id'];
$sql = "select * from users where id = $cateId";
$stmt = $conn-> prepare($sql);
$stmt->execute();
$cate = $stmt->fetch();

if(!$cate){
  header('location:'.$adminUrl .'tai-khoan');
}
// dem ton so record trong bang danh muc
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Tạo danh mục</title>

  <?php include_once $path.'_share/top_asset.php'; ?>

</head>
<style type="text/css">
    label.error {
        display: inline-block;
        color:red;
        width: 200px;}
</style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include_once $path.'_share/header.php'; ?> 

  <?php include_once $path.'_share/sidebar.php'; ?>  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Tạo danh mục</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= $adminUrl?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Danh mục</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <form action="<?=$adminUrl?>tai-khoan/save-edit.php" method="post" enctype="multipart/form-data" id="formDemo">
            <input type="hidden" name="id" value="<?=$cate['id']?>">
            <input type="hidden" name="image1" value="<?=$cate['avatar'] ?>">
            <div class="form-group">
              <label>ID</label>
              <input type="text" name="id" class="form-control" value="<?=$cate['id']?>">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" class="form-control" value="<?=$cate['email']?>">
            </div>
            <div class="form-group">
              <label>Fullname</label>
              <input type="text" name="fullname" class="form-control" value="<?=$cate['fullname']?>">
            </div>
            <div class="form-group">
              <label>Quyền hiện tại :</label>
              <input type="text" name="role" class="form-control" value="<?=$cate['role']?>">
               <label>Mời bạn sửa quyền</label>
               <select name="role"class="form-control" value="<?=$cate['role']?>">
                <?php foreach (USER_ROLES as $key => $value): ?>
                  <option value="<?= $value ?>"><?= $key ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="form-group">
              <label>Số điện thoại</label> 
              <input type="text" name="phone_number" class="form-control" value="<?=$cate['phone_number']?>">
            </div>
           <!--  Ảnh  -->
               <div class="col-md-6">
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                <img id="imageTarget" src="<?= $siteUrl.$cate['avatar'] ?>" class="img-responsive" >
              </div>
            </div>
            <div class="form-group">
              <label>Ảnh sản phẩm</label>
              <input type="file" id="product_image" name="image" class="form-control">
            </div>
          </div>
          <!-- end -->
            <div class="text-center">
              <a href="<?= $adminUrl?>tai-khoan" class="btn btn-danger btn-xs">Huỷ</a>
              <button type="submit" class="btn btn-primary btn-xs">Cập Nhật</button>
            </div>
          </form>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include_once $path.'_share/sidebar.php'; ?>  

</div>
<!-- ./wrapper -->
<?php include_once $path.'_share/bottom_asset.php'; ?> 
<script type="text/javascript">
  $(document).ready(function(){
    $('#editor').wysihtml5();
  });
  function getBase64(file, selector) {
     var reader = new FileReader();
     reader.readAsDataURL(file);
     reader.onload = function () {
      $(selector).attr('src', reader.result);
     };
     reader.onerror = function (error) {
       console.log('Error: ', error);
     };
  }
  var img = document.querySelector('#product_image');
  img.onchange = function(){
    var file = this.files[0];
    if(file == undefined){
      $('#imageTarget').attr('src', "<?=$siteUrl.$cate['avatar'] ?>");
    }else{
      getBase64(file, '#imageTarget');
    }
  }
</script> 
<script src="../../js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
        $("#formDemo").validate({
            rules: {
               id: "required",
                email:"required",
               fullname:"required",
               role:"required",
               phone_number:"required",
                
            },
            messages: {
                id: "Vui lòng nhập thông tin!",
                 email:"Vui lòng nhập thông tin",
                  fullname:"Vui lòng nhập thông tin",
                  role:"Vui lòng nhập thông tin",
                   phone_number:"Vui lòng nhập thông tin",
              }
        });
    });
      </script>
</body>
</html>