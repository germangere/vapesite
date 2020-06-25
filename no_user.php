<?php
include 'functions.php';
head();
nav();
echo "
<div class='jumbotron jumbotron-fluid mt-4'>
	<div class='container text-center'>
		<h1 class='display-4'>Usuario no encontrado</h1>
		<hr class='my-4'>
		<a href='#'>
	  		<button type='button' class='btn btn-dark btn-lg' data-toggle='modal' data-target='#login'>
	   			Ingresar
	  		</button>
		</a>
	</div>
</div>";
modal();
foot();
?>