<?php
class connection{
	public static function link(){
		try{
			$link=new PDO("mysql:host=localhost; dbname=vapesite; charset=utf8", "root", "");
			$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(Exception $e){
			echo "Error al conectar a la base de datos: ".$e->getMessage()." ".$e->getLine();
			die;
		}
		return $link;
	}
}
?>