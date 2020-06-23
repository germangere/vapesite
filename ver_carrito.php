<?php 
include 'functions.php';
head();
nav();
if (isset($_SESSION['carrito'])) {
	$carrito = $_SESSION['carrito'];
	$or = 0;
	echo "<div class='container mt-5'>
					<div class='table-responsive'>
						<table class='table text-center'>
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
				<td class='align-middle p-0'>
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
				";
	echo "<div class='row justify-content-center mb-3'>
          <a href='home.php' class='btn btn-dark text-white text-center'>Volver a inicio</a><br>
				</div>
        </div>";
} else {
	echo "
		<div class='jumbotron jumbotron-fluid mt-4'>
			<div class='container text-center'>
				<h1 class='display-4'>El carrito está vacío</h1>
				<hr class='my-4'>
				<a href='home.php'>
          <button type='button' class='btn btn-dark btn-lg'>
            Volver a inicio
          </button>
        </a>
			</div>
		</div>";
}
foot();
 ?>