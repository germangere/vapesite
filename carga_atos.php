<?php
include 'connection.php';
$nombre=$_POST['nombre'];
$tipo=$_POST['tipo'];
$precio=$_POST['precio'];
$descripcion=$_POST['descripcion'];
$sitio=$_POST['sitio'];
$sitio2=$_POST['sitio2'];
$nombre_imagen=$_FILES['imagen']['name'];
$tipo_imagen=$_FILES['imagen']['type'];
$tamano_imagen=$_FILES['imagen']['size'];

if($nombre_imagen!=0){
	if($tamano_imagen<=10000000){
		if($tipo_imagen=="image/jpg" || $tipo_imagen=="image/jpeg" || $tipo_imagen=="image/png" || $tipo_imagen=="image/gif" || $tipo_imagen=="image/bmp"){
			$carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/newvape/images/atos/';
			move_uploaded_file($_FILES['imagen']['tmp_name'] , $carpeta_destino.$nombre_imagen);
			echo "Imagen subida satisfactoriamente";
		}else{
			echo "Sólo imágenes aceptadas (jpg, jpeg, png, bmp, gif)";
			die;
		}
	}else{
		echo "Tamaño de imagen no aceptado";
		die;
	}
}

$link=connection::link();
$sql='INSERT INTO atos (nombre, tipo, precio, descripcion, sitio, sitio2, imagen) VALUES (?,?,?,?,?,?,?)';
$result=$link->prepare($sql);
$result->execute(array($nombre, $tipo, $precio, $descripcion, $sitio, $sitio2, $nombre_imagen));
?>