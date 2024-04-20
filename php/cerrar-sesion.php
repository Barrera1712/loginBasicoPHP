<?php
	// Establecer el encabezado "Cache-Control" para evitar el almacenamiento en caché
	header("Cache-Control: no-cache, no-store, must-revalidate");
	// Establecer el encabezado "Pragma" para evitar el almacenamiento en caché (compatibilidad con versiones anteriores de HTTP/1.0)
	header("Pragma: no-cache");
	// Establecer el encabezado "Expires" para indicar que la respuesta ha caducado
	header("Expires: 0");
	//Inicia una variable de sesion
	session_start();

	//Si la variable de secion id_usuario no contiene nada significa que el usuario ya cerro cesion por lo tanto no deve permitir dirigir al usuario a una pagina donde ya cerro cesion
	if (!isset($_SESSION["id_usuario"])) {
    	//redirige al usuario a la pagina prinsipal
    	header("Location: ../index.php");
    	exit();
	}
	//Verifica si el usuario presiono el voton de cerrar cesion
	if (isset($_POST['cerrar-sesion']) && $_POST['cerrar-sesion'] == 1) {
		// session_unset() elimina todas las variables de sesión
		session_unset();
		// session_destroy() destruye la sesión actual
		session_destroy();
		//Al cerrar la cesion redirige al usuario asia la pagina principal
		header("Location: ../index.php");
		exit();
	}
?>