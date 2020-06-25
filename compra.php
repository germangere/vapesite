<?php
include 'functions.php';
include 'connection.php';
$carrito = $_SESSION['carrito'];
$carrito = array_values($carrito);
$i = count($carrito);
$k = 0;
while ($k < $i) {
	$prod = $carrito[$k]['id'];
	$cant = $carrito[$k]['cantidad'];
	$importe = $carrito[$k]['precio'];
	$usuario = $_SESSION['usuario']['id'];
	
	$link = connection::link();
	$sql = "INSERT INTO ventas (producto, cantidad, usuario, importe) VALUES (?,?,?,?)";
	$ins = $link->prepare($sql);
	$ins->execute(array($prod, $cant, $usuario, $importe));
	$ins->closeCursor();

	$sel = $link->prepare("SELECT stock FROM productos WHERE id=$prod");
	$sel->execute();
	$slct = $sel->fetch(PDO::FETCH_OBJ);
	$sel->closeCursor();

	$ns = $slct->stock - $cant;
	$updt = $link->prepare("UPDATE productos SET stock=$ns WHERE id=$prod");
	$updt->execute();
	$updt->closeCursor();

	$k++;
}
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