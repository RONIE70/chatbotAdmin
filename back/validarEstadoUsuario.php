<?php
session_start();
$mensaje = $_POST['estadoUsuario'];

if($mensaje == 'bloqueado' && !isset($_SESSION['bloqueado'])){
    $_SESSION['bloqueado'] = true;
    //print_r($mensaje);
    echo 'bloqueado';
}
return;

?>