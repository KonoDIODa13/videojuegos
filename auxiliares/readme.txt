Para que el proyecto se pueda utilizar en cualquier ordenador.
Primero, para que el docker pueda funcionar hay que habilitar la funcionalidad de WSL
que es el subsitema de Windows para Linux ya que Docker internamente utiliza Linux.
Para ello, hay que poner el comando en el terminal como administrador: wsl --install.
Si tienes algun problema, visite la pagina de https://learn.microsoft.com/es-es/windows/wsl/install
que es de donde he sacado esta información.

Una vez que el docker funcione hay que crear la base de datos que para ello
tendremos que ir al terminal y desde la carpeta donde esté nuestro proyecto
ponemos el comando: symfony console docker-compose up -d
Dicho comando creará la base de datos en función del fichero docker-compose.yaml 
que esta en el proyecto desde la carpeta principal abajo del todo. Añadimos lo de -d para que dicho comando lo haga en
segundo plano. 

Una vez acabado el comando, recomiendo utilizar MySQL Workbench, abrimos una nueva conexión 
en la que ponemos el nombre de videojuegos, para el puerto ponemos el que utiliza el docker 
(si no sabemos cual es, ponemos el comando docker-compose ps y en el apartado ports nos aparece
en mi caso, me aparece esto: 33060/tcp, 0.0.0.0:50184->3306/tcp el puerto que hya que coger es el de 50184 además de que
en el estado de la maquina debe de poner "running") y poner la contraseña que es la de "password"
(también esta en el fichero de docker-compose.yaml).

una vez dentro de la conexion a la base de datos, tendremos que ir a "Administration", en el apartado "Management"
y pulsamos en "Data Import" en la pantalla que nos aparece, seleccionamos la segunda opción que pone 
"Import from Self-Contained File" y en la ruta que nos pone la cambiamos por la del fichero videojuegos.sql
que estará desde la carpeta principal, en auxiliares y en bd.
En mi caso: C:\Users\jaime\VSCode\videojuegos\auxiliares\bd\videojuegos.sql 

Cada vez que arranquemos el docker para ver el proyecto, tendremos que cambiar el puerto y volver a poner la contraseña
en MySQL Workbench si es que se quiere ver los cambios realizados en la base de datos.

para arrancar el proyecto, debemos de poner en la terminal desde la carpeta principal:
symfony serve -d o symfony server:start -d

Para abrirlo, desde el mismo terminal ponemos: 
symfony open:local 
