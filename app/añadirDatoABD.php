<?php 
include('funciones.php');
  session_start(); 

  
  // Conectar a la DB

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
  $f = $_SESSION['usuario'];

    
  // Insertar en los datos del usuario el valor  
    if ($_POST['dato1'] != '' && $_SESSION['token'] == $_POST['token']) {
    
 $com = $conn->prepare("INSERT INTO DATOS(dato1,dato2,dato3,dato4,dato5,usuario) VALUES(?,?,?,?,?,?)");       
 $com->bind_Param('ssssss', $a, $b, $c, $d, $e, $f);
 $val = $com->execute();
 
 if (!$val) { // Si hay fallo porque la clave ya estaba de antes en la BD, hay error
		print_r("<script> alert('Error, ha intentado sobrescribir otro cuadro existente, no se han hecho cambios'); </script>");
 } else { // Si la clave no estaba de antes, se añadió correctamente
		print_r("<script> alert('Cuadro generado correctamente'); </script>");
 }
 
     } else {
     
      	$_SESSION['Inyeccion'] = true;
     }



 
 // Se cambia la variable de sesión correspondiente para mostar un pop-up tras la inserción del cuadro


 mysqli_close($conn);	
    
 echo "<script> window.location.replace('http://localhost:81/cuadrosDeUsuario.php'); </script> ";



?>




	
