<?php 
require_once './commons/utils.php';
$sqlSlides = "select * from " . TABLE_SLIDESHOW . "
        where status = 1 
         order by order_number";
$stmt = $conn->prepare($sqlSlides);
$stmt->execute();
$dataSlides = $stmt->fetchAll();
 ?>
<!DOCTYPE html>
<html>

<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="../styly.css">

</head>
<script type="text/javascript" src="../java.js"></script>
<body>
 
  <style type="text/css">
    * {
            box-sizing:border-box
          }
         
          /* Slideshow container */
          
  </style>
  <ol class="carousel-indicators">
        <?php 
        for($i = 0; $i < count($dataSlides); $i++){
          $act = $i == 0 ? "active" : "";
        ?>          
          <li data-target="#myCarousel" data-slide-to="<?=$i?>" class="<?= $act?>"></li>
        <?php } ?>
      </ol>
<div class="slideshow-container">
  
       <?php 
          $count = 0;
         ?>
         <?php foreach ($dataSlides as $slide): ?>
          <?php
            $active = $count === 0 ? "active" : "";
          ?>
        <div class="mySlides fade <?= $active ?>">

          <img src="<?= $siteUrl . $slide['image']?>" style="width:100%" height="400">
        </div>
    <?php 
            $count++;
           ?>
        <?php endforeach ?>
       
      </div>
      <div style="text-align:center">
        <span class="dot" onclick="currentSlide(0)"></span> 
        <span class="dot" onclick="currentSlide(1)"></span> 
        <span class="dot" onclick="currentSlide(2)"></span> 
        <span class="dot" onclick="currentSlide(3)"></span> 
        <span class="dot" onclick="currentSlide(4)"></span> 
        <span class="dot" onclick="currentSlide(5)"></span> 
        <span class="dot" onclick="currentSlide(6)"></span>
        <span class="dot" onclick="currentSlide(7)"></span>  
      </div>
</body>

</html>