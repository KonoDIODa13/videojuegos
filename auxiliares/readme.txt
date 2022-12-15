Para que el proyecto se pueda utilizar en cualquier ordenador.
Primero, para que el docker pueda funcionar hay que habilitar la funcionalidad de WSL
que es el subsitema de Windows para Linux ya que Docker internamente utiliza Linux.
Para ello, hay que poner el comando en el terminal como administrador: wsl --install.
Si tienes algun problema, visite la pagina de https://learn.microsoft.com/es-es/windows/wsl/install
que es de donde he sacado esta información.

Una vez que el docker funcione hay que crear la base de datos que para ello
tendremos que ir al terminal y desde la carpeta donde esté nuestro proyecto
ponemos el comando: symfony console docker-compose up
Dicho comando creará la base de datos en función del fichero docker-compose.yaml 
que esta en el proyecto desde la carpeta principal abajo del todo.

Si no acaba el proceso o tarda mucho podemos finalizarlo nosotros con Ctrl + C y nos vamos a la interfaz del docker,
selecionamos el contenedor que hemos creado y lo arrancamos pulsandolo a play.

Una vez acabado el comando, recomiendo utilizar MySQL Workbench, abrimos una nueva conexión 
en la que ponemos el nombre de videojuegos, para el puerto ponemos el que utiliza el docker 
(si no sabemos cual es, ponemos el comando docker-compose ps y en el apartado ports nos aparece) y 
poner la contraseña que es la de "password" (también esta en el fichero de docker-compose.yaml).
una vez dentro de la conexion a la base de datos, tendremos que ir a "Administration", en el apartado "Management"
y pulsamos en "Data Import" en la pantalla que nos aparece, seleccionamos la segunda opción que pone 
"Import from Self-Contained File" y en la ruta que nos pone la cambiamos por la del fichero videojuegos.sql
que estará desde la carpeta principal, en auxiliares y en bd.
En mi caso: C:\Users\jaime\VSCode\videojuegos\auxiliares\bd\videojuegos.sql 

Cada vez que arranquemos el docker para ver el proyecto, tendremos que cambiar el puerto y volver a poner la contraseña
en MySQL Workbench si es que se quiere ver los cambios realizados en la base de datos.
