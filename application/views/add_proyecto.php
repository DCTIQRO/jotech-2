<div class="row">
<div class="col-xs-12" >
<div class="block">
	<div class="row">
		<div class="col-xs-12">
			<div class="block-section">
				<h4 class="sub-header"><?= $titulo ?></h4>
			</div>
		</div>
	</div>
	<div class="row">
		<form class="" id="new_cliente" method="post" action="<?= site_url('proyectos/guardar_proyecto') ?>">
			<input type="hidden" id="id_cliente" name="id_cliente" value="<?= $id_cliente ?>" />
			<div class="form-group">
				<label class="col-md-2 control-label" for="nombre">Nombre <span class="text-danger">*</span></label>
				<div class="col-md-4">
					<div class="input-group">
						<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre del Proyecto..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
				<label class="col-md-2 control-label" for="descripcion">Descripción</label>
				<div class="col-md-4">
					<div class="input-group">
						<input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Descripcion ..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
			</div>

			
			<div class="form-group">
				<label class="col-md-2 control-label" for="descripcion_corta">Descripción Corta</label>
				<div class="col-md-4">
					<div class="input-group">
						<input type="text" id="descripcion_corta" name="descripcion_corta" class="form-control" placeholder="Descripcion_corta..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
				<label class="col-md-2 control-label" for="fecha_inicio">Fecha Inicio</label>
				<div class="col-md-4">
					<div class="input-group">
						<input type="text" id="fecha_inicio" name="fecha_inicio" class="form-control input-datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-YYYY..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-2 control-label" for="tags">Etiquetas <span class="text-danger"></span></label>
				<div class="col-md-4">
					<div class="input-group">
						<input type="text" id="tags" name="tags" class="input-tags" style="display: none;" data-placeholder="Ingrese sus etiquetas">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
				<label class="col-md-2 control-label"  for="usuarios">Usuarios</label>
				<div class="col-md-4">
					<div class="input-group">
						<select id="usuarios" name="usuarios[]" class="select-chosen form-control" data-placeholder="Selecciona un usuario.." multiple >
							<?php 
								foreach($usuarios as $usuario)
								{
									echo '<option value="'.$usuario->id.'">'.($usuario->first_name)." ".($usuario->last_name).'</option>';
								}
							?>
						</select>
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>	
			</div>
			
			<div id="Clonar" name="Clonar">
			<div class="form-group" id="grupo0">
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
				<div class="col-sm-3">
					<div class="input-group">
						<select id="prioridad" name="prioridad" class="select-chosen form-control prioridades">
							<option value="">Seleccione una Prioridad</option>
							<option value="1">Baja</option>
							<option value="2">Mediana</option>
							<option value="3">Alta</option>
						</select>
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
				<div class="col-sm-1"  Style="padding-top:10px">
					<label onClick="quitarClasif (0)" class="btn-sm btn-danger">Eliminar</label>
				</div>
			</div>
			</div>
			<div id="new_clasif" name="new_clasif">
				<!--Aqui se pondran las nuevas clasificaciones-->
			</div>
			<input type="hidden" name="numero_clas" id="numero_clas" value="0" />
			<div class="form-group text-center">
				<hr Style="border-color:#FFF ; width: 100%;">
			</div>
			<div class="form-group text-center">
				<a href="javascript:void(0)" class="btn-sm btn-info" onClick="agregarClasif()">Nueva Clasificación</a>
			</div>
			<div class="form-group text-center">
					<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Guardar</button>
					<button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Limpiar</button>
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
	x=	'<div class="form-group" id="grupo'+i+'">'+
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
			'<div class="col-sm-3">'+
				'<div class="input-group">'+
					'<select id="prioridad'+i+'" name="prioridad'+i+'" class="select-chosen form-control prioridades">'+
						'<option value="">Seleccione una Prioridad</option>'+
						'<option value="1">Baja</option>'+
						'<option value="2">Mediana</option>'+
						'<option value="3">Baja</option>'+
					'</select>'+
					'<span class="input-group-addon"><i class="gi gi-user"></i></span>'+
				'</div>'+
			'</div>'+
			'<div class="col-sm-1"  Style="padding-top:10px">'+
				'<label onClick="quitarClasif ('+i+')" class="btn-sm btn-danger">Eliminar</label>'+
			'</div>'+
		'</div>';
	$("#new_clasif").append( x );
	$('.select-chosen').chosen();
	$('#div_nueva_clasificacion'+i).hide();
	$('#numero_clas').val(i);
	i++;
}

function quitarClasif (num)
{
	$('#grupo'+num).remove();
}
</script>

<script src="<?= asset_url('js/pages/nuevocliente.js') ?>"></script>
<script>$(function(){ FormsValidation.init(); });</script>