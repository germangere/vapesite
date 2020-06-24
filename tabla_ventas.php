<?php
include 'functions.php';
include 'connection.php';

if (!isset($_SESSION['rol'])){
  header('location:home.php');
}else if ($_SESSION['rol']==1){
  head();
  nav();
  echo "<h2 class='my-4 text-center'>Ventas</h2>";
  $link = connection::link();
  $sql="SELECT usuarios.nombre, usuarios.apellido, productos.marca, productos.modelo, ventas.cantidad, ventas.estado, ventas.id
  		FROM usuarios
  		JOIN ventas ON ventas.usuario = usuarios.id
  		JOIN productos ON productos.id = ventas.producto
  		WHERE ventas.estado = 0
      ORDER BY ventas.fecha DESC";
  $res = $link->query($sql)->fetchAll(PDO::FETCH_OBJ);
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
  foreach ($res as $venta){
  	echo "
          <tr>
            <td class='align-middle'>$venta->nombre $venta->apellido</td>
            <td class='align-middle'>$venta->marca - $venta->modelo</td>
            <td class='align-middle'>$venta->cantidad</td>
            <td class='align-middle'>
              <a href='entregado.php?id=$venta->id' class='btn btn-sm btn-success' title='Entregado'>
                <span class='text-white h6'><i class='fas fa-check'></i></span>
              </a>
            </td>
          </tr>";
  }
  echo "</tbody></table></div>";
}else{
  header('location:home.php');
}
foot();
?>