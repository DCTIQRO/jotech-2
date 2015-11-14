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
				<form id="nueva_tarea" action="<?= site_url('proyectos/crear_tarea_proyecto_modal') ?>" class="form-horizontal form-bordered animation-pullDown" method="post" accept-charset="utf-8">
					<div class="form-group">
						<div class="col-xs-12 ">
							<div class="input-group">
								<input type="text" id="nombre_tarea" name="nombre_tarea" required class="form-control" placeholder="Nombre de la Tarea">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 ">
							<div class="input-group">
								<textarea id="descripcion_tarea" name="descripcion_tarea" class="form-control" rows="2" placeholder="Descripción de la Tarea"></textarea>
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 ">
							<div class="input-group">
								<input type="text" id="fecha_inicio" name="fecha_inicio" required class="form-control input-datepicker" data-date-format="dd/mm/yyyy" placeholder="Fecha Inicio">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 ">
							<div class="input-group">
								<input type="text" id="fecha_fin" name="fecha_fin" required class="form-control input-datepicker" data-date-format="dd/mm/yyyy" placeholder="Fecha Fin">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					<?php
						if(!empty($asignados)){
							foreach($asignados as $asignado){
								$users[$asignado->id] =  ($asignado->first_name)." ".$asignado->last_name;
							}
						}
					?>
					<div class="form-group">
						<div class="col-xs-12 ">
							<div class="input-group">
								<?= form_multiselect('usuarios_tarea[]', $users, '','class="form-control select-chosen" id="usuarios_tarea" data-placeholder="Selecciona un usuario" '); ?>
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6 col-xs-offset-4 ">
							<input type="submit" class="btn-sm btn-success" value="Guardar Tarea" />
						</div>
					</div>
					<input type="hidden" id="proyecto" name="proyecto" value="<?= $id_proyecto ?>" />
				</form>
			</div>
		</div>
	</div>
</div>
