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
  
  $a = $_POST['nombre'];
  $b = $_POST['dni'];
  $c = $_POST['telefo'];
  $d = $_POST['naci'];
  $e = $_POST['mail'];  
  $f = $_POST['usuario'];
  $g = $_POST['contraseña'];   
    
 $query = mysqli_query($conn, "INSERT INTO USUARIOS VALUES('$a','$b','$c','$d','$e', '$f','$g')");


    mysqli_close($conn);	
    


    if ($query) {
    
        $_SESSION['usuarioRepetido'] = false;
    	echo "<h1> ¡Felicidades! </h1>";
        echo "<p class = mensaje> Se ha creado el usuario correctamente, pinche en el botón de abajo para volver a la página de inicio de sesión </p>";
    
    	// SE HIZO
    
  
    } else {
    

            $_SESSION['usuarioRepetido'] = true;
         echo "<script> window.location.replace('http://localhost:81/registro.php'); </script> ";
   

   


    	// NO SE HIZO

    
    
    }

?>
<link rel="stylesheet" href="estilo.css">
	<br>			
	<a href="index.php"><input class="botonOpcion" type="button" value="Volver a inicio de sesión"> </a>



	
