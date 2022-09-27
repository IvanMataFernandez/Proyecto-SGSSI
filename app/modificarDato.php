<?php session_start();   

	
 	$hostname = "db";
  	$username = "admin";
  	$password = "test";
  	$db = "database";

 	 $conn = mysqli_connect($hostname,$username,$password,$db);
  	if ($conn->connect_error) {
   		 die("Database connection failed: " . $conn->connect_error);
  	}
  	
	$a = $_POST['dato1'];
  	$b = $_POST['dato2'];
  	$c = $_POST['dato3'];
  	$d = $_POST['dato4'];
  	$e = $_POST['dato5'];
  	$f = $_SESSION['idEditar'];

 	$query = mysqli_query($conn, "UPDATE DATOS SET dato1='$a', dato2='$b', dato3='$c', dato4='$d', dato5='$e' WHERE clave=$f ");
 	echo "<script> window.location.replace('http://localhost:81/datosDeUsuario.php'); </script> ";
?>




	
