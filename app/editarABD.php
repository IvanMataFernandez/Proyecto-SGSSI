<?php session_start();

  // Conectar a la DB

  $hostname = "db";
  $username = "admin";
  $password = "test";
  $db = "database";



  $conn = mysqli_connect($hostname,$username,$password,$db);
  if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
  }
  
  $a = $_POST['nombre'];
  $b = $_POST['dni'];
  $c = $_POST['telefo'];
  $d = $_POST['naci'];
  $e = $_POST['mail'];  
  $f = $_SESSION['usuario'];

  $query = mysqli_query($conn, "UPDATE USUARIOS SET nombre='$a', dni='$b', telefono='$c', nacimiento='$d', email='$e' WHERE usuario='$f' ");


    mysqli_close($conn);	
    




     echo "<h1> ¡Felicidades! </h1>";
     echo "<p class = mensaje> Se han editado los datos correctamente, pinche en el botón de abajo para volver a la página de principal de su perfil </p>";
    

    
  


?>
<link rel="stylesheet" href="estilo.css">
	<br>			
	<a href="paginaDeUsuario.php"><input class="botonOpcion" type="button" value="Volver a inicio de sesión"> </a>



	
