<ul class="breadcrumb breadcrumb-top">
	<div class="block-options pull-right">
		<div class="btn-group btn-group-sm">
			<a href="javascript:void(0)" class="btn btn-alt btn-sm btn-info dropdown-toggle enable-tooltip" data-toggle="dropdown" title="" data-original-title="Options" aria-expanded="false"><span class="caret"></span></a>
			<ul class="dropdown-menu dropdown-custom dropdown-menu-right">
				<li>
					<?php
					if($status == 0){
					?>
					<a href="<?= site_url('tareas_generales/cerrar_tarea/'.$id_tarea); ?>"><i class="gi gi-cloud pull-right"></i> Cerrar Tarea Cliente</a>
					<?php 
					}
					else
					{
					?>
					<a href="<?= site_url('tareas_generales/abrir_tarea/'.$id_tarea); ?>"><i class="gi gi-cloud pull-right"></i> Abrir Tarea Cliente</a>
					<?php	
					}
					?>
				</li>
			</ul>
		</div>
	</div>
	<a href="<?= site_url('tareas/ver_tarea/'.$id_tarea) ?>" Style="float:left; margin-right:100px; padding-top:10px"><?= $titulo ?></a>
	<ul class="nav nav-pills">
		<li><a href="javascript:void(0)" onClick="despliega_detalles()">Detalles <span id="desplegar_detalles"><i class="fa fa-chevron-down"></i></span></a></li>
		<li><a href="javascript:void(0)" onClick="despliega_usuarios()">Usuarios <span id="desplegar_usuario"><i class="fa fa-chevron-down"></i></span></a></li>
		<li><a href="javascript:void(0)" onClick="despliega_anexos()">Anexos <span id="desplegar_anexo"><i class="fa fa-chevron-down"></i></span></a></li>
	</ul>
