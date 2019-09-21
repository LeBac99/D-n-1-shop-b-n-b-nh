<?php 
session_start();
// hien thi danh sach danh muc cua he thong
$path = "../";
require_once $path.$path."commons/utils.php";
checkLogin();
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Quản lý Tài khoản</title>

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
        <small>Quản lý tài khoản</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= $adminUrl?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tài khoản</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <form id="formDemo" action="<?= $adminUrl?>/tai-khoan/save-add.php" method="post" enctype="multipart/form-data" >
          <div class="col-md-6">
            <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Tên đầy đủ</label>
              <input type="text" name="fullname" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Mật khẩu</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Xác nhận mật khẩu</label>
              <input type="password" name="cfPassword" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Quyền</label>
              <select name="role" class="form-control">
                <?php foreach (USER_ROLES as $key => $value): ?>
                  <option value="<?= $value ?>"><?= $key ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <!--  Ảnh  -->
               <div class="col-md-6">
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                <img id="imageTarget" src="<?= $siteUrl ?>img/default-picture.png" class="img-responsive" >
              </div>
            </div>
            <div class="form-group">
              <label>Ảnh sản phẩm</label>
              <input type="file" id="product_image" name="image" class="form-control">
            </div>
          </div>
          <!-- end -->
            <div class="col-md-12 text-right">
              <a href="<?= $adminUrl?>tai-khoan" class="btn btn-xs btn-danger">Huỷ</a>
              <button type="submit" class="btn btn-xs btn-primary">Lưu</button>
            </div>
          </div>
        </form>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <?php include_once $path.'_share/footer.php'; ?>  
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
      $('#imageTarget').attr('src', "<?= $siteUrl ?>img/default-picture.png");
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
                email:{ required:true,
                        email:true,
                      },
               fullname:"required",
                password:"required",
                image:"required",
            },
            messages: {
               email: "Vui lòng nhập email!",
                 fullname:"Vui lòng nhập tên",
                   password:"Vui lòng nhập mật khẩu",
                    image:"Vui lòng nhập ảnh",
              }
        });
    });
      </script>
</body>
</html>