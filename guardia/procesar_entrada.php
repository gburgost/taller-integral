<?php

	include("conexion.php");

	date_default_timezone_set("Chile/Continental");
	$rut_persona = $_POST['rut'];
	$fechaentrada=date("d-m-Y");
	$horaentrada=date("H:i:s");
	$entrada = "entrada";






		mysql_query("INSERT INTO registro_entrada (id_entrada, rut_persona, fechaentrada, horaentrada, entrada) VALUES('', '$rut_persona', '$fechaentrada', '$horaentrada', '$entrada' )");
		echo "<script>
              alert('Registro realizado con exito');
              location.href='index.php';</script>";

		/*
		echo "<h1>Entradas</h1>";
		echo "Tus datos son los siguientes: <br /><br /> Nombre: $nombre<br />Email: $email<br /><br />Fecha Entrada: $fechaentrada  <br /> Hora entrada: $horaentrada <br />";
		echo "<button><a href='entrada.html'>Volver</a></button>";


class conexion{

		function recuperarDatos(){
			include("conexion.php");
			$query= "SELECT * FROM entrada";
			$resultado = mysql_query($query);

			while($fila = mysql_fetch_array($resultado))
			{
				echo "<br/>Nombre: $fila[Nombre] <br/>";
				echo "Rut: $fila[Rut]<br/>";
				echo "Fecha y Hora: $fila[Fechaentrada]<br/>";
				echo "Hora: $fila[Horaentrada]<br/>";

			}

		}
	}
	$con= new conexion();
	$con ->recuperarDatos();
*/




?>
</body>
</html>
