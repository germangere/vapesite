<?php
include 'functions.php';
include 'connection.php';
$id=$_POST['id'];
$marca=$_POST['marca'];
$modelo=$_POST['modelo'];
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
			$link = connection::link();
			$sql = "UPDATE productos SET 
					marca=:marca,
					modelo=:modelo,
					categoria=:categoria,
					tipo=:tipo,
					precio=:precio,
					descripcion=:descripcion,
					sitio=:sitio,
					sitio2=:sitio2,
					imagen=:imagen 
					WHERE id=:id";
			$res = $link->prepare($sql);
			$res->execute(array(
								":marca"=>$marca,
								":modelo"=>$modelo,
								":categoria"=>$categoria,
								":tipo"=>$tipo,
								":precio"=>$precio,
								":descripcion"=>$descripcion,
								":sitio"=>$sitio,
								":sitio2"=>$sitio2,
								":imagen"=>$nombre_imagen,
								":id"=>$id
								));
			if ($res->rowCount() != 0){
				head();
				nav();
			    echo "
			      <div class='jumbotron jumbotron-fluid mt-4'>
			        <div class='container text-center'>
			          <h1 class='display-4'>Edición exitosa</h1>
			          <p class='lead'>El producto se actualizó correctamente</p>
			          <hr class='my-4'>
			          <a href='home.php'>
			            <button type='button' class='btn btn-dark btn-lg'>
			              Ir a inicio
			            </button>
			          </a>
			        </div>
			      </div>";
			}else{
				head();
				nav();
			    echo "
			      <div class='jumbotron jumbotron-fluid mt-4'>
			        <div class='container text-center'>
			          <h1 class='display-4'>Error</h1>
			          <p class='lead'>Fallo al actualizar el producto</p>
			          <hr class='my-4'>
			          <a href='home.php'>
			            <button type='button' class='btn btn-dark btn-lg'>
			              Ir a inicio
			            </button>
			          </a>
			        </div>
			      </div>";
			    foot();
			}
		}else{
			head();
			nav();
		    echo "
		      <div class='jumbotron jumbotron-fluid mt-4'>
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
	$link = connection::link();
	$sql = "UPDATE productos SET 
			marca=:marca,
			modelo=:modelo,
			categoria=:categoria,
			tipo=:tipo,
			precio=:precio,
			descripcion=:descripcion,
			sitio=:sitio,
			sitio2=:sitio2 
			WHERE id=:id";
	$res = $link->prepare($sql);
	$res->execute(array(
						":marca"=>$marca,
						":modelo"=>$modelo,
						":categoria"=>$categoria,
						":tipo"=>$tipo,
						":precio"=>$precio,
						":descripcion"=>$descripcion,
						":sitio"=>$sitio,
						":sitio2"=>$sitio2,
						":id"=>$id
						));
	if ($res->rowCount() != 0){
		head();
		nav();
	    echo "
	      <div class='jumbotron jumbotron-fluid mt-4'>
	        <div class='container text-center'>
	          <h1 class='display-4'>Edición exitosa</h1>
	          <p class='lead'>El producto se actualizó correctamente</p>
	          <hr class='my-4'>
	          <a href='home.php'>
	            <button type='button' class='btn btn-dark btn-lg'>
	              Ir a inicio
	            </button>
	          </a>
	        </div>
	      </div>";
	}else{
		head();
		nav();
	    echo "
	      <div class='jumbotron jumbotron-fluid mt-4'>
	        <div class='container text-center'>
	          <h1 class='display-4'>Error</h1>
	          <p class='lead'>Fallo al actualizar el producto</p>
	          <hr class='my-4'>
	          <a href='home.php'>
	            <button type='button' class='btn btn-dark btn-lg'>
	              Ir a inicio
	            </button>
	          </a>
	        </div>
	      </div>";
	}
}
foot();
?>