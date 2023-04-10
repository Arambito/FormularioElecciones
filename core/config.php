<?php
//####################################################################

//    ########::'####:'########::'#######::
//    ##.... ##:. ##::... ##..::'##.... ##:
//    ##:::: ##:: ##::::: ##:::: ##:::: ##:
//    ########::: ##::::: ##:::: ##:::: ##:
//    ##.... ##:: ##::::: ##:::: ##:::: ##:
//    ##:::: ##:: ##::::: ##:::: ##:::: ##:
//    ########::'####:::: ##::::. #######::
//    
//                                       
//####################################################################

class Conexion extends mysqli {
	
	// Servidor
	private $host = 'localhost';
	// Usuario
	private $user = 'root';
	// Contraseña
	private $pass = '';
	// Base de datos
	private $datab = 'bd_elecciones';
	
	public function __construct() {
		
		parent::__construct($this->host, $this->user, $this->pass, $this->datab);
		
		if($this->connect_errno) {
			die('Error en la conexión: ' . $this->connect_error);
		} else {
		    $this->query("SET NAMES 'utf8';");
		}
		
	}
	
}

session_start();
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set("America/Santiago");
$db = new Conexion();

?>