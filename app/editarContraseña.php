<?php session_start();
include('funciones.php');

	if (!$_SESSION['autentificado']) {
	
 	echo "<script> window.location.replace('http://localhost:81'); </script> "; 
	}
	
	if ($_SESSION['confirmoBorrado'] == true) {
		$_SESSION['confirmoBorrado'] = false;  
	}


 

?>







<html>
	<link rel="stylesheet" href="estilo8.css">
	<script type = "text/javascript" src="comprobarContraseña.js"></script>
	<head>

		
	</head>
	<body>
<br><br><br>
		<div class="margen">
			<br>
			
			<div class="tituloLogIn"> Cambiar contraseña </div>
			
			<form name = "formulario" action = "editarContraseñaABD.php" method = "POST"> 
				
				<div class="textoLogIn"> Contraseña:  </div>
				<input class="campoLogIn" type="text" name="cont" placeholder="[alfanumérico (incluye símbolos raros)]" > <br><br><br>
				<input class ="botonOpcion" type="button" value = "Guardar" onclick="comprobarDatos()">  <br> <br>
				<input type="hidden" name = "token" value= <?php print_r($_SESSION['token'])?> >
				<a href="paginaDeUsuario.php"><input class="botonOpcion" type="button" value="Volver"> </a>
				


		</div>

	</body>
	

	
	
</html>

