<?php session_start();   

	
 	$hostname = "db";
  	$username = "admin";
  	$password = "test";
  	$db = "database";

 	 $conn = mysqli_connect($hostname,$username,$password,$db);
  	if ($conn->connect_error) {
   		 die("Database connection failed: " . $conn->connect_error);
  	}
  	
	$a = $_SESSION['a']; // nombre del cuadro
	$b = $_SESSION['usuario'];	
  	
 	$conn->query("DELETE FROM DATOS WHERE dato1 = '$a' && usuario = '$b';");
 	echo "<script> window.location.replace('http://localhost:81/datosDeUsuario.php'); </script> ";
?>




	
