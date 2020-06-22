<?php
session_start();
function head(){
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/svg+xml" href="images/favicon.svg">
    <script src="https://kit.fontawesome.com/e2b02d9e00.js" crossorigin="anonymous"></script>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <style>
      html{
        background-color: #343a40;
      }
    </style>
    <title>VapeSite</title>
  </head>
  <body>
  <?php
}

function admin(){
  ?>
  <div class="container-fluid bg-info py-2">
    <div class="flex-row d-md-flex justify-content-around align-items-center">
      <p class="align-middle text-white mx-1 my-0">Menú administrador</p>
      <a class="text-white btn btn-sm btn-dark m-1" href="carga_form.php">Cargar producto</a>
      <a class="text-white btn btn-sm btn-dark m-1" href="admin_usuarios.php">Administrar usuarios</a>
      <a class="text-white btn btn-sm btn-dark m-1" href="">Otra opción</a>
      <a class="text-white btn btn-sm btn-dark m-1" href="">Otra opción más</a>
    </div>
  </div>
  <?php
}

function modal(){
?>
  <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-dark text-white">
          <h4 class="modal-title">Ingresar</h4>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="login.php" method="post">
            <div class="form-group text-center">
              <input type="text" class="form-control my-3" name="email" placeholder="E-mail">
              <input type="password" class="form-control" name="pass" placeholder="Contraseña">
              <input type="submit" class="btn btn-success my-3" value="Ingresar">
            </div>
          </form>
          <hr>
          <div class="text-center">
            <h5 class="my-3">Si no estás registrado</h5>
            <a href="registro_form.php" class="btn btn-info">Registrate acá</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
}

function nav(){
  ?>
  <nav class="py-3 navbar navbar-dark bg-dark navbar-expand-md">
    <div class="container">
      <a href="home.php" class="navbar-brand">
        <span class="h4"><strong>Vape</strong>Site</span>
      </a>
        <?php
        if (isset($_SESSION['usuario'])) {
          echo "<p class='text-white ml-auto mr-3 h6 mt-1 order-md-1'>" . $_SESSION['usuario']['nombre'] . "</p>
                <a href='ver_carrito.php' class='order-md-2'>
                  <button type='button' class='btn btn-link'>
                    <i class='fas fa-shopping-cart text-white'></i>
                  </button>
                </a>
                <a href='signout.php' class='mr-2 order-md-3'>
                  <button type='button' class='btn btn-link btn-lg'>
                    <i class='fas fa-sign-out-alt text-white'></i>
                  </button>
                </a>";
        }else{
          echo "<a href='#' class='ml-auto mr-4 order-md-last'>
                  <button type='button' class='btn btn-link btn-lg' data-toggle='modal' data-target='#login'>
                    <i class='fas fa-user text-white'></i>
                  </button>
                </a>";
        }
        ?>
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu" aria-controls="menu de navegación" aria-expanded="false" aria-label="desplegar menú de navegación">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav ml-auto mr-auto lead">
          <li class="nav-item"><a href="atos.php" class="nav-link">Atos</a></li>
          <li class="nav-item"><a href="mods.php" class="nav-link">Mods</a></li>
          <li class="nav-item"><a href="accesorios.php" class="nav-link">Accesorios</a></li>
          <li class="nav-item"><a href="liquidos.php" class="nav-link">Líquidos</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <?php 
  if (isset($_SESSION["rol"])){
    if ($_SESSION["rol"]==1){
    admin();
    }
  }

  modal();
  ?>
  <?php
}

function foot(){
  ?>
  <footer class="py-5 bg-dark text-right">
    <div class="mr-4">
      <a href="http://www.twitter.com" class="text-white m-2" target="_blank"><i class="fab fa-twitter"></i></a>
      <a href="http://www.facebook.com" class="text-white m-2" target="_blank"><i class="fab fa-facebook"></i></a>
      <a href="http://www.instagram.com" class="text-white m-2" target="_blank"><i class="fab fa-instagram"></i></a>
      <a href="https://wa.me/5492615793559" class="text-white m-2" target="_blank"><i class="fab fa-whatsapp"></i></a>
      <a href="mailto:germangere@gmail.com" class="text-white m-2"><i class="far fa-envelope"></i></a>
    </div>
  </footer>

  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  </body>
  </html>
  <?php
}

?>