<?php 
include 'functions.php';
$id = $_GET['id'];
$carrito = $_SESSION['carrito'];
$carrito = array_values($carrito); //reordeno el array
unset($carrito[$id]); //elimino un índice
if (count($carrito) == 0){
	unset($carrito);
}
$_SESSION['carrito'] = $carrito;
header('location:ver_carrito.php');
?>