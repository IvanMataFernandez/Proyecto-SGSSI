
# Docker LAMP
Linux + Apache + MariaDB (MySQL) + PHP 7.2 en Docker Compose.


## Creadores
Iván Mata, Alessandra Taipe, Maialen Torre.

## Instrucciones

Moverse al directorio de la página web (docker-lamp)

Dentro del repositorio escribir por terminal $ sudo docker build -t="web" .

Después escribir $ sudo docker-compose up

Finalmente visitar http://localhost:81 para visualizar la página web

Para parar el servidor introducir $ sudo docker-compose down


El archivo .sql no es necesario ejecutarlo ya que el programa genera automáticamente
la BD al iniciarlo por primera vez. De todas formas, es posible ejecutarlo para 
borrar todos los datos almacenados en la página web. 
Para ello, abrir http://localhost:8890/ mientras docker esté activo iniciando sesión 
como "admin" y contraseña "test". Tras ello, pinchar en database (en la izquierda de la web)
y luego en importar (sexta opción del menú de arriba). Elegir el archivo .sql del directorio
para importarlo y clickar en "importar" para completar el proceso

