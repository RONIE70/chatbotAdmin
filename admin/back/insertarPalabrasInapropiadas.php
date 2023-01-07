<?php

include_once "../../db/consultas.php";
include_once ("../clases/PalabrasInapropiadas.php");
var_dump ($_POST['insulto']); 

if((isset($_POST['insulto'])))
     {
          $insulto = PalabrasInapropiadas::traeUnaOpcion($_POST['insulto']);        
          $insulto ->InsertarUnoParametros();
          
          header('location: ../front/configuracion.php');
        }
else
    {
        print_r("Usuario no valido");
    }
    return $insulto;
    //print_r($opcionMenu);
  
         
 ?>