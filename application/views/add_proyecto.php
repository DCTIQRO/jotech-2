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
		<form class="form-horizontal form-bordered" id="new_cliente" method="post" action="<?= site_url('proyectos/guardar_proyecto') ?>">
			<input type="hidden" id="id_cliente" name="id_cliente" value="<?= $id_cliente ?>" />
			<div class="form-group">
				<label class="col-md-4 control-label" for="nombre">Nombre <span class="text-danger">*</span></label>
				<div class="col-md-6">
					<div class="input-group">
						<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre del cliente..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-4 control-label" for="descripcion">Descripción <span class="text-danger">*</span></label>
				<div class="col-md-6">
					<div class="input-group">
						<input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Descripcion ..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-4 control-label" for="descripcion_corta">Descripción Corta <span class="text-danger">*</span></label>
				<div class="col-md-6">
					<div class="input-group">
						<input type="text" id="descripcion_corta" name="descripcion_corta" class="form-control" placeholder="Descripcion_corta..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-4 control-label" for="fecha_inicio">Fecha Inicio <span class="text-danger">*</span></label>
				<div class="col-md-6">
					<div class="input-group">
						<input type="text" id="fecha_inicio" name="fecha_inicio" class="form-control input-datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-YYYY..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-4 control-label" for="tags">Etiquetas <span class="text-danger"></span></label>
				<div class="col-md-6">
					<div class="input-group">
						<input type="text" id="tags" name="tags" class="input-tags" style="display: none;">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-4 control-label"  for="clasificacion">Clasificación</label>
				<div class="col-md-6">
					<div class="input-group">
						<select id="clasificacion" name="clasificacion" class="select-chosen form-control" onchange="checar_clasificacion();">
							<option value="a">Seleccione una Clasificación</option>
							<?php 
								foreach($clasificaciones as $clasi)
								{
									echo '<option value="'.$clasi->clasificacion.'">'.$clasi->clasificacion.'</option>';
								}
							?>
							<option value="0">Otra Clasificación</option>
						</select>
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>			 
			</div>
			<div class="form-group" id="div_nueva_clasificacion">
				<label class="col-md-4 control-label" for="new_clas">Nueva Clasificación</label>
				<div class="col-md-6">
					<div class="input-group">
						<input type="text" id="new_clas" name="new_clas" class="form-control" placeholder="Escriba la nueva clasificación..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label"  for="prioridad">Prioridad</label>
				<div class="col-md-6">
					<div class="input-group">
						<select id="prioridad" name="prioridad" class="select-chosen form-control">
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

    $('#div_nueva_clasificacion').hide();
    
    function checar_clasificacion(){
    
        if(document.getElementById('clasificacion').value=='0'){
         $('#div_nueva_clasificacion').show();
        }
        else{
         $('#div_nueva_clasificacion').hide();
        }
        
        
    }

</script>

<script src="<?= asset_url('js/pages/nuevocliente.js') ?>"></script>
<script>$(function(){ FormsValidation.init(); });</script>