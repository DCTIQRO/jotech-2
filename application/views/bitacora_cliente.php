<div class="row">
<div class="col-xs-12" >
<div class="block">
	<?php $this->load->view('basic/tabs_cliente') ?>
	<div class="row">
		<form action="<?= site_url('bitacora/cliente/'.$id_cliente) ?>" class="form-horizontal form-bordered" method="post" accept-charset="utf-8" >
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
</div>

<script src="<?= asset_url('js/pages/tablabitacoraclientes.js') ?>"></script>
<script>$(function(){ TablesDatatables.init(); });</script>