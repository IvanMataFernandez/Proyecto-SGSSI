
# Docker LAMP
Linux + Apache + MariaDB (MySQL) + PHP 7.2 en Docker Compose.


## Creadores
Iván Mata, Alessandra Taipe, Maialen Torre.

## Instrucciones

Descargarse el repositorio git, por ejemplo con https sería $ git clone https://github.com/IvanMataFernandez/Proyecto-SGSSI.git . En su lugar también se puede bajar el zip
pulsando en el botón "Code" verde y descomprimirlo después.

Moverse al directorio de la página web, el cual sería este mismo repositorio git en tu pc. 
 
Dentro del repositorio ejecutar $ sh iniciar.sh   para arrancar el servidor

Finalmente visitar http://localhost:81 para visualizar la página web

Para parar el servidor introducir $ sh apagar.sh


El archivo .sql no es necesario ejecutarlo ya que el programa genera automáticamente
la BD al iniciarlo por primera vez. De todas formas, es posible ejecutarlo para 
borrar todos los datos almacenados en la página web.
Para ello, abrir http://localhost:8890/ mientras docker esté activo iniciando sesión 
con las credenciales adecuadas indicadas en el archivo docker-compose. Tras ello, pinchar en database (en la izquierda de la web)
y luego en importar (sexta opción del menú de arriba). Elegir el archivo .sql del directorio
para importarlo y clickar en "importar" para completar el proceso

