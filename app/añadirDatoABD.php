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
  $f = $_SESSION['usuario'];
    
 $query = mysqli_query($conn, "INSERT INTO DATOS(dato1,dato2,dato3,dato4,dato5,usuario) VALUES('$a','$b','$c','$d','$e', '$f')");


 mysqli_close($conn);	
    
 echo "<script> window.location.replace('http://localhost:81/datosDeUsuario.php'); </script> ";



?>




	
