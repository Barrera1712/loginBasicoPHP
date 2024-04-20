<?php
	/*Llama al arcivo cerrar-sesion*/
	require "cerrar-sesion.php";
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
		<h1>Usuarios</h1>
		<nav class="menu">
		  <ul>
		    <li><a href="#">Inicio</a></li>
		    <li><a href="#">Mi cuenta</a>
		      <ul>
		        <li><a href="#">Modificar</a></li>
		        <li><a href="#">Eliminar</a></li>
		      </ul>
		    </li>
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
		<h2>MODIFICA TU CUENTA</h2>
		<input type="text" name="usuario" placeholder="Ingresar su usuario">
		<input type="password" name="password" placeholder="Ingresar su contraseña">
		<input type="password" name="con-password" placeholder="Confirme su contraseña">
		<input type="submit" name="modificar" value="Modificar">
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