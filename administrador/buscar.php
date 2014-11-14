<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Buscar</title>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/jquery.dataTables.css">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/estilo.css">
	 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="../scripts/functions.js"></script>
	<script src="../scripts/prefixfree.min.js"></script>
	<script src="../scripts/jquery.dataTables.js"></script>
	<script src="../scripts/jquery-barcode.js"></script>

	<script>
		function realizaProceso(serial){
		        var parametros = {
		                "serial" : serial
		        };
		        $.ajax({
		                data:  parametros,
		                url:   '#',
		                type:  'post',
		                beforeSend: function () {
		                        $("#registerBarcode").html("Procesando, espere por favor...");
		                },

		                success:  function () {
		                        $('#registerBarcode').barcode(serial, "codabar", {barWidth:1, barHeight:60, output: "canvas" }
								);
		                }

		        });
		}
		/*function datos(rut_persona){
			var parametros = {
				"rut_persona" : rut_persona
			};
				$.ajax({
					data: parametros,
					url:  'traerdatos.php',
					type: 'get',
					success: function(event){
						document.getElementById('mostrar').innerHTML = event;
					}
				});
		}*/
	</script>
</head>
<body>
	<div id="mainWrapper">
		<header>
			<figure id="logo">
				<img src="../img/logompc.png" alt="mpc" width="100" />
			</figure>
			<div class="titulos">
				<h1>Sistema de Registros</h1>
			</div>
			<div class="usuario">
				<strong>Administrador</strong>
				<p>Cristian Seura</p>
			</div>

		</header>
		<nav>
			<ul class="nav nav-tabs">
				<li>
					<a href="index.php">Registrar</a>
				</li>
				<li><a href="#">Registrar Contratista</a></li>
				<li class="active"><a href="#">Buscar</a></li>

			</ul>
		</nav>
		<header id="titleContent"><h4>Buscar Persona</h4></header>
		<section>
			<article id="aSearch">
			<?php
				include_once("conexion.php");
				$con = new DB;
				$buscar = $con->conectar();
				$strConsulta = "SELECT rut_persona, nombre, apellido, tipo_persona from persona";
				$buscar = mysql_query($strConsulta);
				$numfilas = mysql_num_rows($buscar);

				echo '<table id="tSearch" class="table table-hover" cellspacing="1"> ';
				echo '<caption>Listado de Personas</caption>';
				echo '<thead>
						<tr>
							<th>Id</th>
							<th>Rut</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Tipo de Persona</th>
							<th>Ver</td>
						</tr>
					</thead>';
				for ($i=0; $i<$numfilas; $i++)
				{
					$fila = mysql_fetch_array($buscar);
					$numlista = $i + 1;
					echo '<tbody>';
					echo '<tr><td>'.$numlista.'</td>';
					echo '<td>'.$fila['rut_persona'].'</td>';
			        echo '<td>'.$fila['nombre'].'</td>';
			        echo '<td>'.$fila['apellido'].'</td>';
			        echo '<td>'.$fila['tipo_persona'].'</td>';
					echo '<td><a class="btn btn-success btn-sm" href="reporte_historial.php?rut_persona='.$fila['rut_persona'].'">ver</a></td></tr>';
				}
				echo '</tbody>';
				echo "</table>";
			?>

<!--
				<table id="tSearch" class="table table-hover" cellspacing="1">
					<caption>Listado de Personas</caption>
					<thead>
						<tr>
							<th>Id</th>
							<th>Area</th>
							<th>Encargado</th>
							<th>Nombre</th>
							<th># Serie</th>
							<th>Cantidad</th>
							<th>Descripcion</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>4</td>
							<td>Area 1</td>
							<td>Hector</td>
							<td>Hector</td>
							<td>1234</td>
							<td>10</td>
							<td>probando todo esto</td>
						</tr>
						<tr>
							<td>4</td>
							<td>Area 1</td>
							<td>Jano</td>
							<td>Alvaro</td>
							<td>1234</td>
							<td>10</td>
							<td>probando todo esto</td>
						</tr>
					</tbody>
				</table>
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6">
							<h3>Editar personas <span></span></h3>
							Ultima actualizacion: <i></i>
							<?php /*include 'form.php'; */?>
						</div>
						<div class="col-md-6">
							<div class="contentBardcode">
								<div class="barCode">
									<header>
										<h4>Código</h4>
									</header>
									<canvas id="searchBarcode" width="120" height="70"></canvas>
								</div>
								<a href="#" class="btn btn-primary">Guardar</a>
							</div>
						</div>
					</div>
				</div>-->
			</article>
		</section>
	</div>
	<footer>
		<p>
			- © Copyright 2014 -
		</p>
	</footer>

</body>
</html>
