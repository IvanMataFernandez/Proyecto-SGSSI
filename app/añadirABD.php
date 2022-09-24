
<link rel="stylesheet" href="estilos.css">


<?php 

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
  $f = $_POST['contraseña'];     
 $query = mysqli_query($conn, "INSERT INTO USUARIOS VALUES('$a','$b','$c','$d','$e', '$f')");


    mysqli_close($conn);	
    
    
    if ($query) {
    

    	echo "<h1> ¡Felicidades! </h1>";
        echo "<p> Se ha creado el usuario correctamente, pinche en el botón de abajo para volver a la página de inicio de sesión </p>";
    
    	// SE HIZO
    
  
    } else {
          echo "<h1> Ha habido un error... </h1>";
          echo "<p class= mensaje> Ya existe un usuario con ese correo electrónico enlazado a la página web por lo que no se ha podido crear la cuenta. Pinche en el botón de abajo para volver a la página de inicio de sesión </p>";
    	// NO SE HIZO

    
    
    }

?>
	<br>			
	<a href="index.php"><input class="botonOpcion" type="button" value="Volver a inicio de sesión"> </a>



	
