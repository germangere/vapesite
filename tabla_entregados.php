<?php
include 'functions.php';
include 'connection.php';

if (!isset($_SESSION['rol'])){
  header('location:home.php');
}else if ($_SESSION['rol']==1){
  head();
  nav();

  if (isset($_GET["pag"])){
    $pag = (int) $_GET["pag"];
  }else{
    $pag = 1;
  }

  echo "<h2 class='my-4 text-center'>Ventas concretadas</h2>";
  $link = connection::link();
  $sql = "SELECT usuarios.nombre, usuarios.apellido, productos.marca, productos.modelo, ventas.cantidad, ventas.estado, ventas.id
          FROM usuarios
          JOIN ventas ON ventas.usuario = usuarios.id
          JOIN productos ON productos.id = ventas.producto
          WHERE ventas.estado = 1
          ORDER BY ventas.fecha DESC";
  $tot = $link->prepare($sql);
  $tot->execute();
  $cant_reg = $tot->rowCount();
  $reg_pp = 10;
  $total_pag = ceil($cant_reg/$reg_pp);
  $tot->closeCursor();

  $desde = ($pag - 1) * $reg_pp;

  $sqllimit = "SELECT usuarios.nombre, usuarios.apellido, productos.marca, productos.modelo, ventas.cantidad, ventas.estado, ventas.id
              FROM usuarios
              JOIN ventas ON ventas.usuario = usuarios.id
              JOIN productos ON productos.id = ventas.producto
              WHERE ventas.estado = 1
              ORDER BY ventas.fecha DESC
              LIMIT $desde, $reg_pp";
  $limit = $link->query($sqllimit)->fetchAll(PDO::FETCH_OBJ);

  echo "
        <div class='container my-5'>
          <table class='table table-hover table-sm text-center'>
            <thead>
              <tr>
                <th scope='col'>Usuario</th>
                <th scope='col'>Producto</th>
                <th scope='col'>Cantidad</th>
                <th scope='col'></th>
              </tr>
            </thead>
            <tbody>";
  foreach ($limit as $venta){
    echo "
          <tr>
            <td class='align-middle'>$venta->nombre $venta->apellido</td>
            <td class='align-middle'>$venta->marca - $venta->modelo</td>
            <td class='align-middle'>$venta->cantidad</td>
            <td class='align-middle'>
              <a href='eliminar_entregado.php?id=$venta->id' class='btn btn-sm btn-danger' title='Eliminar'>
                <span class='text-white h6'><i class='fas fa-times-circle'></i></span>
              </a>
            </td>
          </tr>";
  }
  echo "</tbody></table><br>";
  paginationFoot($pag, $total_pag);
  echo "</div>";
}else{
  header('location:home.php');
}
foot();
?>