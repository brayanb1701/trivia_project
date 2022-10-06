<!DOCTYPE HTML>
<!--
	Visualize by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">

					

						<?php
						session_start();
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
						
						$sql="SELECT * FROM trivia.preguntas WHERE activo='N'";
						$sql = mysqli_query($conexion,$sql);
							while($rs = mysqli_fetch_array($sql)) { 
								$id=$rs[0];
								$r=$_POST["$id"];
								$preg=$rs[1];
								$rselec=$rs[$r+1];
								$rcorrect=$rs[6];
								$activo=$rs[7];					
								
								if($r==$rcorrect) $result="Correcto";
								else $result="Incorrecto";
								
								echo '
								<h2>Pregunta: '.$preg.'</h2>
								<p>
								Respuesta Seleccionada: '.$rselec.'<br>
								'.$result.'
								</p>
								';
								}
						}
						
						?>
						
						<a href="salir.php"><input type="button" value="Terminar"></a>

						
						
					<footer id="footer">
						<p>&copy; Untitled. All rights reserved. Design: <a href="http://templated.co">TEMPLATED</a>. Demo Images: <a href="http://unsplash.com">Unsplash</a>.</p>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>