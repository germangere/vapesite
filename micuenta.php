<?php
include 'functions.php';
include 'connection.php';
head();
nav();
$link = connection::link();
$sql = "SELECT v.fecha, v.cantidad, v.estado, v.importe, p.categoria, p.marca, p.modelo, p.tipo, p.imagen
        FROM ventas v
        JOIN productos p ON v.producto = p.id
        JOIN usuarios u ON v.usuario = u.id
        WHERE u.id = :id
        ORDER BY v.fecha DESC";
$tot = $link->prepare($sql);
$tot->execute(array(":id"=>$_SESSION['usuario']['id']));
$res = $tot->fetchAll(PDO::FETCH_OBJ);
?>
<div class="container my-4">
	<h2 class="text-center mb-4">Mi cuenta</h2>
	<hr>
	<div class="row">
		<div class="col text-center mt-2">
			<p class='h3'><?=$_SESSION['usuario']['nombre'] . " " . $_SESSION['usuario']['apellido']?></p>
			<p><?=$_SESSION['usuario']['email']?></p>
		</div>
	</div>
</div>
<div class="container mb-4">
	<h4>Mis compras</h4>
	<div class="row">
		<div class="col">
            
        </div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
	</div>
</div>
<?php
foot();
?>