</ul>
<?php
list($año,$mes,$dia)=explode('-',$fecha_inicio);
list($año2,$mes2,$dia2)=explode('-',$fecha_fin);
?>
<div class="row">
	<div class="col-sm-12">
		<div class="block full hidden" id="detalles_tareas">
			<div class="block-title">
				<h2>Detalles de la <strong><?= $titulo ?></strong></h2>
			</div>
			<div class="row">
				<div class="col-xs-6 col-sm-3 col-sm-offset-3">
					<a href="javascript:void(0)" class="widget widget-hover-effect4">
						<div class="widget-simple themed-background-modern">
							<h4 class="widget-content widget-content-light text-center">
								<strong>Fecha Inicio</strong>
							</h4>
						</div>
						<div class="widget-extra">
							<div class="row text-center">
								<div class="col-xs-4">
									<h3 class="themed-color-modern">
										<strong><?= $dia ?></strong><br>
									</h3>
								</div>
								<div class="col-xs-4">
									<h3 class="themed-color-modern">
										<strong><?= $mes ?></strong><br>
									</h3>
								</div>
								<div class="col-xs-4">
									<h3 class="themed-color-modern">
										<strong><?= $año ?></strong><br>
									</h3>
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-xs-6 col-sm-3 ">
					<a href="javascript:void(0)" class="widget widget-hover-effect4">
						<div class="widget-simple themed-background-modern">
							<h4 class="widget-content widget-content-light text-center">
								<strong>Fecha Fin</strong>
							</h4>
						</div>
						<div class="widget-extra">
							<div class="row text-center">
								<div class="col-xs-4">
									<h3 class="themed-color-modern">
										<strong><?= $dia2 ?></strong><br>
									</h3>
								</div>
								<div class="col-xs-4">
									<h3 class="themed-color-modern">
										<strong><?= $mes2 ?></strong><br>
									</h3>
								</div>
								<div class="col-xs-4">
									<h3 class="themed-color-modern">
										<strong><?= $año2 ?></strong><br>
									</h3>
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-xs-12 text-center">
					<div class="list-group-item">
						<a href="<?= site_url('tareas_generales/editar_descripcion/'.$id_tarea) ?>" class="badge fancybox fancybox.iframe"><i class="fa fa-pencil"></i>  Editar</a>
						<h4 class="list-group-item-heading"><strong>Descripción</strong></h4>
						<p class="list-group-item-text"><?= $descripcion ?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="block full hidden" id="usuarios_tarea">
			<div class="block-title">
				<h2>Usuarios de la <strong><?= $titulo ?></strong></h2>
			</div>
			<div class="row">
				<div class="col-xs-4 col-xs-offset-4 text-center">
					<form action="<?= site_url('tareas_generales/asignar_usuario') ?>" class="form-horizontal form-bordered" method="post" accept-charset="utf-8" >
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
									<a href="<?= site_url('tareas_generales/desasignar_usuario/'.($asignado->id)."/".$id_tarea) ?>" class="btn-sm btn-danger pull-right"><i class="fa fa-times"></i></a>
								</div>
						<?php	
							}
						}
						?>
					</form>
				</div>
			</div>
		</div>
		<div class="block full hidden" id="anexos_tarea">
			<div class="block-title">
				<h2>Archivos de la <strong><?= $titulo ?></strong></h2>
			</div>
			<div class="row">
				<form action="<?= site_url('tareas_generales/upload/'.$id_tarea) ?>" class="dropzone"></form>
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
						<a class="widget widget-hover-effect1" href="<?= site_url('tareas_generales/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/camera.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF; height:60px" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
						<div class="col-xs-12 text-center" Style="margin-top:10px">
							<a href="<?= site_url('tareas_generales/borrar_archivo/'.$archivo->id) ?>" class="btn btn-sm btn-danger confirm" data-title="Confirmar Eliminación de Clasificación"  data-text="Esta seguro de eliminar el archivo <?= $archivo->archivo ?>" data-confirm-button="Si" data-cancel-button="No" ><i class="fa fa-trash-o"></i> Eliminar</a>
						</div>
					</div>
					<?php 
					}
					else if($extension == 'mp3' || $extension == 'MP3' || $extension == 'wav' || $extension == 'WAV' || $extension == 'arm' || $extension == 'ARM' || $extension == 'wmv' || $extension == 'WMV' )
					{
					?>
					<div class="col-xs-6 col-sm-4 ">
						<a class="widget widget-hover-effect1" href="<?= site_url('tareas_generales/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/audio.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF; height:60px" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
						<div class="col-xs-12 text-center" Style="margin-top:10px">
							<a href="<?= site_url('tareas_generales/borrar_archivo/'.$archivo->id) ?>" class="btn btn-sm btn-danger confirm" data-title="Confirmar Eliminación de Clasificación"  data-text="Esta seguro de eliminar el archivo <?= $archivo->archivo ?>" data-confirm-button="Si" data-cancel-button="No" ><i class="fa fa-trash-o"></i> Eliminar</a>
						</div>
					</div>
					<?php 
					}
					else if($extension == 'doc' || $extension == 'DOC' || $extension == 'docx' || $extension == 'DOCX')
					{
					?>
					<div class="col-xs-6 col-sm-4 ">
						<a class="widget widget-hover-effect1" href="<?= site_url('tareas_generales/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/Word.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF; height:60px" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
						<div class="col-xs-12 text-center" Style="margin-top:10px">
							<a href="<?= site_url('tareas_generales/borrar_archivo/'.$archivo->id) ?>" class="btn btn-sm btn-danger confirm" data-title="Confirmar Eliminación de Clasificación"  data-text="Esta seguro de eliminar el archivo <?= $archivo->archivo ?>" data-confirm-button="Si" data-cancel-button="No" ><i class="fa fa-trash-o"></i> Eliminar</a>
						</div>
					</div>
					<?php 
					}
					else if($extension == 'xls' || $extension == 'XLS' || $extension == 'xlsx' || $extension == 'XLSX')
					{
					?>
					<div class="col-xs-6 col-sm-4 ">
						<a class="widget widget-hover-effect1" href="<?= site_url('tareas_generales/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/Excel.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF; height:60px" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
						<div class="col-xs-12 text-center" Style="margin-top:10px">
							<a href="<?= site_url('tareas_generales/borrar_archivo/'.$archivo->id) ?>" class="btn btn-sm btn-danger confirm" data-title="Confirmar Eliminación de Clasificación"  data-text="Esta seguro de eliminar el archivo <?= $archivo->archivo ?>" data-confirm-button="Si" data-cancel-button="No" ><i class="fa fa-trash-o"></i> Eliminar</a>
						</div>
					</div>
					<?php 
					}
					else if($extension == 'ppt' || $extension == 'PPT' || $extension == 'pptx' || $extension == 'pptx')
					{
					?>
					<div class="col-xs-6 col-sm-4">
						<a class="widget widget-hover-effect1" href="<?= site_url('tareas_generales/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/PowerPoint.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF; height:60px" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
						<div class="col-xs-12 text-center" Style="margin-top:10px">
							<a href="<?= site_url('tareas_generales/borrar_archivo/'.$archivo->id) ?>" class="btn btn-sm btn-danger confirm" data-title="Confirmar Eliminación de Clasificación"  data-text="Esta seguro de eliminar el archivo <?= $archivo->archivo ?>" data-confirm-button="Si" data-cancel-button="No" ><i class="fa fa-trash-o"></i> Eliminar</a>
						</div>
					</div>
					<?php 
					}
					else if($extension == 'pdf' || $extension == 'PDF')
					{
					?>
					<div class="col-xs-6 col-sm-4 ">
						<a class="widget widget-hover-effect1" href="<?= site_url('tareas_generales/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/pdf.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF; height:60px" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
						<div class="col-xs-12 text-center" Style="margin-top:10px">
							<a href="<?= site_url('tareas_generales/borrar_archivo/'.$archivo->id) ?>" class="btn btn-sm btn-danger confirm" data-title="Confirmar Eliminación de Clasificación"  data-text="Esta seguro de eliminar el archivo <?= $archivo->archivo ?>" data-confirm-button="Si" data-cancel-button="No" ><i class="fa fa-trash-o"></i> Eliminar</a>
						</div>
					</div>
					<?php 
					}
					else if($extension == 'txt' || $extension == 'TXT')
					{
					?>
					<div class="col-xs-6 col-sm-4 ">
						<a class="widget widget-hover-effect1" href="<?= site_url('tareas_generales/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/text.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF; height:60px" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
						<div class="col-xs-12 text-center" Style="margin-top:10px">
							<a href="<?= site_url('tareas_generales/borrar_archivo/'.$archivo->id) ?>" class="btn btn-sm btn-danger confirm" data-title="Confirmar Eliminación de Clasificación"  data-text="Esta seguro de eliminar el archivo <?= $archivo->archivo ?>" data-confirm-button="Si" data-cancel-button="No" ><i class="fa fa-trash-o"></i> Eliminar</a>
						</div>
					</div>
					<?php 
					}
					else
					{
					?>
					<div class="col-xs-6 col-sm-4">
						<a class="widget widget-hover-effect1" href="<?= site_url('tareas_generales/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/file_search.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF; height:60px" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
						<div class="col-xs-12 text-center" Style="margin-top:10px">
							<a href="<?= site_url('tareas_generales/borrar_archivo/'.$archivo->id) ?>" class="btn btn-sm btn-danger confirm" data-title="Confirmar Eliminación de Clasificación"  data-text="Esta seguro de eliminar el archivo <?= $archivo->archivo ?>" data-confirm-button="Si" data-cancel-button="No" ><i class="fa fa-trash-o"></i> Eliminar</a>
						</div>
					</div>
					<?php 
					}
				}
				?>
			</div>
		</div>
		<div class="block full">
			<div class="block-title">
				<h2>Bitacora <strong><?= $titulo ?></strong></h2>
			</div>
			<div class="row">
				<form action="<?= site_url('tareas_generales/guardar_bitacora') ?>" class="form-horizontal form-bordered" method="post" accept-charset="utf-8" >
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
									<a href="<?= site_url('tareas_generales/editar_bitacora_tarea/'.$bitacora->id_bitacora) ?>" class="fancybox fancybox.iframe" data-toggle="tooltip" data-original-title="Editar" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
									<a href="<?= site_url('tareas_generales/eliminar_bitacora_tarea_general/'.$bitacora->id_bitacora."/".$id_tarea) ?>" data-toggle="tooltip" data-original-title="Eliminar" class="btn btn-xs btn-default"><i class="fa fa-trash-o"></i></a>
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
</div>
<script>
function despliega_detalles()
{
	if($('#detalles_tareas').hasClass('hidden')){
		$('#detalles_tareas').removeClass('hidden');
		$('#desplegar_detalles').html('<i class="fa fa-chevron-up"></i>');
	}
	else{
		$('#detalles_tareas').addClass('hidden');
		$('#desplegar_detalles').html('<i class="fa fa-chevron-down"></i>');
	}
}

