<?php session_start();   
include('funciones.php');
	
 	$hostname = "db";
  	$username = "aosldffmeews";
        $password = "dksodlfkmci";
  	$db = "database";

	
 	 $conn = mysqli_connect($hostname,$username,$password,$db);
  	if ($conn->connect_error) {
   		 die("Database connection failed: " . $conn->connect_error);
  	}
  	
	$a = cifrar($_POST['dato1']);
  	$b = cifrar($_POST['dato2']);
  	$c = cifrar($_POST['dato3']);
  	$d = cifrar($_POST['dato4']);
  	$e = cifrar($_POST['dato5']);
  	$f = cifrar($_SESSION['a']); // Nombre previo del cuadro que se quiere cambiar
	$g = $_SESSION['usuario'];
	// Buscando el nombre previo del cuadro, actualizarlo con los datos nuevos

	if ($_POST['dato1'] != '' && $_SESSION['token'] == $_POST['token']) {
	$com = $conn->prepare("UPDATE DATOS SET dato1=?, dato2=?, dato3=?, dato4=?, dato5=? WHERE dato1 = ? && usuario = ? ;");   
	$com->bind_Param('sssssss', $a, $b, $c, $d, $e, $f, $g);
        $val = $com->execute();	

 	
 	
 	if (!$val) {
 		print_r("<script> alert('Error, ha intentado sobrescribir otro cuadro existente, no se han hecho cambios'); </script>"); // si hay fallo por clave repetida, error
 	} else {
		print_r("<script> alert('Cuadro editado correctamente'); </script>");
	 }
	
	} else {$_SESSION['Inyeccion'] = true;}



 
 		
 	 mysqli_close($conn);	
 	
 	echo "<script> window.location.replace('http://localhost:81/cuadrosDeUsuario.php'); </script> "; // redirigir de vuelta
?>




	
