<form id="fRegister" class="form" name="form" action="registro_empleado.php" method="POST">

	<p>
		<label for="name">Nombre</label>
		<input id="name" class="form-control" name="name" type="text" />
	</p>
	<p>
		<label for="lastname">Apellido</label>
		<input id="lastname" class="form-control" name="lastname" type="text" />
	</p>

	<p>
		<label for="serial">Rut</label>
		<input id="serial" class="form-control" name="serial" type="text"  />
	</p>
	<p>
		<input id="generar" class="btn btn-info" type="button" href="javascript:;" onclick="realizaProceso($('#serial').val());return false;" value="Genrerar"/>
	</p>
	<p>
		<label for="date">Fecha Nacimiento</label>
		<input id="date" class="form-control" name="date" type="date" />
	</p>
	<p>
		<label for="departamento">Departamento</label>
		<?php include 'departamento.php'; ?>
	</p>
	<p>
		<label for="cargo">Cargo</label>
		<input id="cargo" class="form-control" name="cargo" type="text" />
	</p>
	<p>
		<label for="tipo_contrato">Tipo Contrato</label>
		<select name="tipo_contrato" class="form-control" id="tipo_contrato">
			<option value="0">Seleccione Tipo Contrato</option>
			<option value="1">Plazo fijo</option>
			<option value="2">Indefinido</option>
		</select>
	</p>
	<p>
		<label for="fechavin">Fecha de Vinculación</label>
		<input id="fechavin" class="form-control" name="fechavin" type="date" />
	</p>
	<p>
		<label for="fechades">Fecha de Desvinculación</label>
		<input id="fechades" class="form-control" name="fechades" type="date" />
	</p>
	<p>
		<input type="reset" class="btn btn-danger" value="Limpiar" />
		<input id="doRegister" class="btn" type="submit" value="registrar">
	</p>
	<div class="alert alert-success" role="alert"></div>
</form>



