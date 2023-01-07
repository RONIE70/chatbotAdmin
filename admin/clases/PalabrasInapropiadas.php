<?php
class PalabrasInapropiadas
{
	public $insulto;

	public static function traeUnaOpcion($insulto)
	{
		$unaOpcion = new PalabrasInapropiadas();
		$unaOpcion->insulto = $insulto;
		return $unaOpcion;
	}

	public static function InsertarUno()
	{
		$objetoAccesoDato = AccesoDatos::obtenerObjetoAcceso();
		$consulta = $objetoAccesoDato->prepararConsulta("INSERT into lenguajeinapropiado (insulto) values (:insulto)");
		$consulta->execute();
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}


	public function InsertarUnoParametros()
	{
		$objetoAccesoDato = AccesoDatos::obtenerObjetoAcceso();
		$consulta = $objetoAccesoDato->prepararConsulta("INSERT into lenguajeinapropiado (insulto) values (:insulto)");
		
		$consulta->bindValue(':insulto', $this->insulto, PDO::PARAM_STR);
		$consulta->execute();
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

    public function borrarPalabrasInapropiadas()
		{
			$objetoAccesoDato = AccesoDatos::obtenerObjetoAcceso(); 
			$consulta =$objetoAccesoDato->prepararConsulta("DELETE from lenguajeinapropiado WHERE insulto=:insulto");	
           
            $consulta->bindValue(':insulto', $this->insulto, PDO::PARAM_STR);		
			$consulta->execute();
			return $consulta->rowCount();

		}

}
