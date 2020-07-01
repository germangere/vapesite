<?php
include 'functions.php';
include 'usuario.php';
include_once 'connection.php';
$link = connection::link();
if (!empty($_POST['pass'])){
	$usuario = new usuario();
	$usuario->setNombre(trim($_POST['nombre']));
	$usuario->setApellido(trim($_POST['apellido']));
	$usuario->setTelefono(trim($_POST['telefono']));
	$usuario->setPass($_POST['pass'],$_POST['repass']);

	$id = $_SESSION['usuario']['id'];
	$sql="UPDATE usuarios SET nombre = ?, apellido = ?, telefono = ?, pass = ? WHERE id = ?";
	$resultado=$link->prepare($sql);
	$resultado->execute(array($usuario->getNombre(), $usuario->getApellido(), $usuario->getTelefono(), $usuario->getPass(), $id));

	if($resultado->rowCount()){
		session_destroy();
	    header ('location:datosact.php');
	}else{
		$tit = "Error";
	    $msj = "Ocurrió un problema al actualizar tus datos";
	    $des = "misdatos.php";
	    $btn = "Reintentar";
	    head();
	    nav();
	    jumbo($tit, $msj, $des, $btn);
	    foot();
	}
} else {
	$usuario = new usuario();
	$usuario->setNombre(trim($_POST['nombre']));
	$usuario->setApellido(trim($_POST['apellido']));
	$usuario->setTelefono(trim($_POST['telefono']));

	$id = $_SESSION['usuario']['id'];
	$sql="UPDATE usuarios SET nombre = ?, apellido = ?, telefono = ? WHERE id = ?";
	$resultado=$link->prepare($sql);
	$resultado->execute(array($usuario->getNombre(), $usuario->getApellido(), $usuario->getTelefono(), $id));

	if($resultado->rowCount()){
		session_destroy();
	    header ('location:datosact.php');
	}else{
		$tit = "Error";
	    $msj = "Ocurrió un problema al actualizar tus datos";
	    $des = "misdatos.php";
	    $btn = "Reintentar";
	    head();
	    nav();
	    jumbo($tit, $msj, $des, $btn);
	    foot();
	}
}
?>