<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administrador</title>
  <link rel="icon" href="../../img/admin.png" />
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
  <link rel="stylesheet" href="http://localhost/chatbot/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="http://localhost/chatbot/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="http://localhost/chatbot/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="http://localhost/chatbot/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="http://localhost/chatbot/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="http://localhost/chatbot/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="http://localhost/chatbot/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="http://localhost/chatbot/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="http://localhost/chatbot/plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="http://localhost/chatbot/dist/css/adminlte.css">
  <link rel="stylesheet" href="http://localhost/chatbot/dist/css/custom.css">
  <link rel="stylesheet" href="http://localhost/chatbot/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="http://localhost/chatbot/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="http://localhost/chatbot/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="http://localhost/chatbot/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
   <script src="http://localhost/chatbot/plugins/toastr/toastr.min.js"></script>
    <script>
      var _base_url_ = 'http://localhost/chatbot/';
    </script>
    <script src="http://localhost/chatbot/dist/js/script.js"></script>
</head>

<body class="hold-transition login-page">

  <div class="login-box">

    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="./" class="h1"><b>Ingresar</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Ingrese para iniciar su sesión</p>

        <form enctype="multipart/form-data" id="formingreso" action="autenticarAdministrador.php" method="POST">
          <div class="input-group mb-3">
            <input name="email" type="text" class="form-control" id="email" placeholder="Usuario">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input autocomplete="off" name="password" type="password" class="form-control" id="password" placeholder="Contraseña">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <a href="http://localhost:3000/index.php">Ir al website del chat</a>
            </div>
            
            <div class="col-4">
              <button id="ingresar" type="submit" class="btn btn-primary btn-block">Ingresar</button>
            </div> 
          </div>
        </form>
      </div>  
    </div> 
  </div>
 

  
<script type="text/javascript">
    $(document).ready(function() {
        $("#ingresar").click(function() {

            var datos = $('#formingreso').serialize();
           // alert(datos);
            $.ajax({
                type: 'POST',
                url: '/admin/back/autenticarAdministrador.php',
                data: datos,
                success: function(resp) {
                    //alert(resp)
                    if (resp != '') {
                     window.location.href='admin.php';
                    } 

                }

            });
            return false;
        });
    });
</script>
</body>

</html>