<?php 
  session_start(); 

  
  // Conectar a la DB

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

    
  // Insertar en los datos del usuario el valor  
    if ($_POST['dato1'] != '') {
    
 $query = mysqli_query($conn, "INSERT INTO DATOS(dato1,dato2,dato3,dato4,dato5) VALUES('$a','$b','$c','$d','$e')");
 
 if (!$query) { // Si hay fallo porque la clave ya estaba de antes en la BD, hay error
 	$_SESSION['falloYaHayCuadro'] = true;
 } else { // Si la clave no estaba de antes, se añadió correctamente
 	$_SESSION['AnadidoCorrecto'] = true; 
 }
 
     } else {
     
      	$_SESSION['Inyeccion'] = true;
     }



 
 // Se cambia la variable de sesión correspondiente para mostar un pop-up tras la inserción del cuadro


 mysqli_close($conn);	
    
 echo "<script> window.location.replace('http://localhost:81/cuadrosDeUsuario.php'); </script> ";



?>




	
