  <?php 
session_start();
// hien thi danh sach danh muc cua he thong
$path = "../";
require_once $path.$path."commons/utils.php";
checkLogin();

$sql = "select * from " .TABLE_WEB.  " ";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cate = $stmt->fetch();
if(!$cate){
  header('location: ' . $adminUrl . 'lien-he');
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
    height: 300px;
  }
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
        <form enctype="multipart/form-data" action="<?= $adminUrl?>/lien-he/save-edit.php" method="POST" id="formDemo" >
          <input type="hidden" name="image1" value="<?=$cate['logo']?>">
          <div class="col-md-6">
            <div class="form-group">

              <label>Hotline</label>
              <input type="text" name="hotline" class="form-control" value="<?= $cate['hotline']?>">
            </div>
            <div class="form-group">
              <label>map</label>
              <textarea  name="map" class="form-control">
                <?= $cate['map']?>
              </textarea>
            </div>
            <div class="form-group">
              <label>email</label>
              <input type="text" name="email" class="form-control" value="<?= $cate['email']?>">
            </div>
            <div class="form-group">
              <label>Facebook</label>
              <input type="text" name="fb" class="form-control" value="<?= $cate['fb']?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                 <label>Logo</label>
                <img id="imageTarget" src="<?=$siteUrl.$cate['logo']?>?img/default-picture.png" class="img-responsive" >
              </div>
            </div>
              <input type="file" id="product_image" name="image" class="form-control">
            
          </div>
        
           
          <div class="col-md-12 text-right">
            <a href="<?= $adminUrl?>lien-he/" class="btn btn-xs btn-danger">Huỷ</a>
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
               hotline: "required",
               map:"required",
                email:"required",
               
                fb:"required",
            },
            messages: {
               hotline: "Vui lòng nhập thông tin!",
                 map:"Vui lòng nhập thông tin",
                   email:"Vui lòng nhập thông tin",
                  
                    fb:"Vui lòng nhập thông tin",
              }
        });
    });
      </script>
</body>
</html>






