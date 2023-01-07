<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chatbot-Beltrix Templates</title>
  <link rel="stylesheet" href="/css/micss.css">
  <style>
    a {
      color: white;
    }

    .muestra {
      width: 100px;
      height: 100px;
      background-color: #1612e9;
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
        <p><a style="text-decoration:none" href='../front/usuarios.php'>Usuarios</a></p><br>
      </nav>
    </div>
  </div>
  <div style="padding-left: 200px; height: 100px;background-color:rgba(49, 127, 245, 0.961);">
    <h1 style="align-items: center">Chat-bot / Administración</h1>
  </div>
  <div style="padding-left: 250px;padding-top: 30px; height: 350px;background-color:white;">
    <h2>EXPERIENCIA DE USUARIO</h2>
    <form enctype="multipart/form-data" action="../back/subirArchivos.php" method="POST">
      Añadir Logo de la empresa:<br>
      <div class="main">
        <p> Enviar mi archivo:
          <input name="archivo" id="archivo" type="file" />
      </div>
      <input id="btnregistrar1" type="submit" name="subir" value="Subir imagen" />

    </form>


    <br><br>
    <form enctype="multipart/form-data" action="../back/subirArchivos.php" method="POST">
      Añadir Icon Chat:<br>
        <div class="main">
          <p> Enviar mi archivo: 
          <input name="archivoIcon" id="archivoIcon" type="file" />
        </div>
        <input id="btnregistrar1" type="submit" name="subirIcon" value="Subir imagen" />

    </form>

    <br><br>
    <form enctype="multipart/form-data" action="../back/subirArchivos.php" method="POST">
      <div>Añadir favicon:
        <div class="main">
        <p> Enviar mi archivo: 
          <input name="archivoFavicon" id="archivoFavicon" type="file" />
        </div>
        <input id="btnregistrar1" type="submit" name="subirFavicon" value="Subir imagen" />

    </form>
    <br><br><br><br>
    <form enctype="multipart/form-data" action="../back/subirArchivos.php" method="POST">
      <div>Seleccionar color: 
      <div class="main">
          <input type="submit" name="selectColor1" style="background-color:red" value="rojo"></input>
          <input type="submit" name="selectColor2" style="background-color:green" value="verde"></input>
          <input type="submit" name="selectColor3" style="background-color:white; color:black !important" value="blanco"></input>
          <input type="submit" name="selectColor4" style="background-color:black; color:white !important" value="negro"></input>
          <input type="submit" name="selectColor5" style="background-color:orange" value="naranja"></input>
          <input type="submit" name="selectColor6" style="background-color:yellow" value="amarillo"></input>
          <input type="submit" name="selectColor7" style="background-color:blue" value="azul"></input>
          <input type="submit" name="selectColor8" style="background-color:grey" value="gris"></input>
        
  </div>
      </div>
        <input class="rojo" id="btnregistrar2" type="submit" name="colorSeleccionado" value="Subir imagen" />
    </form>

  </div>
  </div>
  </div>
</body>

</html>
<br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


<div class="muestra"></div>

<script>
  $(document).ready(function() {
    $(".selectColor1").on("click", function() {
      $(this).css('background-color', 'red');
    });
  });

  $(document).ready(function() {
    $(".selectColor2").on("click", function() {
      $(this).css('background-color', 'green');
    });
  });
</script>