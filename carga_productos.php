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
		    $tit = "Carga exitosa";
		    $msj = "El producto se añadió correctamente";
		    $des = "home.php";
		    $btn = "Ir a inicio";
		    jumbo($tit, $msj, $des, $btn);
		    foot();
		}else{
			head();
			nav();
			$tit = "Error";
		    $msj = "Sólo imágenes permitidas";
		    $des = "home.php";
		    $btn = "Ir a inicio";
		    jumbo($tit, $msj, $des, $btn);
		    foot();
			die;
		}
	}else{
		head();
		nav();
		$tit = "Error";
	    $msj = "Tamaño de imagen no permitido";
	    $des = "home.php";
	    $btn = "Ir a inicio";
	    jumbo($tit, $msj, $des, $btn);		
      	foot();
		die;
	}
}else{
	head();
	nav();
	$tit = "Error";
    $msj = "Fallo al cargar la imagen";
    $des = "home.php";
    $btn = "Ir a inicio";
    jumbo($tit, $msj, $des, $btn);
    foot();
	die;
}

$link=connection::link();
$sql='INSERT INTO productos (categoria, marca, modelo, stock, tipo, precio, descripcion, sitio, sitio2, imagen) VALUES (?,?,?,?,?,?,?,?,?,?)';
$result=$link->prepare($sql);
$result->execute(array($categoria, $marca, $modelo, $stock, $tipo, $precio, $descripcion, $sitio, $sitio2, $nombre_imagen));
?>