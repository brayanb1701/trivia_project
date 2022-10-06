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
					<form name="form" action="resultados.php" method="POST" >
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
							$contador=0;
							while($contador<10){	
							$num=rand(1, 50);						
							$sql= "SELECT * FROM trivia.preguntas WHERE id=$num";
							$sql = mysqli_query($conexion,$sql);
							while($rs = mysqli_fetch_array($sql)) { 
								$id=$rs[0];
								$preg=$rs[1];
								$r1=$rs[2];
								$r2=$rs[3];
								$r3=$rs[4];
								$r4=$rs[5];
								$rcorrect=$rs[6];
								$activo=$rs[7];
									if($activo=='S'){
										$contador++;
										echo '
										<p>
										<strong><h2>Pregunta: '.$preg.'</h2></strong><br><input type="radio" name="'.$id.'" value="1" id="'.$id.'1"><label for="'.$id.'1">'.$r1.'</label><br>
										<input type="radio" name="'.$id.'" value="2" id="'.$id.'2"><label for="'.$id.'2">'.$r2.'</label><br>
										<input type="radio" name="'.$id.'" value="3" id="'.$id.'3"><label for="'.$id.'3">'.$r3.'</label><br>
										<input type="radio" name="'.$id.'" value="4" id="'.$id.'4"><label for="'.$id.'4">'.$r4.'</label><br>
										<br>
										</p>
										';
										
										$sql2="UPDATE trivia.preguntas SET activo='N' WHERE id=$id";
										$sql2 = mysqli_query($conexion, $sql2); 
									}
							}
							}	
						}					
						?>
						<input type="submit" value="Enviar">
						</form>
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