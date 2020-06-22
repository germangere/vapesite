<?php
include 'functions.php';
include 'connection.php';

if (!isset($_SESSION['usuario'])){
	head();
	nav();
	echo "
		<div class='jumbotron jumbotron-fluid mt-4'>
			<div class='container text-center'>
				<h1 class='display-4'>Ingresar</h1>
				<p class='lead'>Ingrese con su usuario y contraseña para comprar.</p>
				<hr class='my-4'>
				<a href='#'>
          <button type='button' class='btn btn-dark btn-lg' data-toggle='modal' data-target='#login'>
            Ingresar
          </button>
        </a>
			</div>
		</div>";
   modal();
	foot();
	die;
}

$id = $_GET['id'];
$link = connection::link();
$sql = 'SELECT * FROM productos WHERE id='.$id;
$result = $link->query($sql)->fetchAll(PDO::FETCH_OBJ);

if (isset($_SESSION['carrito'])) {
	$carrito = $_SESSION['carrito'];
	$c = array_column($carrito, 'id');
	
	if(in_array($id, $c)) {
		  head();
    nav();
    echo "
      <div class='jumbotron jumbotron-fluid mt-4'>
        <div class='container text-center'>
          <h1 class='display-4'>Producto agregado</h1>
          <p class='lead'>El producto ya fue agregado al carrito anteriormente</p>
          <hr class='my-4'>
          <a href='ver_carrito.php'>
            <button type='button' class='btn btn-dark btn-lg'>
              Ir al carrito
            </button>
          </a>
        </div>
      </div>";
     modal();
    foot();
    die;
	} else {
		$or = count($carrito);
		foreach ($result as $prod){
			$carrito[$or + 1]['id'] = $prod->id;
			$carrito[$or + 1]['marca'] = $prod->marca;
			$carrito[$or + 1]['modelo'] =$prod->modelo;
			$carrito[$or + 1]['tipo'] = $prod->tipo;
			$carrito[$or + 1]['precio'] = $prod->precio;
			$carrito[$or + 1]['imagen'] = $prod->imagen;
			$carrito[$or + 1]['cantidad'] = 1;
			$_SESSION['carrito'] = $carrito;
			header ('location: ver_carrito.php');
		}
	}
} else {
	$carrito=array();
	foreach ($result as $prod){
		$carrito[0]['id'] = $prod->id;
		$carrito[0]['marca'] = $prod->marca;
		$carrito[0]['modelo'] =$prod->modelo;
		$carrito[0]['tipo'] = $prod->tipo;
		$carrito[0]['precio'] = $prod->precio;
		$carrito[0]['imagen'] = $prod->imagen;
		$carrito[0]['cantidad'] = 1;
		$_SESSION['carrito'] = $carrito;
		header ('location: ver_carrito.php');
	}
}


?>