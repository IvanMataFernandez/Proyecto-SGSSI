<?php   session_start(); ?>






<html>
	
	<link rel="stylesheet" href="estilo.css">
	<script type = "text/javascript" src="javascript2.js"></script>
	
	<head>

		<h1 class="titulo">  [Titulo de pagina web aqui] </h1>
	</head>
	<body>

		<div class="margen1">
			<br>
			
			<div class="tituloLogIn"> Iniciar sesión </div>
			
			<form name = "registro" action = "paginaDeUsuario.php" method = "POST"> 
				
				<div class="textoLogIn"> Nombre de usuario: </div>
				<input class="campoLogIn" type="text" name="nombre" placeholder="Nombre de usuario aquí"> <br>
				<div class="textoLogIn"> Contraseña: </div>				
				<input class="campoLogIn" type="password" name="contraseña" placeholder="Contraseña aquí"> <br> <br>	
				<input class ="botonReset" type="reset" value="Restablecer valores"> <br> <br>
				<input class ="botonOpcion" type= "button" value="Iniciar sesión" onclick = "guardarUsuario()" > <br> <br>
				<a href="registro.php"><input class="botonOpcion" type="button" value="Registrarse"> </a>
				


		</div>

<?php
 
 
  $_SESSION['autentificacionNecesaria'] = true;
  $_SESSION['usuario'] = "";
  
  

 // Mirar si hubo un error de sesión, la primera vez que se entra a la página la variable no existe por lo que es FALSE por defecto.
 
  if ($_SESSION['falloDeSesion']) {
  	
  	echo "<br> <br> <p class = mensaje> Error, ¡nombre de usuario o contraseña erróneos! </p>";
  	
  	
  } 
  
 
  // Conectar a la DB

  $hostname = "db";
  $username = "admin";
  $password = "test";
  $db = "database";

  $conn = mysqli_connect($hostname,$username,$password,$db);
  if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
  }
  
  // Crear la tabla de usuarios, si ya existe falla y se salta el paso
  // Esto es importante si se ejecuta el programa por primera vez en un pc 
   
  $query = mysqli_query($conn, "
  CREATE TABLE USUARIOS (nombre varchar(50), dni varchar(10), telefono varchar(9), nacimiento varchar(10), email varchar(50), usuario varchar(50), contraseña varchar(50), primary key (usuario) );");
  
    $query = mysqli_query($conn, "
  CREATE TABLE DATOS (clave INTEGER AUTO_INCREMENT, usuario varchar(50), dato1 varchar(25), dato2 varchar(25), dato3 varchar(25), dato4 varchar(25), dato5 varchar(25), primary key (clave), foreign key (usuario) references USUARIOS (usuario)  );");
  
  // INSERT INTO DATOS(correo,dato1,dato2,dato3,dato4,dato5) VALUES('a','a','a','a','a','a')  <---- USAR ESTA LOGICA PARA INSERTAR DESPUES
  
  mysqli_close($conn);
  
  
 // or die (mysqli_error($conn));

/*$query = mysqli_query($conn, "INSERT INTO USUARIOS VALUES('a', 'b', 'a', 'a', 'a');")
   or die (mysqli_error($conn));


$query = mysqli_query($conn, "SELECT * FROM USUARIOS")
   or die (mysqli_error($conn));
   
 
   
while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['id']}</td>
    <td>{$row['nombre']}</td>
   </tr>";
   

} */

?>
	</body>
</html>

