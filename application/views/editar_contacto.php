<div class="block full">
	<div class="block-title">
		<h2>Editar<strong>Contacto</strong></h2>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<form class="form-horizontal form-bordered" id="new_cliente" method="post" action="<?= site_url('clientes/guardar_edicion_contacto') ?>">
				<div class="form-group">
					<label class="col-sm-2 control-label" for="nombre">Nombre <span class="text-danger">*</span></label>
					<div class="col-sm-4 ">
						<div class="input-group">
							<input type="text" id="nombre" name="nombre" value="<?= $datos->nombre ?>" class="form-control" placeholder="Nombre del contacto..">
							<span class="input-group-addon"><i class="gi gi-user"></i></span>
						</div>
					</div>
					<label class="col-sm-2 control-label" for="direccion">Dirección </label>
					<div class="col-sm-4 ">
						<div class="input-group">
							<input type="text" id="direccion" name="direccion" value="<?= $datos->direccion ?>" class="form-control" placeholder="Dirección del contacto..">
							<span class="input-group-addon"><i class="gi gi-user"></i></span>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label" for="cp">CP </label>
					<div class="col-sm-4 ">
						<div class="input-group">
							<input type="text" id="cp" name="cp" value="<?= $datos->cp ?>" class="form-control" placeholder="Teléfono del contacto..">
							<span class="input-group-addon"><i class="gi gi-user"></i></span>
						</div>
					</div>
					<label class="col-sm-2 control-label" for="telefono">Teléfono </label>
					<div class="col-sm-4 ">
						<div class="input-group">
							<input type="text" id="telefono" name="telefono" value="<?= $datos->telefono ?>" class="form-control" placeholder="Teléfono del contacto..">
							<span class="input-group-addon"><i class="gi gi-user"></i></span>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label" for="correo">Correo </label>
					<div class="col-sm-4 ">
						<div class="input-group">
							<input type="text" id="correo" name="correo" value="<?= $datos->correo ?>" class="form-control" placeholder="Correo del contacto..">
							<span class="input-group-addon"><i class="gi gi-user"></i></span>
						</div>
					</div>
					<label class="col-sm-2 control-label" for="puesto">Puesto </label>
					<div class="col-sm-4 ">
						<div class="input-group">
							<input type="text" id="puesto" name="puesto" value="<?= $datos->puesto ?>" class="form-control" placeholder="Puesto en la empresa..">
							<span class="input-group-addon"><i class="gi gi-user"></i></span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="clasificacion">Clasificación</label>
					<div class="col-sm-10">
						<div class="input-group">
							<select id="clasificacion" name="clasificacion[]" onChange="cambio()" class="select-chosen form-control" data-placeholder="Selecciona una clasificación.." multiple >
								<?php 
									$options="";
									$entro=0;
									foreach($clasificaciones as $clasificacion)
									{
										$select="";
										$select2="";
										foreach($clasificaciones_contacto as $clas_contacto){
											if($clas_contacto->clasificacion == $clasificacion->id){$select="selected";}
											if($clas_contacto->clasificacion == '1' && $entro=="0" ){$select2="selected";}
										}
										if($entro=="0" ){
											echo '<option value="1" '.$select2.'>Todas</option>';
											$entro=1;
										}
										echo '<option value="'.$clasificacion->id.'" '.$select.' class="ocultar">'.$clasificacion->nombre.'</option>';
									}
								?>
							</select>
							<span class="input-group-addon"><i class="gi gi-user"></i></span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="activo">Status</label>
					<div class="col-sm-4 ">
						<div class="input-group">
							<select id="activo" name="activo" class="select-chosen form-control" data-placeholder="Selecciona un status.." >
								<?php $select=""; if($datos->activo == '1'){$select="selected";} ?>
								<option value="1" <?= $select ?> >Puede no estar al corriente</option>
								<?php $select=""; if($datos->activo == '2'){$select="selected";} ?>
								<option value="2" <?= $select ?> >Conoce de los proyectos</option>
								<?php $select=""; if($datos->activo == '3'){$select="selected";} ?>
								<option value="3" <?= $select ?> >Recomienda</option>
								<?php $select=""; if($datos->activo == '4'){$select="selected";} ?>
								<option value="4" <?= $select ?> >Participa en la decisión</option>
							</select>
							<span class="input-group-addon"><i class="gi gi-user"></i></span>
						</div>
					</div>
					<label class="col-sm-2 control-label" for="activo2">Status2</label>
					<div class="col-sm-4 ">
						<div class="input-group">
							<select id="activo2" name="activo2" class="select-chosen form-control" data-placeholder="Selecciona un status.." >
								<?php $select=""; if($datos->activo2 == '1'){$select="selected";} ?>
								<option value="1" <?= $select ?> >Ex trabajador</option>
								<?php $select=""; if($datos->activo2 == '2'){$select="selected";} ?>
								<option value="2" <?= $select ?> >No nos conoce</option>
								<?php $select=""; if($datos->activo2 == '3'){$select="selected";} ?>
								<option value="3" <?= $select ?> >Es contacto principal</option>
								<?php $select=""; if($datos->activo2 == '4'){$select="selected";} ?>
								<option value="4" <?= $select ?> >Si nos conoce</option>
							</select>
							<span class="input-group-addon"><i class="gi gi-user"></i></span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="comentario">Comentarios </label>
					<div class="col-sm-10 ">
						<div class="input-group">
							<textarea id="comentario" name="comentario" rows="2" class="form-control" placeholder="Comentarios.."><?= $datos->comentarios ?></textarea>
							<span class="input-group-addon"><i class="gi gi-user"></i></span>
						</div>
					</div>
				</div>
				<input type="hidden" name="id_contacto" id="id_contacto" value="<?= $datos->id ?>" />
					
				<div class="form-group text-center">
					<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Actualizar</button>
				</div>			
			</form>
		</div>
	</div>
</div>

<script>
cambio();
function cambio() {
	var encontrado=0;
	$("#clasificacion :selected").map(function(i, el) {
		if($(el).val() == "1"){encontrado=1;}
	});
	if(encontrado == 1){
		$(".ocultar").each(function() {
			$(this).addClass('hidden');
		});
		$('#clasificacion').val('1').trigger('chosen:updated');
	}
	if(encontrado == 0){
		$(".ocultar").each(function() {
			$(this).removeClass('hidden');
		});
		$('#clasificacion').trigger('chosen:updated');
	}
}
</script>

<script>
$( document ).ready(function() {
    $( "#nombre" ).focus();
});
</script>