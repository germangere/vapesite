<?php 
include 'functions.php';
include 'connection.php';
$id = $_GET['id'];
if (!isset($_GET['rol'])){
	head();
	nav();
  $tit = "Error";
  $msj = "Debés seleccionar un rol específico";
  $des = "admin_usuarios.php";
  $btn = "Volver";
  jumbo($tit, $msj, $des, $btn);
	foot();
	die;
}else{
	$rol = $_GET['rol'];
}

$link = connection::link();
$sql = ("UPDATE usuarios SET rol=:rol WHERE id=:id");
$res = $link->prepare($sql);
$res->execute(array(':rol' => $rol, ':id' => $id));
if ($res->rowCount() != 0){
	header ('location:admin_usuarios.php');
}else{
	head();
	nav();
  $tit = "Error";
  $msj = "Fallo al actualizar el usuario";
  $des = "admin_usuarios.php";
  $btn = "Volver";
  jumbo($tit, $msj, $des, $btn);
  foot();
}
?>