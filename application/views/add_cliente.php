<div class="row">
<div class="col-xs-12" >
<div class="block">
	<div class="block-title">
		<h2>Agregar <strong>Cliente</strong></h2>
	</div>
	<div class="row">
		<form class="form-horizontal form-bordered" id="new_cliente" method="post" action="<?= site_url('clientes/guardar_cliente') ?>">
			<div class="form-group">
				<label class="col-sm-2 control-label" for="nombre">Nombre <span class="text-danger">*</span></label>
				<div class="col-sm-4 ">
					<div class="input-group">
						<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre del cliente..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
				<label class="col-sm-2 control-label" for="web">WebSite</label>
				<div class="col-sm-4 ">
					<div class="input-group">
						<input type="text" id="web" name="web" class="form-control" placeholder="WebSite del cliente..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="correo">Correo <span class="text-danger">*</span></label>
				<div class="col-sm-4">
					<div class="input-group">
						<input type="text" id="correo" name="correo" class="form-control" placeholder="Correo del cliente..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
				<label class="col-sm-2 control-label" for="telefono">Teléfono <span class="text-danger">*</span></label>
				<div class="col-sm-4">
					<div class="input-group">
						<input type="text" id="telefono" name="telefono" class="form-control" placeholder="Teléfono del cliente..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="telefono">Calle</label>
				<div class="col-sm-4">
					<div class="input-group">
						<input type="text" id="calle" name="calle" class="form-control" placeholder="Calle de ubicación..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
				<label class="col-sm-2 control-label" for="numero">Numero</label>
				<div class="col-sm-4">
					<div class="input-group">
						<input type="text" id="numero" name="numero" class="form-control" placeholder="Numero de ubicación..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="colonia">Colonia</label>
				<div class="col-sm-4">
					<div class="input-group">
						<input type="text" id="colonia" name="colonia" class="form-control" placeholder="Colonia de ubicación..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
				<label class="col-sm-2 control-label" for="referencia">Referencia</label>
				<div class="col-sm-4">
					<div class="input-group">
						<input type="text" id="referencia" name="referencia" class="form-control" placeholder="Referencia de ubicación..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="ciudad">Ciudad</label>
				<div class="col-sm-4">
					<div class="input-group">
						<input type="text" id="ciudad" name="ciudad" class="form-control" placeholder="Ciudad..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
				<label class="col-sm-2 control-label" for="estado">Estado</label>
				<div class="col-sm-4">
					<div class="input-group">
						<input type="text" id="estado" name="estado" class="form-control" placeholder="Estado..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="pais">País</label>
				<div class="col-sm-4">
					<div class="input-group">
						<input type="text" id="pais" name="pais" class="form-control" placeholder="País..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
				<label class="col-sm-2 control-label" for="detalles">Detalles</label>
				<div class="col-sm-4">
					<div class="input-group">
						<textarea id="detalles" name="detalles" class="form-control" rows="2" placeholder="Detalles..."></textarea>
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
			</div>
			<div id="Clonar" name="Clonar">
			<div class="form-group">
				<label class="col-sm-2 control-label"  for="clasificacion">Clasificación</label>
				<div class="col-sm-4">
					<div class="input-group">
						<select id="clasificacion" name="clasificacion" class="select-chosen form-control clasifi" onchange="checar_clasificacion('');">
							<option value="0">Seleccione una Clasificación</option>
							<?php 
								$options="";
								foreach($clasificaciones as $tipo)
								{
									$options.= '<option value="'.$tipo->id.'">'.$tipo->nombre.'</option>';
								}
								echo $options;
							?>
						</select>
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
				<label class="col-sm-2 control-label"  for="prioridad">Prioridad</label>
				<div class="col-sm-4">
					<div class="input-group">
						<select id="prioridad" name="prioridad" class="select-chosen form-control prioridades">
							<option value="">Seleccione una Prioridad</option>
							<option value="1">Prioridad 1</option>
							<option value="2">Prioridad 2</option>
							<option value="3">Prioridad 3</option>
							<option value="4">Prioridad 4</option>
						</select>
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>	
			</div>
			</div>
			<div id="new_clasif" name="new_clasif">
				<!--Aqui se pondran las nuevas clasificaciones-->
			</div>
			<input type="hidden" name="numero_clas" id="numero_clas" value="0" />
			<div class="form-group text-center"><a href="javascript:void(0)" class="btn-sm btn-info" onClick="agregarClasif()">Nueva Clasificación</a></div>
			<div class="form-group text-center">
				<br><br><br>
				<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Guardar</button>
				<button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Limpiar</button>
				<br><br><br>
			</div>			
		</form>
	</div>
</div>
</div>
</div>
<script>
var i=1;
function agregarClasif ()
{
	x=	'<div class="form-group">'+
			'<label class="col-sm-2 control-label"  for="clasificacion'+i+'">Clasificación '+i+'</label>'+
			'<div class="col-sm-4">'+
				'<div class="input-group">'+
					'<select id="clasificacion'+i+'" name="clasificacion'+i+'" class="select-chosen form-control clasifi">'+
						'<option value="0">Seleccione una Clasificación</option>'+
						'<?= $options ?>'+
					'</select>'+
					'<span class="input-group-addon"><i class="gi gi-user"></i></span>'+
				'</div>'+
			'</div>'+
			'<label class="col-sm-2 control-label"  for="prioridad'+i+'">Prioridad '+i+'</label>'+
			'<div class="col-sm-4">'+
				'<div class="input-group">'+
					'<select id="prioridad'+i+'" name="prioridad'+i+'" class="select-chosen form-control prioridades">'+
						'<option value="">Seleccione una Prioridad</option>'+
						'<option value="1">Prioridad 1</option>'+
						'<option value="2">Prioridad 2</option>'+
						'<option value="3">Prioridad 3</option>'+
						'<option value="4">Prioridad 4</option>'+
					'</select>'+
					'<span class="input-group-addon"><i class="gi gi-user"></i></span>'+
				'</div>'+
			'</div>'+
		'</div>';
	$("#new_clasif").append( x );
	$('.select-chosen').chosen();
	$('#div_nueva_clasificacion'+i).hide();
	$('#numero_clas').val(i);
	i++;
}
</script>

<script src="<?= asset_url('js/pages/nuevocliente.js') ?>"></script>
<script>$(function(){ FormsValidation.init(); });</script>