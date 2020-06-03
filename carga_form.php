<?php
include 'functions.php';
head();
nav();
?>
<div class="container mt-4 col-lg-8">
  <h2 class="text-center mb-4">Carga de productos</h2>
  <form class="form-group" action="carga_productos.php" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="form-group my-3 col">
        <label>Marca</label>
        <input type="text" class="form-control" name="marca">
      </div>
      <div class="form-group my-3 col">
        <label>Modelo</label>
        <input type="text" class="form-control" name="modelo">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <p class="mb-2">Categoría</p>
        <select class="form-control" name="categoria">
          <option hidden></option>
          <option value="atomizador">Atomizador</option>
          <option value="mod">Mod</option>
          <option value="liquido">Líquido</option>
          <option value="accesorio">Accesorio</option>
        </select>
      </div>
      <div class="col">
        <label>Tipo</label>
        <input type="text" class="form-control" name="tipo">
      </div>
      <div class="form-group mb-3 col">
        <label>Precio</label>
        <input type="number" class="form-control" name="precio" step="0.01">
      </div>
    </div>
      <div class="form-group mb-3">
        <label>Descripción</label>
        <textarea name="descripcion" class="form-control" rows="10" cols="40"></textarea>
      </div>
      <div class="form-group">
        <label for="sitio">Sitio oficial del dispositivo</label>
        <input type="url" class="form-control" id="sitio" name="sitio" placeholder="http://www.ejemplo.com">
      </div>
      <div class="form-group">
        <label for="sitio2">Sitio alternativo del dispositivo</label>
        <input type="url" class="form-control" id="sitio2" name="sitio2" placeholder="http://www.ejemplo.com">
      </div>
      <div class="form-group">
        <label>Adjuntar imagen</label>
        <input type="file" class="form-control-file" name="imagen">
      </div>
      <div class="text-center">
        <input type="submit" class="btn btn-success my-3" name="cargar" value="Cargar producto">
      </div>
  </form>
</div>


<?php foot()?>