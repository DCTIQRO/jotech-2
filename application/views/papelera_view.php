<div class="block full">
	<div class="block-title">
		<h2>Pepelera de <strong>Reciclaje</strong></h2>
	</div>
	<div class="table-responsive">
		<table id="tabla_papelera" class="table table-vcenter table-condensed">
			<thead>
				<tr>
					<th class="text-center">Nombre</th>
					<th class="text-center">Tipo</th>
					<th class="text-center">Acciones</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th class="text-center">Nombre</th>
					<th class="text-center">Tipo</th>
					<th class="text-center">Acciones</th>
				</tr>
			</tfoot>
			<tbody>
			<?php
				foreach($clientes as $cliente)
				{
			?>
				<tr>
					<td class="text-center"><?= $cliente->nombre ?></td>
					<td class="text-center">Cliente</td>
					<td class="text-center">
						<a href="<?= site_url('clientes/deshacer/'.$cliente->id) ?>" data-toggle="tooltip" data-original-title="Recuperar Cliente" class="btn btn-xs btn-success"><i class="fa fa-share"></i></a>
						<a href="<?= site_url('clientes/delete/'.$cliente->id) ?>" data-toggle="tooltip" data-original-title="Eliminar Cliente" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
			<?php
				}
				
				foreach($proyectos as $proyecto)
				{
			?>
				<tr>
					<td class="text-center"><?= $proyecto->nombre ?></td>
					<td class="text-center">Proyecto</td>
					<td class="text-center">Recuperar</td>
				</tr>
			<?php
				}
				
				foreach($tareas_proyectos as $tarea_proyecto)
				{
			?>
				<tr>
					<td class="text-center"><?= $tarea_proyecto->nombre ?></td>
					<td class="text-center">Tarea Proyecto</td>
					<td class="text-center">Recuperar</td>
				</tr>
			<?php
				}
				foreach($tareas_clientes as $tarea_cliente)
				{
			?>
				<tr>
					<td class="text-center"><?= $tarea_cliente->nombre ?></td>
					<td class="text-center">Tarea Cliente</td>
					<td class="text-center">Recuperar</td>
				</tr>
			<?php
				}
				foreach($tareas_generales as $tarea_general)
				{
			?>
				<tr>
					<td class="text-center"><?= $tarea_general->nombre ?></td>
					<td class="text-center">Tarea General</td>
					<td class="text-center">Recuperar</td>
				</tr>
			<?php
				}
				foreach($contactos as $contacto)
				{
			?>
				<tr>
					<td class="text-center"><?= $contacto->titulo." ".$contacto->nombre ?></td>
					<td class="text-center">Contacto</td>
					<td class="text-center">
						<a href="<?= site_url('clientes/regresar_contacto/'.$contacto->id) ?>" data-toggle="tooltip" data-original-title="Recuperar Coctacto" class="btn btn-xs btn-success"><i class="fa fa-share"></i></a>
						<a href="<?= site_url('clientes/delete_contacto/'.$contacto->id) ?>" data-toggle="tooltip" data-original-title="Eliminar Contacto" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
			<?php
				}
			?>
			</tbody>
		</table>
	</div>
</div>

<script src="<?= asset_url('js/pages/tablapapelera.js') ?>"></script>