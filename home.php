<?php
include 'functions.php';
head();
nav();
?>
<div id="carousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/fotocar1.jpg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="images/fotocar2.jpg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="images/fotocar3.jpg" class="d-block w-100">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php
foot();
?>