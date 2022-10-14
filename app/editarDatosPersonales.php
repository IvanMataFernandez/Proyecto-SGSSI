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
	<script type = "text/javascript" src="comprobarEdicionEnRegistro.js"></script>
	<head>

		
	</head>
	<body>

		<div class="margen">
			<br>
			
			<div class="tituloLogIn"> Modificar datos </div>
			
			<form name = "formulario" action = "modificarUsuarioEnBD.php" method = "POST"> 
				
				<div class="textoLogIn"> Nombre: <?php print_r($_SESSION['a']); ?> </div>
				<input class="campoLogIn" type="text" name="nombre"  value="<?php print_r($_SESSION['a']); ?>"> <br>
				<div class="textoLogIn"> DNI:  <?php print_r($_SESSION['b']); ?> </div>			
				<input class="campoLogIn" type="text" name="dni"  value="<?php print_r($_SESSION['b']); ?>"> <br> 
				<div class="textoLogIn"> Teléfono:  <?php print_r($_SESSION['c']); ?> </div>
				<input class="campoLogIn" type="text" name="telefo"  value="<?php print_r($_SESSION['c']); ?>"> <br>
				<div class="textoLogIn"> Nacimiento: <?php print_r($_SESSION['d']); ?> </div>
				<input class="campoLogIn" type="text" name="naci" value="<?php print_r($_SESSION['d']); ?>"> <br>
				<div class="textoLogIn"> Email: <?php print_r($_SESSION['e']); ?>: </div>
				<input class="campoLogIn" type="text" name="mail" value="<?php print_r($_SESSION['e']); ?>"> <br> <br>	
				<input class ="botonOpcion" type="button" value = "Actualizar datos" onclick="comprobarDatos()">  <br> <br>
				<a href="paginaDeUsuario.php"><input class="botonOpcion" type="button" value="Volver"> </a>
				


		</div>

	</body>
	

	
	
</html>

