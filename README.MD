# FormElecciones

El proyecto FormElecciones es un sistema web para la gestión de elecciones, desarrollado en PHP y MySQL. Permite a los usuarios crear elecciones y candidatos, y votar por ellos.  El proyecto cuenta con una documentación detallada para su instalación y configuración.


**Entorno:**

* Xampp: 3.3.0.0
----------------
* PHP: 8.1.6
* MySQL: 8.1.6

# Instrucciones de instalación

Para ejecutar el proyecto en un servidor Apache con la base de datos incluida, utilizaremos como herramienta XAMPP, una solución de fácil instalación que incluye Apache, MySQL y PHP. A continuación, se detallan los pasos necesarios para la instalación:

**PASO 1** Descarga e instalación de XAMPP:
- Accede al sitio web oficial de XAMPP y descarga la versión adecuada para tu sistema operativo.
- Ejecuta el instalador y sigue las instrucciones del asistente para completar la instalación.

**PASO 2** Ubicación de la carpeta de htdocs:
- Una vez instalado XAMPP, accede a la carpeta de instalación y busca la ruta **'/[RutadeXampp]/htdocs/.**
- Dentro de la carpeta htdocs, arrastra y suelta la carpeta del proyecto que acabas de descargar.

**PASO 3** Inicio de MySQL:
- Abre XAMPP y presiona el botón "Start" en la opción de MySQL.
- Si la base de datos ya está en ejecución, el botón aparecerá en verde y se mostrará el mensaje "Running".

**PASO 4** Acceso a PHPMyAdmin:
- Abre tu navegador web y escribe "localhost/phpmyadmin" en la barra de direcciones.
- Se abrirá el panel de control de PHPMyAdmin, donde podrás administrar tu base de datos y crear una con el nombre que tu elijas.

**PASO 5** Importación del archivo bd_elecciones.sql:
- Dentro de PHPMyAdmin, selecciona la opción "Importar" en el menú superior.
- Selecciona el archivo bd_elecciones.sql que se encuentra en la carpeta **basededato** del proyecto y presiona "Continuar".
- Espera a que se complete la importación del archivo.

**PASO 6** Inicio de Apache:
- Abre XAMPP y presiona el botón "Start" en la opción de Apache.
- Si el servidor web ya está en ejecución, el botón aparecerá en verde y se mostrará el mensaje "Running".


# Configuracion de variables

Para que el proyecto pueda estar activo y en funcionamiento, es necesario configurar ciertas variables, a continuación, se detallan los pasos

**Configurar nombre de la base de datos:**
- Accede a la ruta **'/[RutadeXampp]/htdocs/core/config.php**
- Ingresa el nombre correspondiente a la base de datos que asignaste anteriormente en la linea 24.
- Abre tu navegador web y escribe [](http://localhost/) en la barra de direcciones.
- El sistema estará disponible para su uso.


Siguiendo estos pasos, podrás configurar y ejecutar el proyecto en un servidor Apache con la base de datos incluida utilizando XAMPP.
