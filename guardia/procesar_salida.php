<?php

	include("conexion.php");

	date_default_timezone_set("Chile/Continental");
	$rut_persona = $_POST['rut'];
	$fechasalida=date("d-m-Y");
	$horasalida=date("H:i:s");
	$salida = "salida";




		mysql_query("INSERT INTO registro_salida (id_salida, rut_persona, fechasalida, horasalida, salida) VALUES('', '$rut_persona', '$fechasalida', '$horasalida', '$salida' )");
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
