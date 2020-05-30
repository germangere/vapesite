<?php
class usuario{
	private $nombre;
	private $apellido;
	private $email;
	private $telefono;
	private $pass;
	private $fecha;

	function setNombre($nombre){
		if(empty($nombre)){
			echo "El nombre es obligatorio";
			die;
		}
		$this->nombre=$nombre;
	}
	function setApellido($apellido){
		if(empty($apellido)){
			echo "El apellido es obligatorio";
			die;
		}
		$this->apellido=$apellido;
	}
	function setEmail($email){
		if(empty($email)){
			echo "El E-mail es obligatorio";
			die;
		}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			echo "Formato incorrecto de E-mail";
			die;
		}
		$this->email=$email;
	}
	function setTelefono($telefono){
		if(empty($telefono)){
			echo "El teléfono es obligatorio";
			die;
		}else if(preg_match('/^(?:(?:00)?549?)?0?(?:11|[2368]\d)(?:(?=\d{0,2}15)\d{2})??\d{8}$/D', $telefono)==0){
			echo "Error de formato de teléfono";
			die;
		}
		$this->telefono=$telefono;
	}
	function setPass($pass,$repass){
		if(empty($pass)){
			echo "La contraseña es obligatoria";
			die;
		}
		if(empty($repass)){
			echo "La confirmación de contraseña es obligatoria";
			die;
		}
		if($pass!=$repass){
			echo "La contraseña tiene que ser idéntica en ambos campos";
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