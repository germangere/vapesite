<?php
include 'connection.php';
class usuario{
	private $nombre;
	private $apellido;
	private $email;
	private $telefono;
	private $pass;
	private $fecha;

	function setNombre($nombre){
		if(empty($nombre)){
			jum ("Error", "El nombre es obligatorio");
			die;
		}
		$this->nombre=$nombre;
	}
	function setApellido($apellido){
		if(empty($apellido)){
			jum ("Error", "El apellido es obligatorio");
			die;
		}
		$this->apellido=$apellido;
	}
	function setEmail($email){
		if(empty($email)){
			jum ("Error", "El E-mail es obligatorio");
			die;
		}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			jum ("Error", "Formato incorrecto de E-mail");
			die;
		}
		$link = connection::link();
		$res = $link->query("SELECT email FROM usuarios");
		$dbmails = $res->fetchAll(PDO::FETCH_ASSOC);
		$res->closeCursor();
		$res = null;
		$c = array_column($dbmails, 'email');
		if (in_array($email, $c)){
			jum ("Error", "El E-mail ya se encuentra registrado");
			die;
		}
		$this->email=$email;
	}
	function setTelefono($telefono){
		if(empty($telefono)){
			jum ("Error", "El teléfono es obligatorio");
			die;
		}else if(preg_match('/^(?:(?:00)?549?)?0?(?:11|[2368]\d)(?:(?=\d{0,2}15)\d{2})??\d{8}$/D', $telefono)==0){
			jum ("Error", "Error de formato de teléfono");
			die;
		}
		$this->telefono=$telefono;
	}
	function setPass($pass,$repass){
		if(empty($pass)){
			jum ("Error", "La contraseña es obligatoria");
			die;
		}
		if(empty($repass)){
			jum ("Error", "La confirmación de contraseña es obligatoria");
			die;
		}
		if($pass!=$repass){
			jum ("Error", "La contraseña tiene que ser idéntica en ambos campos");
			die;
		}
		$crypt=password_hash($pass, PASSWORD_DEFAULT);
		$this->pass=$crypt;
	}
	function setFecha($fecha){
		$this->fecha=$fecha;
	}

	function getNombre(){
		return $this->nombre;
	}
	function getApellido(){
		return $this->apellido;
	}
	function getEmail(){
		return $this->email;
	}
	function getTelefono(){
		return $this->telefono;
	}
	function getPass(){
		return $this->pass;
	}
	function getFecha(){
		return $this->fecha;
	}
}


?>