<?php session_start();
error_reporting(E_ALL);
ob_start();

$servidor	= 'localhost';
						$base_datos	= 'trivia';
						$tabla	= 'preguntas';
						$usr_sistema	= 'root';
						$pass_sistema	= 'projects'; 
						$conexion=mysqli_connect($servidor, $usr_sistema, $pass_sistema);
						if (!$conexion){
							header ("Location: index.php?mensaje=error de conexion.");
							exit(); 
						}
						else{
										$sql2="UPDATE trivia.preguntas SET activo='S' WHERE activo='N'";
										$sql2 = mysqli_query($conexion, $sql2); 
						}

session_destroy();

header("Location: index.php?mensaje='Finalizado con exito");
		exit;

?>