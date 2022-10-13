
function comprobarDatos() {



	


	
        var nombre = document.formulario.nombre.value;



	var dni = document.formulario.dni.value;

					
	var telef = document.formulario.telefo.value;
	var nac = document.formulario.naci.value;
	var email = document.formulario.mail.value;
			
	
	var contraseina = document.formulario.contraseña.value;
	var usuario = document.formulario.usuario.value;

		
	comprobar(nombre, dni, telef, nac, email, usuario, contraseina); 
	


	


	
	
				
}

function comprobar(nombre, dni, telef, nac, email, usuario, contraseina) {



	// Comprobar nombre


	var i = 0;
	var val = nombre.length != 0;
	var c;
	
	if (!val) {window.alert("Rellena el campo de nombre y apellido"); return;}	
	
	if (nombre.length > 32) {window.alert("Nombre y apellidos demasiado largos, acórtelos."); return;}
	
	while (i != nombre.length && val) {
	
		c = nombre.charAt(i);
		val = (c >= 'A' && c <= 'Z') || (c >= 'a' && c <= 'z') || c == ' ' || c == 'ñ' || c == 'Ñ' || c == 'á' || c == 'é' || c == 'í' || c == 'ó' || c == 'ú'|| c == 'Á' || c == 'É' || c == 'Í' || c == 'Ó' || c == 'Ú';
		i++;
	}
	
	if (!val) {window.alert("Formato de nombre y apellidos inválidos"); return;}	



	// Comprobar DNI
	
	i = 0;
	val = dni.length == 10;
	
	if (dni.length == 0) {window.alert("Rellena el campo DNI"); return;}
	
	while (i != dni.length && val) {
		
		c = dni.charAt(i);
		val = (i >= 0 && i <= 7 && c >= '0' && c <= '9') || (i == 8 && c == '-') || (i == 9 && c >= 'A' && c <= 'Z');
		i++;
	}
	
	if (!val) {window.alert("Estructura de DNI erronea, usa 11111111-H"); return;}

	dni = dni.slice(0,-2);
	i = parseInt(dni, 10);
	i = i % 23;
	
	

	
	switch (i) {
		case 0: val = c == 'T'; break;
		case 1: val = c == 'R'; break;
		case 2: val = c == 'W'; break;
		case 3: val = c == 'A'; break;
		case 4: val = c == 'G'; break;
		case 5: val = c == 'M'; break;
		case 6: val = c == 'Y'; break;
		case 7: val = c == 'F'; break;
		case 8: val = c == 'P'; break;
		case 9: val = c == 'D'; break;
		case 10: val = c == 'X'; break;
		case 11: val = c == 'B'; break;
		case 12: val = c == 'N'; break;
		case 13: val = c == 'J'; break;
		case 14: val = c == 'Z'; break;
		case 15: val = c == 'S'; break;
		case 16: val = c == 'Q'; break;
		case 17: val = c == 'V'; break;
		case 18: val = c == 'H'; break;
		case 19: val = c == 'L'; break;
		case 20: val = c == 'C'; break;
		case 21: val = c == 'K'; break;
		case 22: val = c == 'E';
		
	}
	
	if (!val) {window.alert("DNI falso, introduzca su DNI verdadero"); return;}
	


	// Comprobar teléfono
	
	i = 0;
	val = telef.length == 9;
	
	if (telef.length == 0) {window.alert("Rellena el campo teléfono"); return;}


	while (i != telef.length && val) {
		
		c = telef.charAt(i);
		val = c >= '0' && c <= '9';
		i++;
	}
	
	if (!val) {window.alert("Teléfono erróneo, introduza 9 dígitos"); return;}
	
	
	
	
	// Comprobar fecha de nacimiento 
	
	

	i = 0;
	val = nac.length == 10;
	
	if (nac.length == 0) {window.alert("Rellena el campo fecha de nacimiento"); return;}

	
	while (i != nac.length && val) {
		
		c = nac.charAt(i);
		val = (i != 4 && i != 7 && c >= '0' && c <= '9') || (c == '-' && (i == 4 || i == 7));
		i++;
	}
	
	if (!val) {window.alert("Estructura de fecha erronea, usa aaaa-mm-dd"); return;}

	var dia = parseInt(nac.slice(8,10), 10);
	var mes = parseInt(nac.slice(5,7), 10);
	var anio = parseInt(nac.slice(0,4), 10);

	switch (mes) {
		case 1: val = dia < 32; break;
		case 3: val = dia < 32; break;
		case 4: val = dia < 31; break;
		case 5: val = dia < 32; break;
		case 6: val = dia < 31; break;
		case 7: val = dia < 32; break;
		case 8: val = dia < 32; break;
		case 9: val = dia < 31; break;
		case 10: val = dia < 32; break;
		case 11: val = dia < 31; break;
		case 12: val = dia < 32; break;
		case 2: val = dia < 29 || (dia < 30 && anio % 4 == 0 && (anio % 100 != 0 || anio % 400 == 0)); break;
		default: val = false;
		
	
	}
	
	if (!val) {window.alert("El día no existe, ponga una fecha existente en el calendario."); return;}
	

	
	// Comprobar email
	
	i = 0;
	val = email.length != 0;
	var arroba = -1; // posición de @
	var punto = -1; // pasición de .
	
	if (!val) {window.alert("Rellena el campo de email"); return;}
		
	if (email.length > 50) {window.alert("Email demasiado largo, acórtelo."); return;}
	
	while (i != email.length && val) {
	
		c = email.charAt(i);
		val = (c >= 'A' && c <= 'Z') || (c >= 'a' && c <= 'z') || (c >= '0' && c <= '9') || c == 'ñ' || c == 'Ñ' || c == 'á' || c == 'é' || c == 'í' || c == 'ó' || c == 'ú'|| c == 'Á' || c == 'É' || c == 'Í' || c == 'Ó' || c == 'Ú';
		

		
		if (!val) {
			if (c == '@' && arroba == -1 && punto == -1 && i != 0) {arroba = i; val = true;}
			else if (c == '.' && arroba != -1 && punto == -1 && i != arroba+1) {punto = i; val = true;}
		}
		
		i++;
	}
	
	if (!val) {window.alert("Formato de correo no válido. Usa ejemplo@servidor.extensión"); return;}	
	


	// Comprobar usuario
	
	i = 0;
	val = usuario.length != 0;
	

	if (!val) {window.alert("Rellena el campo de nombre de usuario"); return;}
		
	if (usuario.length > 32) {window.alert("Nombre de usuario demasiado largo, acórtelo."); return;}
	
	while (i != usuario.length && val) {
	
		c = usuario.charAt(i);
		val = (c >= 'A' && c <= 'Z') || (c >= 'a' && c <= 'z') || (c >= '0' && c <= '9') || c == ' ' || c == 'ñ' || c == 'Ñ' || c == 'á' || c == 'é' || c == 'í' || c == 'ó' || c == 'ú'|| c == 'Á' || c == 'É' || c == 'Í' || c == 'Ó' || c == 'Ú';
		

		
		i++;
	}
	
	if (!val) {window.alert("Nombre de usuario inválido, usa caracteres alfanuméricos."); return;}	




	
	// Comprobar contraseña
	
	i = 0;
	val = contraseina.length != 0;
	

	if (!val) {window.alert("Rellena el campo de contraseña"); return;}
		
	if (contraseina.length > 32) {window.alert("Contraseña demasiado larga, acórtela."); return;}
	
	while (i != contraseina.length && val) {
	
		c = contraseina.charAt(i);
		val = (c >= 'A' && c <= 'Z') || (c >= 'a' && c <= 'z') || (c >= '0' && c <= '9') || c == ' ' || c == 'ñ' || c == 'Ñ' || c == 'á' || c == 'é' || c == 'í' || c == 'ó' || c == 'ú'|| c == 'Á' || c == 'É' || c == 'Í' || c == 'Ó' || c == 'Ú';
		

		
		i++;
	}
	
	if (!val) {window.alert("Formato de contraseña inválido, usa caracteres alfanuméricos."); return;}	
	
	
	document.formulario.submit();
	

	
	

}


	
	
	
	
	
	

