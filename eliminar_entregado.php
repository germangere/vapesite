<?php 
include 'connection.php';
$id = $_GET['id'];
$link = connection::link();
$res = $link->prepare("DELETE FROM ventas WHERE id=$id");
$res->execute();
header ('location: tabla_entregados.php');
?>
