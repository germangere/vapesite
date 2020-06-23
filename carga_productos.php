<?php
include 'functions.php';
include 'connection.php';
$marca=$_POST['marca'];
$modelo=$_POST['modelo'];
$stock=$_POST['stock'];
$categoria=$_POST['categoria'];
$tipo=$_POST['tipo'];
$precio=$_POST['precio'];
$descripcion=$_POST['descripcion'];
$sitio=$_POST['sitio'];
$sitio2=$_POST['sitio2'];
$nombre_imagen=$_FILES['imagen']['name'];
$tipo_imagen=$_FILES['imagen']['type'];
$tamano_imagen=$_FILES['imagen']['size'];

if($nombre_imagen!=""){
	if($tamano_imagen<=10000000){
		if($tipo_imagen=="image/jpg" || $tipo_imagen=="image/jpeg" || $tipo_imagen=="image/png" || $tipo_imagen=="image/gif" || $tipo_imagen=="image/bmp"){
			$carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/newvape/images/productos/';
			move_uploaded_file($_FILES['imagen']['tmp_name'] , $carpeta_destino.$nombre_imagen);
			head();
			nav();
		    echo "
		      <div class='jumbotron jumbotron-fluid mt-4 mb-3'>
		        <div class='container text-center'>
		          <h1 class='display-4'>Carga exitosa</h1>
		          <p class='lead'>El producto se añadió correctamente</p>
		          <hr class='my-4'>
		          <a href='home.php'>
		            <button type='button' class='btn btn-dark btn-lg'>
		              Ir a inicio
		            </button>
		          </a>
		        </div>
		      </div>";
		    foot();
		}else{
			head();
			nav();
		    echo "
		      <div class='jumbotron jumbotron-fluid mt-4 mb-3'>
		        <div class='container text-center'>
		          <h1 class='display-4'>Error</h1>
		          <p class='lead'>Sólo imágenes permitidas</p>
		          <hr class='my-4'>
		          <a href='home.php'>
		            <button type='button' class='btn btn-dark btn-lg'>
		              Ir a inicio
		            </button>
		          </a>
		        </div>
		      </div>";
		    foot();
			die;
		}
	}else{
		head();
		nav();
	    echo "
	      <div class='jumbotron jumbotron-fluid mt-4'>
	        <div class='container text-center'>
	          <h1 class='display-4'>Error</h1>
	          <p class='lead'>Tamaño de imagen no permitido</p>
	          <hr class='my-4'>
	          <a href='home.php'>
	            <button type='button' class='btn btn-dark btn-lg'>
	              Ir a inicio
	            </button>
	          </a>
	        </div>
	      </div>";
      	foot();
		die;
	}
}else{
	head();
	nav();
    echo "
      <div class='jumbotron jumbotron-fluid mt-4'>
        <div class='container text-center'>
          <h1 class='display-4'>Error</h1>
          <p class='lead'>Fallo al cargar la imagen</p>
          <hr class='my-4'>
          <a href='home.php'>
            <button type='button' class='btn btn-dark btn-lg'>
              Ir a inicio
            </button>
          </a>
        </div>
      </div>";
    foot();
	die;
}

$link=connection::link();
$sql='INSERT INTO productos (categoria, marca, modelo, stock, tipo, precio, descripcion, sitio, sitio2, imagen) VALUES (?,?,?,?,?,?,?,?,?,?)';
$result=$link->prepare($sql);
$result->execute(array($categoria, $marca, $modelo, $stock, $tipo, $precio, $descripcion, $sitio, $sitio2, $nombre_imagen));
?>