<?php   
if (!session_start()) {session_destroy();session_start(); }


include('funciones.php');


 
 // Forzar verificación del user al pasar a la página principal del usuario, porque se viene del menú principal
 
  $_SESSION['autentificado'] = false;
  $_SESSION['usuario'] = ""; // ningún usuario en sesión
  


 // Mirar si hubo un error de sesión, la primera vez que se entra a la página la variable no existe por lo que es FALSE por defecto.

 


 
  // Conectar a la DB


  $hostname = "db";
  $username = "aosldffmeews";
  $password = "dksodlfkmci";
  $db = "database";
  
  

  
  

  $conn = mysqli_connect($hostname,$username,$password,$db);
  if ($conn->connect_error) {
  
    echo "<h1> No se ha cargado la BD todavía, por favor espere y reinicie la página </h1>";
    exit(1);
  } else {
  
  
  // Crear la tabla de usuarios, si ya existe falla y se salta el paso
  // Esto es importante si se ejecuta el programa por primera vez en un pc 
   
  $query = mysqli_query($conn, "
  CREATE TABLE USUARIOS (nombre varchar(256), dni varchar(256), telefono varchar(256), nacimiento varchar(256), email varchar(256), usuario varchar(256), contraseña varchar(64), seed varchar(10), primary key (usuario) );");
  
  if ($query) { // Si es la primera vez que se ejecuta, crear la tabla de DATOS también con 5 cuadros por defecto
      $query = mysqli_query($conn, "
  CREATE TABLE DATOS (dato1 varchar(256), dato2 varchar(256), dato3 varchar(256), dato4 varchar(256), dato5 varchar(256), usuario varchar(256), primary key (dato1, usuario), foreign key(usuario) references USUARIOS(usuario)  );");
  
 
      


  }
  
  echo '<html>
	
	<link rel="stylesheet" href="estilo.css">
	<script type = "text/javascript" src="inicioSesion.js"></script>
	
	<head>

		<h1 class="titulo">  Compra de cuadros </h1>
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
				


		</div>';
  
  
  if ($_SESSION['falloDeSesion']) {
  	
  	echo "<br> <br> <p class = mensaje> Error, ¡nombre de usuario o contraseña erróneos! </p>";
  	$_SESSION['falloDeSesion'] = false;
  	
  } 
  
  echo '


	</body>
</html> ';

  
	}
	
  
  mysqli_close($conn);
  
  
  


?>








