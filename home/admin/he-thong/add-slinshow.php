<?php 
session_start();
// hien thi danh sach danh muc cua he thong
$path = "../";
require_once $path.$path."commons/utils.php";
// dem ton so record trong bang danh muc
checkLogin();
$sql = "select 
           c.*
    from  ". TABLE_SLIDESHOW ." c";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cates = $stmt->fetchAll();
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Quản lý sản phẩm</title>

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
        <small>Quản lý sản phẩm</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= $adminUrl?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Liên kết</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <form enctype="multipart/form-data" action="<?= $adminUrl?>/he-thong/save-slinder.php" method="post" id="formDemo">
          <div class="col-md-6">
            <div class="form-group">
              <label>desccription</label>
              <input type="text" name="desccription" class="form-control">
            </div>
          </div>

            <div class="col-md-6">
            <div class="form-group">
              <label>Url</label>
              <input type="text" name="url" class="form-control">
            </div>
          </div>
             <div class="col-md-6">
            <div class="form-group">
              <label>order_number</label>
              <input type="text" name="order_number" class="form-control">
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                <img id="imageTarget" src="<?= $siteUrl ?>img/default-picture.png" class="img-responsive" >
              </div>
            </div>
          </div>
            <div class="form-group">
              <label>Ảnh</label>
              <input type="file" id="product_image" name="image" class="form-control">
            </div>

          <div class="col-md-12 text-right">
            <a href="<?= $adminUrl?>he-thong/slinshow.php" class="btn btn-xs btn-danger">Huỷ</a>
            <button type="submit" class="btn btn-xs btn-primary">Lưu</button>
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
              url: "required",
              desccription:"required",
               order_number:"required",
                image:"required",
                
            },
            messages: {
              url: "Vui lòng nhập thông tin!",
                desccription:"Vui lòng nhập thông tin",
                   order_number:"Vui lòng nhập thông tin",
                    fb:"Vui lòng nhập thông tin",
              }
        });
    });
      </script>
</body>
</html>