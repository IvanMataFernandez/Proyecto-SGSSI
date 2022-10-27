<?php session_start();   ?>

        
     
        
      







<html>
	<link rel="stylesheet" href="estilo.css">
	<script type = "text/javascript" src="comprobarRegistro.js"></script>
	<head>

		
	</head>
	<body>

		<div class="margen">
			<br>
			
			<div class="tituloLogIn"> Registrarse </div>
			
			<form name = "formulario" action = "registrarUsuarioEnBD.php" method = "POST"> 
				
				<div class="textoLogIn"> Nombre y apellido: </div>
				<input class="campoLogIn" type="text" name="nombre"  placeholder="[solo texto], ej: Paco López"> <br>
				<div class="textoLogIn"> DNI: </div>			
				<input class="campoLogIn" type="text" name="dni"  placeholder="[dni], ej: 11111111-H"> <br> 
				<div class="textoLogIn"> Teléfono: </div>
				<input class="campoLogIn" type="text" name="telefo"  placeholder="[9 dígitos], ej: 123456789"> <br>
				<div class="textoLogIn"> Fecha de nacimiento: </div>
				<input class="campoLogIn" type="text" name="naci" placeholder="[aaaa-mm-dd], ej: 2000-01-01"> <br>
				<div class="textoLogIn"> Email: </div>
				<input class="campoLogIn" type="text" name="mail" placeholder="[email], ej: usuario@servidor.extension"> <br>	
				<div class="textoLogIn"> Nombre de usuario: </div>	
				<input class="campoLogIn" type="text" name="usuario" placeholder="[alfanumérico], ej: Usuario123"> <br>	
				<div class="textoLogIn"> Contraseña: </div>		
				<input class="campoLogIn" type="text" name="contraseña"  placeholder="[alfanumérico]"> <br><br>
				<input class ="botonReset" type="reset" value="Restablecer valores"> <br> <br>
				<input class ="botonOpcion" type="button" value = "Registrarse" onclick="comprobarDatos()">  <br> <br>
				<a href="index.php"><input class="botonOpcion" type="button" value="Volver"> </a>
				


		</div>

	</body>
	
	<?php
	
		// Mirar si hubo error porque no se pudo añadir el usuario pq ya estaba en la tabla, por defecto es FALSE por lo que no causa problemas si la variable no se creó todavía

	

	if ($_SESSION['usuarioRepetido']) {
  	
  		echo "<script> window.alert('Fallo al conectar a la BD: Ya existe un usuario con ese nombre, cámbialo por otro') </script>";
  		$_SESSION['usuarioRepetido'] = false;
  	
        } 
	
	?>
	
	
</html>

