<?php

include_once "../../db/consultas.php";
include_once ("../clases/Opciones.php");
                            
if((isset($_POST['descripcion']))&&(isset($_POST['superior']))&&(isset($_POST['opcion']))&&(isset($_POST['final'])))
     {
          $opcionMenu = Opciones::traeUnaOpcion($_POST['descripcion'],$_POST['superior'],$_POST['opcion'],$_POST['final']);        
          $opcionMenu ->InsertarUnoParametros();
          header('location: ../front/configuracion.php');
        }
else
    {
        print_r("Usuario no valido");
    }
    return $opcionMenu;
    print_r($opcionMenu);
  
         
 ?>