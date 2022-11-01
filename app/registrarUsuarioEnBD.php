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
  
  // Coger los valores del primer registro 
  
  $a = cifrar($_POST['nombre']);
  $b = cifrar($_POST['dni']);
  $c = cifrar($_POST['telefo']);
  $d = cifrar($_POST['naci']);
  $e = cifrar($_POST['mail']);  
  $f = cifrar($_POST['usuario']);
  $g = $_POST['contraseña'];   
  $h = "";
  
  
  $cont = 0;
  
  while ($cont < 10) {
  	$h = $h.chr(random_int(65, 90));
  
  	$cont++;
  }
  

  

  $g = $g.$h;
  $g = hash('sha256', $g, false);

   // Crear el usuario y meterlo en la BD 
 
 $com = $conn->prepare("INSERT INTO USUARIOS VALUES(?, ?, ?, ?, ?, ?, ?, ?)");   
 $com->bind_Param('ssssssss', $a, $b, $c, $d, $e, $f, $g, $h);

 $val = $com->execute();



    mysqli_close($conn);	
    


    if ($val) {
    
        $_SESSION['usuarioRepetido'] = false;
    	echo "<h1> ¡Felicidades! </h1>";
        echo "<p class = mensaje> Se ha creado el usuario correctamente, pinche en el botón de abajo para volver a la página de inicio de sesión </p>";
    
    	// SE HIZO
    
  
    } else {
    
	if ($_POST['nombre'] != '') {
            $_SESSION['usuarioRepetido'] = true;
           echo "<script> window.location.replace('http://localhost:81/registro.php'); </script> "; // Redirigir de nuevo a la página anterior	
	} else {
	
        $_SESSION['usuarioRepetido'] = false;
    	echo "<h1> Vaya... Ha habido un error... </h1>";
        echo "<p class = mensaje> Se ha intentado navegar desde una URl no permitida, pulse en el botón para volver al inicio de sesión </p>";	
	
	}

   

   


    	// NO SE HIZO, HAY REPETIDO YA

    
    
    }

?>
<link rel="stylesheet" href="estilo.css">
	<br>			
	<a href="index.php"><input class="botonOpcion" type="button" value="Volver a inicio de sesión"> </a>



	
