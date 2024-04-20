<?php
	/*Llama al arcivo cerrar-sesion*/
	require "cerrar-sesion.php";
			// Establecer el encabezado "Cache-Control" para evitar el almacenamiento en caché
	header("Cache-Control: no-cache, no-store, must-revalidate");
	// Establecer el encabezado "Pragma" para evitar el almacenamiento en caché (compatibilidad con versiones anteriores de HTTP/1.0)
	header("Pragma: no-cache");
	// Establecer el encabezado "Expires" para indicar que la respuesta ha caducado
	header("Expires: 0");
	//yama al archivo de conexion para establecer la conexion
	require 'conexion.php';

	//verifica si se activa el metodo post
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		//asigna a las variables el contenido de cada input
	    $usuario = $_POST["usuario"];
	    $contraseña = $_POST["password"];
	    $tipo=$_POST['tipo'];
	    $confirmar_contraseña = $_POST["con-password"];

	    //compara que la contraseña y la confirmacion de esta sean iguales
	    if ($contraseña === $confirmar_contraseña) {
	    	//si las contraseas son iguales la hasea con el algoritmo bcrypt y el resultado lo guarda en la variable hashcontraseña
	        $hashContraseña = password_hash($contraseña, PASSWORD_BCRYPT);
	        
	        	//se ace un try catch para capturar los errores
	        	try {
	        		//inserta los datos que contienen las variables en la base de datos
	        		$query = "INSERT INTO usuario (nombre_usuario, contraseña,tipo_usuario) VALUES ('$usuario', '$hashContraseña','$tipo')";
	        		//se ejecuta el query
	        		$result = mysqli_query($mysqli, $query);

	        		//comprueba si la variable result se ejecuto correctamente
	        		if ($result) {
	        			//redirige al usuario a la pantalla prinsipal una vez registrado
			            header("Location: admin.php");
			            exit();
		        	} else {
		        		//guarda el error en una variable llamada error
		            	$error= "Error al registrar el usuario. Por favor, inténtalo nuevamente.";
		        	}

	        	} catch (Exception $e) {
	        		//si el error capturado es el 1062 es por que el campo de la bd no permite usuarios duplicados
	        		 if ($e->getCode() === 1062) {
	        		 	//guarda el error en una variable llamada error
        				$error= "El usuario ya existe en la base de datos. Intente con otro";
    				} else {
    					//guarda el error en una variable llamada error
        				$error= "Las contraseñas no coinciden. Por favor, inténtalo nuevamente.";
    				}
	        	}
   				
	    } else {
	    	//manda un mensaje si las contraseñas y la comprobasion no son iguales
	        $error= "Las contraseñas no coinciden. Por favor, inténtalo nuevamente.";
	    }
	}
	//cierra la conexion a la base de datos
	mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/estilousuarios.css">
	<title>Document</title>
</head>
<body>
	<header>
		<h1>Administrador</h1>
		<?php if (isset($error)) { echo "<p class='error'>" . htmlspecialchars($error) . "</p>"; } ?>
		<nav class="menu">
		  <ul>
		    <li><a href="#">Inicio</a></li>
		    <li><a href="#">Administrar usuario</a>
		      <ul>
		        <li><a href="#">Modificar</a></li>
		        <li><a href="#">Eliminar</a></li>
		      </ul>
		    </li>
		    <li><a href="#">Registrar usuario</a>
		    </li>
		    <li><a href="#">Contacto</a></li>
		  </ul>
		</nav>
		<form action="" method="POST">
			<button type="submit" name="cerrar-sesion" value="1" class="btn-logout">Cerrar sesión</button>
		</form>
	</header>
	<main>
	<form name="registro" method="POST" action="" id="reg">
		<h2>CREAR CUENTA</h2>
		<input type="text" name="usuario" placeholder="Ingresar su usuario">
		<input type="password" name="password" placeholder="Ingresar su contraseña">
		<input type="password" name="con-password" placeholder="Confirme su contraseña">
		<select name="tipo">
			<option value="" disabled selected hidden>Seleccione tipo de usuario</option>
			<option>Administrador</option>
			<option>Normal</option>
		</select>
		<input type="submit" name="registrar" value="Registrar">
	</form>
	</main>
	<footer>
		<h3>Mi pagina</h4>
		<p>&copy; 2023 Nombre de la Empresa. Todos los derechos reservados.</p>
	     <p>Email: info@example.com</p>
	    <p>Teléfono: +123456789</p>
	    <p>Dirección: 123 Calle Principal, Ciudad</p>
	</footer>
</body>
</html>