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
  echo "   <article class='col-6 col-md-4 col-lg-3 my-3 text-center'>
            <div class='card'>";
  if (isset($_SESSION['rol']) and $_SESSION['rol'] > 0){
    echo "<div class='text-right'>
            <a href='editar_producto.php?id=$prod->id'><i class='bg-info text-white fas fa-cog p-2'></i></a>
          </div>";
  }
  echo "            
              <a href='ver_producto.php?id=$prod->id' class='text-dark' style='text-decoration:none'>
              <img class='card-img-top h-100' src='images/productos/$prod->imagen'>
              <div class='card-body'>
                <h5 class='card-title'>$prod->modelo</h5>
                <p class='card-text'>$prod->marca<br><small>$prod->tipo</small></p>
                <hr>
                <p class='card-text'>$$prod->precio</p></a>
                <hr>
                <a href='carrito.php?id=$prod->id&st=$prod->stock' class='btn btn-info";
                if ($prod->stock == '0') { print " disabled"; };
        echo "'><i class='fas fa-cart-arrow-down mr-2'></i>Agregar al carrito</a>";
  if ($prod->stock == '0') {
    echo "<br><small class='text-danger'>Sin stock</small>";
  } else {
    echo "<br><small class='text-black-50'>Disponibles: $prod->stock</small>";
  }
  echo "</div>
        </div>
        </article>";
}
echo "</div></div>";
foot();
?>