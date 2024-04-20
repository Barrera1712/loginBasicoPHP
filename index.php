<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<title>Document</title>
</head>
<body>
	<form name="login" method="POST" action="php/iniciar-sesion.php">
		<h1>INICIAR SESIÓN</h1>
		<?php /*Inicia una secion para poder pasar el valor de la variable de secion error en caso de que esta contenga algo*/session_start(); if (isset($_SESSION['error'])) { echo "<p class='error'>" . htmlspecialchars($_SESSION['error']) . "</p>"; unset($_SESSION['error']); } ?>
		<input type="text" name="usuario" placeholder="Ingresar su usuario" autocomplete="off" maxlength="50">
		<input type="password" name="password" placeholder="Ingresar su contraseña" autocomplete="off" maxlength="20">
		<input type="submit" name="login" value="INICIAR SESIÓN">
		<a href="php/registro.php">Crear cuenta</a>
		<a href="">Olvide mi contraseña</a>
	</form>
</body>
</html>