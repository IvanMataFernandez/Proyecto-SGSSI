<?php session_start();

	if (!$_SESSION['autentificado']) {
	
 	echo "<script> window.location.replace('http://localhost:81'); </script> "; 
	}
	
	if ($_SESSION['confirmoBorrado'] == true) {
		$_SESSION['confirmoBorrado'] = false;  
	}


  // Conectar a la DB

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
  $a = $_SESSION['usuario'];
  
  // Coger los valores actuales del usuario para mostrarlos después
  
  
  $com = $conn->prepare("SELECT * FROM USUARIOS WHERE usuario= ? ;");  
  $com->bind_Param('s', $a);
  $com->execute(); 
  $com->bind_result($a, $b, $c, $d, $e, $f, $g, $h);
  $com->fetch();	
  


  $_SESSION['a'] = $a;
  $_SESSION['b'] = $b;
  $_SESSION['c'] = $c;
  $_SESSION['d'] = $d;
  $_SESSION['e'] = $e;

 


  mysqli_close($conn);	
    


    

    
  


?>







<html>
	<link rel="stylesheet" href="estilo3.css">
	<script type = "text/javascript" src="comprobarEdicionEnRegistro.js"></script>
	<head>

		
	</head>
	<body>

		<div class="margen">
			<br>
			
			<div class="tituloLogIn"> Modificar datos </div>
			
			<form name = "formulario" action = "modificarUsuarioEnBD.php" method = "POST"> 
				
				<div class="textoLogIn"> Nombre:  </div>
				<input class="campoLogIn" type="text" name="nombre"  value="<?php print_r($_SESSION['a']); ?>"> <br>
				<div class="textoLogIn"> DNI:   </div>			
				<input class="campoLogIn" type="text" name="dni"  value="<?php print_r($_SESSION['b']); ?>"> <br> 
				<div class="textoLogIn"> Teléfono:   </div>
				<input class="campoLogIn" type="text" name="telefo"  value="<?php print_r($_SESSION['c']); ?>"> <br>
				<div class="textoLogIn"> Nacimiento:  </div>
				<input class="campoLogIn" type="text" name="naci" value="<?php print_r($_SESSION['d']); ?>"> <br>
				<div class="textoLogIn"> Email:  </div>
				<input class="campoLogIn" type="text" name="mail" value="<?php print_r($_SESSION['e']); ?>"> <br> <br>	
				<input class ="botonOpcion" type="button" value = "Actualizar datos" onclick="comprobarDatos()">  <br> <br>
				<a href="paginaDeUsuario.php"><input class="botonOpcion" type="button" value="Volver"> </a>
				


		</div>

	</body>
	

	
	
</html>

