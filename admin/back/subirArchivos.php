<?php
include_once "../../db/consultas.php";
include_once ("../clases/Templates.php");


//Si se quiere subir una imagen
if (isset($_POST['subir'])) {
   //Recogemos el archivo enviado por el formulario
   $archivo = $_FILES['archivo']['name'];
   //Si el archivo contiene algo y es diferente de vacio
   if (isset($archivo) && $archivo != "") {
      //Obtenemos algunos datos necesarios sobre el archivo
      $tipo = $_FILES['archivo']['type'];
      $tamano = $_FILES['archivo']['size'];
      $temp = $_FILES['archivo']['tmp_name'];
      //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
     if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
        echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
        - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
     }
     else {
        //Si la imagen es correcta en tamaño y tipo
        //Se intenta subir al servidor
        if (move_uploaded_file($temp, './archivos'.$archivo)) {
            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
            chmod('./archivos'.$archivo, 0777);
            //Mostramos el mensaje de que se ha subido co éxito
            echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
            //Mostramos la imagen subida
            echo '<p><img src="./archivos'.$archivo.'"></p>';
        }
        else {
           //Si no se ha podido subir la imagen, mostramos un mensaje de error
           echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
        }
      }
   }
}


if (isset($_POST['subirIcon'])) {
   
    $archivo = $_FILES['archivoIcon']['name'];

    if (isset($archivo) && $archivo != "") {
       //
       $tipo = $_FILES['archivoIcon']['type'];
       $tamano = $_FILES['archivoIcon']['size'];
       $temp = $_FILES['archivoIcon']['tmp_name'];
       
      if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
         echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
         - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
      }
      else {
        
         if (move_uploaded_file($temp, './archivos'.$archivo)) {
              chmod('./archivos'.$archivo, 0777);
             echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
             echo '<p><img src="./archivos'.$archivo.'"></p>';
         }
         else {
            echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
         }
       }
    }
 }

 if (isset($_POST['subirFavicon'])) {
   
    $archivo = $_FILES['archivoFavicon']['name'];

    if (isset($archivo) && $archivo != "") {
       //
       $tipo = $_FILES['archivoFavicon']['type'];
       $tamano = $_FILES['archivoFavicon']['size'];
       $temp = $_FILES['archivoFavicon']['tmp_name'];
       
      if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
         echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
         - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
      }
      else {
        
         if (move_uploaded_file($temp, './archivos'.$archivo)) {
              chmod('./archivos'.$archivo, 0777);
             echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
             echo '<p><img src="./archivos'.$archivo.'"></p>';
         }
         else {
            echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
         }
       }
    }
 }

 if (isset($_POST['selectColor'])) {
   
    $archivo = $_FILES['colorSeleccionado']['name'];

    if (isset($archivo) && $archivo != "") {
       //
       $tipo = $_FILES['colorSeleccionado']['type'];
       $tamano = $_FILES['colorSeleccionado']['size'];
       $temp = $_FILES['colorSeleccionado']['tmp_name'];
       
      if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
         echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
         - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
      }
      else {
        
         if (move_uploaded_file($temp, './archivos'.$archivo)) {
              chmod('./archivos'.$archivo, 0777);
             echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
             echo '<p><img src="./archivos'.$archivo.'"></p>';
         }
         else {
            echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
         }
       }
    }
 }
?>
