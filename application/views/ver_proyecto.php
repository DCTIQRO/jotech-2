<div class="content-header">
	<div class="header-section">
		<div class="widget">
			<div class="widget-simple">
			<a href="javascript:void(0)" class="widget-icon pull-left themed-background-fire animation-fadeIn">
				<i class="fa fa-folder-open-o sidebar-nav-icon"></i>
			</a>
			<h1 class="widget-content text-letf animation-pullDown">
				<strong><?= $titulo ?></strong><small> <?= $descripcion ?></small>
			</h1>
			</div>
		</div>
	</div>
</div>
<ul class="breadcrumb breadcrumb-top">
	<li>Proyectos</li>
	<li><a href="">Ver</a></li>
</ul>
<div class="row">
	<div class="col-sm-8">
		<div class="block full">
			<div class="block-title">
				<h2>Bitacora <strong><?= $titulo ?></strong></h2>
			</div>
			<div class="row">
				<form action="<?= site_url('proyectos/guardar_bitacora') ?>" class="form-horizontal form-bordered" method="post" accept-charset="utf-8" >
					<div class="form-group">
						<label class="label-control col-xs-3 col-sm-2" for="comentario">Comentario</label>
						<div class="col-xs-6 col-sm-7">
							<textarea class="form-control" rows="3" id="comentario" name="comentario" placeholder="Escribe un comentario" value="<?= set_value('comentario') ?>" ></textarea>
						</div>
						<div class="col-xs-3 col-sm-2 text-center">
							<input type="submit" class="btn-sm btn-success" value="Guardar"/>
						</div>
						<div class="col-xs-12 text-center"><?php echo form_error('comentario'); ?></div>
					</div>	
					<input type="hidden" id="id_proyecto" name="id_proyecto" value="<?= $id_proyecto ?>" />
				</form>
			</div>
			<div class="row">
				<div class="table-responsive">
					<table id="tabla_bitacora_proyectos" class="table table-vcenter table-condensed table-bordered">
						<thead>
							<tr>
								<th class="text-center">Fecha</th>
								<th class="text-center">Descripción</th>
								<th class="text-center">Usuario</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach($bitacoras as $bitacora)
							{
							?>
							<tr>
								<td class="text-center"><?= $bitacora->fecha ?></td>
								<td class="text-center"><?= $bitacora->comentario?></td>
								<td class="text-center"><?= ($bitacora->first_name)." ".$bitacora->last_name ?></td>
							</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="block full">
			<div class="block-title">
				<h2>Usuarios del <strong><?= $titulo ?></strong></h2>
			</div>
			<form action="<?= site_url('proyectos/asignar_usuario') ?>" class="form-horizontal form-bordered" method="post" accept-charset="utf-8" >
				<div class="form-group">
					<?php
					$options[''] ='Selecciona un Usuario';
					if(!empty($usuarios)){
						foreach($usuarios as $usuario){
							$options[$usuario->id] =  ($usuario->first_name)." ".$usuario->last_name;
						}
					}
					?>
					<div class="col-xs-12">
						<?= form_dropdown('usuarios', $options, '','class="form-control select-chosen" id="usuarios"'); ?>
					</div>
				</div>	
				<div class="form-group">
					<div class="col-xs-12 text-center">
						<a href="javascript:void(0)" onClick="asignar()" class="btn-sm btn-success" />Agregar</a>
					</div>
				</div>	
				<input type="hidden" id="id_proyecto" name="id_proyecto" value="<?= $id_proyecto ?>" />
			</form>
			<div class="row">
				<hr class="style-four">
			</div>
			<form class="form-horizontal form-bordered">
				<?php
				if(!empty($asignados)){
					foreach($asignados as $asignado){
				?>
						<div class="form-group text-center">
							<label class="label-control"><?= ($asignado->first_name)." ".$asignado->last_name ?></label>
							<a href="<?= site_url('proyectos/desasignar_usuario/'.($asignado->id)."/".$id_proyecto) ?>" class="btn-sm btn-danger pull-right"><i class="fa fa-times"></i></a>
						</div>
				<?php	
					}
				}
				?>
			</form>
		</div>
		
		<div class="block full">
			<div class="block-title">
				<h2>Tareas del <strong><?= $titulo ?></strong></h2>
			</div>
			<form id="nueva_tarea" action="<?= site_url('proyectos/crear_tarea_proyecto') ?>" class="form-horizontal form-bordered hidden animation-pullDown" method="post" accept-charset="utf-8">
				<div class="form-group">
					<div class="col-xs-12 ">
						<div class="input-group">
							<input type="text" id="nombre_tarea" name="nombre_tarea" class="form-control" placeholder="Nombre de la Tarea">
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
							<input type="text" id="fecha_inicio" name="fecha_inicio" class="form-control input-datepicker" data-date-format="dd/mm/yyyy" placeholder="Fecha Inicio">
							<span class="input-group-addon"><i class="gi gi-user"></i></span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12 ">
						<div class="input-group">
							<input type="text" id="fecha_fin" name="fecha_fin" class="form-control input-datepicker" data-date-format="dd/mm/yyyy" placeholder="Fecha Fin">
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
						<input type="submit" class="btn-sm btn-success" value="Agregar" />
					</div>
				</div>
				<input type="hidden" id="proyecto" name="proyecto" value="<?= $id_proyecto ?>" />
			</form>
			<form class="form-horizontal form-bordered">
				<div class="form-group">
					<div class="col-xs-12 text-center">
						<a id="boton-tarea" href="javascript:void(0)" onClick="agregar_tarea()" class="btn-sm btn-success" />Nueva Tarea</a>
					</div>
				</div>	
				<?php
				if(!empty($tareas)){
					foreach($tareas as $tarea){
				?>
						<div class="form-group text-center">
							<a href="<?= site_url('tareas_proyecto/ver/'.$tarea->id) ?>"><label class="label-control"><?= $tarea->nombre ?></label></a>
							
						</div>
				<?php	
					}
				}
				?>
			</form>
		</div>
	</div>
</div>
<script src="<?= asset_url('js/pages/tablabitacoraproyectos.js') ?>"></script>
<script>$(function(){ TablesDatatables.init(); });</script>

<script>
function asignar()
{
	if($('#usuarios').val() != ""){
		$.post("<?= site_url('proyectos/asignar_usuario') ?>",{
				usuario: $('#usuarios').val(),
				id_proyecto: $('#id_proyecto').val(),
			}, function(result){
			//console.log(result);
			location.reload(true);
		});
	}
	else
	{
		alert('No ha seleccionado un usuario');
	}
}

function agregar_tarea()
{
	$('#nueva_tarea').removeClass('hidden');
	$('#boton-tarea').addClass('hidden');
}
</script>
