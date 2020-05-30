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
	while ($row=$res->fetch(PDO::FETCH_ASSOC)){
		if(password_verify($pass, $row["pass"])){
			if($row["admin"]==1){
				echo "Bienvenido ADMIN";
			}else{
				echo "Bienvenido ".$row["nombre"]." ".$row["apellido"];
			}
		}else{
			echo "Error en contaseña";
		}
	}
}
?>