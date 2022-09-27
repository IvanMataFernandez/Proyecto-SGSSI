<?php session_start();   

	
 	$hostname = "db";
  	$username = "admin";
  	$password = "test";
  	$db = "database";

 	 $conn = mysqli_connect($hostname,$username,$password,$db);
  	if ($conn->connect_error) {
   		 die("Database connection failed: " . $conn->connect_error);
  	}
  	
	$a = $_SESSION['idBorrar'];
  	
 	$conn->query("DELETE FROM DATOS WHERE clave = $a");
 	echo "<script> window.location.replace('http://localhost:81/datosDeUsuario.php'); </script> ";
?>




	
