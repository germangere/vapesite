<?php 
include 'connection.php';
$id = $_GET['id'];
$link = connection::link();
$res = $link->prepare("UPDATE ventas SET estado='1' WHERE id=$id");
$res->execute();
header ('location: tabla_ventas.php');
?>