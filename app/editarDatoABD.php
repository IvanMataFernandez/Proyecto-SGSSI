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
  	$f = $_SESSION['a']; // Nombre previo del cuadro que se quiere cambiar
  	$g = $_SESSION['usuario'];

 	$query = mysqli_query($conn, "UPDATE DATOS SET dato1='$a', dato2='$b', dato3='$c', dato4='$d', dato5='$e' WHERE dato1 = '$f' && usuario= '$g'  ");
 	
 	
 if (!$query) {
 	$_SESSION['falloYaHayCuadro'] = true;
 } else {
 	$_SESSION['EditadoCorrecto'] = true;
 }
 	 mysqli_close($conn);	
 	
 	echo "<script> window.location.replace('http://localhost:81/cuadrosDeUsuario.php'); </script> ";
?>




	
