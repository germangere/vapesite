<?php
include 'functions.php';
head();
nav();
?>
<div class="container my-4 col-lg-8">
  <form action="registro.php" method="post">
    <div class="row">
      <div class="form-group col-12 col-md-6">
        <label>Nombre</label>
        <input type="text" class="form-control" name="nombre">
        <small></small>
      </div>
      <div class="form-group col-12 col-md-6">
        <label>Apellido</label>
        <input type="text" class="form-control" name="apellido">
        <small></small>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-12 col-md-6">
        <label>E-mail</label>
        <input type="text" class="form-control" name="email">
        <small></small>
      </div>
      <div class="form-group col-12 col-md-6">
        <label>Teléfono</label>
        <input type="number" class="form-control" name="telefono" placeholder="Cód área + núm">
        <small></small>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-12 col-md-6">
        <label>Contraseña</label>
        <input type="password" class="form-control" name="pass">
        <small></small>
      </div>
      <div class="form-group col-12 col-md-6">
        <label>Repetir contraseña</label>
        <input type="password" class="form-control" name="repass">
        <small></small>
      </div>
    </div>
    <div class="form-group text-center my-3">
      <input type="submit" class="btn btn-success" value="Registrarme">
    </div>
  </form>
</div>



<?php foot()?>
