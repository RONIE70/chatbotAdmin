<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Chatbot Instituto Beltran</title>
    <link rel="shortcut icon" href="./img/beltrix2.png">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <link rel="stylesheet" href="./css/index.css">
</head>

<script>
    if (localStorage.getItem('estadoUsuario')) {
        const estadoUsuario = localStorage.getItem('estadoUsuario');
        $.ajax({
            url: 'back/validarEstadoUsuario.php',
            type: 'POST',
            data: 'estadoUsuario=' + estadoUsuario,

            success: function(result) {
                console.log(result);
                if (result == 'bloqueado') {
                    //alert('aca entro');
                    location.reload();
                }
            }
        })
    }
</script>

<?php
session_start();
include_once "./db/consultas.php";
include_once "./funciones/menu.php";
include_once "./funciones/palabraInapropiada.php";

$estadoUsuario = '';
if (isset($_SESSION['bloqueado']) && $_SESSION['bloqueado']) {
    $estadoUsuario = generarHTMLBloqueo();
} else {
    if (!isset($_SESSION['nroOpcion'])) {
        $_SESSION['nroOpcion'] = "0";
    }
    $opcionesMenu;
    if (isset($_SESSION['superior'])) {
        $opcionesMenu = inicializarOpcionesMenu();
    } else {
        $opcionesMenu = buscarOpcionesMenu();
    }
}

?>


<p id="Abrir" onclick="iniciarChat()"><img src="./img/beltrix2.png"></p><br>

<script>
    function iniciarChat() {
        var chat = document.getElementById("chatActivo");
        chat.hidden = false;
        var imgAbrir = document.getElementById("Abrir");
        imgAbrir.hidden = true;

    }

    function cerrarChat() {
        var chat = document.getElementById("chatActivo");
        chat.hidden = true;
        var imgAbrir = document.getElementById("Abrir");
        imgAbrir.hidden = false;
    }
</script>

<div class="inicioChat" id="chatActivo" hidden=true>

    <div class="wrapper">
        <div class="title">
            <div class="titulo">
                <div class="beltran">INSTITUTO TECNOLOGICO BELTRAN</div>
            </div>
        </div>
        <?php
        if ($estadoUsuario != '') {

            $ip = $_SERVER["REMOTO_ADDR"];
            $captcha = $_POST["g-recaptcha-response"];
            $secretKey = "6Lfg144iAAAAADW7M1BL6w0zVNoWaBZVgpGs0Uhm";

            $respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?remoteip=$ip&secret=$secretKey&response=$captcha");

            $atributos = json_decode($respuesta, TRUE);


            echo $estadoUsuario;
        } else {
            echo '<div id="cajaPrincipal">
            <div class="form">
                <div class="bot-inbox inbox">
                    <div class="icon">
                        <img src="./img/chat.png">
                    </div>
                    <div class="msg-header">
                        <p>Hola !!  SOY BELTRIX...<br>
                            tu asistente virtual<br>
                            En que te ayudo?</p>

                        <form enctype="multipart/form-data" action="./back/mensaje.php" method="POST">

                            <div class="options-wrapper">';

            echo generarHtmlOpcionesMenu($opcionesMenu);
            echo '<div class="option">
        </div>
        </div>


                            </form>
                        </div>
                    </div>
                </div>
<div id="captcha">
<div class="g-recaptcha" data-sitekey="6Lfg144iAAAAAPxWeZ-llRY1meYFq34VJCf-ugGZ" data-callBack="recaptcha_callBack"></div>
</div>
                <div class="typing-field">
                    <form id="formPreg" enctype="multipart/form-data" action="back/insertarPreguntaHacer.php" method="POST">
                        <div class="input-data">
                            <input name="data" id="data" placeholder="Escribe aqui.." required disabled>
                            <button type="submit" id="send-btn" >Enviar</button>
                        </div>
                    </form>
                </div>

                <div class="boton">
                    <a onclick="cerrarChat()">X</a>
                </div>
            </div>';
        }
        ?>

    </div>
</div>
<script>
    function recaptcha_callBack() {
        var opcion = document.querySelector('#data');
        opcion.removeAttribute('disabled');
        data.style.cursor = "text";
    }
</script>
<script>
    function desloguearUsuario() {
        localStorage.removeItem('_grecaptcha');
        localStorage.removeItem('imgUsuario');
        localStorage.removeItem('estadoAdvertencia');
        session_destroy();
        session_unset();
    }
</script>

<script>
    $(document).ready(function() {
        $("#send-btn").on("click", function() {
            $("#captcha").hide(1000);
            $value = $("#data").val();
            imagenUsuario = '';
            if (localStorage.getItem('imgUsuario')) {
                imagenUsuario = localStorage.getItem('imgUsuario');
            } else {
                imagenUsuario = "./img/usuarios.jpg";
            }

            $(".form").append('<div class="user-inbox inbox"><div class="icon"><img id="usuarioLog" src="' + imagenUsuario + '" ></div><div class="msg-header"><p>' + $value + '</p></div>'); //$msg
            $("#data").val('');

            $.ajax({
                url: 'back/procesarMensaje.php',
                type: 'POST',
                data: 'texto=' + $value,

                success: function(result) {
                    if (result == "bloqueado") {
                        if (localStorage.getItem('estadoAdvertencia')) {
                            localStorage.setItem('estadoUsuario', 'bloqueado');
                            location.reload();
                        } else {
                            localStorage.setItem('estadoAdvertencia', 'A');
                            result = 'ADVERTENCIA<br>Uso de lenguaje inapropiado<br>Si fue una equivocaión<br>Comuniquese con Ayuda.<br>' +
                                'La próxima vez, será BLOQUEADO<br> 0- Volver Menú Principal';
                            $replay = '<br><div class="bot-inbox inbox"><div class="icon"><img src="./img/chat.png" ></div><div class="msg-header options-wrapper advertido">' + result + '</div></div>';
                            $(".form").append($replay);


                        }

                    } else {
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><img src="./img/chat.png" ></div><div class="msg-header options-wrapper">' + result + '</div></div>';
                        $(".form").append($replay);
                    };

                    $(".form").scrollTop($(".form")[0].scrollHeight);
                }
            });
        });
    });
</script>



<script>
    function clickDecir($idMenu) {
        $value = $idMenu;

        $.ajax({
            url: 'back/evaluarPalabra.php',
            type: 'POST',
            data: 'texto=' + $value,

            success: function(result) {
                $replay = '<div class="bot-inbox inbox"><div class="icon"><img src="./img/chat.png" ></div><div class="msg-header options-wrapper">' + result + '</div></div>';
                $(".form").append($replay);
                $(".form").scrollTop($(".form")[0].scrollHeight);
            }
        });
    };
</script>