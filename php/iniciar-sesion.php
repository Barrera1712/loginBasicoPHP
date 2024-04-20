<?php
	// Establecer el encabezado "Cache-Control" para evitar el almacenamiento en caché
	header("Cache-Control: no-cache, no-store, must-revalidate");
	// Establecer el encabezado "Pragma" para evitar el almacenamiento en caché (compatibilidad con versiones anteriores de HTTP/1.0)
	header("Pragma: no-cache");
	// Establecer el encabezado "Expires" para indicar que la respuesta ha caducado
	header("Expires: 0");
	//yama al archivo de conexion para establecer la conexion
	require 'conexion.php';

	//identifica si los datos se estan enviando por el metodo post
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//Asigna el valor del input usuario a la variable usuario escapando los caracteres especiales para asi evitar inyecciones sql
	    $usuario = mysqli_real_escape_string($mysqli, $_POST["usuario"]);
	    //Asigna el valor del input password a la variable contraseña escapando los caracteres especiales para asi evitar inyecciones sql
    	$contraseña = mysqli_real_escape_string($mysqli, $_POST['password']);

    	//a la variable quey se le asigna una consulta sql dejandola preparada
	    $query = "SELECT id, contraseña, tipo_usuario FROM usuario WHERE nombre_usuario = ?";
	    //se prepara la consulta sql
   		$stmt = mysqli_prepare($mysqli, $query);
   		// Se utiliza para vincular un valor a un parámetro en una sentencia preparada en MySQLi.
    	mysqli_stmt_bind_param($stmt, "s", $usuario);
    	//Se ejecuta la consulta preparada
    	mysqli_stmt_execute($stmt);
    	//Se guardan los resultados en la variable result
    	$result = mysqli_stmt_get_result($stmt);

    	//si la variable result esta declarada y tiene contenido ademas de que al contar el numero de columnas es mayor a 0 significa que encontro un resultado por lo tanto el usuario existe
	    if ($result && mysqli_num_rows($result) > 0) {
	    	//asocia a la variable row las filas generadas por la variable result
	        $row = mysqli_fetch_assoc($result);
	        //asigna a la variable hashcontraseña el valor que optuvo de la consulta anterios en vace al campo contraseña
	        $hashContraseña = $row['contraseña'];
	        //asigna a la variable tipo el contenido en la fila tipo_usuario de la base de datos
	        $tipo=$row['tipo_usuario'];

	        //compara la variable contraseña con la variable hashcontraseña la cual contiene un hash bcrypt haseando el primer parametro para compararlo con el ya haseado 2do parametre
	        if (password_verify($contraseña,$hashContraseña)) {
	        	//se inicia una variable de secion
	            session_start();
	            //la variable de secion contiene el id del usuario
	            $_SESSION["id_usuario"] = $row['id'];
	            //se comprueva si el estado de la secion es activa o existente
	            if (session_status() === PHP_SESSION_ACTIVE) {
	            	//se comprueba el tipo de usuario que ingreso pues a cada uno se le dirige a diferente pagina 
	            	if ($tipo=="Administrador") {
	            		header("Location: admin.php");
	            	}else{
	            		header("Location: usuario.php");
	            	}
	            	exit();
				}
	        } else {
	        	//se crea una variable de secion para notidficar al usuario cualquier error y se le redirige a la pagina prinsipal
	        	session_start();
	            $_SESSION['error'] = "El usuario o la contraseña es incorrecta.";
	            header("Location: ../index.php");
	            exit();
	        }
	    } else {
	    	//se crea una variable de secion para notidficar al usuario cualquier error y se le redirige a la pagina prinsipal
	        session_start();
	        $_SESSION['error'] = "El usuario o la contraseña es incorrecta.";
	        header("Location: ../index.php");
	        exit();
	    }
	}
?>