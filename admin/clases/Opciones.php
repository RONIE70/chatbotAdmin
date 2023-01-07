<?php
class Opciones
{
	public $idMenu;
	public $descripcion;
	public $idSuperior;
	public $nroOpcion;
	public $opcionFinal;


	public static function traeUnaOpcion($descripcion, $idSuperior, $nroOpcion, $opcionFinal)
	{
		$unaOpcion = new Opciones();
		$unaOpcion->descripcion = $descripcion;
		$unaOpcion->idSuperior = $idSuperior;
		$unaOpcion->nroOpcion = $nroOpcion;
		$unaOpcion->opcionFinal = $opcionFinal;
		return $unaOpcion;
	}

	public static function InsertarUno()
	{
		$objetoAccesoDato = AccesoDatos::obtenerObjetoAcceso();
		$consulta = $objetoAccesoDato->prepararConsulta("INSERT into menuOpciones (descripcion, idSuperior, nroOpcion, opcionFinal) values (:descripcion,:idSuperior,:nroOpcion,:opcionFinal)");
		$consulta->execute();
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}


	public function InsertarUnoParametros()
	{
		$objetoAccesoDato = AccesoDatos::obtenerObjetoAcceso();
		$consulta = $objetoAccesoDato->prepararConsulta("INSERT into menuOpciones (descripcion, idSuperior, nroOpcion,opcionFinal) values (:descripcion,:idSuperior,:nroOpcion,:opcionFinal)");

		$consulta->bindValue(':descripcion', $this->descripcion, PDO::PARAM_STR);
		$consulta->bindValue(':idSuperior', $this->idSuperior, PDO::PARAM_STR);
		$consulta->bindValue(':nroOpcion', $this->nroOpcion, PDO::PARAM_STR);
		$consulta->bindValue(':opcionFinal', $this->opcionFinal, PDO::PARAM_STR);
		$consulta->execute();
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

	public function mostrarDatos()
	{
		return "Metodo mostrar:" . $this->nombre . "  " . $this->email . "  " . $this->password;
	}
}
