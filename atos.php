<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php
include 'head.php';
include 'connection.php';
$link=connection::link();
$result=$link->query('SELECT * FROM atos')->fetchAll(PDO::FETCH_OBJ);
foreach ($result as $ato) {
	echo "<img src='images/atos/".$ato->imagen."' width='300px'><br>";
	echo $ato->nombre."<br>";
	echo $ato->tipo."<br>";
	echo '$ '.$ato->precio."<br>";
	echo "<div style='width:400px'>".$ato->descripcion."</div><br>";
	echo $ato->sitio."<br>";
	echo $ato->sitio2."<br>";
	echo "<hr>";
}
?>
</body>
</html>