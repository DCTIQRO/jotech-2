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
	<li>Clientes</li>
	<li><a href="<?= site_url('proyectos/proyectos_tareas/'.$cliente); ?>"><?= $nombre_cliente ?></a></li>
</ul>
<div class="row">
	<div class="col-sm-12">
		<div class="block full">
			<div class="block-title">
				<h2>Acciones del <strong><?= $titulo ?></strong></h2>
			</div>
			<div class="row">
				<div class="col-xs-12 text-center">
					<?php
					if($status == 0){
					?>
					<a href="<?= site_url('tareas/cerrar_tarea/'.$id_tarea); ?>" class="btn-sm btn-danger">Cerrar Tarea Cliente</a>
					<?php 
					}
					else
					{
					?>
					<a href="<?= site_url('tareas/abrir_tarea/'.$id_tarea); ?>" class="btn-sm btn-success">Abrir Tarea Cliente</a>
					<?php	
					}
					?>
					<a href="<?= site_url('proyectos/proyectos_tareas/'.$cliente); ?>" class="btn-sm btn-info">Tareas del Cliente</a>
					<a href="<?= site_url('tareas'); ?>" class="btn-sm btn-primary">Todos las Tareas Cliente</a>
				</div>
			</div>
		</div>
		<div class="block full">
			<div class="block-title">
				<h2>Bitacora <strong><?= $titulo ?></strong></h2>
			</div>
			<div class="row">
				<form action="<?= site_url('tareas/guardar_bitacora') ?>" class="form-horizontal form-bordered" method="post" accept-charset="utf-8" >
					<div class="form-group">
						<div class="col-xs-12 col-sm-10 text-center">
							<label class="label-control col-xs-12 col-sm-10" for="comentario">Comentario</label>
							<label class="label-control col-xs-12 col-sm-2" for="fecha">Fecha Actividad</label>
							<div class="col-xs-12 col-sm-10">
								<textarea class="form-control ckeditor" rows="3" id="comentario" name="comentario" required placeholder="Escribe un comentario" value="<?= set_value('comentario') ?>" ></textarea>
							</div>
							<div class="col-xs-12 col-sm-2">
								<input type="text" class="form-control input-datepicker" data-date-format="dd-mm-yyyy" id="fecha" name="fecha" required placeholder="dd-mm-yyyy" value="<?= set_value('fecha') ?>" />
							</div>
						</div>
						<div class="col-xs-12 col-sm-2 text-center">
							<input type="submit" class="btn-sm btn-success" value="Guardar"/>
						</div>
						<div class="col-xs-12 text-center"><?php echo form_error('comentario'); ?></div>
						<div class="col-xs-12 text-center"><?php echo form_error('fecha'); ?></div>
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
								<td class="text-center"><input type="text" class="form-control input-datepicker" data-date-format="dd-mm-yyyy" id="fecha<?= $bitacora->id_bitacora  ?>" onBlur="cambiarFecha(<?= $bitacora->id_bitacora ?>)" placeholder="dd-mm-yyyy" value="<?= $dia."-".$mes."-".$año ?>" /></td>
								<td><?= $bitacora->comentario?></td>
								<td class="text-center"><?= ($bitacora->first_name)." ".$bitacora->last_name ?></td>
								<td class="text-center">
									<?php
									if($this->session->userdata('user_id') == $bitacora->id_usuario){
									?>
									<a href="<?= site_url('tareas/editar_bitacora_tareas/'.$bitacora->id_bitacora) ?>" class="fancybox fancybox.iframe" data-toggle="tooltip" data-original-title="Editar" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
									<a href="<?= site_url('tareas/eliminar_bitacora_tarea_cliente/'.$bitacora->id_bitacora."/".$id_tarea) ?>" data-toggle="tooltip" data-original-title="Eliminar" class="btn btn-xs btn-default"><i class="fa fa-trash-o"></i></a>
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
				<h2>Usuarios de la <strong><?= $titulo ?></strong></h2>
			</div>
			<form action="<?= site_url('tareas/asignar_usuario') ?>" class="form-horizontal form-bordered" method="post" accept-charset="utf-8" >
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
							<a href="<?= site_url('tareas/desasignar_usuario/'.($asignado->id)."/".$id_tarea) ?>" class="btn-sm btn-danger pull-right"><i class="fa fa-times"></i></a>
						</div>
				<?php	
					}
				}
				?>
			</form>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="block full">
			<div class="block-title">
				<h2>Archivos de la <strong><?= $titulo ?></strong></h2>
			</div>
			<div class="row">
				<form action="<?= site_url('tareas/upload/'.$id_tarea) ?>" class="dropzone"></form>
			</div>
			<div class="row">
				<hr class="style-four">
			</div>
			<div class="row">
				<?php
				foreach($archivos as $archivo)
				{
					$extension = extension($archivo->archivo);
					
					if($extension == 'jpg' || $extension == 'png' || $extension == 'gif' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'GIF' )
					{
					?>
					<div class="col-xs-6 col-sm-4 ">
						<a class="widget widget-hover-effect1" href="<?= site_url('tareas/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/camera.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF; height:60px" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
					</div>
					<?php 
					}
					else if($extension == 'mp3' || $extension == 'MP3' || $extension == 'wav' || $extension == 'WAV' || $extension == 'arm' || $extension == 'ARM' || $extension == 'wmv' || $extension == 'WMV' )
					{
					?>
					<div class="col-xs-6 col-sm-4 ">
						<a class="widget widget-hover-effect1" href="<?= site_url('tareas/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/audio.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF; height:60px" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
					</div>
					<?php 
					}
					else if($extension == 'doc' || $extension == 'DOC' || $extension == 'docx' || $extension == 'DOCX')
					{
					?>
					<div class="col-xs-6 col-sm-4 ">
						<a class="widget widget-hover-effect1" href="<?= site_url('tareas/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/Word.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF; height:60px" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
					</div>
					<?php 
					}
					else if($extension == 'xls' || $extension == 'XLS' || $extension == 'xlsx' || $extension == 'XLSX')
					{
					?>
					<div class="col-xs-6 col-sm-4 ">
						<a class="widget widget-hover-effect1" href="<?= site_url('tareas/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/Excel.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF; height:60px" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
					</div>
					<?php 
					}
					else if($extension == 'ppt' || $extension == 'PPT' || $extension == 'pptx' || $extension == 'pptx')
					{
					?>
					<div class="col-xs-6 col-sm-4">
						<a class="widget widget-hover-effect1" href="<?= site_url('tareas/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/PowerPoint.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF; height:60px" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
					</div>
					<?php 
					}
					else if($extension == 'pdf' || $extension == 'PDF')
					{
					?>
					<div class="col-xs-6 col-sm-4 ">
						<a class="widget widget-hover-effect1" href="<?= site_url('tareas/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/pdf.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF; height:60px" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
					</div>
					<?php 
					}
					else if($extension == 'txt' || $extension == 'TXT')
					{
					?>
					<div class="col-xs-6 col-sm-4 ">
						<a class="widget widget-hover-effect1" href="<?= site_url('tareas/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/text.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF; height:60px" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
					</div>
					<?php 
					}
					else
					{
					?>
					<div class="col-xs-6 col-sm-4">
						<a class="widget widget-hover-effect1" href="<?= site_url('tareas/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/file_search.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF; height:60px" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
					</div>
					<?php 
					}
				}
				?>
			</div>
		</div>
	</div>
</div>
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
	
$(".input-datepicker").datepicker({
	autoclose:true,
});
function cambiarFecha(id)
{
	$.post("<?= site_url('tareas/cambiar_fecha') ?>", {
		id_bitacora: id, 
		fecha:$('#fecha'+id).val()
	}, function(result){
       console.log(result);
    });
}
</script>
<script src="<?= asset_url('js/pages/tablabitacoraproyectos.js') ?>"></script>
<script>$(function(){ TablesDatatables.init(); });</script>

<script>

function asignar()
{
	if($('#usuarios').val() != ""){
		$.post("<?= site_url('tareas/asignar_usuario') ?>",{
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
</script>

<script>
$( document ).ready(function() {
    $( "#comentario" ).focus();
});
</script>

<script src="//cdn.ckeditor.com/4.5.2/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'comentario', {
    customConfig: '<?= asset_url('js/helpers/config ckeditor/config.js') ?>'
} );
</script>
