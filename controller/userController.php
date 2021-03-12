<?php

session_start();

include_once("../model/dbModel.php");

if(isset($_REQUEST['dataUsuario'])){

  $modelo = new dbModel();
  
  switch($_REQUEST['accion']){

    case "register":
      $passwdCrypted = password_hash($_REQUEST['passwd'], PASSWORD_BCRYPT, ['cost' => 9]);
      $sql = "INSERT INTO usuarios (usuario, passwd, fecha_creacion) VALUES ('{$_REQUEST['user']}', '{$passwdCrypted}', NOW());";
      $intCamposAfectados = $modelo->ejecutarSentencia($sql);
      echo json_encode($intCamposAfectados);
    break;

    case "show":
      $sql = "SELECT * FROM usuarios WHERE id = {$_REQUEST['id_usuario']}";
      $intCamposAfectados = $modelo->arrEjecutarConsulta($sql);
      echo json_encode($intCamposAfectados);
    break;

    case "edit":
      $logout = 0;
      if ($_REQUEST['passwd'] == ""){
        $sql = "UPDATE usuarios SET usuario='{$_REQUEST['usuario']}', nombres='{$_REQUEST['nombres']}', apellidos='{$_REQUEST['apellidos']}', email='{$_REQUEST['email']}', genero='{$_REQUEST['genero']}', fecha_nacimiento='{$_REQUEST['fechaNacimiento']}', municipio='{$_REQUEST['municipio']}', direccion='{$_REQUEST['direccion']}', fecha_edicion=NOW() WHERE id={$_REQUEST['id_usuario']}";
      } else{
        $passwdCrypted = password_hash($_REQUEST['passwd'], PASSWORD_BCRYPT, ['cost' => 9]);
        $sql = "UPDATE usuarios SET usuario='{$_REQUEST['usuario']}', passwd='{$passwdCrypted}', nombres='{$_REQUEST['nombres']}', apellidos='{$_REQUEST['apellidos']}', email='{$_REQUEST['email']}', genero='{$_REQUEST['genero']}', fecha_nacimiento='{$_REQUEST['fechaNacimiento']}', municipio='{$_REQUEST['municipio']}', direccion='{$_REQUEST['direccion']}', fecha_edicion=NOW() WHERE id={$_REQUEST['id_usuario']}";
      }
      $intCamposAfectados = $modelo->ejecutarSentencia($sql);
      if($_SESSION['ProimpoUserAuthenticated'] != $_REQUEST['usuario']){
        //header('Location: ../logout.php');
        $logout = 1;
      }
      echo json_encode(["BDresponse" => $intCamposAfectados, "cambioUserName" => $logout]);
      //echo json_encode($_SESSION['ProimpoUserAuthenticated'] ." ". $_REQUEST['usuario']);
      
      
    break;

    case "login":
      $sql = "SELECT * FROM usuarios WHERE usuario = '{$_REQUEST['user']}'";
      $intCamposAfectados = $modelo->arrEjecutarConsulta($sql);
      if (password_verify($_REQUEST['passwd'], $intCamposAfectados[0]['passwd'])) {
        echo json_encode(true);
        $_SESSION['ProimpoUserAuthenticated'] = $_REQUEST['user'];
        $_SESSION['ProimpoUserId'] = $intCamposAfectados[0]['id'];
      } else {
        echo json_encode(false);
      }
    
  }

}
