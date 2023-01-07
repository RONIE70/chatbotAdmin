<?php
class Usuario
{
	public $id;
 	public $nombre;
 	public $foto_user;   
  	public $email;    
  	public $password; 
    

public static function DameUnUsuario($pNombre, $pCorreo, $pClave)
  		{
	  	$unUsuario =new Usuario();
		$unUsuario->nombre=$pNombre;
		$unUsuario->email=$pCorreo;
		$unUsuario->password=$pClave;
		return $unUsuario;
  		}

          public function InsertarUno()
          {
                     $objetoAccesoDato = AccesoDatos::obtenerObjetoAcceso(); 
                     $consulta =$objetoAccesoDato->prepararConsulta("INSERT into usuarios (nombre, email, password) values ('$this->nombre','$this->email','$this->password')");
                     $consulta->execute();
                     return $objetoAccesoDato->RetornarUltimoIdInsertado();
     
          }
     
  	
  	public function InsertarUnoParametros()
		{
		$objetoAccesoDato = AccesoDatos::obtenerObjetoAcceso(); 
		$consulta =$objetoAccesoDato->prepararConsulta("INSERT into administrador (nombre, email, password) values (:nombre,:email,:password)");
		
		$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
		$consulta->bindValue(':email', $this->email, PDO::PARAM_STR);
		$consulta->bindValue(':password', $this->password, PDO::PARAM_STR);
		$consulta->execute();		
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
		}

		public function mostrarDatos()
		{
	  		return "Metodo mostrar:".$this->nombre."  ".$this->email."  ".$this->password;
		}
    }
