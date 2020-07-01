<?php
include 'functions.php';
head();
nav();
?>
<div class="container my-4 col-lg-8">
  <h2 class="text-center my-4">Registro</h2>
  <form action="registro.php" method="post">
    <div class="row">
      <div class="form-group col-12 col-md-6">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" class="form-control" name="nombre" required>
        <small></small>
      </div>
      <div class="form-group col-12 col-md-6">
        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" class="form-control" name="apellido" required>
        <small></small>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-12 col-md-6">
        <label for="email">E-mail</label>
        <input type="text" id="email" class="form-control" name="email" required>
        <small></small>
      </div>
      <div class="form-group col-12 col-md-6">
        <label for="telefono">Teléfono</label>
        <input type="number" id="telefono" class="form-control" name="telefono" placeholder="Cód área + núm" required>
        <small></small>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-12 col-md-6">
        <label for="pass">Contraseña</label>
        <input type="password" id="pass" class="form-control" name="pass" required>
        <small></small>
      </div>
      <div class="form-group col-12 col-md-6">
        <label for="repass">Repetir contraseña</label>
        <input type="password" id="repass" class="form-control" name="repass" required>
        <small></small>
      </div>
    </div>
    <div class="form-group text-center my-3">
      <p class="font-italic mb-4 small">Todos los campos son obligatorios</p>
      <input type="submit" class="btn btn-info" value="Registrarme">
    </div>
  </form>
</div>
<?php
foot();
?>
