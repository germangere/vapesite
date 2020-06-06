<?php
include 'functions.php';
include 'connection.php';

if (!isset($_SESSION['usuario'])){
	echo "Hágame el favor de ingresar con su nombre de usuario";
	die;
}

$id = $_GET['id'];
$link = connection::link();
$sql = 'SELECT * FROM productos WHERE id='.$id;
$result = $link->query($sql)->fetchAll(PDO::FETCH_OBJ);

if (isset($_SESSION['carrito'])) {
	$carrito = $_SESSION['carrito'];
	$c = array_column($carrito, 'id');
	
	if(in_array($id, $c)) {
		echo "Este elemento ya fue añadido al carrito";
	} else {
		$or = count($carrito);
		foreach ($result as $prod){
			$carrito[$or + 1]['id'] = $prod->id;
			$carrito[$or + 1]['marca'] = $prod->marca;
			$carrito[$or + 1]['modelo'] =$prod->modelo;
			$carrito[$or + 1]['tipo'] = $prod->tipo;
			$carrito[$or + 1]['precio'] = $prod->precio;
			$carrito[$or + 1]['imagen'] = $prod->imagen;
			$carrito[$or + 1]['cantidad'] = 1;
			$_SESSION['carrito'] = $carrito;
			header ('location: ver_carrito.php');
		}
	}
} else {
	$carrito=array();
	foreach ($result as $prod){
		$carrito[0]['id'] = $prod->id;
		$carrito[0]['marca'] = $prod->marca;
		$carrito[0]['modelo'] =$prod->modelo;
		$carrito[0]['tipo'] = $prod->tipo;
		$carrito[0]['precio'] = $prod->precio;
		$carrito[0]['imagen'] = $prod->imagen;
		$carrito[0]['cantidad'] = 1;
		$_SESSION['carrito'] = $carrito;
		header ('location: ver_carrito.php');
	}
}


?>