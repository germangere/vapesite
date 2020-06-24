<?php
include 'connection.php';
	$prod = 1;
	$cant = 3;
	$link = connection::link();
	$sel = $link->prepare("SELECT stock FROM productos WHERE id=$prod");
	$sel->execute();
	$slct = $sel->fetch(PDO::FETCH_OBJ);
	$sel->closeCursor();

	$ns = $slct->stock - $cant;
	$updt = $link->prepare("UPDATE productos SET stock=$ns WHERE id=$prod");
	$updt->execute();
	
 ?>