<?php 
session_start();
// hien thi danh sach danh muc cua he thong
$path = "../";
require_once $path.$path."commons/utils.php";
checkLogin();
$cateId = $_GET['id'];
$sql = "select * from " .TABLE_PRODUCT.  " where id = $cateId";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cate = $stmt->fetch();
if(!$cate){
  header('location: ' . $adminUrl . 'sanpham');
}
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
  img{
    width:350px;
    height: 300px;}
    label.error {
        display: inline-block;
        color:red;
        width: 200px;}
</style>

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
        <li class="active">Sản phẩm</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <form enctype="multipart/form-data" action="<?= $adminUrl?>/sanpham/save-edit.php" method="POST" id="formDemo">

          <input type="hidden" name="id" class="form-control" value="<?= $cate['id']?>">
          <input type="hidden" name="image1" value="<?=$cate['image'] ?>">
          <div class="col-md-6">
            <div class="form-group">

              <label>Tên sản phẩm</label>
              <input type="text" name="product_name" class="form-control" value="<?= $cate['product_name']?>">
            </div>
            <div class="form-group">
              <label>Danh mục</label>
              <input type="text"name="cate_id" class="form-control" value="<?= $cate['cate_id']?>">
            </div>
            <div class="form-group">
              <label>Giá bán</label>
              <input type="text" name="list_price" class="form-control" value="<?= $cate['list_price']?>">
            </div>
            <div class="form-group">
              <label>Giá khuyến mại</label>
              <input type="text" name="sell_price" class="form-control" value="<?= $cate['sell_price']?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                <img id="imageTarget" src="<?= $siteUrl.$cate['image'] ?>" class="img-responsive">
              </div>
            </div>
              
              <label>Ảnh sản phẩm</label>
              <input type="file" id="product_image" name="image" class="form-control">
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Mô tả</label>
              <input type="textarea"  rows="5" class="form-control" name="detail" value="<?= $cate['detail']?>">
            </div>
          </div>
           
          <div class="col-md-12 text-right">
            <a href="<?= $adminUrl?>sanpham/index.php" class="btn btn-xs btn-danger">Huỷ</a>
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
      $('#imageTarget').attr('src', "<?= $siteUrl.$cate['image'] ?>");
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
              product_name: "required",
               cate_id:"required",
              list_price:"required",
              sell_price:"required",
              
                 detail:"required",
            },
            messages: {
               product_name: "Vui lòng nhập thông tin!",
                cate_id:"Vui lòng nhập thông tin!",
                  list_price:"Vui lòng nhập thông tin!",
                 sell_price:"Vui lòng nhập thông tin!",
                    image:"Vui lòng nhập thông tin!",
              }
        });
    });
      </script>
</body>
</html>






