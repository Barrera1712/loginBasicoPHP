# loginBasicoPHP (By:Barrera Sánchez Uriel)

## Configuración:


Creación de la Base de Datos:


1. Antes de comenzar, asegúrate de tener acceso a un servidor de base de datos MySQL.
2. Importa en tu servidor de base de datos, el archivo `login.sql` proporcionado, para crear la base de datos necesaria.
3. Configura el archivo `php/conexion.php` en la línea: ```$mysqli=new mysqli("localhost","root","","login");``` configrará el nombre del servidor, usuario, contraseña y nombre de la BD en el orden mencionado.

## Ejemplo:

El sistema cuenta con dos tipos de usuarios: cliente y administrador.


- Cliente:
Para registrarse como cliente, accede al sistema de registro proporcionado y sigue las instrucciones para crear una cuenta.
- Administrador:
Utiliza las siguientes credenciales para ingresar como administrador:
 - Usuario: Admin
 - Contraseña: Admin


## Requisitos del Sistema:


- Servidor web con soporte para PHP (por ejemplo, Apache, Nginx).
- PHP versión 7.x o superior.
- Servidor de base de datos MySQL.


## Instrucciones de Implementación:


- Clona este repositorio en tu servidor web o descarga los archivos en tu máquina local.
- Configura la conexión a la base de datos descrita anteriormente.
- Asegúrate de que los permisos de escritura estén configurados correctamente para los archivos que necesiten acceso de escritura.
- Accede a la URL de tu aplicación en un navegador web y sigue las instrucciones de registro o inicia sesión con las credenciales de administrador proporcionadas.
