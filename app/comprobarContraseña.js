
function comprobarDatos() {



	


	
        var cont = document.formulario.cont.value;



		
	comprobar(cont); 
	


	


	
	
				
}

function comprobar(contraseina) {


	// Comprobar contraseña
	
	i = 0;
	val = contraseina.length != 0;
	letra = false;
	num = false;
	

	if (!val) {window.alert("Rellena el campo de contraseña"); return;}
	
		// Comprobaciones para seguridad
		
	if (contraseina.length > 128) {window.alert("Contraseña demasiado larga, acórtela."); return;}
        if (contraseina.length < 10) {window.alert("Escriba una contraseña de al menos 10 caracteres"); return;}


	while (i != contraseina.length && val) {

		c = contraseina.charAt(i);
		
		val = (c >= 'A' && c <= 'Z') || (c >= 'a' && c <= 'z') ||  c == ' ' || c == 'ñ' || c == 'Ñ' || c == 'á' || c == 'é' || c == 'í' || c == 'ó' || c == 'ú'|| c == 'Á' || c == 'É' || c == 'Í' || c == 'Ó' || c == 'Ú' || (c >= '!' && c <= '/');
		letra = val || letra;
		
		num = (c >= '0' && c <= '9') || num;
		val = val || (c >= '0' && c <= '9');
		


		
		i++;
	}
	
	if (!val) {window.alert("Formato de contraseña inválido, usa caracteres alfanuméricos, comillas o ! # $ % & ( ) * + , - . /"); return;}	
	if (!num) {window.alert("Formato de contraseña inválido, usa al menos un dígito en tu contraseña."); return;}	
	if (!letra) {window.alert("Formato de contraseña inválido, usa al menos una letra mayúscula o minúscula en tu contraseña."); return;}	
	document.formulario.submit();
	

	
	

}


	
	
	
	
	
	

