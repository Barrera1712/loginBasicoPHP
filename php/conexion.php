<?php
	//crea una conexion de mysql espesificando como parametros, la direccion del cervidor, el usuario, la contraseña y el nombre de la base de datos a usar 
	$mysqli=new mysqli("localhost","root","","login");
	//utilisa utf8 para pasar los caracteres a la base de datos
	$mysqli->set_charset("utf8");
?>