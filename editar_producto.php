<?php
include 'functions.php';
include 'connection.php';
head();
nav();
$id = $_GET['id'];
$link = connection::link();
$sql = "SELECT * FROM productos WHERE id=$id";
$res = $link->query($sql)->fetchAll(PDO::FETCH_OBJ);
foreach ($res as $prod){
?>
<div class="container mt-4 col-lg-8">
  <h2 class="text-center mb-4">Editar producto</h2>
  <form class="form-group" action="update_prod.php" method="post" enctype="multipart/form-data">
  	<input type="hidden" name="id" value="<?php echo $prod->id?>">
    <div class="row">
      <div class="form-group my-3 col">
        <label>Marca</label>
        <input type="text" class="form-control" name="marca" value="<?php echo $prod->marca?>">
      </div>
      <div class="form-group my-3 col">
        <label>Modelo</label>
        <input type="text" class="form-control" name="modelo" value="<?php echo $prod->modelo?>">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <p class="mb-2">Categoría</p>
        <select class="form-control" name="categoria">
          <option hidden></option>
          <option value="atomizador" <?php $prod->categoria=="atomizador" ? $x="selected" : $x=""; echo $x?>>Atomizador</option>
          <option value="mod" <?php $prod->categoria=="mod" ? $x="selected" : $x=""; echo $x?>>Mod</option>
          <option value="liquido" <?php $prod->categoria=="liquido" ? $x="selected" : $x=""; echo $x?>>Líquido</option>
          <option value="accesorio" <?php $prod->categoria=="accesorio" ? $x="selected" : $x=""; echo $x?>>Accesorio</option>
        </select>
      </div>
      <div class="col">
        <label>Tipo</label>
        <input type="text" class="form-control" name="tipo" value="<?php echo $prod->tipo?>">
      </div>
      <div class="form-group mb-3 col">
        <label>Precio</label>
        <input type="number" class="form-control" name="precio" step="0.01" value="<?php echo $prod->precio?>">
      </div>
    </div>
      <div class="form-group mb-3">
        <label>Descripción</label>
        <textarea name="descripcion" class="form-control" rows="10" cols="40"><?php echo $prod->descripcion?></textarea>
      </div>
      <div class="form-group">
        <label for="sitio">Sitio oficial del dispositivo</label>
        <input type="url" class="form-control" id="sitio" name="sitio" placeholder="http://www.ejemplo.com" value="<?php echo $prod->sitio?>">
      </div>
      <div class="form-group">
        <label for="sitio2">Sitio alternativo del dispositivo</label>
        <input type="url" class="form-control" id="sitio2" name="sitio2" placeholder="http://www.ejemplo.com" value="<?php echo $prod->sitio2?>">
      </div>
      <div>
      	<img src="images/productos/<?php echo $prod->imagen?>" width="50">
      </div>
      <div class="form-group">
        <label>Modificar imagen</label>
        <input type="file" class="form-control-file" name="imagen">
      </div>
      <div class="text-center">
        <button class="btn btn-danger m-3" name="eliminar"><a href="eliminar_prod.php?id=<?php echo $prod->id?>" class="text-white" style="text-decoration: none">Eliminar producto</a></button>
        <input type="submit" class="btn btn-info m-3" name="cargar" value="Modificar producto">
      </div>
  </form>
</div>
<?php
}
foot();
?>