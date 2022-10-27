<?php session_start();  

	if (!$_SESSION['autentificado']) {
	
 	echo "<script> window.location.replace('http://localhost:81'); </script> "; 
	}

?>

        
     
        
      







<html>
	<link rel="stylesheet" href="estilo5.css">
	<script type = "text/javascript" src="javascript.js"></script>
	<head>

		
	</head>
	<body>

		<div class="margen">
			<br>
			
			<div class="tituloLogIn"> Editar Registro de Cuadros </div>
			
			
				<table class = "opciones">
				
					<tr>
				
						<td class = "opcion">

								<div class="textoLogIn"> Añadir: </div> <br> <br>
								<a href="crearDato.php"><input class="botonOpcion" type="button" value="Añadir datos"> </a> 
				
						</td>
				
				
						<td class = "opcion">
								<form name = "formulario2" action = "editarDato.php" method = "POST"> 
								<div class="textoLogIn"> Editar: </div>
								<input class="campoLogIn" type="text" name="id"  placeholder="[nombre de cuadro]"> <br> 	<br>
								<input class ="botonOpcion" type= "submit" value="Editar dato" > <br>  </form>				
				
						</td>
				
						<td class = "opcion">
								<form name = "formulario2" action = "confirmarBorradoDato.php" method = "POST"> 
								<div class="textoLogIn"> Borrar: </div>
								<input class="campoLogIn" type="text" name="id"  placeholder="[nombre de cuadro]"> <br> 	<br>
								<input class ="botonOpcion" type= "submit" value="Borrar dato" > <br>  </form>		
				
						</td>
					</tr>
				
				</table>
				
	
							<div class="tituloLogIn"> Cuadros actuales  </div>
				
				<br>
				
				
				<table class = "tabla">
				<tr>

					<td class = "filaP"> Nombre </td>
					<td class = "filaP"> Autor </td>
				</tr>	
				
				
				<?php
	

 					$hostname = "db";
  					$username = "aosldffmeews";
                                      $password = "dksodlfkmci";
  					$db = "database";

 					 $conn = mysqli_connect($hostname,$username,$password,$db);
  					if ($conn->connect_error) {
   					 die("Database connection failed: " . $conn->connect_error);
  					}
  

 
  					$query = mysqli_query($conn, "SELECT dato1, dato2 FROM DATOS ORDER BY dato1;");
  

  

  
 					 mysqli_close($conn);
  
  


   
 
   
					while ($row = mysqli_fetch_array($query)) {
  					echo
   					"<tr class = 'filaC'>
   					 <td class = 'filaC'>{$row['dato1']}</td>
  					   <td class = 'filaC'>{$row['dato2']}</td>
   					</tr>";
   

					} 



	
				?>
			</table>
			<br><br><br>
			<a href="paginaDeUsuario.php"><input class="botonOpcion" type="button" value="Volver"> </a> 
		</div>

	</body>
	
 <?php
 	// Mostrar pop-ups correspondientes si se deberían activar por haber vuelto de otra página
 
	if ($_SESSION['falloYaHayCuadro'] == true) {
		print_r("<script> alert('Error, ha intentado sobrescribir otro cuadro existente, no se han hecho cambios'); </script>");
		$_SESSION['falloYaHayCuadro'] = false;
	} 
	
	if ($_SESSION['falloNoHayCuadro'] == true) {
		print_r("<script> alert('Error, no existe el cuadro indicado en su cuenta'); </script>");
		$_SESSION['falloNoHayCuadro'] = false;
	} 	
	

	if ($_SESSION['AnadidoCorrecto'] == true) {
		print_r("<script> alert('Cuadro generado correctamente'); </script>");
		$_SESSION['AnadidoCorrecto'] = false;
	} 	
	
	if ($_SESSION['EditadoCorrecto'] == true) {
		print_r("<script> alert('Cuadro editado correctamente'); </script>");
		$_SESSION['EditadoCorrecto'] = false;
	} 
	
	if ($_SESSION['BorradoCorrecto'] == true) {
		print_r("<script> alert('Cuadro borrado correctamente'); </script>");
		$_SESSION['BorradoCorrecto'] = false;
	} 
	
	
	if ($_SESSION['Inyeccion'] == true) {
		print_r("<script> alert('Error, acceso no autorizado. Use los menús'); </script>");
		$_SESSION['Inyeccion'] = false;
	} 	
	
	if ($_SESSION['confirmoBorrado'] == true) {
		$_SESSION['confirmoBorrado'] = false;  
	}  	

 ?>

	
	
</html>

