<?php 
include 'functions.php';
$id = $_GET['id'];
$carrito = $_SESSION['carrito'];
$carrito = array_values($carrito); //reordeno el array
$carrito[$id]['cantidad'] += 1;
$_SESSION['carrito'] = $carrito;
header('location:ver_carrito.php');
?>