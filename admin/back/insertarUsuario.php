<?php

include_once "../../db/consultas.php";
include_once ("../clases/Usuario.php");
                            
if((isset($_POST['nombre']))&&(isset($_POST['email']))&&(isset($_POST['password'])))
     {
          $usuario = Usuario::DameUnUsuario($_POST['nombre'],$_POST['email'],$_POST['password']);
          $usuario->InsertarUnoParametros($_POST['nombre'],$_POST['email'],$_POST['password']); 
          header('location: ../front/usuarios.php');
        }
else
    {
        print_r("Usuario no valido");
    }
    return $usuario;
  
         
 ?>