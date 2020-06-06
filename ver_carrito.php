<?php 
include 'functions.php';
head();
nav();
if (isset($_SESSION['carrito'])) {
	$carrito = $_SESSION['carrito'];
	$or = 0;
	echo "<div class='container mt-5'>
					<div class='table-responsive'>
						<table class='table'>
							<thead>
								<tr>
									<th scope='col'>Marca</th>
									<th scope='col'>Modelo</th>
									<th scope='col'>Imagen</th>
									<th scope='col'>Precio</th>
									<th scope='col'>Cantidad</th>
									<th scope='col'></th>
								</tr>
							</thead>
							<tbody>
					";
	foreach ($carrito as $prod) {
		echo "<tr>
						<td class='align-middle'>" . $prod['marca'] . "</td>
						<td class='align-middle'>" . $prod['modelo'] . "</td>
						<td class='align-middle'><img src='images/productos/" . $prod['imagen'] . "' width='50'></td>
						<td class='align-middle'>" . $prod['precio'] . "</td>
						<td class='align-middle'>" . $prod['cantidad'] . "</td>
						<td class='align-middle'>
							<a href='restar_art.php?id=" . $or . "' class='btn btn-sm btn-info m-1'>
							<span class='h5'><i class='fas fa-minus'></i></span>
							</a>
							<a href='agregar_art.php?id=" . $or . "' class='btn btn-sm btn-success m-1'>
							<span class='h5'><i class='fas fa-plus'></i></span>
							</a>
							<a href='eliminar_art.php?id=" . $or . "' class='btn btn-sm btn-danger m-1'>
							<span class='h5'><i class='fas fa-times-circle text-white'></i></span>
							</a>
							</td>
					</tr>
					";
		$or++;
	}
	echo "</tbody>
				</table>
				</div>
				</div>
				";
	echo "<a href='home.php' class='d-block text-center'>Volver inicio</a><br>";
} else {
	echo "El carrito está vacío";
}
foot();
 ?>