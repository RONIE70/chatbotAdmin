<?php
include_once "../../db/consultas.php";

//print_r($_POST['email']);
$pEmail = $_POST['email'];
$pPassword = $_POST['password'];

$consulta =
    "SELECT email,password from administrador
          where email='" . $pEmail . "' AND password='" . $pPassword . "'";
          print_r($consulta);
          
$usuarioLogin = ejecutarConsulta($consulta);


if ($usuarioLogin) {
    $_SESSION['admin_nombre'] = $usuarioLogin[0]['email'];
    
} else {
    $_SESSION['admin_nombre'] = '';
    echo '';
}
return true;

