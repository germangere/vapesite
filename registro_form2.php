<?php
include 'functions.php';
head();
nav();
?>
<div class="container">
	<form method="post" action="registro.php">
		<div class="row justify-content-center">
			<h1>Registrarse como usuario</h1>
		<div class="col-md-8">
		<div class="row mb-3">
			<div class="col-md-6 col-xs-12">
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" class="form-control" name="nombre">
					<small style="color: red;"><?php echo $nombreerr;?></small>
				</div>
			</div>
			<div class="col-md-6 col-xs-12">
				<div class="form-group">
					<label for="apellido">Apellido</label>
					<input type="text" class="form-control" name="apellido">
					<small style="color: red;"><?php echo $apellidoerr;?></small>
				</div>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-md-8 col-xs-12">
				<div class="form-group">
					<label for="email">E-mail</label>
					<input type="text" class="form-control" name="email">
					<small style="color: red;"><?php echo $emailerr;?></small>
				</div>
			</div>
			<div class="col-md-4 col-xs-12">
				<div class="form-group">
					<label for="telefono">Teléfono</label>
					<input type="tel" class="form-control" name="telefono" placeholder="Cód área + núm">
					<!--  pattern="[0-9]{5,20}" required -->
					<small style="color: red;"><?php echo $telefonoerr;?></small>
				</div>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-md-6 col-xs-12">
				<div class="form-group">
					<label for="pass">Contraseña</label>
					<input type="password" class="form-control" name="pass">
					<small style="color: red;"><?php ?></small>
				</div>
			</div>
			<div class="col-md-6 col-xs-12">
				<div class="form-group">
					<label for="repass">Repetí la contraseña</label>
					<input type="password" class="form-control" name="repass">
					<small style="color: red;"><?php ?></small>
				</div>
			</div>
		</div>
		<div class="form-row mb-5 text-center">
			<div class="col">
				<input type="submit" class="btn btn-primary" value="Registrarme">
			</div>
		</div>
		</div>
		</div>
	</form>
</div>
<?php foot()?>