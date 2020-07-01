<?php
include 'functions.php';
include 'connection.php';
head();
nav();
$link=connection::link();
$result=$link->query('SELECT * FROM productos WHERE categoria="accesorio" ORDER BY id DESC')->fetchAll(PDO::FETCH_OBJ);
echo "<h2 class='text-center my-5'>Accesorios</h2>";
card($result);
foot();
?>