<div class="block full">
	<div class="block-title">
		<h2><strong>Historial</strong></h2>
	</div>
	<div class="table-responsive">
		<table id="tabla_historial" class="table table-vcenter table-condensed">
			<thead>
				<tr>
					<th class="text-center">Comentario</th>
					<th class="text-center">Fecha</th>
					<th class="text-center">Usuario</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th class="text-center">Comentario</th>
					<th class="text-center">Fecha</th>
					<th class="text-center">Usuario</th>
				</tr>
			</tfoot>
			<tbody>
			<?php
				foreach($comentarios as $comentario)
				{
			?>
				<tr>
					<td class="text-center"><?= $comentario->comentario ?></td>
					<td class="text-center"><?= $comentario->fecha ?></td>
					<td class="text-center"><?= $comentario->first_name." ".$comentario->last_name ?></td>
				</tr>
			<?php
				}
			?>
				
			</tbody>
		</table>
	</div>
</div>

<script src="<?= asset_url('js/pages/tablahistorial.js') ?>"></script>
<script>$(function(){ TablesDatatables.init(); });</script>