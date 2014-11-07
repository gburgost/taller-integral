<form id="fRegister" class="form" name="form" action="#" method="POST">
	<p>
		<label for="area">Area</label>
		<select name="area" class="form-control" id="area">
			<option value="0">Seleccione Area</option>
		</select>
	</p>
	<p>
		<label for="boss">Encargado</label>
		<select name="boss" class="form-control" id="boss">
			<option value="0">Seleccione Encargado</option>
		</select>
	</p>
	<p>
		<label for="name">Nombre</label>
		<input id="name" class="form-control" name="name" type="text" />
	</p>
	<p>
		<label for="serial">Serial</label>
		<input id="serial" class="form-control" name="serial" type="text"  />
	</p>
	<p>
		<input id="generar" class="btn btn-info" type="button" href="javascript:;" onclick="realizaProceso($('#serial').val());return false;" value="Genrerar"/>
	</p>
	<p>
		<label for="stock">Stock</label>
		<input id="stock" class="form-control" name="stock" type="text" />
	</p>
	<p>
		<label for="description">Descripcion</label>
		<textarea  id="description" class="form-control" name="description" ></textarea>
	</p>
	<p>
		<label for="date">Fecha</label>
		<input id="date" class="form-control" name="date" type="text" />
	</p>
	<p>
		<input type="reset" class="btn btn-danger" value="Limpiar" />
		<input id="doRegister" class="btn" type="submit" value="registrar">
	</p>
	<div class="alert alert-success" role="alert"></div>
</form>
