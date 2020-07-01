<?php
include 'functions.php';
include 'connection.php';
head();
nav();
?>
<div class="container my-4">
	<h2 class="text-center mb-4">Mi cuenta</h2>
	<hr>
	<div class="row">
		<div class="col text-center mt-2">
			<p class='h3'><?=$_SESSION['usuario']['nombre'] . " " . $_SESSION['usuario']['apellido']?></p>
			<p><?=$_SESSION['usuario']['email']?></p>
		</div>
	</div>
</div>
<div class=" text-center container mb-4">
  <a href="misdatos.php" class="btn btn-info m-2">Editar mis datos</a>
	<a href="miscompras.php" class="btn btn-info m-2">Mis compras</a>
</div>
<?php
foot();
?>