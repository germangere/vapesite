<?php
include 'functions.php';
include 'connection.php';
if (!isset($_SESSION['rol'])){
  header('location:home.php');
}else if ($_SESSION['rol']==1){
  head();
  nav();
  echo "<h2 class='my-4 text-center'>Administración de usuarios</h2>";
  $link = connection::link();
  $res = $link->query('SELECT * FROM usuarios')->fetchAll(PDO::FETCH_OBJ);
  echo "
        <div class='container my-5'>
          <table class='table table-hover table-sm'>
            <thead>
              <tr>
                <th scope='col'>ID</th>
                <th scope='col'>Nombre</th>
                <th scope='col'>Apellido</th>
                <th scope='col'>Email</th>
                <th scope='col'>Teléfono</th>
                <th scope='col'>Rol</th>
                <th scope='col'></th>
              </tr>
            </thead>
            <tbody>";
  foreach ($res as $user){
  	echo "
          <tr>
            <th scope='row'>$user->id</th>
            <td>$user->nombre</td>
            <td>$user->apellido</td>
            <td>$user->email</td>
            <td>$user->telefono</td>
            <td>";
            switch ($user->rol) {
               case '0':
                 echo "Usuario";
                 break;
               case '1':
                 echo "Admin";
                 break;
               case '2':
                 echo "Colab";
                 break;
             }
             echo "</td><td>";
             if ($_SESSION['usuario']['id']!=$user->id){
              echo "<a href='ver_usuario.php?id=$user->id' class='btn btn-sm btn-info'><i class='fas fa-cog'></i></a></td></tr>";
             }else{
              echo "</td></tr>";
             }
  }
  echo "</tbody></table></div>";
}else{
  header('location:home.php');
}
  	
foot();
?>