<?php
include 'functions.php';
include 'connection.php';
head();
nav();
$link=connection::link();
$result=$link->query('SELECT * FROM productos WHERE categoria="atomizador" ORDER BY id DESC')->fetchAll(PDO::FETCH_OBJ);
echo "<h2 class='text-center my-5'>Atomizadores</h2>";
card($result);
foot();
?>