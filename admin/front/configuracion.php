<?php
include_once "../../db/consultas.php";
include_once "../clases/Preguntas.php";

$consulta = Preguntas::RetornaUltimasPalabras();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chatbot-Beltrix Configuración</title>
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
        <p><a style="text-decoration:none" href='../front/templates.php'>Templates</a></p><br>
        <p><a style="text-decoration:none" href='../front/usuarios.php'>Usuarios</a></p><br>
      </nav>
    </div>
  </div>
  <div style="padding-left: 200px; height: 100px;background-color:rgba(49, 127, 245, 0.961);">
    <h1>Chat-bot / Administración</h1>
  </div>
  <div style="padding-left: 230px;padding-top: 30px; height: 350px;background-color:white;">
    <h2>CONFIGURACIONES</h2>

    <div class="container">
      <h3>Palabras claves con la respuesta que visualiza el usuario por pantalla </h3><br>
      </head>

      <body id="body">

        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">

          <br><br>
          <table id="tablestop" cellspacing=2 cellpadding=2>
            <thead>
              <tr>
                <td>ID</td>
                <td>PALABRA CLAVE</td>
                <td>RESPUESTA</td>
              </tr>
            </thead>
            <tbody>

              <?php

              foreach ($consulta as $dato) {

              ?>

                <tr>
                  <td><?php echo $dato->idPalClave; ?></td>
                  <td><?php echo $dato->palabraClave; ?></td>
                  <td><?php echo $dato->palRespuestas; ?></td>

                  <!--<td><a href="formUsuario.php?id=<?php echo $dato->id; ?>">Editar</a></td>-->
                  <td><a href="frmVehiculoModificar.php?id=<?php echo $dato->Patente; ?>">Modificar</a></td>
                </tr>

              <?php
              }
              ?>
            </tbody>
          </table>
          <h3>Palabras inapropiadas</h3>
          <div class="main3">
            <form enctype="multipart/form-data" id="form" class="form-signin" >
              <!-- <a href="/"><img class="mb-4" src="https://image.flaticon.com/icons/png/512/753/753210.png" alt="" width="90" height="90"></a> -->

              <label class="sr-only">Palabra Inapropiada</label><br>
              <input name="insulto" type="text" id="insulto" class="form-control" placeholder="Ingrese palabra" required value="<?php // echo $_GET ['nombre'];
                                                                                                                                        ?>"><br><br>

              <div class="botones">
                <button class="btn btn-lg btn-primary btn-block" type="submit" action="../back/insertarPalabrasInapropiadas.php" method="post" id="btnregistrar6">ALTA</button><br>
                <button class="btn btn-lg btn-primary btn-block" type="submit" id="btnregistrar5">BAJA</button><br>
                <button class="btn btn-lg btn-primary btn-block" type="submit" id="btnregistrar6">MODIFICACION</button><br>

              </div>
            </form>
          </div><br><br>
          <h3>Opciones del menú</h3>
          <div class="main3">
            <form enctype="multipart/form-data" id="form" class="form-signin" >
              <!-- <a href="/"><img class="mb-4" src="https://image.flaticon.com/icons/png/512/753/753210.png" alt="" width="90" height="90"></a> -->

              <label class="sr-only">Descripción</label><br>
              <input name="descripcion" type="text" id="inputName" class="form-control" placeholder="Ingrese su nombre" required value="<?php // echo $_GET ['nombre'];
                                                                                                                                        ?>"><br><br>
              <label class="sr-only">Id Menu Principal/Superior</label><br>
              <input name="superior" type="text" id="inputEmail" class="form-control" placeholder="Email" required autofocus value="<?php //echo $_GET ['email'];
                                                                                                                                    ?>"><br><br>
              <label class="sr-only">Número de Opción dentro del menú correspondiente</label><br>
              <input name="opcion" type="text" id="inputPassword" class="form-control" placeholder="número de orden" required autofocus><br><br>
              <label class="sr-only">Información de Opcion Final</label><br>
              <input name="final" type="text" id="inputPassword2" class="form-control" placeholder="Resultado de la búsqueda" required autofocus><br><br>

              <div class="botones">
                <button class="btn btn-lg btn-primary btn-block" type="submit" action="../back/insertarOpcionesMenu.php" method="post" id="btnregistrar4">ALTA</button><br>
                <button class="btn btn-lg btn-primary btn-block" type="submit" id="btnregistrar5">BAJA</button><br>
                <button class="btn btn-lg btn-primary btn-block" type="submit" id="btnregistrar6">MODIFICACION</button><br>

              </div>
            </form>
          </div>
        </div>
    </div>
  </div>
</body>

</html>