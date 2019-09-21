<?php 
session_start();
// hien thi danh sach danh muc cua he thong
$path = "../";
require_once $path.$path."commons/utils.php";
// dem ton so record trong bang danh muc
checkLogin();
$sql = "select *from ".TABLE_SLIDESHOW." ";
   
$stmt = $conn->prepare($sql);
$stmt->execute();
$cates = $stmt->fetchAll();
// dd($cates);
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
    width: 300px;
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
                    <th style="width: 10px">Id</th>
                   
                    <th style="width: 80px">Image</th>
                    <th style="width: 80px">Desc</th>
                     <th style="width: 80px">Url</th>
                      <th style="width: 240px">status</th>
                        <th style="width: 240px">order_number</th>
                    <th style="width: 135px;">
                      <a href="<?= $adminUrl?>he-thong/add-slinshow.php"
                        class="btn btn-xs btn-success"
                        >
                        <i class="fa fa-plus"></i> Thêm mới
                      </a>
                    </th>
                  </tr>
                  <?php foreach ($cates as $c): ?>
                    
                    <tr>
                      <td><?= $c['id']?></td>
                      <td><img src="<?=$siteUrl.$c['image']?>"></td>
                      <td>
                        <?=$c['desccription']?>
                      </td>
                      <td>
                        <?=$c['url']?>
                      </td>
                      <td>
                        <?=$c['status']?>
                      </td>
                      <td><?= $c['order_number']?></td>
                      <td>
                        <a href="<?= $adminUrl?>he-thong/edit-slinder.php?id=<?= $c['id']?>"
                        class="btn btn-xs btn-info"
                        >
                          <i class="fa fa-pencil"></i> Cập nhật
                        </a>
                        <!--linkurl lay o day tao hieu roi -->
                        <a href="javascript:;"
                          linkurl="<?= $adminUrl?>he-thong/remove-slider.php?id=<?= $c['id']?>"
                          class="btn btn-xs btn-danger btn-remove"
                        >
                          <i class="fa fa-trash"></i> Xoá
                        </a>
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

<script type="text/javascript">
  <?php 
  if(isset($_GET['success']) && $_GET['success'] == 'true'){
    ?>
    swal('Thêm danh mục thành công!');
  <?php
  }
   ?>
  $('.btn-remove').on('click', function(){
    var removeUrl = $(this).attr('linkurl');
    swal({
      title: "Cảnh báo",
      text: "Bạn có chắc chắn muốn xoá danh mục này không?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location.href = removeUrl;
      } 
    });
  });
</script>
</body>
</html>