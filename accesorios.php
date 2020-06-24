<?php
include 'functions.php';
include 'connection.php';
head();
nav();
$link=connection::link();
$result=$link->query('SELECT * FROM productos WHERE categoria="accesorio" ORDER BY id DESC')->fetchAll(PDO::FETCH_OBJ);
card($result);
foot();
?>