<?php 
include 'functions.php';
if ($_SESSION['rol']==1){
	$id = $_GET['id'];
	$stock = $_GET['st'];
	$carrito = $_SESSION['carrito'];
	$carrito = array_values($carrito); //reordeno el array
	if ($carrito[$id]['cantidad'] < $stock){
		$carrito[$id]['cantidad'] += 1;
		$_SESSION['carrito'] = $carrito;
		header('location:ver_carrito.php');
	}else{
		header('location:ver_carrito.php');
	}
} else {
	header ('location: home.php');
}
?>