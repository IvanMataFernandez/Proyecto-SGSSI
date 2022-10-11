
function comprobarDatos() {






	
        var dato1 = document.formulario.dato1.value;



	var dato2 = document.formulario.dato2.value;

					
	var dato3 = document.formulario.dato3.value;
	var dato4 = document.formulario.dato4.value;
	var dato5 = document.formulario.dato5.value;
			


		
	comprobar(dato1, dato2, dato3, dato4, dato5); 
	


	


	
	
				
}



function comprobar(dato1, dato2, dato3, dato4, dato5) {




	// Dato 1
	

	var i = 0;
	var val = dato1.length != 0;
	var c;
		
	if (!val) {window.alert("Rellena el campo de nombre"); return;}	
	
	if (dato1.length > 25) {window.alert("Nombre demasiado largo, acórtelo."); return;}
	
	while (i != dato1.length && val) {
	
		c = dato1.charAt(i);
		val = (c >= 'A' && c <= 'Z') || (c >= 'a' && c <= 'z') || (c >= '0' && c <= '9') || c == ' ' || c == 'ñ' || c == 'Ñ' || c == 'á' || c == 'é' || c == 'í' || c == 'ó' || c == 'ú'|| c == 'Á' || c == 'É' || c == 'Í' || c == 'Ó' || c == 'Ú'; 
		i++;
	}
	
	if (!val) {window.alert("Nombre no válido (solo alfanumérico)"); return;}	

 
	


	// Dato 2

	i = 0;
	val = dato2.length != 0;

	
	if (!val) {window.alert("Rellena el campo de autor"); return;}	
	
	if (dato2.length > 25) {window.alert("Autor demasiado largo, acórtelo."); return;}
	
	while (i != dato2.length && val) {
	
		c = dato2.charAt(i);
		val = (c >= 'A' && c <= 'Z') || (c >= 'a' && c <= 'z') || (c >= '0' && c <= '9') || c == ' ' || c == 'ñ' || c == 'Ñ' || c == 'á' || c == 'é' || c == 'í' || c == 'ó' || c == 'ú'|| c == 'Á' || c == 'É' || c == 'Í' || c == 'Ó' || c == 'Ú'; 
		i++;
	}
	
	if (!val) {window.alert("Autor no válido (usa caracteres alfanuméricos"); return;}	
	
	
	
	
	
	// Dato 3
	
	i = 0;
	val = dato3.length != 0;

	
	if (!val) {window.alert("Rellena el campo de largura"); return;}	
	
	if (dato3.length > 25) {window.alert("Número demasiado largo, acórtelo."); return;}
	
	while (i != dato3.length && val) {
	
		c = dato3.charAt(i);
		val = (c >= '0' && c <= '9'); 
		i++;
	}
	
	if (!val) {window.alert("Anchura solo admite digitos"); return;}	
	
	
	
	// Dato 4
	
        i = 0;
	val = dato4.length != 0;

	
	if (!val) {window.alert("Rellena el campo de largura"); return;}	
	
	if (dato4.length > 25) {window.alert("Número demasiado largo, acórtelo."); return;}
	
	while (i != dato4.length && val) {
	
		c = dato4.charAt(i);
		val = (c >= '0' && c <= '9');
		i++;
	}
	
	if (!val) {window.alert("Anchura solo admite digitos"); return;}	
	
	
	
	
	// Dato 5
	
	
	
	
        i = 0;
        val = dato5.length != 0;

	
	
	
	if (!val) {window.alert("Rellena el campo de precio"); return;}	
	
	if (dato5.length > 25) {window.alert("Número demasiado largo, acórtelo."); return;}
	
	
	
	while (i != dato5.length && val) {
	
		c = dato5.charAt(i);
		val = (c >= '0' && c <= '9');
		i++;
	}
	
	
	
	if (!val) {window.alert("Precio solo admite digitos"); return;}	


	

	
	
	document.formulario.submit();
	
	
	

	

}


	
	
	
	
	
	

