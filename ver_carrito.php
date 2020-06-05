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
									<th scope='col'></th>
									<th scope='col'>Marca</th>
									<th scope='col'>Modelo</th>
									<th scope='col'>Imagen</th>
									<th scope='col'>Precio</th>
									<th scope='col'>Cantidad</th>
								</tr>
							</thead>
							<tbody>
					";
	foreach ($carrito as $key => $prod) {
		$or++;
		echo "<tr>
						<td class='align-middle'>" . $or . "</td>
						<td class='align-middle'>" . $prod['marca'] . "</td>
						<td class='align-middle'>" . $prod['modelo'] . "</td>
						<td class='align-middle'><img src='images/productos/" . $prod['imagen'] . "' width='50'></td>
						<td class='align-middle'>" . $prod['precio'] . "</td>
					</tr>
					";
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

 ?>