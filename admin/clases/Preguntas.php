<?php
class Preguntas
{
	public $idPalClave;
	public $palabraClave;
	public $palRespuestas;


    public static function RetornaUltimasPalabras()
    {
            $objetoAccesoDato = AccesoDatos::obtenerObjetoAcceso(); 
            $consulta =$objetoAccesoDato->prepararConsulta
            ("SELECT * FROM preguntas order by idPalClave ASC");
            $consulta->execute();           
            return $consulta->fetchAll(PDO::FETCH_CLASS, "Preguntas");     
    }
	
}
    ?>