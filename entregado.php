<?php 
include 'functions.php';
include 'connection.php';
if ($_SESSION['rol']==1){
	$id = $_GET['id'];
	$link = connection::link();
	$res = $link->prepare("UPDATE ventas SET estado='1' WHERE id=$id");
	$res->execute();
	header ('location: tabla_ventas.php');
} else {
	header ('location:home.php');
}
?>