function despliega_usuarios()
{
	if($('#usuarios_tarea').hasClass('hidden')){
		$('#usuarios_tarea').removeClass('hidden');
		$('#desplegar_usuario').html('<i class="fa fa-chevron-up"></i>');
	}
	else{
		$('#usuarios_tarea').addClass('hidden');
		$('#desplegar_usuario').html('<i class="fa fa-chevron-down"></i>');
	}
}

function despliega_anexos()
{
	if($('#anexos_tarea').hasClass('hidden')){
		$('#anexos_tarea').removeClass('hidden');
		$('#desplegar_anexo').html('<i class="fa fa-chevron-up"></i>');
	}
	else{
		$('#anexos_tarea').addClass('hidden');
		$('#desplegar_anexo').html('<i class="fa fa-chevron-down"></i>');
	}
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
	
$(".input-datepicker").datepicker({
	autoclose:true,
});
function cambiarFecha(id)
{
	$.post("<?= site_url('tareas_generales/cambiar_fecha') ?>", {
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
		$.post("<?= site_url('tareas_generales/asignar_usuario') ?>",{
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
	$( ".confirm" ).confirm();
});
</script>

<script src="//cdn.ckeditor.com/4.5.2/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'comentario', {
    customConfig: '<?= asset_url('js/helpers/config ckeditor/config.js') ?>'
} );
</script>
