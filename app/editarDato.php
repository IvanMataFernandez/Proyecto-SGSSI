<?php session_start();   


		
 	$hostname = "db";
  	$username = "admin";
  	$password = "test";
  	$db = "database";

 	 $conn = mysqli_connect($hostname,$username,$password,$db);
  	if ($conn->connect_error) {
   		 die("Database connection failed: " . $conn->connect_error);
  	}
 
  	$a = $_POST['id'];
  	$b = $_SESSION['usuario'];
	if ($a == "") {$_SESSION['falloNoHayCuadro'] = true; echo "<script> window.location.replace('http://localhost:81/cuadrosDeUsuario.php'); </script> ";} // si no hay nada introducido, volver
					
 	// buscar dato
 						
  	$rdo = $conn->query("SELECT * FROM DATOS WHERE dato1 = '$a';");
  					

  					
  	if (mysqli_fetch_array($rdo)['dato1'] == $a) { // si hay dato, mostrarlo
  	

  					
	 	$rdo = $conn->query("SELECT * FROM DATOS WHERE dato1 = '$a';");
		$rdo = mysqli_fetch_array($rdo);
		

		
		// Si hay dato, se cogen los campos para mostrarlos después
		
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
	<link rel="stylesheet" href="estilo7.css">
	<script type = "text/javascript" src="comprobarCreacionCuadro.js"></script>
	<head>

		
	</head>
	<body>
			<div class="margen1">
			
			<div class="tituloLogIn"> Dato a editar: </div>
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
			<br>
		<div class="margen">

			<br>
			<div class="tituloLogIn"> Editar registro </div>
			
			<form name = "formulario" action = "editarDatoABD.php" method = "POST"> 
				
				<div class="textoLogIn"> Nombre: </div>
				<input class="campoLogIn" type="text" name="dato1"  value="<?php print_r($_SESSION['a']); ?>"> <br>
				<div class="textoLogIn"> Autor: </div>			
				<input class="campoLogIn" type="text" name="dato2"  value="<?php print_r($_SESSION['b']); ?>"> <br> 
				<div class="textoLogIn"> Largura (cm): </div>
				<input class="campoLogIn" type="text" name="dato3"  value="<?php print_r($_SESSION['c']); ?>"> <br>
				<div class="textoLogIn"> Anchura (cm): </div>
				<input class="campoLogIn" type="text" name="dato4" value="<?php print_r($_SESSION['d']); ?>"> <br>
				<div class="textoLogIn"> Precio (€): </div>
				<input class="campoLogIn" type="text" name="dato5" value="<?php print_r($_SESSION['e']); ?>"> <br> <br>		
				<input class ="botonReset" type="reset" value="Restablecer valores"> <br> <br>
				<input class ="botonOpcion" type="button" value = "Modificar" onclick="comprobarDatos()">  <br> <br>
				<a href="cuadrosDeUsuario.php"><input class="botonOpcion" type="button" value="Volver"> </a>
			</form>


		</div>

	</body>
	

	
</html>

