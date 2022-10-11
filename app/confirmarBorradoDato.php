<?php session_start();   



 	$hostname = "db";
  	$username = "admin";
  	$password = "test";
  	$db = "database";

 	 $conn = mysqli_connect($hostname,$username,$password,$db);
  	if ($conn->connect_error) {
   		 die("Database connection failed: " . $conn->connect_error);
  	}
 
  	$a = $_POST['id']; // nombre del cuadro
  	$b = $_SESSION['usuario'];
  	
	if ($a == "") {$_SESSION['falloNoHayCuadro'] = true; echo "<script> window.location.replace('http://localhost:81/cuadrosDeUsuario.php'); </script> ";} // si no hay nada introducido, volver
					
 	// buscar dato
 						
  	$rdo = $conn->query("SELECT * FROM DATOS WHERE dato1 = '$a' && usuario = '$b';");
  					

  					
  	if (mysqli_fetch_array($rdo)['dato1'] == $a) { // si hay dato, mostrarlo
  					
	 	$rdo = $conn->query("SELECT * FROM DATOS WHERE dato1 = '$a' && usuario = '$b';");
		$rdo = mysqli_fetch_array($rdo);
		

		// se cogen los campos para mostrarlos después
		
		
 		$_SESSION['a']= $rdo['dato1'];
  		$_SESSION['b']= $rdo['dato2'];
  		$_SESSION['c']= $rdo['dato3'];
 		$_SESSION['d']= $rdo['dato4'];
  		$_SESSION['e']= $rdo['dato5'];
			
  					
  	} else { // si no day dato, redireccionar atrás
  	  	$_SESSION['falloNoHayCuadro'] = true;
  		echo "<script> window.location.replace('http://localhost:81/cuadrosDeUsuario.php'); </script> ";
  					
  	}
  					
  					
  					


  
  mysqli_close($conn);
  
  

   
 
   


					



	
?>    
        
      







<html>
	<link rel="stylesheet" href="estilo6.css">
	<head>

		
	</head>
	<body>

		
		<div class="margen">
		
			<div class="tituloLogIn"> Dato a borrar:  </div>
						<br> <br> <br>
				<table class = "tabla">
				<tr>
					<td class = "filaP"> Nombre </td>
					<td class = "filaP"> Autor </td>
					<td class = "filaP"> Largura </td>
					<td class = "filaP"> Anchura </td>
					<td class = "filaP"> Precio </td>
				</tr>	
				
				<tr>
					<td class = "filaC"> <?php print_r($_SESSION['a']); ?> </td>
					<td class = "filaC"> <?php print_r($_SESSION['b']); ?> </td>
					<td class = "filaC"> <?php print_r($_SESSION['c']); ?></td>
					<td class = "filaC"> <?php print_r($_SESSION['d']); ?> </td>
					<td class = "filaC"> <?php print_r($_SESSION['e']); ?> </td>
				</tr>					

			</table>
					</div>
						<br> <br> <br>
		<div class="margen">
			<br>
			
			<div class="tituloLogIn"> ¿Confirmar borrado de dato?  </div>
			
			<br> <br> <br>
				<table class = "opciones">

					<tr>
			
						<td class = "opcion">

								<a href="borrarDatoABD.php"> <input class ="botonOpcion" type= "button" name = "borrar" value=  "SÍ, BORRAR" > <br>  				
				
						</td>
				
						<td class = "opcion">


								<a href="cuadrosDeUsuario.php"><input class="botonOpcion" type="button" value="NO, VOLVER"> </a> 
				
						</td>
				
				

				

					</tr>
					

				</table>
				
		<br> <br> <br>
						
				
				<br>
				
				

		</div>

	</body>
	

	
	
</html>

