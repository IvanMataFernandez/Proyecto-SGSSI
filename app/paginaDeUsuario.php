<?php   session_start(); 

  $_SESSION['falloYaHayCuadro'] = false;

  if ($_SESSION['autentificacionNecesaria']) {
  
	$hostname = "db";
	$username = "admin";
	$password = "test";
	$db = "database";

	$conn = mysqli_connect($hostname,$username,$password,$db);
	if ($conn->connect_error) {
		die("Database connection failed: " . $conn->connect_error);
	}

  
	$a = $_POST['nombre'];
	$b = $_POST['contraseña'];


  // Mirar si se ha introducido texto, si no hay texto, se redirige a la página principal de nuevo.

  

	if ($a == "") {echo "<script> window.location.replace('http://localhost:81/'); </script> ";}

	        
   // Buscar contraseña para el usuario escrito

	$rdo = $conn->query("SELECT * FROM USUARIOS WHERE usuario='$a';");


  // Mirar si encaja la contraseña introducida
  
	if (mysqli_fetch_array($rdo)['contraseña'] == $b) {
		$_SESSION['falloDeSesion'] = false;   // Contraseña acertada
		$_SESSION['autentificacionNecesaria'] = false;
	        $_SESSION['usuario'] = $a;
	
	} else {
	        $_SESSION['falloDeSesion'] = true;    // Contraseña fallada, redireccionar a la página principal de nuevo.

	         echo "<script> window.location.replace('http://localhost:81/'); </script> ";
	
	}



   



  
	mysqli_close($conn);
  
  }
  
  

  


?>




<html>
	
	<link rel="stylesheet" href="estilo2.css">
	
	<head>

	</head>
	<body>

		<br> <br> <br> <br> <br>

		<div class="margen">
			<br>
			
			<div class="tituloLogIn"> ¡Bienvenid@ <?php echo $_SESSION['usuario']?>! ¿Qué desea hacer? </div>  <br> <br>   <br> <br> 
			

				
		
				<a href="datosDeUsuario.php"><input class="botonMenu" type="button" value="Crear,visionar,editar o borrar registros de tu perfil"> </a>  <br> <br> 
				<a href="editarDatosPersonales.php"><input class="botonMenu" type="button" value="Cambiar información personal de la cuenta"> </a>  <br> <br> 
				<a href="index.php"><input class="botonMenu" type="button" value="Desconectarse"> </a>
				


		</div>

<?php
 
 

 


 // Mirar si hubo un error de sesión, la primera vez que se entra a la página la variable no existe por lo que es FALSE por defecto.
 

  
 
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
  CREATE TABLE USUARIOS (nombre varchar(50), dni varchar(10), telefeno varchar(9), nacimiento varchar(10), email varchar(50), usuario varchar(50), contraseña varchar(50), primary key (usuario) );");
  
    $query = mysqli_query($conn, "
  CREATE TABLE DATOS (clave INTEGER AUTO_INCREMENT, usuario varchar(50), dato1 varchar(10), dato2 varchar(9), dato3 varchar(10), dato4 varchar(50), dato5 varchar(50), primary key (clave), foreign key (usuario) references USUARIOS (usuario)  );");
  
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

