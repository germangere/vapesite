<?php
include 'functions.php';
head();
nav();
echo "
<div class='jumbotron jumbotron-fluid mt-4'>
	<div class='container text-center'>
		<h1 class='display-4'>¡Genial!</h1>
		<p class='lead'>Tus datos se actualizaron correctamente<br>Reingresá para navegar</p>
		<hr class='my-4'>
		<a href='#'>
			<button type='button' class='btn btn-dark btn-lg' data-toggle='modal' data-target='#login'>
 				Ingresar
			</button>
		</a>
	</div>
</div>";
foot();
?>