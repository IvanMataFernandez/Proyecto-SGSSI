<?php session_start();   


	if (!$_SESSION['confirmoBorrado']) {
	
		if ($_SESSION['autentificado']) {
			$_SESSION['Inyeccion'] = true;
			 echo "<script> window.location.replace('http://localhost:81/cuadrosDeUsuario.php'); </script> ";
		} else {
			 echo "<script> window.location.replace('http://localhost:81/index.php'); </script> ";
		
		}
	

	
	} else {


	// Acceder a la BD
	
 	$hostname = "db";
        $username = "aosldffmeews";
        $password = "dksodlfkmci";
  	$db = "database";

 	 $conn = mysqli_connect($hostname,$username,$password,$db);
  	if ($conn->connect_error) {
   		 die("Database connection failed: " . $conn->connect_error);
  	}
  	
	$a = $_SESSION['a']; // nombre del cuadro

  	
  	// Buscar el cuadro a borrar y eliminarlo (se sabe que existe porque se hizo un SELECT antes)
        $com = $conn->prepare("DELETE FROM DATOS WHERE dato1 = ?;");    	
        $com->bind_Param('s', $a);
        $com->execute();
 	$_SESSION['BorradoCorrecto'] = true;	
 	
 	// Redirigir a la página principal de cuadros
 	
 	echo "<script> window.location.replace('http://localhost:81/cuadrosDeUsuario.php'); </script> ";
 	
 	
 	}
?>




	
