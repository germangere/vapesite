<?php
include 'functions.php';
include 'connection.php';
$id = $_GET['id'];
$link = connection::link();
$res = $link->query("DELETE FROM productos WHERE id=$id");
header('location:home.php');
?>