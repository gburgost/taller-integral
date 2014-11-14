<form id="fRegister" class="form" name="form" action="registro_empleado.php" method="POST">

	<p>

		<input id="rut" class="registrar form-control" name="rut" type="text" required />
		<input type="reset" class="borrar btn btn-danger" value="X" />
		<span id="resultado"> </span>
	</p>
	<p>
		<!--<input id="generar" class="btn btn-info" type="button" href="javascript:;" onclick="realizaProceso($('#rut').val());return false;" value="Generar"/>-->
	</p>
	<p id="botones">
		<button id="doRegister" type="submit" class="btn btn-success" onclick = "this.form.action = 'procesar_entrada.php'" value="accion 1">Entrada</button>
		<button id="doRegister" type="submit" class="btn btn-danger" onclick = "this.form.action = 'procesar_salida.php'" value="accion 2">Salida</button>
	</p>
</form>
