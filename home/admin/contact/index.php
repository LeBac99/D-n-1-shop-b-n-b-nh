<?php
session_start();
// hien thi danh sach danh muc cua he thong
$path = "../";
require_once $path.$path."commons/utils.php";
// dem ton so record trong bang danh muc
checkLogin();
$sql = "select * from contact";
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
  <title>AdminLTE 2 | Dashboard</title>

  <?php include_once $path.'./_share/top_asset.php'; ?>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include_once $path.'./_share/header.php'; ?> 

  <?php include_once $path.'./_share/sidebar.php'; ?>  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=$adminUrl?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody>
                <tr>
                  <th style="width: 10px">#</th>
                  <th style="width: 120px">Name</th>
                  <th style="width: 20px">Email</th>
                  <th style="width: 300px">Phone Number</th>
                  <th style="width: 300px">address</th>
                  <th style="width: 120px;">
                     
                  </th>
                </tr>
                <?php foreach ($cates as $b): ?>
                <tr>
                  <td><?=$b['id']?></td>
                  <td><?=$b['Name']?></td>
                  <td><?=$b['email']?></td>
                  <td><?=$b['phone_number']?></td>
                  <td><?=$b['address']?></td>
                  <td>
                    
                     <a href="javascript:;"linkurl="<?= $adminUrl?>contact/remove.php?id=<?= $b['id']?>" class="btn btn-xs btn-danger btn-remove">
                          <i class="fa fa-trash"></i> Xoá
                        </a>
                  </td>
                </tr>
              <?php endforeach ?>
              </tbody>
            </table>
            </div>
            <!-- /.box-body -->
            
          </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include_once $path.'./_share/sidebar.php'; ?>  

</div>
<!-- ./wrapper -->
<?php include_once $path.'./_share/bottom_asset.php'; ?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 

<script type="text/javascript">
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