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
		<form class="form-horizontal form-bordered" id="new_cliente" method="post" action="<?= site_url('tareas_generales/guardar_tarea') ?>">
			<div class="form-group">
				<label class="col-md-4 control-label" for="nombre">Nombre <span class="text-danger">*</span></label>
				<div class="col-md-6">
					<div class="input-group">
						<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre de la tarea..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-4 control-label" for="descripcion">Descripción</label>
				<div class="col-md-6">
					<div class="input-group">
						<input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Descripcion ..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-4 control-label" for="fecha_inicio">Fecha Inicio</label>
				<div class="col-md-6">
					<div class="input-group">
						<input type="text" id="fecha_inicio" name="fecha_inicio" class="form-control input-datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-YYYY..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-4 control-label" for="fecha_fin">Fecha Fin</label>
				<div class="col-md-6">
					<div class="input-group">
						<input type="text" id="fecha_fin" name="fecha_fin" class="form-control input-datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-YYYY..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-4 control-label"  for="usuarios">Usuarios</label>
				<div class="col-md-6">
					<div class="input-group">
						<select id="usuarios" name="usuarios[]" class="select-chosen form-control" data-placeholder="Selecciona un usuario.." multiple >
							<?php 
								foreach($usuarios as $usuario)
								{
									$select=""; if($usuario->id == $this->session->userdata('user_id'))$select="selected";
									echo '<option value="'.$usuario->id.'" '.$select.'>'.($usuario->first_name)." ".($usuario->last_name).'</option>';
								}
							?>
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
$( document ).ready(function() {
    $( "#nombre" ).focus();
});
</script>

<script src="<?= asset_url('js/pages/nuevocliente.js') ?>"></script>
<script>$(function(){ FormsValidation.init(); });</script>