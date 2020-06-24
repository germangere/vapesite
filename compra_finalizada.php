<?php
include 'functions.php';
head();
nav();
echo "
<div class='jumbotron jumbotron-fluid mt-4'>
	<div class='container text-center'>
		<h1 class='display-4'>¡Muchas gracias!</h1>
		<p class='lead'>Compra procesada exitosamente</p>
		<hr class='my-4'>
		<a href='home.php'>
			<button type='button' class='btn btn-dark btn-lg'>
 				Volver a inicio
			</button>
		</a>
	</div>
</div>";
foot();
?>