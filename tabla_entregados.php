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

  echo "<h2 class='my-4 text-center'>Ventas entregadas</h2>";
  $link = connection::link();
  $tot = $link->prepare("SELECT count(id) FROM ventas");
  $tot->execute();
  $cant_reg = $tot->fetch();
  $cant_reg = $cant_reg[0];
  $reg_pp = 10;
  $total_pag = ceil($cant_reg/$reg_pp);
  $tot->closeCursor();

  $desde = ($pag - 1) * $reg_pp;

  $sqllimit = "SELECT u.nombre, u.apellido, v.*
      FROM usuarios u
      JOIN ventas v ON v.usuario = u.id
      WHERE v.estado = 1
      ORDER BY v.fecha DESC
      LIMIT $desde, $reg_pp";
  $limit = $link->query($sqllimit)->fetchAll(PDO::FETCH_OBJ);

  echo "
        <div class='container my-5'>
          <div class='row'>
            <div class='col-2 text-center'><p class='h5'>Usuario</p></div>
            <div class='col-6 text-center'><p class='h5'>Producto</p></div>
            <div class='col-2 text-center'><p class='h5'>Importe</p></div>
          </div><hr>";
  foreach ($limit as $venta){
      $productos = $link->prepare("SELECT * FROM ventas_producto WHERE venta_id=$venta->id");
      $productos->execute();
      $productos = $productos->fetchAll(PDO::FETCH_OBJ);
      $date = date_create($venta->fecha);
      $date = date_format($date, 'd-m-Y');
      echo "
            <div class='row align-items-center'>
              <div class='col-2 text-center'>
                <div>$venta->nombre $venta->apellido</div>
                <div class='small font-italic'>($date)</div>
              </div>
              <div class='col-6'>";
      foreach ($productos as $item){
        echo "<br><div>$item->marca - $item->modelo</div>
              <div class='font-italic text-right'>$ $item->precio x $item->cantidad</div>";
      }

        echo "</div>
              <div class='col-2 text-center font-weight-bold p-1'>$ $venta->importe</div>
              <div class='col-2 text-center'>
                <a href='eliminar_entregado.php?id=$venta->id' class='btn btn-sm btn-danger' title='Eliminar'>
                <span class='text-white h6'><i class='fas fa-times-circle'></i></span>
              </a>
              </div>
            </div><hr>";

  }
  paginationFoot($pag, $total_pag);
  echo "</div>";



} else {
  header('location:home.php');
}
foot();
?>