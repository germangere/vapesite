<?php 
include 'functions.php';
include 'connection.php';
head();
nav();
$id = $_GET['id'];
$link = connection::link();
$res = $link->query("SELECT * FROM usuarios WHERE id='$id'")->fetchAll(PDO::FETCH_OBJ);
foreach ($res as $user){
	echo "
				<div class='container text-center mt-4'>
					<h2>$user->nombre $user->apellido</h2>
					<p>$user->email</p>";
	switch ($user->rol) {
       case '0':
         echo "<p>(Usuario)</p>";
         break;
       case '1':
         echo "<p>(Admin)</p>";
         break;
       case '2':
         echo "<p>(Colaborador)</p>";
         break;
     }
	echo "
					<form action='editar_usuario.php' method='get'>
						<div class='row justify-content-center'>
							<div class='col-auto'>
								<input type='hidden' value='$user->id' name='id'>
								<input type='hidden' value='$user->rol' name='rol_usuario'>
								<select class='custom-select mb-3' name='rol'>
									<option selected disabled value=''>Seleccionar rol</option>
									<option value='1'>Administrador</option>
									<option value='2'>Colaborador</option>
									<option value='0'>Usuario</option>

								</select>
								<input type='submit' class='btn btn-dark mb-4' value='Guardar'>
							</div>
						</div>
					</form>
				</div>
	";
}
foot();
?>