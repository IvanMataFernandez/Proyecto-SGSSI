<html>
	<link rel="stylesheet" href="estilos.css">
	
	<head>

		<h1 class="titulo">  [Titulo de pagina web aqui] </h1>
	</head>
	<body>

		<div class="margen">
			<br>
			
			<div class="tituloLogIn"> Iniciar sesión </div>
			
			<form> <! -- añadir el action despues y la dirección de la página de registro de datos -->
				
				<div class="textoLogIn"> Correo electrónico: </div>
				<input class="campoLogIn" type="text" name="nombre" value="Nombre de usuario aquí"> <br>
				<div class="textoLogIn"> Contraseña: </div>				
				<input class="campoLogIn" type="text" name="nombre" value="Contraseña aquí"> <br> <br>	
				<input class ="botonReset" type="reset" value="Restablecer valores"> <br> <br>
				<input class ="botonOpcion" type="submit" value="Iniciar sesión"> <br> <br>
				<a href="paginaNoExiste.php"><input class="botonOpcion" type="button" value="Registrarse"> </a>
				


		</div>

<?php
  echo '<h1>Yeah, it works!<h1>';
  // phpinfo();
  $hostname = "db";
  $username = "admin";
  $password = "test";
  $db = "database";

  $conn = mysqli_connect($hostname,$username,$password,$db);
  if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
  }



$query = mysqli_query($conn, "SELECT * FROM usuarios")
   or die (mysqli_error($conn));

while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['id']}</td>
    <td>{$row['nombre']}</td>
   </tr>";
   

}

?>
	</body>
</html>

