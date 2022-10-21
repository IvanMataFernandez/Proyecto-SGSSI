<?php session_start();

	if (!$_SESSION['autentificado']) {
	
 	echo "<script> window.location.replace('http://localhost:81'); </script> "; 
	}
	
	?>

        
     
        
      







<html>
	<link rel="stylesheet" href="estilo4.css">
	<script type = "text/javascript" src="comprobarCreacionCuadro.js"></script>
	<head>

		
	</head>
	<body>

		<div class="margen">
			<br>
			
			<div class="tituloLogIn"> Introducir registro </div>
			
			<form name = "formulario" action = "añadirDatoABD.php" method = "POST"> 
				
				<div class="textoLogIn"> Nombre: </div>
				<input class="campoLogIn" type="text" name="dato1"  placeholder="[alfanumérico], ej: Mona Lisa"> <br>
				<div class="textoLogIn"> Autor: </div>			
				<input class="campoLogIn" type="text" name="dato2"  placeholder="[alfanumérico], ej: da Vinci"> <br> 
				<div class="textoLogIn"> Largura (cm): </div>
				<input class="campoLogIn" type="text" name="dato3"  placeholder="[numérico, sin incluir cm], ej: 30"> <br>
				<div class="textoLogIn"> Anchura (cm): </div>
				<input class="campoLogIn" type="text" name="dato4" placeholder="[numérico, sin incluir cm], ej: 25"> <br>
				<div class="textoLogIn"> Precio (€): </div>
				<input class="campoLogIn" type="text" name="dato5" placeholder="[numérico, sin incluir €], ej: 30"> <br> <br>		
				<input class ="botonReset" type="reset" value="Restablecer valores"> <br> <br>
				<input class ="botonOpcion" type="button" value = "Añadir" onclick="comprobarDatos()">  <br> <br>
				<a href="cuadrosDeUsuario.php"><input class="botonOpcion" type="button" value="Volver"> </a>
				


		</div>

	</body>
	

	
</html>

