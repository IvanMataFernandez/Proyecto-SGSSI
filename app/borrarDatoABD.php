<?php session_start();   

	// Acceder a la BD
	
 	$hostname = "db";
  	$username = "admin";
  	$password = "test";
  	$db = "database";

 	 $conn = mysqli_connect($hostname,$username,$password,$db);
  	if ($conn->connect_error) {
   		 die("Database connection failed: " . $conn->connect_error);
  	}
  	
	$a = $_SESSION['a']; // nombre del cuadro

  	
  	// Buscar el cuadro a borrar y eliminarlo (se sabe que existe porque se hizo un SELECT antes)
  	
 	$conn->query("DELETE FROM DATOS WHERE dato1 = '$a';");
 	$_SESSION['BorradoCorrecto'] = true;	
 	
 	// Redirigir a la página principal de cuadros
 	
 	echo "<script> window.location.replace('http://localhost:81/cuadrosDeUsuario.php'); </script> ";
?>




	
