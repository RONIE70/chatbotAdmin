<?php

include_once "../../db/consultas.php";
include_once ("../clases/Usuario.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot-Beltrix Usuarios</title>
    <link rel="stylesheet" href="/css/micss.css">
    <style>
        a {
            color: white;
        }
    </style>
</head>

<body>
    <div style="background-color:rgba(49, 127, 245, 0.961); position: absolute; width: 200px;height: 100%; padding-top: 130px;">
        <!--logo aca o en otra parte-->

        <div class="menu">
            <nav style="color: white;">
                <p><a style="text-decoration:none" href='../front/admin.php'>Administración</a></p><br>
                <p><a style="text-decoration:none" href='../front/configuracion.php'>Configuración</a></p><br>
                <p><a style="text-decoration:none" href='../front/templates.php'>Templates</a></p><br>
            </nav>
        </div>
    </div>
    <div style="padding-left: 200px; height: 100px;background-color:rgba(49, 127, 245, 0.961);">
        <h1>Chat-bot / Administración</h1>
    </div>
    <div style="padding-left: 250px;padding-top: 30px; height: 350px;background-color:white;">
    <h2 class="h3 mb-3 font-weight-normal">MODIFICACION DE USUARIO</h2>  
        <div class="main2">
        <form id="form" class="form-signin" action="../back/insertarUsuario.php" method="post">
  <!-- <a href="/"><img class="mb-4" src="https://image.flaticon.com/icons/png/512/753/753210.png" alt="" width="90" height="90"></a> -->
  
  <label class="sr-only">Nombre Usuario</label><br>
  <input name="nombre" type="text" id="inputName" class="form-control" placeholder="Ingrese su nombre" required value="<?php // echo $_GET ['nombre']; ?>"><br><br>
  <label class="sr-only">Email</label><br>
  <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus value="<?php //echo $_GET ['email']; ?>"><br><br>
  <label class="sr-only">Contraseña</label><br>
  <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required autofocus><br><br>
  <div class="botones">
    <button class="btn btn-lg btn-primary btn-block" type="submit" id="btnregistrar1">ALTA</button><br>
    <button class="btn btn-lg btn-primary btn-block" type="submit" id="btnregistrar2">BAJA</button><br>
    <button class="btn btn-lg btn-primary btn-block" type="submit" id="btnregistrar3">MODIFICACION</button><br>
      
  </div>
        </form>
</div>
    </div>
</body>
<?php
       
// print("El usuario fue ingresado con exito");

// print("<br>");

?>

</html>