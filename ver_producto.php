<?php
include 'functions.php';
include 'connection.php';
head();
nav();
$id = $_GET['id'];
$link = connection::link();
$res = $link->query("SELECT * FROM productos WHERE id=$id")->fetchAll(PDO::FETCH_OBJ);
foreach ($res as $prod) {
	echo "<div class='container mt-5'>
					<div class='row mb-5 align-items-md-center'>
						<div class='col-12 col-md-6 text-center'>
							<img src='images/productos/$prod->imagen' class='img-fluid'>
						</div>
						<div class='col-12 col-md-6 mt-3 text-center text-md-left'>
							<h1>$prod->modelo</h1>
							<h5>$prod->marca</h5>
							<p>$prod->categoria $prod->tipo</p>
							<p class='font-weight-bold'>$$prod->precio</p>
							<a href='carrito.php?id=$prod->id&st=$prod->stock' class='btn btn-info";
							if ($prod->stock == '0') { print " disabled"; };
						echo "'><i class='fas fa-cart-arrow-down mr-2'></i>Agregar al carrito</a>";
	if (isset($_SESSION['rol']) and $_SESSION['rol'] > 0){
		echo "<a href='editar_producto.php?id=$prod->id' class='btn btn-info text-white m-2'><i class='fas fa-cog'></i></a>";
	}
	if ($prod->stock == '0') {
		echo "<br><small class='text-danger'>Sin stock</small>";
	} else {
		echo "<br><small class='text-black-50'>Disponibles: $prod->stock</small>";
	}
	echo "</div>
		</div>
			<hr>
		<div class='row mt-4 mb-5'>
			<div class='col-12 text-center'>
				<p>".nl2br($prod->descripcion)."</p>
				<a href='$prod->sitio' target='_blank'>$prod->sitio</a><br>
				<a href='$prod->sitio2' target='_blank'>$prod->sitio2</a>
			</div>
		</div>
	</div>";
}



foot();
?>