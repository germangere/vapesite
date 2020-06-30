<?php 
include 'functions.php';
include 'connection.php';
if ($_SESSION['rol']==1){
	$id = $_GET['id'];
	$link = connection::link();
	$res = $link->prepare("DELETE FROM ventas WHERE id=$id");
	$res->execute();
	header ('location: tabla_entregados.php');
} else {
	header ('location:home.php');
}
?>
