<?php


    function ejecutarLevenshtein($mensaje){
        $resultadoLevenshtein =  ejecutarConsulta("SELECT palabraClave,idPalClave,palRespuestas,idMenu,descripcion 
        FROM ( select palabraClave,idPalClave,palRespuestas, 1 orden 
        from ( select palabraClave,idPalClave,palRespuestas 
        from preguntas p where palabraClave like '%.$mensaje.%' limit 1) v1 
        union select palabraClave,idPalClave,palRespuestas, 2 orden 
        from ( select palabraClave,idPalClave,palRespuestas 
        from preguntas p order by LEVENSHTEIN('.$mensaje.', palabraClave) limit 1) v2 
        order by orden ) as r 
        inner join ( select idMenu,descripcion, 1 orden, 'opcion' 
        from ( select idMenu,descripcion 
        from menuOpciones m where descripcion like '%.$mensaje.%' limit 1) v1 
        union select idMenu,descripcion, 2 orden, 'clave' 
        from ( select idMenu,descripcion from menuOpciones m 
        order by LEVENSHTEIN('.$mensaje.', descripcion) asc limit 1) v2
        order by orden ) q limit 1;");

        return $resultadoLevenshtein;
    }

    function generarHtmlResultadoLevenshtein($resultadoLevenshtein){
        
        $idmenu = $resultadoLevenshtein[0]['idMenu'];
        $descripcion = $resultadoLevenshtein[0]['descripcion'];

        $htmlResultadoLevenshtein = "Quisiste decir . . . " . "<br>";
        $htmlResultadoLevenshtein.= '<a href="#" id="idmenu" onclick="clickDecir(' . $idmenu . ')" style="color:#FF0000">' . $descripcion . "?" . '</a>' . "<br>";
        return $htmlResultadoLevenshtein;
    }
    

?>
