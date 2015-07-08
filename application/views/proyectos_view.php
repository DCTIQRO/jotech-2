<div class="row">
<div class="col-xs-12" >
<div class="block">
	<div class="block-title">
		<h2>Listar <strong>Proyectos</strong></h2>
	</div>
	<div class="row">
		<div class="table-resposive">
			<table id="tabla_proyectos" class="table table-vcenter table-condensed table-bordered">
				<thead>
					<tr>
						<th class="text-center">ID</th>
						<th class="text-center">Proyecto</th>
						<th class="text-center">Descripción</th>
						<th class="text-center">Descripción Corta</th>
						<th class="text-center">Cliente</th>
						<th class="text-center">Inicio</th>
						<th class="text-center">Progreso</th>
						<th class="text-center">Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach($proyectos as $proyecto)
					{
					?>
					<tr>
						<td class="text-center"><?= $proyecto->id ?></td>
						<td class="text-center"><a href="javascript:void(0)"><?= $proyecto->nombre ?></a></td>
						<td class="text-center"><?= $proyecto->descripcion ?></td>
						<td class="text-center"><?= $proyecto->descripcion_corta ?></td>
						<td class="text-center"><?= $proyecto->cliente ?></td>
						<td class="text-center"><?= $proyecto->fecha_inicio ?></td>
						<td class="text-center">
							<div class="progress progress-striped active">
								<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?= $proyecto->progreso ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $proyecto->progreso ?>%"><?= $proyecto->progreso ?>%</div>
							</div>
						</td>
						<td class="text-center">
							<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Ver Proyecto" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
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