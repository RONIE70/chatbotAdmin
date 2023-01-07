<?php
session_start();

include_once "../db/consultas.php";
include_once "../funciones/menu.php";

$getMesg = $_POST['texto'];

$_SESSION['nroOpcion'] = $_POST['texto'];

if ("0" != $_POST['texto']) {
    $cantidadOpciones = "SELECT idMenu,descripcion,nroOpcion,(
                    SELECT count(1) FROM menuopciones p
                    WHERE p.idSuperior=
                    mo.idMenu limit 1) as cantidad
                    FROM menuopciones mo WHERE idMenu = $getMesg";
}
$resultadoOpcionEnMenu = ejecutarConsulta($cantidadOpciones);
if ($resultadoOpcionEnMenu) {
    foreach ($resultadoOpcionEnMenu as $ocpcionMenu) {
        $idInferior = $ocpcionMenu['nroOpcion'];
        $descripcion = $ocpcionMenu['descripcion'];
        $cantidad = $ocpcionMenu['cantidad'];
        echo "" . $idInferior . "-" . $descripcion . "<br>";
    }
    $opcionesAMostrar = '';
    $idSuperior = '';
    if ($cantidad > 0) {
        $resultadoCantidadOpciones = "SELECT * from menuopciones
                  where idSuperior = $getMesg";
        $opcionesMenu = ejecutarConsulta($resultadoCantidadOpciones);

        $opcionesAMostrar = "<div class='options-wrapper'>";
        foreach ($opcionesMenu as $opcion) {
            $idSuperior = $opcion['idSuperior'];
            $opcionesAMostrar .= "
                                    <div class='option'>
                                        $opcion[3] - $opcion[1]
                                    </div>
                                ";
        }
        $opcionesAMostrar .= '<div class="option">
                                            0- Menú Principal
        <br><div class="option">
        
                                    </div>';
        echo $opcionesAMostrar;
    } else {
        $opcionesAMostrar = obtenerOpcionFinal($getMesg);
        echo $opcionesAMostrar[0]['opcionFinal'];
    }

    if ($idSuperior) {
        actualizarIDsuperior($idSuperior);
    }
}
