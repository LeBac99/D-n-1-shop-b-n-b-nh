<?php 
require_once '../commons/utils.php';
$sqlSlides = "select * from brands 
        where url = 1 
         order by order_number";
$stmt = $conn->prepare($sqlSlides);
$stmt->execute();
$dataSlides = $stmt->fetchAll();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
<style>
.mySlides {display:none;}
</style>
</head>

<body>



<div class="w3-content w3-section " style="max-width:500px" >
	 <?php 
        for($i = 0; $i < count($dataSlides); $i++){
          $act = $i == 0 ? "active" : "";
        ?>          
          <li data-target="#myCarousel" data-slide-to="<?=$i?>" class="<?= $act?>"></li>
        <?php } ?>
         <?php 
          $count = 0;
         ?>
         <?php foreach ($dataSlides as $slide): ?>
          <?php
            $active = $count === 0 ? "active" : "";
          ?>
  <img class="mySlides <?= $active ?>" src="<?=$siteUrl . $slide['image']?>" style="width:100%">
</div>
  <?php 
            $count++;
           ?>
        <?php endforeach ?>
<script>
	var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>

</body>
</html>