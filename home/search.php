<?php 
require_once './commons/utils.php';
// 1. Kiem tra xem id danh muc co thuc su ton tai khong
if($_SERVER['REQUEST_METHOD'] != 'GET'){
  header("location: $siteUrl" . "index.php");
  die;
}
$name = $_GET['search'];
$pageNumber = isset($_GET['page']) == true ? $_GET['page'] : 1;
$pageSize = 3;
$offset = ($pageNumber - 1) * $pageSize;
// 2. lay danh sach san pham thuoc danh muc
$sql = " select * FROM products WHERE product_name LIKE '%$name%' "; 
$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll();
$notf = "";
if (!$products) {
  $notf = "Không tìm thấy sản phẩm";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tìm kiếm sản phẩm</title>
 <link rel="stylesheet" type="text/css" href="styly.css">
</head>
<body>
    <?php 
    include './_share/header.php';
    ?>
<br>
<br>
<br>
<div class="container">
      <div class="tittle-cate">
			</div>
    <!-- /.row -->
    <h3>Tìm kiếm "<?= $name ?>"</h3>
    <br>
    <h4><?= $notf ?></h4>
    <div id="cuoi">
<?php foreach ($products as $row ):?>
  <div class="may1">
    <img src="<?=$siteUrl.$row['image'] ?>" width="200" height="230" >
    <center><h3><?=$row['product_name'] ?></h3>
    <b><?=$row['list_price']?></b>
    <p><button>Mua</button> <a href="thongtin.php?sp_id=<?=$row['id']?>&cate=<?=$row['cate_id']?>"><button>Xem chi tiết</button></a></p>
    </center>
  </div>
  <?php endforeach ?>
</div>

 </div>
    <!-- phan trang -->
    <!-- phan trang -->
</div>
<br>

  <!-- Footer -->
  <!-- Footer -->
<?php
include './_share/footer.php';
?>
<!-- Footer -->
<!-- Footer -->
<script type="text/javascript">
	 	var pageUrl = '<?= $siteUrl . "danhmuc.php?id=" . $id ?>';
	 	$('.paginate').pagination({
	        items: <?= $cate['total_product'] ?>,
	        currentPage: <?= $pageNumber ?>, 
	        itemsOnPage: <?= $pageSize ?>,
	        cssStyle: 'light-theme',
	        onPageClick: function(val){
	        	window.location.href = pageUrl+`&page=${val}`;
	        }
	    });
</script>



</body>
</html>