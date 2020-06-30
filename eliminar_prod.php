<?php
include 'functions.php';
include 'connection.php';
if ($_SESSION['rol']==1){
	$id = $_GET['id'];
	$link = connection::link();
	$res = $link->query("DELETE FROM productos WHERE id=$id");
	header('location:home.php');
} else {
	header ('location:home.php');
}
?>