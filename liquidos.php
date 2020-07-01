<?php
include 'functions.php';
include 'connection.php';
head();
nav();
$link=connection::link();
$result=$link->query('SELECT * FROM productos WHERE categoria="liquido" ORDER BY id DESC')->fetchAll(PDO::FETCH_OBJ);
echo "<h2 class='text-center my-5'>Líquidos</h2>";
card($result);
foot();
?>