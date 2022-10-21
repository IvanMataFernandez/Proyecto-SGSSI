<?php   session_start(); 



  if (!$_SESSION['autentificado']) {
  
	$hostname = "db";
	$username = "admin";
	$password = "test";
	$db = "database";

	$conn = mysqli_connect($hostname,$username,$password,$db);
	if ($conn->connect_error) {
		die("Database connection failed: " . $conn->connect_error);
	}

  
	$a = $_POST['nombre'];
	$b = $_POST['contraseña'];


  // Mirar si se ha introducido texto, si no hay texto, se redirige a la página principal de nuevo.

  
	if ($a == "" || $b == "") {

                  // Contraseña fallada, redireccionar a la página principal de nuevo.
	         mysqli_close($conn);
	         echo "<script> window.location.replace('http://localhost:81/'); </script> ";

	}



   // Buscar contraseña para el usuario escrito

	$rdo = $conn->query("SELECT * FROM USUARIOS WHERE usuario='$a';");
	



  // Mirar si encaja la contraseña introducida
  
	if (mysqli_fetch_array($rdo)['contraseña'] == $b) {
		$_SESSION['falloDeSesion'] = false;   // Contraseña acertada, no se necesitará verificar de nuevo al user hasta que se desconecte.
                $_SESSION['autentificado'] = true;
	        $_SESSION['usuario'] = $a; // Se guarda el nombre del usuario registrado
                $_SESSION['incorrectosSeguidos'] = 0; // Restear fallos
	
	} else {
	        $_SESSION['falloDeSesion'] = true;    // Contraseña fallada, redireccionar a la página principal de nuevo.
                 mysqli_close($conn);
                 
                 if ($_SESSION['incorrectosSeguidos'] == '') {
                	 $_SESSION['incorrectosSeguidos'] = 1;
                        echo "<script> window.location.replace('http://localhost:81/'); </script> ";
                 
                 } else {
                	 $_SESSION['incorrectosSeguidos'] = $_SESSION['incorrectosSeguidos'] + 1;
                 	if ($_SESSION['incorrectosSeguidos'] == 5) {
              
                 	        echo "<script> window.location.replace('http://localhost:81/fallo5veces.php'); </script> ";
                 	} else {
                 		echo "<script> window.location.replace('http://localhost:81/'); </script> ";
                 	}
                 
                 }
                 
                 

	
	}



   



  
	mysqli_close($conn);
	
	// Inicializaciones para la página principal de cuadros.
	
	$_SESSION['falloYaHayCuadro'] = false;
	$_SESSION['BorradoCorrecto'] = false;
	$_SESSION['EditadoCorrecto'] = false;
	$_SESSION['AnadidoCorrecto'] = false;
	$_SESSION['falloNoHayCuadro'] = false;  
	
	$_SESSION['confirmoBorrado'] = false;  

  }
  
  

  


?>




<html>
	
	<link rel="stylesheet" href="estilo2.css">
	
	<head>

	</head>
	<body>

		<br> <br> <br> <br> <br>

		<div class="margen">
			<br>
			
			<div class="tituloLogIn"> ¡Bienvenid@ <?php echo $_SESSION['usuario']?>! ¿Qué desea hacer? </div>  <br> <br>   <br> <br> 
			

				
		
				<a href="cuadrosDeUsuario.php"><input class="botonMenu" type="button" value="Crear,visionar,editar o borrar registros de tu perfil"> </a>  <br> <br> 
				<a href="editarDatosPersonales.php"><input class="botonMenu" type="button" value="Cambiar información personal de la cuenta"> </a>  <br> <br> 
				<a href="index.php"><input class="botonMenu" type="button" value="Desconectarse"> </a>
				


		</div>


	</body>
</html>

