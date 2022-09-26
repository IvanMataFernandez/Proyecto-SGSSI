

        
     
        
      







<html>
	<link rel="stylesheet" href="estilo4.css">
	<script type = "text/javascript" src="javascript4.js"></script>
	<head>

		
	</head>
	<body>

		<div class="margen">
			<br>
			
			<div class="tituloLogIn"> Introducir registro </div>
			
			<form name = "formulario" action = "añadirDatoABD.php" method = "POST"> <! -- añadir el action despues y la dirección de la página de registro de datos -->
				
				<div class="textoLogIn"> Dato1: </div>
				<input class="campoLogIn" type="text" name="dato1"  placeholder="[alfanumérico]"> <br>
				<div class="textoLogIn"> Dato2: </div>			
				<input class="campoLogIn" type="text" name="dato2"  placeholder="[alfanumérico]"> <br> 
				<div class="textoLogIn"> Dato3: </div>
				<input class="campoLogIn" type="text" name="dato3"  placeholder="[alfanumérico]"> <br>
				<div class="textoLogIn"> Dato4: </div>
				<input class="campoLogIn" type="text" name="dato4" placeholder="[alfanumérico]"> <br>
				<div class="textoLogIn"> Dato5: </div>
				<input class="campoLogIn" type="text" name="dato5" placeholder="[alfanumérico]"> <br> <br>		
				<input class ="botonReset" type="reset" value="Restablecer valores"> <br> <br>
				<input class ="botonOpcion" type="button" value = "Añadir" onclick="comprobarDatos()">  <br> <br>
				<a href="datosDeUsuario.php"><input class="botonOpcion" type="button" value="Volver"> </a>
				


		</div>

	</body>
	

	
</html>

