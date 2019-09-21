<?php 
session_start();
$path="";
require_once '../commons/utils.php';
checkLog();
// dem ton so record trong bang danh muc
$sql = "select count(*) as total from " . TABLE_CATEGORY;
$stmt = $conn->prepare($sql);
$stmt->execute();
$countCate = $stmt->fetch();
// dem ton so record trong bang san pham
$sql = "select count(*) as total from " . TABLE_PRODUCT;
$stmt = $conn->prepare($sql);
$stmt->execute();
$countPro = $stmt->fetch();
// dem ton so record trong bang phan hoi
$sql = "select count(*) as total from " . TABLE_COMMENT;
$stmt = $conn->prepare($sql);
$stmt->execute();
$countComment = $stmt->fetch();

$sql="select count(*) as total from  users";
$stmt=$conn->prepare($sql);
$stmt->execute();
$countuser=$stmt->fetch();

$sql="select count(*) as total from ".TABLE_BRANDS;
$stmt=$conn->prepare($sql);
$stmt->execute();
$countbrand=$stmt->fetch();

$sql="select count(*) as total from ".TABLE_SLIDESHOW;
$stmt=$conn->prepare($sql);
$stmt->execute();
$countslide=$stmt->fetch();

$sql="select count(*) as total from contact";
$stmt=$conn->prepare($sql);
$stmt->execute();
$countcontact=$stmt->fetch();
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Quản trị</title>

  <?php include_once './_share/top_asset.php'; ?>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include_once './_share/header.php'; ?> 

  <?php include_once './_share/sidebar.php'; ?>  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $countCate['total']?></h3>

              <p>Tổng số danh mục</p>
            </div>
            <div class="icon">
              <i class="fa fa-list"></i>
            </div>
            <a href="<?= $adminUrl?>danh-muc" class="small-box-footer">Quản lý danh mục <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $countPro['total']?></h3>

              <p>Tổng số sản phẩm</p>
            </div>
            <div class="icon">
              <i class="fa fa-cubes"></i>
            </div>
            <a href="<?= $adminUrl?>sanpham" class="small-box-footer">Quản lý sản phẩm <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $countComment['total']?></h3>

              <p>Số lượng phản hồi sản phẩm</p>
            </div>
            <div class="icon">
              <i class="fa fa-mail-forward"></i>
            </div>
            <a href="<?= $adminUrl?>phan-hoi" class="small-box-footer">Danh sách phản hồi <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $countcontact['total']?></h3>

              <p>Tổng số khách hàng</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?=$adminUrl ?>contact" class="small-box-footer">tổng số khách hàng<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?=$countuser['total']?></h3>

              <p>Tổng số tài khoản</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?=$adminUrl?>tai-khoan" class="small-box-footer">Tổng số tài khoản<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-black">
            <div class="inner">
              <h3><?=$countbrand['total']?></h3>

              <p>Tổng số đối tác</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?=$adminUrl?>he-thong/brands.php" class="small-box-footer">Tổng số đối tác <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?=$countslide['total']?></h3>

              <p>Tổng số Banner</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?=$adminUrl?>he-thong/slinshow.php" class="small-box-footer">tổng số banner<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

    </section>
    <!-- /.content -->
    
  </div>
  <!-- /.content-wrapper -->


  <?php include_once './_share/sidebar.php'; ?>  
</div>
<!-- ./wrapper -->
<?php include_once './_share/bottom_asset.php'; ?>  
<?php include_once './_share/footer.php'; ?>  

</body>
</html>