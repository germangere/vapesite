<?php
include 'functions.php';
head();
nav();
?>
<div class="container my-4 col-lg-8">
  <form action="editar_misdatos.php" method="post">
    <div class="row">
      <div class="form-group col-12 col-md-6">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" class="form-control" name="nombre" value="<?=$_SESSION['usuario']['nombre']?>">
        <small></small>
      </div>
      <div class="form-group col-12 col-md-6">
        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" class="form-control" name="apellido" value="<?=$_SESSION['usuario']['apellido']?>">
        <small></small>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-12 col-md-6">
        <label for="email">E-mail</label>
        <input type="text" id="email" class="form-control" name="email" value="<?=$_SESSION['usuario']['email']?>">
        <small></small>
      </div>
      <div class="form-group col-12 col-md-6">
        <label for="telefono">Teléfono</label>
        <input type="number" id="telefono" class="form-control" name="telefono" placeholder="Cód área + núm" value="<?=$_SESSION['usuario']['telefono']?>">
        <small></small>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-12 col-md-6">
        <label for="pass">Nueva contraseña</label>
        <input type="password" id="pass" class="form-control" name="pass">
        <small></small>
      </div>
      <div class="form-group col-12 col-md-6">
        <label for="repass">Repetir nueva contraseña</label>
        <input type="password" id="repass" class="form-control" name="repass">
        <small></small>
      </div>
    </div>
    <div class="form-group text-center my-3">
      <input type="submit" class="btn btn-info m-2" value="Guardar">
      <a href="micuenta.php" class="btn btn-dark m-2">Volver</a>
    </div>
  </form>
</div>
<?php
foot();
?>
