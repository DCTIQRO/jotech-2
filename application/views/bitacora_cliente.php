<div class="row">
	<div class="col-xs-12" >
		<div class="block">
			<?php $this->load->view('basic/tabs_cliente') ?>
			<div class="row">
				<form id="bitacora_cliente" action="<?= site_url('bitacora/guardar_bitacora/'.$id_cliente) ?>" class="form-horizontal form-bordered" method="post" accept-charset="utf-8" >
					<div class="form-group">
						<div class="col-xs-12 col-sm-10 text-center">
							<label class="label-control col-xs-12 col-sm-2" for="comentario">Comentario</label>
							<div class="col-xs-12 col-sm-10">
								<textarea class="form-control ckeditor" rows="3" id="comentario"  name="comentario" placeholder="Escribe un comentario" value="" required ></textarea>
							</div>
							<label class="label-control col-xs-12 col-sm-2" for="fecha">Fecha Actividad</label>
							<div class="col-xs-12 col-sm-10">
								<input type="text" class="form-control input-datepicker"  data-date-format="dd-mm-yyyy" rows="3" id="fecha" name="fecha" placeholder="dd-mm-yyyy"  required />
							</div>
						</div>
						<div class="col-xs-12 col-sm-2 text-center">
							<a href="javascript:void(0)" onClick="agregar_bitacora()" class="btn-sm btn-success">Guardar</a><br class="hidden-xs"><br class="hidden-xs">
							<a href="<?= site_url('clientes/ver/'.$id_cliente) ?>" class="btn-sm btn-info">Regresar</a>
						</div>
						<div class="col-xs-12 text-center"><?php echo form_error('comentario'); ?></div>
						<div class="col-xs-12 text-center"><?php echo form_error('fecha'); ?></div>
					</div>	
					<input type="hidden" id="id_cliente" name="id_cliente" value="<?= $id_cliente ?>" />
				</form>
			</div>
			<div class="row">
				<div class="table-responsive">
					<table id="tabla_bitacora_cliente" class="table table-vcenter table-condensed table-bordered">
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
								<td class="text-center"><?= $bitacora->comentario ?></td>
								<td class="text-center"><?= ($bitacora->first_name)." ".$bitacora->last_name ?></td>
								<td class="text-center">
									<?php
									if($this->session->userdata('user_id') == $bitacora->id && $bitacora->tipo != 2){
									?>
									<a href="<?= site_url('bitacora/editar/'.$bitacora->idclientes_comentarios) ?>" class="fancybox fancybox.iframe" data-toggle="tooltip" data-original-title="Editar" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
									<a href="<?= site_url('bitacora/eliminar/'.$bitacora->idclientes_comentarios."/".$id_cliente) ?>" data-toggle="tooltip" data-original-title="Eliminar" class="btn btn-xs btn-default"><i class="fa fa-trash-o"></i></a>
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
		<div class="block full">
			<div class="block-title">
				<h2>Archivos de la <strong><?= $titulo ?></strong></h2>
			</div>
			<div class="row">
				<form action="<?= site_url('bitacora/upload/'.$id_cliente) ?>" class="dropzone"></form>
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
					<div class="col-xs-6 col-sm-4 col-md-2">
						<a class="widget widget-hover-effect1" href="<?= site_url('bitacora/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/camera.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
						<div class="col-xs-12 text-center" Style="margin-top:10px">
							<a href="<?= site_url('bitacora/borrar_archivo/'.$archivo->id) ?>" class="btn btn-sm btn-danger confirm" data-title="Confirmar Eliminación de Clasificación"  data-text="Esta seguro de eliminar el archivo <?= $archivo->archivo ?>" data-confirm-button="Si" data-cancel-button="No" ><i class="fa fa-trash-o"></i> Eliminar</a>
						</div>
					</div>
					<?php 
					}
					else if($extension == 'mp3' || $extension == 'MP3' || $extension == 'wav' || $extension == 'WAV' || $extension == 'arm' || $extension == 'ARM' || $extension == 'wmv' || $extension == 'WMV' )
					{
					?>
					<div class="col-xs-6 col-sm-4 col-md-2">
						<a class="widget widget-hover-effect1" href="<?= site_url('bitacora/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/audio.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
						<div class="col-xs-12 text-center" Style="margin-top:10px">
							<a href="<?= site_url('bitacora/borrar_archivo/'.$archivo->id) ?>" class="btn btn-sm btn-danger confirm" data-title="Confirmar Eliminación de Clasificación"  data-text="Esta seguro de eliminar el archivo <?= $archivo->archivo ?>" data-confirm-button="Si" data-cancel-button="No" ><i class="fa fa-trash-o"></i> Eliminar</a>
						</div>
					</div>
					<?php 
					}
					else if($extension == 'doc' || $extension == 'DOC' || $extension == 'docx' || $extension == 'DOCX')
					{
					?>
					<div class="col-xs-6 col-sm-4 col-md-2">
						<a class="widget widget-hover-effect1" href="<?= site_url('bitacora/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/Word.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
						<div class="col-xs-12 text-center" Style="margin-top:10px">
							<a href="<?= site_url('bitacora/borrar_archivo/'.$archivo->id) ?>" class="btn btn-sm btn-danger confirm" data-title="Confirmar Eliminación de Clasificación"  data-text="Esta seguro de eliminar el archivo <?= $archivo->archivo ?>" data-confirm-button="Si" data-cancel-button="No" ><i class="fa fa-trash-o"></i> Eliminar</a>
						</div>
					</div>
					<?php 
					}
					else if($extension == 'xls' || $extension == 'XLS' || $extension == 'xlsx' || $extension == 'XLSX')
					{
					?>
					<div class="col-xs-6 col-sm-4 col-md-2">
						<a class="widget widget-hover-effect1" href="<?= site_url('bitacora/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/Excel.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
						<div class="col-xs-12 text-center" Style="margin-top:10px">
							<a href="<?= site_url('bitacora/borrar_archivo/'.$archivo->id) ?>" class="btn btn-sm btn-danger confirm" data-title="Confirmar Eliminación de Clasificación"  data-text="Esta seguro de eliminar el archivo <?= $archivo->archivo ?>" data-confirm-button="Si" data-cancel-button="No" ><i class="fa fa-trash-o"></i> Eliminar</a>
						</div>
					</div>
					<?php 
					}
					else if($extension == 'ppt' || $extension == 'PPT' || $extension == 'pptx' || $extension == 'pptx')
					{
					?>
					<div class="col-xs-6 col-sm-4 col-md-2">
						<a class="widget widget-hover-effect1" href="<?= site_url('bitacora/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/PowerPoint.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
						<div class="col-xs-12 text-center" Style="margin-top:10px">
							<a href="<?= site_url('bitacora/borrar_archivo/'.$archivo->id) ?>" class="btn btn-sm btn-danger confirm" data-title="Confirmar Eliminación de Clasificación"  data-text="Esta seguro de eliminar el archivo <?= $archivo->archivo ?>" data-confirm-button="Si" data-cancel-button="No" ><i class="fa fa-trash-o"></i> Eliminar</a>
						</div>
					</div>
					<?php 
					}
					else if($extension == 'pdf' || $extension == 'PDF')
					{
					?>
					<div class="col-xs-6 col-sm-4 col-md-2">
						<a class="widget widget-hover-effect1" href="<?= site_url('bitacora/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/pdf.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
						<div class="col-xs-12 text-center" Style="margin-top:10px">
							<a href="<?= site_url('bitacora/borrar_archivo/'.$archivo->id) ?>" class="btn btn-sm btn-danger confirm" data-title="Confirmar Eliminación de Clasificación"  data-text="Esta seguro de eliminar el archivo <?= $archivo->archivo ?>" data-confirm-button="Si" data-cancel-button="No" ><i class="fa fa-trash-o"></i> Eliminar</a>
						</div>
					</div>
					<?php 
					}
					else if($extension == 'txt' || $extension == 'TXT')
					{
					?>
					<div class="col-xs-6 col-sm-4 col-md-2">
						<a class="widget widget-hover-effect1" href="<?= site_url('bitacora/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/text.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
						<div class="col-xs-12 text-center" Style="margin-top:10px">
							<a href="<?= site_url('bitacora/borrar_archivo/'.$archivo->id) ?>" class="btn btn-sm btn-danger confirm" data-title="Confirmar Eliminación de Clasificación"  data-text="Esta seguro de eliminar el archivo <?= $archivo->archivo ?>" data-confirm-button="Si" data-cancel-button="No" ><i class="fa fa-trash-o"></i> Eliminar</a>
						</div>
					</div>
					<?php 
					}
					else
					{
					?>
					<div class="col-xs-6 col-sm-4 col-md-2">
						<a class="widget widget-hover-effect1" href="<?= site_url('bitacora/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/file_search.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
						<div class="col-xs-12 text-center" Style="margin-top:10px">
							<a href="<?= site_url('bitacora/borrar_archivo/'.$archivo->id) ?>" class="btn btn-sm btn-danger confirm" data-title="Confirmar Eliminación de Clasificación"  data-text="Esta seguro de eliminar el archivo <?= $archivo->archivo ?>" data-confirm-button="Si" data-cancel-button="No" ><i class="fa fa-trash-o"></i> Eliminar</a>
						</div>
					</div>
					<?php 
					}
					?>
				<?php
				}
				?>
			</div>
		</div>
	</div>
</div>

<!--ckeditor-->
<script src="//cdn.ckeditor.com/4.5.2/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'comentario', {
    customConfig: '<?= asset_url('js/helpers/config ckeditor/config.js') ?>'
} );
</script>

<script src="<?= asset_url('js/pages/tablabitacoraclientes.js') ?>"></script>
<script>$(function(){ TablesDatatables.init(); });</script>

<script>
function agregar_bitacora()
{
	$('#bitacora_cliente').submit();
}
$(".input-datepicker").datepicker({
	autoclose:true,
});
function cambiarFecha(id)
{
	$.post("<?= site_url('bitacora/cambiar_fecha') ?>", {
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

<script>
$( document ).ready(function() {
    $( "#comentario" ).focus();
	$( ".confirm" ).confirm();
});
</script>