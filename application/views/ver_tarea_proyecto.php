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
	<li>Tareas</li>
	<li><a href="">Ver</a></li>
</ul>
<div class="row">
	<div class="col-sm-8">
		<div class="block full">
			<div class="block-title">
				<h2>Bitacora <strong><?= $titulo ?></strong></h2>
			</div>
			<div class="row">
				<form action="<?= site_url('tareas_proyectos/guardar_bitacora') ?>" class="form-horizontal form-bordered" method="post" accept-charset="utf-8" >
					<div class="form-group">
						<div class="col-xs-12 col-sm-10 text-center">
							<label class="label-control col-xs-12 col-sm-2" for="comentario">Comentario</label>
							<div class="col-xs-6 col-sm-10">
								<textarea class="form-control" rows="3" id="comentario" name="comentario" required placeholder="Escribe un comentario" value="<?= set_value('comentario') ?>" ></textarea>
							</div>
							<label class="label-control col-xs-12 col-sm-2" for="fecha">Fecha Actividad</label>
							<div class="col-xs-12 col-sm-10">
								<input type="text" class="form-control input-datepicker" data-date-format="dd-mm-yyyy" id="fecha" name="fecha" required placeholder="dd-mm-yyyy" value="<?= set_value('fecha') ?>" />
							</div>
						</div>
						<div class="col-xs-12 col-sm-2 text-center">
							<input type="submit" class="btn-sm btn-success" value="Guardar"/>
						</div>
						<div class="col-xs-12 text-center"><?php echo form_error('comentario'); ?></div>
					</div>	
					<input type="hidden" id="id_tarea" name="id_tarea" value="<?= $id_tarea ?>" />
				</form>
			</div>
			<div class="row">
				<div class="table-responsive">
					<table id="tabla_bitacora_proyectos" class="table table-vcenter table-condensed table-bordered">
						<thead>
							<tr>
								<th class="text-center">Fecha</th>
								<th class="text-center">Fecha Actividad</th>
								<th class="text-center">Descripción</th>
								<th class="text-center">Usuario</th>
								<th class="text-center">Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach($bitacoras as $bitacora)
							{
								list($año,$mes,$dia)=explode("-",$bitacora->fecha_actividad);
							?>
							<tr>
								<td class="text-center"><?= $bitacora->fecha ?></td>
								<td class="text-center"><input type="text" class="form-control input-datepicker" data-date-format="dd-mm-yyyy" id="fecha<?= $bitacora->id_bitacora  ?>" onBlur="cambiarFecha(<?= $bitacora->id_bitacora ?>)" placeholder="dd-mm-yyyy" value="<?= $dia."-".$mes."-".$año ?>" /></td>
								<td class="text-center"><?= $bitacora->comentario?></td>
								<td class="text-center"><?= ($bitacora->first_name)." ".$bitacora->last_name ?></td>
								<td class="text-center">
									<?php
									if($this->session->userdata('user_id') == $bitacora->id_usuario){
									?>
									<a href="<?= site_url('tareas_proyectos/editar_bitacora_tarea_proyecto/'.$bitacora->id_comentario) ?>" class="fancybox fancybox.iframe" data-toggle="tooltip" data-original-title="Editar" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
									<a href="<?= site_url('tareas_proyectos/eliminar_bitacora_tarea_proyecto/'.$bitacora->id_comentario."/".$id_tarea) ?>" data-toggle="tooltip" data-original-title="Eliminar" class="btn btn-xs btn-default"><i class="fa fa-trash-o"></i></a>
									<?php
									}
									?>
								</td>
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
				<h2>Acciones del <strong><?= $titulo ?></strong></h2>
			</div>
			<div class="row">
				<div class="col-xs-12 text-center">
					<?php
					if($status == 0){
					?>
					<a href="<?= site_url('tareas_proyectos/cerrar_tarea/'.$id_tarea); ?>" class="btn-sm btn-danger">Cerrar Tarea Cliente</a>
					<?php 
					}
					else
					{
					?>
					<a href="<?= site_url('tareas_proyectos/abrir_tarea/'.$id_tarea); ?>" class="btn-sm btn-success">Abrir Tarea Cliente</a>
					<?php	
					}
					?>
					<br><br>
					<a href="<?= site_url('proyectos/ver_proyecto/'.$id_proyecto); ?>" class="btn-sm btn-info">Regresar al Proyecto</a>
				</div>
			</div>
		</div>
		<div class="block full">
			<div class="block-title">
				<h2>Usuarios de la <strong><?= $titulo ?></strong></h2>
			</div>
			<form action="<?= site_url('tareas_proyectos/asignar_usuario') ?>" class="form-horizontal form-bordered" method="post" accept-charset="utf-8" >
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
				<input type="hidden" id="id_tarea" name="id_tarea" value="<?= $id_tarea ?>" />
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
							<a href="<?= site_url('tareas_proyectos/desasignar_usuario/'.($asignado->id)."/".$id_tarea) ?>" class="btn-sm btn-danger pull-right"><i class="fa fa-times"></i></a>
						</div>
				<?php	
					}
				}
				?>
			</form>
		</div>
		
		<div class="block full">
			<div class="block-title">
				<h2>Archivos de la <strong><?= $titulo ?></strong></h2>
			</div>
			<div class="row">
				<form action="<?= site_url('tareas_proyectos/upload/'.$id_tarea) ?>" class="dropzone"></form>
			</div>
			<div class="row">
				<hr class="style-four">
			</div>
			<div class="row">
				<?php
				foreach($archivos as $archivo)
				{
				?>
					<div class="col-xs-10 col-xs-offset-1">
						<a href="<?= site_url('tareas_proyectos/descargar/'.($archivo->archivo)."/".$archivo->url) ?>" class="widget widget-hover-effect2 themed-background-modern">
							<div class="widget-simple">
								<h4 class="widget-content widget-content-light text-center">
									<strong><?= $archivo->archivo ?></strong>
								</h4>
							</div>
						</a>
					</div>
				<?php
				}
				?>
			</div>
		</div>
	</div>
</div>
<script src="<?= asset_url('js/pages/tablabitacoraproyectos.js') ?>"></script>
<script>$(function(){ TablesDatatables.init(); });</script>

<script>
function asignar()
{
	if($('#usuarios').val() != ""){
		$.post("<?= site_url('tareas_proyectos/asignar_usuario') ?>",{
				usuario: $('#usuarios').val(),
				id_tarea: $('#id_tarea').val(),
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

$(".input-datepicker").datepicker({
	autoclose:true,
});
function cambiarFecha(id)
{
	$.post("<?= site_url('tareas_proyectos/cambiar_fecha') ?>", {
		id_bitacora: id, 
		fecha:$('#fecha'+id).val()
	}, function(result){
       console.log(result);
    });
}
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox({
			maxWidth	: 800,
			maxHeight	: 600,
			fitToView	: false,
			width		: '100%',
			height		: '70%',
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none'
		});
	});
</script>
