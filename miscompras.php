<?php
include 'functions.php';
include 'connection.php';
head();
nav();
$link = connection::link();
$sql = "SELECT v.*, vp.*
        FROM ventas v
        JOIN ventas_producto vp ON vp.venta_id = v.id
        JOIN usuarios u ON v.usuario = u.id
        WHERE u.id = :id
        ORDER BY v.fecha DESC";
$tot = $link->prepare($sql);
$tot->execute(array(":id"=>$_SESSION['usuario']['id']));
$res = $tot->fetchAll(PDO::FETCH_OBJ);
?>