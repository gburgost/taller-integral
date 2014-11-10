<?php
	include 'conexion.php';

	$nombre = $_POST['name'];
	$apellido = $_POST['lastname'];
	$rut = $_POST['rut'];
	$fechanacimiento = $_POST['date'];
	$departamento = $_POST['departamento'];
	$cargo = $_POST['cargo'];
	$tipo_contrato = $_POST['tipo_contrato'];
	$fechavin = $_POST['fechavin'];
	$fechades = $_POST['fechades'];
	$tipo_persona = "Empleado";



	mysql_query("INSERT INTO persona (id, rut_persona, nombre, apellido, fecha_nac, tipo_persona) VALUES('', '$rut', '$nombre', '$apellido', '$fechanacimiento' ,'$tipo_persona' )");

	mysql_query("INSERT INTO empleado ( id_empleado, rut_persona, fecha_vinculacion, fecha_desvinculacion, tipo_contrato, cargo, id_departamento) VALUES ('', '$rut', '$fechavin', '$fechades', '$tipo_contrato', '$cargo', '$id_departamento')");

?>
