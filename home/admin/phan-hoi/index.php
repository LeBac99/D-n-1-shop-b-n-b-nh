<?php 
session_start();
// hien thi danh sach danh muc cua he thong
$path = "../";
require_once $path.$path."commons/utils.php";
// dem ton so record trong bang danh muc
checkLogin();

    $sql = "select 
    p.*,c.product_name
    from  " . TABLE_PRODUCT . " c 
    join " . TABLE_COMMENT . " p
    on c.id = p.product_id 
    group by p.id";
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
                    <th>Tên sản phẩm</th>
                    <th style="width: 80px">Email</th>
                    <th style="width: 240px">Content</th>
                    
                    <th style="width: 135px;">
                      <a href=""
                        class="btn btn-xs btn-success"
                        >
                        
                      </a>
                    </th>
                  </tr>
                  <?php foreach ($cates as $c): ?>
                    
                    <tr>
                      <td><?= $c['id']?></td>
                      <td><?= $c['product_name']?></td>
                      <td>
                        <?= $c['email']?>
                      </td>
                      <td><?= $c['content']?></td>
                      <td>
                        <!--linkurl lay o day tao hieu roi -->
                        <a href="javascript:;"
                          linkurl="<?= $adminUrl?>phan-hoi/remove.php?id=<?= $c['id']?>"
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