<?php

	include("conexion.php");

	date_default_timezone_set("Chile/Continental");
	$rut_persona = $_POST['rut'];
	$fecha=date("Y-m-d");
	$hora=date("H:i:s");

	$persona = mysql_query("SELECT * FROM registro_persona WHERE rut_persona = '$rut_persona'");
	$consulta = mysql_query($persona);
	$fila = mysql_fetch_array($historial);

	if  ($fila['hora_entrada'] == "" || $fila['fecha_entrada'] == ""){
		mysql_query("INSERT INTO registro_persona (cod_registro, nro_garita, rut_persona, rut_guardia, fecha_entrada, hora_entrada, fecha_salida, hora_salida) VALUES('', '$nro_garita', '$rut_persona', '$rut_guardia', '$fecha', '$hora', '', '' )");


	}
	elseif ($fila['hora_entrada'] == "00:00:00" || $fila['fecha_entrada'] == "0000-00-00") {
		mysql_query("UPDATE registro_persona SET fecha_salida = '$fecha', hora_salida = '$hora' WHERE rut_persona = '$rut_persona'");
	}




	/*mysql_query("INSERT INTO registro_persona (id_entrada, rut_persona, fechaentrada, horaentrada, entrada) VALUES('', '$rut_persona', '$fechaentrada', '$horaentrada', '$entrada' )");*/








?>
