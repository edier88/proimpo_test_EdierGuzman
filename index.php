<?php

session_start();
if(!isset($_SESSION['ProimpoUserAuthenticated'])){
  //die("No tiene permisos");
  header("Location: login.php");
  exit();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Proimpo Homepage</title>
  <link rel="icon" type="image/png" href="img/proimpo_logo.png" width='21' height='20'/>
  <!-- Bootstrap 4.5 Jquery 3.3.1 -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="css/main.css">  
</head>

<body>

<!-- Barra superior de navegacion -->
<nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #102EEF">
  <a class="navbar-brand" href="#">Proimpo Home Page</a>
  <!-- Navbar Search-->
  <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
  </form>
  <!-- Navbar-->
  <ul class="navbar-nav ml-auto ml-md-0">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i><?php echo $_SESSION['ProimpoUserAuthenticated']; ?></a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="logout.php">Logout</a>
      </div>
    </li>
  </ul>
</nav>

<!--Inicio contenedor del formulario donde se muestran los datos del usuario a actualizar-->
<div class="container shadow p-3 mb-5 bg-white rounded my-row-high">
  <div class="my-row-low">
    <nav class="navbar navbar-light" style="background-color: #EAEBF5" >
      <a class="navbar-brand" href="index.php"><img src="img/proimpo_logo.png" width='38' height='35'> Administración Usuarios Proimpo</a>
    </nav>
  </div>

  <!-- Inicio Botones de navegacion de Bootstrap (Navs) -->
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#info_user" role="tab" aria-controls="info_user" aria-selected="true">Informacion usuario</a>
    </li>
  </ul>

  <!-- Inicio Información de la pestaña "Información Usuario", donde el usuario logueado en la plataforma puede cambiar sus datos personales y contraseña -->
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="info_user" role="tabpanel" aria-labelledby="info_user-tab">
      <div class="form-row my-row-high my-col">
        <div class="col-md-12">
          <div class="alert alert-warning" role="alert">
            A continuación puede editar sus datos.
            <br>
            Tenga en cuenta que si cambia su nombre de usuario, la página hará un logout y tendrá que loguearse otra vez con su nuevo nombre de usuario
          </div>
        </div>
      </div>
      <input type="hidden" name="id_edit" id="id_edit" value="<?php echo $_SESSION['ProimpoUserId']; ?>">
      <div class="form-row justify-content-center my-row-high my-col">
        <div class="col-md-4">
          <div class="form-group">
            <label for="usuario_edit">Nombre de usuario:</label>
            <input type="text" class="form-control" name="usuario_edit" id="usuario_edit">
            <!-- <div style="display:block;"></div> -->
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="nombres_edit">Nombres:</label>
            <input type="text" class="form-control" name="nombres_edit" id="nombres_edit">
            <!-- <div style="display:block;"></div> -->
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="apellidos_edit">Apellidos:</label>
            <input type="text" class="form-control" name="apellidos_edit" id="apellidos_edit">
            <!-- <div style="display:block;"></div> -->
          </div>
        </div>
      </div>
      <div class="form-row justify-content-center my-col">
        <div class="col-md-4">
          <div class="form-group">
            <label for="email_edit">E-Mail:</label>
            <input type="email" class="form-control" name="email_edit" id="email_edit">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="genero_edit">Genero:</label>
            <select name="genero_edit" class="form-control" id="genero_edit">
              <option value="">Seleccione su genero</option>
              <option value="F">Masculino</option>
              <option value="M">Femenino</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="fechaNacimiento_edit">Fecha de Nacimiento:</label>
            <input type="date" class="form-control" name="fechaNacimiento_edit" id="fechaNacimiento_edit">
          </div>
        </div>
      </div>
      <div class="form-row justify-content-center my-col">
        <div class="col-md-4">
          <div class="form-group">
            <label for="municipio_edit">Municipio:</label>
            <select class="form-control" name="municipio_edit" id="municipio_edit">
              <option value="">Seleccione la ciudad</option>
              <option value="Cali">Cali</option>
              <option value="Yumbo">Yumbo</option>
              <option value="Palmira">Palmira</option>
              <option value="Jamundí">Jamundí</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="direccion_edit">Dirección:</label>
            <input type="text" class="form-control" name="direccion_edit" id="direccion_edit">
          </div>
        </div>
      </div>
      <div class="form-row justify-content-center my-col">
        <div class="col-md-4">
          <div class="form-group">
            <label for="passwd_edit">Password:</label>
            <input type="password" class="form-control" name="passwd_edit" id="passwd_edit">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="passConfirm_edit">Confirmar Password:</label>
            <input type="password" class="form-control" name="passwdConfirm_edit" id="passwdConfirm_edit">
          </div>
        </div>
      </div>    
      <div class="row justify-content-center my-row-high">
        <div class="my-col">
          <input type="button" class="btn btn-secondary" id="ResetFields" value="Limpiar campos">
          <input type="button" class="btn btn-primary" id="updateUserData" value="Actualizar Datos">
          <input type="button" class="btn btn-success" id="LoadUserData" value="Cargar Datos de Usuario">
        </div>
      </div>
      <div class="row my-row justify-content-center">
        <span id="loader"></span>
        <span id="response"></span>
      </div>
    </div>
  </div>
  <!-- Fin contenedor de los formularios --> 

</body>
<script src="js/main.js"></script>

</html>