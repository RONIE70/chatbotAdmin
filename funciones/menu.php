<?php
include_once "sesion.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/db/consultas.php";

function inicializarOpcionesMenu()
{
    $menu = "SELECT * FROM  menuOpciones  WHERE idSuperior " . $_SESSION['superior'] . "";
    $opciones = ejecutarConsulta($menu);
    return $opciones;
}


function buscarOpcionesMenu()
{

    if ($_SESSION['nroOpcion'] != "0") {
        $dataOpcion = "SELECT mo.* FROM menuOpciones mo
                            WHERE idSuperior = (SELECT idmenu FROM menuOpciones o
                                                WHERE o.idsuperior " . $_SESSION['superior'] . " AND nroOpcion = " . $_SESSION['nroOpcion'] . ")";
    } else {
        $dataOpcion = "SELECT * FROM menuOpciones WHERE idSuperior is null";
    }

    $opcionesMenu = ejecutarConsulta($dataOpcion);

    return $opcionesMenu;
}

function generarHtmlOpcionesMenu($opcionesMenu)
{
    $htmlOpcionesMenu = "";

    foreach ($opcionesMenu as $opcion) {
        $nroOpcion = $opcion['nroOpcion'];
        $descripcion = $opcion['descripcion'];
        actualizarIDsuperior($opcion['idSuperior']); //funciones sesion.php
        $htmlOpcionesMenu .= "<div class='option'> $nroOpcion  - $descripcion </div>";
        //print_r($opcion);
    }

    $htmlOpcionesMenu .= "<div class='option'> 0 - Menú Principal <br>
    </div>";

    return $htmlOpcionesMenu;
}

function buscarIdOpcionMenu()
{
    $idMenuOpcion = "SELECT idmenu FROM menuOpciones o
                        WHERE o.idsuperior " . $_SESSION['superior'] . " 
                        AND nroOpcion = " . $_SESSION['nroOpcion'] . "";

    $idOpcionMenu = ejecutarConsulta($idMenuOpcion);
    return $idOpcionMenu;
}



function obtenerOpcionFinal($idOpcionMenu)
{

    if ($idOpcionMenu == 23) {
        include "../front/loginUsuario.php";
        die();
    } else {
        $idOpcionFinal = "SELECT opcionFinal
    FROM menuopciones  where idMenu = $idOpcionMenu";

        $idOpcionMenu = ejecutarConsulta($idOpcionFinal);
        return $idOpcionMenu;
    }
}
