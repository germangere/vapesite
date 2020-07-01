<?php
$user=htmlentities(addslashes($_POST['email']));
$pass=htmlentities(addslashes($_POST['pass']));

include 'usuario.php';
include_once 'connection.php';

$link=connection::link();
$sql="SELECT * FROM usuarios WHERE email=?";
$res=$link->prepare($sql);
$res->bindParam(1, $user);
$res->execute();
if($res->rowCount()==0){
		header ('location:no_user.php');
}else{
	while($row=$res->fetch(PDO::FETCH_ASSOC)){
		if(password_verify($pass, $row["pass"])) {
			session_start();
			$_SESSION['usuario'] = $row;
			$_SESSION['rol'] = $row["rol"];
			header ('location:home.php');
		}else{
			header('location:contra_error.php');
		}
	}
}
?>