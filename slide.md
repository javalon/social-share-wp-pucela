
## Intro

Conocimientos recomendados:

- HTML 
- CSS
- PHP 

Primeros pasos:

- Instalar los requisitos software dependiendo de tu sistema operativo
- Clonar o descargar este repositorio
- En el directorio del proyecto ejecutaremos en consola del sistema `docker-compose build` y seguidamente `docker-compose up -d` para lanzar los contenedores Docker necesarios para trabajar.
- Para parar el contenedor de docker usamos el comando `docker-compose stop`y para eliminarlo `docker-compose rm`.

Estructura del proyecto:

- .data: Contiene los archivos persistentes para la base de datos.
- docker: Configuración de Docker.
- log: Registros de los servicios lanzados en los contenedores de Docker.
- slideres: Recursos de las slides.
- src: Carpeta que contiene el código de las plantillas y plugins de Wordpress. Trabajaremos en este caso solamente en la carpeta plugins.
- uploads: Carpeta que almacena las subidas de los ficheros de medios de WP para su persistencia.
