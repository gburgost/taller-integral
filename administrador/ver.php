<?php


include_once("conexion.php");

	$con = new DB;
	$pacientes = $con->conectar();
	$strConsulta = "SELECT id_empleados, nombre_empleados, rut_empleados from empleados";
	$pacientes = mysql_query($strConsulta);
	$numfilas = mysql_num_rows($pacientes);

	echo '<table cellpadding="0" cellspacing="0" width="100%">';
	echo '<thead>
				<th>id.</th>
				<th>Nombre</th>
				<th>Rut</th>
				<th>Ver</th>
		</thead>';
	for ($i=0; $i<$numfilas; $i++)
	{
		$fila = mysql_fetch_array($pacientes);
		$numlista = $i + 1;
		echo '<tr><td>'.$numlista.'</td>';
		echo '<td>'.$fila['nombre_empleados'].'</td>';
        echo '<td>'.$fila['rut_empleados'].'</td>';
		echo '<td><a href="reporte_historial.php?id='.$fila['id_empleados'].'">ver</a></td></tr>';
	}
	echo "</table>";
}
?>
