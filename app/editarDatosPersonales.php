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
  $a = $_SESSION['usuario'];
  
  $rdo = $conn->query("SELECT * FROM USUARIOS WHERE usuario='$a';"); 
  $rdo = mysqli_fetch_array($rdo);

  $_SESSION['a'] = $rdo['nombre'];
  $_SESSION['b'] = $rdo['dni'];
  $_SESSION['c'] = $rdo['telefono'];
  $_SESSION['d'] = $rdo['nacimiento'];
  $_SESSION['e'] = $rdo['email'];

 


  mysqli_close($conn);	
    


    

    
  


?>







<html>
	<link rel="stylesheet" href="estilo3.css">
	<script type = "text/javascript" src="javascript3.js"></script>
	<head>

		
	</head>
	<body>

		<div class="margen">
			<br>
			
			<div class="tituloLogIn"> Modificar datos </div>
			
			<form name = "formulario" action = "editarABD.php" method = "POST"> <! -- añadir el action despues y la dirección de la página de registro de datos -->
				
				<div class="textoLogIn"> Nombre actual: <?php print_r($_SESSION['a']); ?> </div>
				<input class="campoLogIn" type="text" name="nombre"  placeholder="Nuevo nombre --> [solo texto]"> <br>
				<div class="textoLogIn"> DNI actual :  <?php print_r($_SESSION['b']); ?> </div>			
				<input class="campoLogIn" type="text" name="dni"  placeholder="Nuevo dni --> [formato 11111111-Z]"> <br> 
				<div class="textoLogIn"> Teléfono actual:  <?php print_r($_SESSION['c']); ?> </div>
				<input class="campoLogIn" type="text" name="telefo"  placeholder="Nuevo teléfono --> [9 dígitos]"> <br>
				<div class="textoLogIn"> Nacimiento actual: <?php print_r($_SESSION['d']); ?> </div>
				<input class="campoLogIn" type="text" name="naci" placeholder="Nueva fecha de nacimiento --> [aaaa-mm-dd]"> <br>
				<div class="textoLogIn"> Email actual: <?php print_r($_SESSION['e']); ?>: </div>
				<input class="campoLogIn" type="text" name="mail" placeholder="Nuevo email --> [email existente]"> <br> <br>	
				<input class ="botonOpcion" type="button" value = "Actualizar datos" onclick="comprobarDatos()">  <br> <br>
				<a href="paginaDeUsuario.php"><input class="botonOpcion" type="button" value="Volver"> </a>
				


		</div>

	</body>
	

	
	
</html>

