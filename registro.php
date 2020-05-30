<?php

include 'usuario.php';
include 'connection.php';
$usuario=new usuario();
$usuario->setNombre(trim($_POST['nombre']));
$usuario->setApellido(trim($_POST['apellido']));
$usuario->setEmail(trim($_POST['email']));
$usuario->setTelefono(trim($_POST['telefono']));
$usuario->setPass($_POST['pass'],$_POST['repass']);
$usuario->setFecha(date('Y-m-d h:i:s'));

$link=connection::link();
$sql="INSERT INTO usuarios (nombre, apellido, email, telefono, pass, fecha) VALUES (?,?,?,?,?,?)";
$resultado=$link->prepare($sql);
$resultado->execute(array($usuario->getNombre(), $usuario->getApellido(), $usuario->getEmail(), $usuario->getTelefono(), $usuario->getPass(), $usuario->getFecha()));

if($resultado->rowCount()){
	echo "Usuario registrado";
}else{
	echo "Error en el registro";
}

?>