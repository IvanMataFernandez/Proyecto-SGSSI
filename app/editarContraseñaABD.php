<?php session_start();

  // Conectar a la DB

	
    
if ($_POST['cont'] != '') {
	
	  $hostname = "db";
  $username = "aosldffmeews";
  $password = "dksodlfkmci";
  $db = "database";



  $conn = mysqli_connect($hostname,$username,$password,$db);
  if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
  }
  
  // Coger los valores del registro anterior (el de modificar datos personales)
  
  $g = $_POST['cont'];   
  $h = "";
  
   print_r($g);
    
  $cont = 0;
  
  while ($cont < 10) {
  	$h = $h.chr(random_int(65, 90));
  
  	$cont++;
  }
  


  

  $g = $g.$h;
  
     print_r($g);
       print_r($h);
  $g = hash('sha256', $g, false);
  $a = $_SESSION['usuario'];

  // Usando el usuario actual, cambiar sus valores personales con UPDATE.
  
  $com = $conn->prepare("UPDATE USUARIOS SET contraseña=?, seed=? WHERE usuario=? ");   
  $com->bind_Param('sss', $g, $h, $a);
  $com->execute();	



    mysqli_close($conn);

   	  echo "<h1> ¡Felicidades! </h1>";
    	  echo "<p class = mensaje> Se ha cambiado la contraseña, pinche en el botón de abajo para volver a la página de principal de su perfil </p>";
    	  echo " <link rel='stylesheet' href='estilo.css'>
	<br>			
	<a href='paginaDeUsuario.php'><input class='botonOpcion' type='button' value='Volver a página de usuario'> </a> ";	
	} else {
	
        $_SESSION['usuarioRepetido'] = false;
    	echo "<h1> Vaya... Ha habido un error... </h1>";
        echo "<p class = mensaje> Se ha intentado navegar desde una URl no permitida, pulse en el botón para volver al inicio de sesión </p>";
        
         echo " <link rel='stylesheet' href='estilo.css'>
	<br>			
	<a href='index.php'><input class='botonOpcion' type='button' value='Volver a inicio de sesión'> </a> ";		
	
	}


    

    
  


?>




	
