<?php   session_start(); 



  if ($_SESSION['autentificacionNecesaria']) {
  
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
		$_SESSION['falloDeSesion'] = false;   // Contraseña acertada
		$_SESSION['autentificacionNecesaria'] = false;
	        $_SESSION['usuario'] = $a;

	
	} else {
	        $_SESSION['falloDeSesion'] = true;    // Contraseña fallada, redireccionar a la página principal de nuevo.
                 mysqli_close($conn);
	         echo "<script> window.location.replace('http://localhost:81/'); </script> ";
	
	}



   



  
	mysqli_close($conn);
	
	$_SESSION['falloYaHayCuadro'] = false;
	$_SESSION['BorradoCorrecto'] = false;
	$_SESSION['EditadoCorrecto'] = false;
	$_SESSION['AnadidoCorrecto'] = false;
	$_SESSION['falloNoHayCuadro'] = false;  
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

