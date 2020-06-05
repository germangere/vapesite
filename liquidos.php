<?php
include 'functions.php';
include 'connection.php';
head();
nav();
$link=connection::link();
$result=$link->query('SELECT * FROM productos WHERE categoria="liquido" ORDER BY id DESC')->fetchAll(PDO::FETCH_OBJ);
echo "<div class='container mt-4'>
        <div class='row'>";
foreach ($result as $prod) {
  echo "<article class='col-6 col-md-4 col-lg-3 my-3 text-center'>
    <div class='card'>
      <img class='card-img-top h-100' src='images/productos/".$prod->imagen."'>
      <div class='card-body'>
        <h5 class='card-title'>".$prod->modelo."</h5>
        <p class='card-text'>".$prod->marca."<br><small>".$prod->tipo."</small></p>
        <hr>
        <p class='card-text'>$ ".$prod->precio."</p>
        <hr>
        <a href='#' class='btn btn-primary'>Ver producto</a>
      </div>
    </div>
  </article>";
}
echo "</div></div>";
foot();
?>