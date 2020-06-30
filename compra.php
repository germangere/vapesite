<?php
include 'functions.php';
include 'connection.php';
$carrito = $_SESSION['carrito'];
$carrito = array_values($carrito);
$usuario = $_SESSION['usuario']['id'];
$i = count($carrito);
$k = 0;
$link = connection::link();
$sql = "INSERT INTO ventas (usuario) VALUES (?)";
$ins = $link->prepare($sql);
$ins->execute(array($usuario));
$venta_id = $link->lastInsertId();
$ins->closeCursor();
$importe = 0;
while ($k < $i) {
	$prod = $carrito[$k]['id'];
	$cant = $carrito[$k]['cantidad'];
	$precio = $carrito[$k]['precio'];
	$importe += $carrito[$k]['precio'] * $cant;
	

	$sel = $link->prepare("SELECT * FROM productos WHERE id=$prod");
	$sel->execute();
	$slct = $sel->fetch(PDO::FETCH_OBJ);
	$sel->closeCursor();

	$ns = $slct->stock - $cant;
	$updt = $link->prepare("UPDATE productos SET stock=$ns WHERE id=$prod");
	$updt->execute();
	$updt->closeCursor();

	$venta_producto = $link->prepare("INSERT INTO ventas_producto (venta_id, marca, modelo, categoria, precio, cantidad, imagen, producto_id) VALUES (?,?,?,?,?,?,?,?)");
	$venta_producto->execute(array($venta_id, $slct->marca, $slct->modelo, $slct->categoria, $precio, $cant, $slct->imagen, $prod));
	$venta_producto->closeCursor();
	$k++;
}
$imp = $link->prepare("UPDATE ventas SET importe=$importe WHERE id=$venta_id");
$imp->execute();
$_SESSION['carrito'] = null;

head();
nav();
$tit = "¡Muchas gracias!";
$msj = "Compra procesada exitosamente";
$des = "home.php";
$btn = "Ir a inicio";
jumbo($tit, $msj, $des, $btn);		
foot();
?>