<?php
	include 'functions.php';
	include 'db.php';
	$title = "Contacto";
	head ($title);
	nav ();
	lightpage($title);

$nombre = $apellido = $telefono = $email = $comentario = $num = '';
$nombreerr = $apellidoerr = $telefonoerr = $emailerr = $comentarioerr = '';
$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty(trim($_POST['nombre']))) {
		$nombreerr = 'El nombre es obligatorio';
		$error = true;
	} else {
		$nombre = test_input($_POST['nombre']);
		$nombre = html_entity_decode($nombre);
	}
	
	if (empty($_POST['apellido'])) {
		$apellidoerr = 'El apellido es obligatorio';
		$error = true;
	} else {
		$apellido = test_input($_POST['apellido']);
	}
	
	$num = $_POST['telefono'];
	if (empty($num)) {
		$telefonoerr = 'El télefono es obligatorio';
		$error = true;
	} else {
			if (preg_match('/^(?:(?:00)?549?)?0?(?:11|[2368]\d)(?:(?=\d{0,2}15)\d{2})??\d{8}$/D', $num)) {
				$telefono = $num;
			} else {
				$telefonoerr = 'El formato del télefono es inválido';
				$error = true;
			}
	}
	
	if (empty($_POST['email'])) {
		$emailerr = 'El E-mail es obligatorio';
		$error = true;
	} else {
		$email = test_input($_POST['email']);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailerr = 'El formato del E-mail es inválido';
			}
	}
	
	if (empty($_POST['comentario'])) {
		$comentarioerr = 'El comentario es obligatorio';
		$error = true;
	} else {
		$comentario = test_input($_POST['comentario']);
	}

	if ($error === false) {
		//guardemo la gilaaa en la db
		$maria = "
			INSERT INTO vapesite.contact (name, lastname, email, phone, comment) 
			VALUES ('$nombre', '$apellido', '$email', '$telefono', '$comentario');";
		$query = mysqli_query($link, $maria);
		if (!$query){
			echo mysqli_error($link);
		}
	}
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>
<div class="container">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<div class="row justify-content-center">
		<div class="col-md-8">
		<div class="row mb-3">
			<div class="col-md-6 col-xs-12">
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" class="form-control" value="<?php echo $nombre;?>" name="nombre">
					<small style="color: red;"><?php echo $nombreerr;?></small>
				</div>
			</div>
			<div class="col-md-6 col-xs-12">
				<div class="form-group">
					<label for="apellido">Apellido</label>
					<input type="text" class="form-control" value="<?php echo $apellido;?>" name="apellido">
					<small style="color: red;"><?php echo $apellidoerr;?></small>
				</div>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-md-8 col-xs-12">
				<div class="form-group">
					<label for="email">E-mail</label>
					<input type="text" class="form-control" value="<?php echo $email;?>" name="email">
					<small style="color: red;"><?php echo $emailerr;?></small>
				</div>
			</div>
			<div class="col-md-4 col-xs-12">
				<div class="form-group">
					<label for="telefono">Teléfono</label>
					<input type="tel" class="form-control" value="<?php echo $num;?>" name="telefono" placeholder="Cód área + núm">
					<!--  pattern="[0-9]{5,20}" required -->
					<small style="color: red;"><?php echo $telefonoerr;?></small>
				</div>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col">
				<label for="comentario">Comentario</label>
				<textarea class="form-control" name="comentario"><?php echo $comentario;?></textarea>
				<small style="color: red;"><?php echo $comentarioerr;?></small>
			</div>
		</div>
		<div class="form-row mb-5 text-center">
			<div class="col">
				<button type="submit" class="btn btn-primary">Enviar comentario</button>
			</div>
		</div>
	</div>
</div>
<div>
	todos los contactos
	<?php

	$unavariable = "SELECT * FROM vapesite.contact;";
	$query = mysqli_query($link, $unavariable);
	while ($row = mysqli_fetch_assoc($query)) {
    ?>
    <div>
    	<h5><?=$row["name"]?>,<?=$row["lastname"]?></h5><br>
    	<h5><?=$row["comment"]?></h5>
    </div><?php
	}
?>
</div>
	</form>
</div>

<?php
	foot();
?>