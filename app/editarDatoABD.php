<?php session_start();   

	
 	$hostname = "db";
  	$username = "aosldffmeews";
        $dp = fopen("archivoPassword.txt", "r"); // Coger la password de ese fichero, nadie tiene acceso al código de él aparte de la propia web (tiene permisos 400 con user data-www)
        $password = fgets($dp);
        fclose($dp);
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

	// Buscando el nombre previo del cuadro, actualizarlo con los datos nuevos

	if ($_POST['dato1'] != '') {
	$com = $conn->prepare("UPDATE DATOS SET dato1=?, dato2=?, dato3=?, dato4=?, dato5=? WHERE dato1 = ?;");   
	$com->bind_Param('ssssss', $a, $b, $c, $d, $e, $f);
        $val = $com->execute();	

 	
 	
 	if (!$val) {
 		$_SESSION['falloYaHayCuadro'] = true; // si hay fallo por clave repetida, error
 	} else {
 		$_SESSION['EditadoCorrecto'] = true; // si no hay fallo por clave repetida, todo correcto
	 }
	
	} else {$_SESSION['Inyeccion'] = true;}



 
 		
 	 mysqli_close($conn);	
 	
 	echo "<script> window.location.replace('http://localhost:81/cuadrosDeUsuario.php'); </script> "; // redirigir de vuelta
?>




	
