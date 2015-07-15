<div class="row">
<div class="col-xs-12" >
<div class="block">
	<?php $this->load->view('basic/tabs_cliente') ?>
	<div class="row">
		<form id="bitacora_cliente" action="<?= site_url('bitacora/cliente/'.$id_cliente) ?>" class="form-horizontal form-bordered" method="post" accept-charset="utf-8" >
			<div class="form-group">
				<label class="label-control col-xs-3 col-sm-2" for="comentario">Comentario</label>
				<div class="col-xs-6 col-sm-7">
					<textarea class="form-control" rows="3" id="comentario" name="comentario" placeholder="Escribe un comentario" value="<?= set_value('comentario') ?>" ></textarea>
				</div>
				<div class="col-xs-3 col-sm-2 text-center">
					<a href="javascript:void(0)" onClick="agregar_bitacora()" class="btn-sm btn-success">Guardar</a><br><br>
					<a href="<?= site_url('clientes/ver/'.$id_cliente) ?>" class="btn-sm btn-info">Regresar</a>
				</div>
				<div class="col-xs-12 text-center"><?php echo form_error('comentario'); ?></div>
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
					?>
					<tr>
						<td class="text-center"><?= $bitacora->fecha ?></td>
						<td class="text-center"><?= $bitacora->comentario?></td>
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
</div>
</div>

<script src="<?= asset_url('js/pages/tablabitacoraclientes.js') ?>"></script>
<script>$(function(){ TablesDatatables.init(); });</script>

<script>
function agregar_bitacora()
{
	$('#bitacora_cliente').submit();
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