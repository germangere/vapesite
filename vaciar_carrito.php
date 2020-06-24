<?php 
session_start();
$_SESSION['carrito'] = null;
header ('location: ver_carrito.php');
 ?>