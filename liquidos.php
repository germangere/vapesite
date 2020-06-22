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
  echo "<a href='ver_producto.php?id=$prod->id' class='text-dark'>
          <article class='col-6 col-md-4 col-lg-3 my-3 text-center'>
            <div class='card'>
              <img class='card-img-top h-100' src='images/productos/$prod->imagen'>
              <div class='card-body'>
                <h5 class='card-title'>$prod->modelo</h5>
                <p class='card-text'>$prod->marca<br><small>$prod->tipo</small></p>
                <hr>
                <p class='card-text'>$$prod->precio</p>
                <hr>
                <a href='carrito.php?id=$prod->id' class='btn btn-info'><i class='fas fa-cart-arrow-down mr-2'></i>Agregar al carrito</a>
              </div>
            </div>
          </article>
        </a>";
}
echo "</div></div>";
foot();
?>