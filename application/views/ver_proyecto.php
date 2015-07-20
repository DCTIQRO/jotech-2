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
							<textarea class="form-control" rows="3" id="comentario" name="comentario" required placeholder="Escribe un comentario" value="<?= set_value('comentario') ?>" ></textarea>
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
								<th class="text-center">Acciones</th>
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
								<td class="text-center">
									<?php
									if($this->session->userdata('user_id') == $bitacora->id_usuario && $bitacora->tipo != 2){
									?>
									<a href="<?= site_url('proyectos/editar_bitacora_proyecto/'.$bitacora->id_comentario) ?>" class="fancybox fancybox.iframe" data-toggle="tooltip" data-original-title="Editar" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
									<a href="<?= site_url('proyectos/eliminar_bitacora_proyecto/'.$bitacora->id_comentario."/".$id_proyecto) ?>" data-toggle="tooltip" data-original-title="Eliminar" class="btn btn-xs btn-default"><i class="fa fa-trash-o"></i></a>
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
					if($status == 1){
					?>
					<a href="<?= site_url('proyectos/cerrar_proyecto/'.$id_proyecto); ?>" class="btn-sm btn-danger">Cerrar Proyecto</a>
					<?php 
					}
					else
					{
					?>
					<a href="<?= site_url('proyectos/abrir_proyecto/'.$id_proyecto); ?>" class="btn-sm btn-success">Abrir Proyecto</a>
					<?php	
					}
					?>
					<br><br>
					<a href="<?= site_url('proyectos/proyectos_tareas/'.$cliente); ?>" class="btn-sm btn-info">Proyectos del Cliente</a>
					<br><br>
					<a href="<?= site_url('proyectos'); ?>" class="btn-sm btn-primary">Todos los Proyectos</a>
				</div>
			</div>
		</div>
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
				<h2>Contactos del <strong><?= $titulo ?></strong></h2>
			</div>
			<form action="<?= site_url('proyectos/asignar_contacto') ?>" class="form-horizontal form-bordered" method="post" accept-charset="utf-8" >
				<div class="form-group">
					<?php
					$options2[''] ='Selecciona un Contacto';
					if(!empty($usuarios)){
						foreach($contactos as $contacto){
							$options2[$contacto->id] =  ($contacto->nombre);
						}
					}
					?>
					<div class="col-xs-12">
						<?= form_dropdown('contactos', $options2, '','class="form-control select-chosen" id="contactos"'); ?>
					</div>
				</div>	
				<div class="form-group">
					<div class="col-xs-12 text-center">
						<a href="javascript:void(0)" onClick="asignar2()" class="btn-sm btn-success" />Agregar</a>
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
					foreach($asignados_contactos as $asignado_contacto){
				?>
						<div class="form-group text-center">
							<label class="label-control"><?= ($asignado_contacto->nombre) ?></label>
							<a href="<?= site_url('proyectos/desasignar_contacto/'.($asignado_contacto->id)."/".$id_proyecto) ?>" class="btn-sm btn-danger pull-right"><i class="fa fa-times"></i></a>
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
					$i=0;
					foreach($tareas as $tarea){
						$check="";
						if($tarea->estatus == 1){$check="checked";}
				?>
						<div class="form-group text-center">
							<div class="col-xs-6">
								<a href="<?= site_url('tareas_proyectos/ver_tarea/'.$tarea->id) ?>"><label class="label-control"><?= $tarea->nombre ?></label></a>
							</div>
							<div class="col-xs-6">
								<section>  
								  <!-- Squared TWO -->
								  <div class="squaredTwo">
									<input type="checkbox" value="None" id="squaredTwo<?= $i ?>" name="check<?= $i ?>" <?= $check ?> onChange="estado(<?= $tarea->id ?>)" />
									  <label for="squaredTwo<?= $i ?>"></label>
								  </div>
								</section>
							</div>
						</div>
				<?php
					$i++;
					}
				}
				?>
			</form>
		</div>
		
		<div class="block full">
			<div class="block-title">
				<h2>Archivos del <strong><?= $titulo ?></strong></h2>
			</div>
			<div class="row">
				<form action="<?= site_url('proyectos/upload/'.$id_proyecto) ?>" class="dropzone"></form>
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
						<a href="<?= site_url('proyectos/descargar/'.($archivo->archivo)."/".$archivo->url) ?>" class="widget widget-hover-effect2 themed-background-modern">
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

function asignar2()
{
	if($('#contactos').val() != ""){
		$.post("<?= site_url('proyectos/asignar_contacto') ?>",{
				usuario: $('#contactos').val(),
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

function estado(tarea)
{
	$.post("<?= site_url('proyectos/cambiar_estado_tarea') ?>"+"/"+tarea, {id_proyecto:<?= $id_proyecto ?>}, function(result){
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
