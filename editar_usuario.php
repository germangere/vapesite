<?php 
include 'functions.php';
include 'connection.php';
$id = $_GET['id'];
if (!isset($_GET['rol'])){
	head();
	nav();
    echo "
      <div class='jumbotron jumbotron-fluid mt-4'>
        <div class='container text-center'>
          <h1 class='display-4'>Error</h1>
          <p class='lead'>Debe seleccionar un rol específico</p>
          <hr class='my-4'>
          <a href='admin_usuarios.php'>
            <button type='button' class='btn btn-dark btn-lg'>
              Volver
            </button>
          </a>
        </div>
      </div>";
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
    echo "
      <div class='jumbotron jumbotron-fluid mt-4'>
        <div class='container text-center'>
          <h1 class='display-4'>Error</h1>
          <p class='lead'>Fallo al actualizar el usuario</p>
          <hr class='my-4'>
          <a href='admin_usuarios.php'>
            <button type='button' class='btn btn-dark btn-lg'>
              Volver
            </button>
          </a>
        </div>
      </div>";
}


foot();
?>