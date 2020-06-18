<?php
$user=htmlentities(addslashes($_POST['email']));
$pass=htmlentities(addslashes($_POST['pass']));

include 'usuario.php';
include 'connection.php';

$link=connection::link();
$sql="SELECT * FROM usuarios WHERE email=?";
$res=$link->prepare($sql);
$res->bindParam(1, $user);
$res->execute();
if($res->rowCount()==0){
	echo "Usuario no encontrado";
}else{
	while($row=$res->fetch(PDO::FETCH_ASSOC)){
		if(password_verify($pass, $row["pass"])) {
			session_start();
			$_SESSION['usuario'] = $row;
			if ($row["rol"]==1) {
				echo "Bienvenido ADMIN";
			}else if ($row["rol"]==2) {
				echo "Bienvenido Colaborador";
			}else{
				header ('location:home.php');
			}
			//session_destroy();
		}else{
			echo "Error en contaseña";
		}
	}
}
?>