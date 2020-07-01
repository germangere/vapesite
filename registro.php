<?php
include 'functions.php';
include 'usuario.php';
include_once 'connection.php';
$link = connection::link();

$usuario=new usuario();
$usuario->setNombre(trim($_POST['nombre']));
$usuario->setApellido(trim($_POST['apellido']));
$usuario->setEmail(trim($_POST['email']));
$usuario->setTelefono(trim($_POST['telefono']));
$usuario->setPass($_POST['pass'],$_POST['repass']);
$usuario->setFecha(date('Y-m-d h:i:s'));

$sql="INSERT INTO usuarios (nombre, apellido, email, telefono, pass, fecha) VALUES (?,?,?,?,?,?)";
$resultado=$link->prepare($sql);
$resultado->execute(array($usuario->getNombre(), $usuario->getApellido(), $usuario->getEmail(), $usuario->getTelefono(), $usuario->getPass(), $usuario->getFecha()));

if($resultado->rowCount()){
    head();
    nav();
	echo "
		<div class='jumbotron jumbotron-fluid mt-4'>
			<div class='container text-center'>
				<h1 class='display-4'>¡Bienvenido!</h1>
				<p class='lead'>Usuario registrado correctamente<br>Ingresá para navegar</p>
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
}else{
	$tit = "Error";
    $msj = "Ocurrió un problema al registrar el usuario";
    $des = "registro_form.php";
    $btn = "Reintentar";
    head();
    nav();
    jumbo($tit, $msj, $des, $btn);
    foot();
}

?>