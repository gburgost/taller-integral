<?php
	$host = "localhost";
	$user = "root";
	$pass = "root";
	$db = "mpc";

		$conexion=mysql_connect($host, $user, $pass);
		mysql_select_db($db);

		$query = "SELECT * FROM empleado";
		$empleados = mysql_query($query, $conexion);

		$rt = "SELECT * FROM persona";
		$persona = mysql_query($rt, $conexion);


?>
