<div class="row">
	<div class="col-xs-12" >
		<div class="block">
			<?php $this->load->view('basic/tabs_cliente') ?>
			<div class="row" Style="margin-bottom: 15px;">
				<div class="col-sm-6">
					<a href="<?= site_url('proyectos/nuevo_proyecto/'.$id_cliente) ?>" class="btn-sm btn-info">Nuevo Proyecto</a>
					<br>
				</div>
				<div class="col-sm-6">
					<a href="<?= site_url('tareas/nueva_tarea/'.$id_cliente) ?>" class="btn-sm btn-info">Nueva Tarea Cliente</a>
					<br>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="table-responsive">
						<table id="tabla_proyectos" class="table table-vcenter table-condensed table-bordered">
							<thead>
								<tr>
									<th class="text-center">ID</th>
									<th class="text-center">Proyecto</th>
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
									<td class="text-center"><?= $proyecto->fecha_inicio ?></td>
									<td class="text-center">
										<div class="progress progress-striped active">
											<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?= $proyecto->progreso ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $proyecto->progreso ?>%"><?= $proyecto->progreso ?>%</div>
										</div>
									</td>
									<td class="text-center">
										<a href="<?= site_url('proyectos/ver_proyecto/'.$proyecto->id) ?>" data-toggle="tooltip" data-original-title="Ver Proyecto" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
									</td>
								</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="table-responsive">
						<table id="tabla_tareas" class="table table-vcenter table-condensed table-bordered">
							<thead>
								<tr>
									<th class="text-center">ID</th>
									<th class="text-center">Tarea</th>
									<th class="text-center">Entrega</th>
									<th class="text-center">Progreso</th>
									<th class="text-center">Acciones</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach($tareas as $tarea)
								{
								?>
								<tr>
									<td class="text-center"><?= $tarea->id ?></td>
									<td class="text-center"><a href="javascript:void(0)"><?= $tarea->nombre ?></a></td>
									<td class="text-center"><?= $tarea->fecha_fin ?></td>
									<td class="text-center">
										<?php if($tarea->estatus == "0"){echo "<label class='btn-xs btn-info' >En Proceso</label>";} ?>
										<?php if($tarea->estatus == "1"){echo "<label class='btn-xs btn-success' >Terminado</label>";} ?>
									</td>
									<td class="text-center">
										<a href="<?= site_url('tareas/ver_tarea/'.$tarea->id) ?>" data-toggle="tooltip" data-original-title="Ver Proyecto" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
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
</div>

<script src="<?= asset_url('js/pages/tablaclientesproyectos.js') ?>"></script>
<script>$(function(){ TablesDatatables.init(); });</script>