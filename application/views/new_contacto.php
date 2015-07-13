<div class="row">
	<div class="col-xs-12" >
		<div class="block">
			<?php $this->load->view('basic/tabs_cliente') ?>
			<div class="row">
				<form class="form-horizontal form-bordered" id="new_cliente" method="post" action="<?= site_url('clientes/guardar_contacto') ?>">
					<div class="form-group">
						<label class="col-sm-2 control-label" for="nombre">Nombre <span class="text-danger">*</span></label>
						<div class="col-sm-4 ">
							<div class="input-group">
								<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre del contacto..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
						<label class="col-sm-2 control-label" for="direccion">Dirección </label>
						<div class="col-sm-4 ">
							<div class="input-group">
								<input type="text" id="direccion" name="direccion" class="form-control" placeholder="Dirección del contacto..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" for="telefono">Teléfono </label>
						<div class="col-sm-4 ">
							<div class="input-group">
								<input type="text" id="telefono" name="telefono" class="form-control" placeholder="Teléfono del contacto..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
						<label class="col-sm-2 control-label" for="correo">Correo </label>
						<div class="col-sm-4 ">
							<div class="input-group">
								<input type="text" id="correo" name="correo" class="form-control" placeholder="Correo del contacto..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" for="puesto">Puesto </label>
						<div class="col-sm-4 ">
							<div class="input-group">
								<input type="text" id="puesto" name="puesto" class="form-control" placeholder="Puesto en la empresa..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
						<label class="col-sm-2 control-label" for="clasificacion">Clasificación</label>
						<div class="col-sm-4 ">
							<div class="input-group">
								<select id="clasificacion" name="clasificacion" class="select-chosen form-control clasifi" onchange="checar_clasificacion('');">
									<option value="0">Seleccione una Clasificación</option>
									<?php 
										$options="";
										foreach($clasificaciones as $clasificacion)
										{
											$options.='<option value="'.$clasificacion->id.'">'.$clasificacion->nombre.'</option>';
											echo $options;
										}
									?>
								</select>
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					<div id="new_clasificacion">
					</div>
					<input type="hidden" name="numero_clas" id="numero_clas" value="0" />
					<div class="form-group text-center">
						<a href="javascript:void(0)" class="btn-sm btn-info" onClick="agregarClasif()">Nueva Clasificación</a>
						<a href="javascript:void(0)" class="btn-sm btn-danger" onClick="quitarClasif()">Remover Ultima Clasificación</a>
					</div>
					<input type="hidden" name="id_cliente" id="id_cliente" value="<?= $id_cliente ?>" />
						
					<div class="form-group text-center">
						<a href="<?= site_url('clientes/contacto/'.$id_cliente) ?>" class="btn btn-sm btn-info"><i class="fa fa-reply"></i> Regresar</a>
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
		'</div>';
	$("#new_clasificacion").append( x );
	$('.select-chosen').chosen();
	$('#div_nueva_clasificacion'+i).hide();
	$('#numero_clas').val(i);
	i++;
}

function quitarClasif ()
{
	if(i>1){
		i--;
		$('#grupo'+i).remove();
		$('#numero_clas').val(i-1);
	}
}
</script>