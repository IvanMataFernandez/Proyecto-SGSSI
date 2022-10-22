<?php   session_start(); 



  if (!$_SESSION['autentificado']) {
  
	$hostname = "db";
	$username = "aosldffmeews";
	$password = "dksodlfkmci";
	$db = "database";

	$conn = mysqli_connect($hostname,$username,$password,$db);
	if ($conn->connect_error) {
		die("Database connection failed: " . $conn->connect_error);
	}

  
	$a = $_POST['nombre'];
	$cont = $_POST['contraseña'];


  // Mirar si se ha introducido texto, si no hay texto, se redirige a la página principal de nuevo.

  
	if ($a == "" || $cont == "") {

                  // Contraseña fallada, redireccionar a la página principal de nuevo.
	         mysqli_close($conn);
	         echo "<script> window.location.replace('http://localhost:81/'); </script> ";

	}



   // Buscar contraseña para el usuario escrito


        $com = $conn->prepare("SELECT * FROM USUARIOS WHERE usuario=?;");    						
	$com->bind_Param('s', $a);
        $com->execute(); 
        $com->store_result();
        $cor = false;
        
        if ($com->affected_rows > 0) {
                 $com->bind_result($a, $b, $c, $d, $e, $f, $g, $h);
		 $com->fetch();
		 
		 
		 $cont = $cont.$h;
		 $cont = hash('sha256', $cont, false);	
		 
		 $cor = $cont == $g;
		 
        
        } 
        
        if (!$cor) {
        
	        $_SESSION['falloDeSesion'] = true;    // Contraseña fallada, redireccionar a la página principal de nuevo.

                 
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
                 
                 

	        
        } else {
    		$_SESSION['falloDeSesion'] = false;   // Contraseña acertada, no se necesitará verificar de nuevo al user hasta que se desconecte.
                $_SESSION['autentificado'] = true;
	        $_SESSION['usuario'] = $a; // Se guarda el nombre del usuario registrado
                $_SESSION['incorrectosSeguidos'] = 0; // Restear fallos    
        
      	// Inicializaciones para la página principal de cuadros.  
        	
		$_SESSION['falloYaHayCuadro'] = false;
		$_SESSION['BorradoCorrecto'] = false;
		$_SESSION['EditadoCorrecto'] = false;
		$_SESSION['AnadidoCorrecto'] = false;
		$_SESSION['falloNoHayCuadro'] = false;  
	
		$_SESSION['confirmoBorrado'] = false;  
        }
        
       mysqli_close($conn);
       




   






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

