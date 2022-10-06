<?php 
//-- variables para conectarse a la base de datos
ini_set('session.gc_maxlifetime',3600);  // 1 hora
session_start();
error_reporting(E_ALL);
ob_start();
//$_SESSION["pezmasgato"] = false;//--Variable de seguridad
$usuario=$_POST["usuario"];

			$_SESSION["usuario"] = $usuario;
			header ("Location: preguntas.php?mensaje=Iniciar.");
			exit(); 



?>
