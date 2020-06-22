<?php 
include 'functions.php';
include 'connection.php';
$id = $_GET['id'];
if (!isset($_GET['rol'])){
	head();
	nav();
	echo "Debe seleccionar un rol específico";
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
	head();
	nav();
	header ('location:admin_usuarios.php');
}else{
	head();
	nav();
	echo "Fallo al actualizar usuario";
}


foot();
?>