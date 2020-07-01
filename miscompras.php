<?php
include 'functions.php';
include 'connection.php';
head();
nav();
if (isset($_GET["pag"])){
  $pag = (int) $_GET["pag"];
}else{
  $pag = 1;
}
$user = $_SESSION['usuario']['id'];
$link = connection::link();
$tot = $link->prepare("SELECT count(id) FROM ventas WHERE usuario=$user");
$tot->execute();
$cant_reg = $tot->fetch();
$cant_reg = $cant_reg[0];
$reg_pp = 6;
$total_pag = ceil($cant_reg/$reg_pp);
$tot->closeCursor();

$desde = ($pag - 1) * $reg_pp;

$sql = "SELECT v.*
        FROM ventas v
        JOIN usuarios u ON v.usuario = u.id
        WHERE u.id = :id
        ORDER BY v.fecha DESC
        LIMIT $desde, $reg_pp";
$tot = $link->prepare($sql);
$tot->execute(array(":id"=>$_SESSION['usuario']['id']));
$res = $tot->fetchAll(PDO::FETCH_OBJ);
echo "<h2 class='my-4 text-center'>Mis compras</h2>";
echo "
        <div class='container my-5'>
          <div class='row'>
            <div class='col-2 text-center'><p class='h5'>Fecha</p></div>
            <div class='col-6 text-center'><p class='h5'>Producto</p></div>
            <div class='col-2 text-center'><p class='h5'>Importe</p></div>
          </div><hr>";
  foreach ($res as $venta){
      $productos = $link->prepare("SELECT * FROM ventas_producto WHERE venta_id=$venta->id");
      $productos->execute();
      $productos = $productos->fetchAll(PDO::FETCH_OBJ);
      $date = date_create($venta->fecha);
      $date = date_format($date, 'd-m-Y');
      echo "
            <div class='row align-items-center'>
              <div class='col-2 text-center'>
                <div>$date</div>
              </div>
              <div class='col-6'>";
      foreach ($productos as $item){
        echo "<br><div></div>
              <div><img src='images/productos/$item->imagen' width='50'> $item->marca - $item->modelo</div>
              <div class='font-italic text-right'>$ $item->precio x $item->cantidad</div>";
      }

      echo "</div>
            <div class='col-2 text-center font-weight-bold p-1'>$ $venta->importe</div>
            <div class='col-2 text-center'>";
      if ($venta->estado==0){
        echo "<h3>
                <span class='badge badge-info text-white' title='En proceso'>
                  <i class='fas fa-hourglass'></i>
                </span>
              </h3>";
      } else {
        echo "<h3>
                <span class='badge badge-success text-white' title='Entregado'>
                  <i class='fas fa-check'></i>
                </span>
              </h3>";
      }
        echo "</div>
              </div><hr>";
  }
echo "<br>";
paginationFoot($pag, $total_pag);
echo "</div>";
foot();
?>