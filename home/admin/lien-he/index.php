<?php 
session_start();
// hien thi danh sach danh muc cua he thong
$path = "../";
require_once $path.$path."commons/utils.php";
// dem ton so record trong bang danh muc
checkLogin();
$sql = "select *
      from ".TABLE_WEB." decs";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cates = $stmt->fetchAll();
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Quản lý danh mục</title>

  <?php include_once $path.'_share/top_asset.php'; ?>

</head>
<style type="text/css">
  td img{
    width: 100px;
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
        <small>Quản lý danh mục</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= $adminUrl?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Danh mục</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
              <div class="box-body">
                <table class="table table-bordered">
                  <tbody>
                  <tr>
                 
                    <th>Logo</th>
                    <th style="width: 80px">Hotline</th>
                    <th style="width: 240px">map</th>
                    <th style="width: 240px">email</th>
                     <th style="width: 240px">Facebook</th>
                    <th style="width: 135px;">
                     
                    </th>
                  </tr>
                  <?php foreach ($cates as $c): ?>
                    
                    <tr>
                    
                      <td><img src="<?=$siteUrl.$c['logo']?>"></td>
                      <td>
                        <?= $c['hotline']?>
                      </td>
                      <td><?= $c['map']?></td>
                       <td><?= $c['email']?></td>
                        <td><?= $c['fb']?></td>
                      <td>
                        <a href="<?= $adminUrl?>lien-he/edit.php"
                        class="btn btn-xs btn-info"
                        >
                          <i class="fa fa-pencil"></i> Cập nhật
                        </a>
                        <!--linkurl lay o day tao hieu roi -->
                      
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                </table>
              </div>
              <!-- /.box-body -->
              <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                  <li><a href="#">«</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">»</a></li>
                </ul>
              </div>
          </div>
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



 
</body>
</html>