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
					include('funciones.php');

 					$hostname = "db";
  					$username = "aosldffmeews";
                                      $password = "dksodlfkmci";
  					$db = "database";

 					 $conn = mysqli_connect($hostname,$username,$password,$db);
  					if ($conn->connect_error) {
   					 die("Database connection failed: " . $conn->connect_error);
  					}
  

 

                                       $com = $conn->prepare("SELECT dato1, dato2 FROM DATOS WHERE usuario = ?;");    						
                                       $a = $_SESSION['usuario'];
  	                               $com->bind_Param('s', $a);
                                       $com->execute(); 
                                       $com->store_result();
                                       $com->bind_result($a, $b);
		                        
  
 				
  
  


   

   
					while ($com->fetch()) {
					     $a = descifrar($a);
					     $b = descifrar($b);

  					echo
   					"<tr class = 'filaC'>
   					 <td class = 'filaC'> $a </td>
  					   <td class = 'filaC'> $b </td>
   					</tr>";
   

					} 


	                          mysqli_close($conn);
	
				?>
			</table>
			<br><br><br>
			<a href="paginaDeUsuario.php"><input class="botonOpcion" type="button" value="Volver"> </a> 
		</div>

	</body>
	
 <?php
 	// Mostrar pop-ups correspondientes si se deberían activar por haber vuelto de otra página
 

	

	

	
	if ($_SESSION['Inyeccion'] == true) {
		print_r("<script> alert('Error, acceso no autorizado. Use los menús'); </script>");
		$_SESSION['Inyeccion'] = false;
	} 	
	
	if ($_SESSION['confirmoBorrado'] == true) {
		$_SESSION['confirmoBorrado'] = false;  
	}  	

 ?>

	
	
</html>

