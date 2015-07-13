<div class="content-header">
	<div class="header-section">
		<div class="widget">
			<div class="widget-simple">
			<a href="javascript:void(0)" class="widget-icon pull-left themed-background-fire animation-fadeIn">
				<i class="fa fa-suitcase sidebar-nav-icon"></i>
			</a>
			<h1 class="widget-content text-letf animation-pullDown">
				<strong>Mis Tareas</strong>
			</h1>
			</div>
		</div>
	</div>
</div>
<ul class="breadcrumb breadcrumb-top">
	<li>Tareas</li>
	<li><a href="">Mis Tareas</a></li>
</ul>
<div class="row">
	<div class="col-xs-12" >
		<div class="block">
			<div class="block-title">
				<h2>Tareas <strong>Proyecto</strong></h2>
			</div>
			<div class="row">
				<div class="table-resposive">
					<table id="tabla_proyectos" class="table table-vcenter table-condensed table-bordered">
						<thead>
							<tr>
								<th class="text-center">ID</th>
								<th class="text-center">Tarea</th>
								<th class="text-center">Descripción</th>
								<th class="text-center">Proyecto</th>
								<th class="text-center">Inicio</th>
								<th class="text-center">Fin</th>
								<th class="text-center">Status</th>
								<th class="text-center">Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach($tareas_proyectos as $tarea_proyecto)
							{
							?>
							<tr>
								<td class="text-center"><?= $tarea_proyecto->id ?></td>
								<td class="text-center"><a href="javascript:void(0)"><?= $tarea_proyecto->nombre ?></a></td>
								<td class="text-center"><?= $tarea_proyecto->descripcion ?></td>
								<td class="text-center"><?= $tarea_proyecto->proyecto ?></td>
								<td class="text-center"><?= $tarea_proyecto->fecha_inicio ?></td>
								<td class="text-center"><?= $tarea_proyecto->fecha_fin ?></td>
								<td class="text-center">
								<?php
									if($tarea_proyecto->estatus == '0'){ echo "<a haref='javascript:void(0)' class='btn-sm btn-warning'>En proceso</a> ";}
									else{ echo "<a haref='javascript:void(0)' class='btn-sm btn-info'>Terminado</a> ";}
								?>
								</td>
								<td class="text-center">
									<a href="<?= site_url('tareas_proyectos/ver_tarea/'.$tarea_proyecto->id) ?>" data-toggle="tooltip" data-original-title="Ver Tarea" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
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

<div class="row">
	<div class="col-xs-12" >
		<div class="block">
			<div class="block-title">
				<h2>Tareas <strong>Clientes</strong></h2>
			</div>
			<div class="row">
				<div class="table-resposive">
					<table id="tabla_proyectos" class="table table-vcenter table-condensed table-bordered">
						<thead>
							<tr>
								<th class="text-center">ID</th>
								<th class="text-center">Tarea</th>
								<th class="text-center">Descripción</th>
								<th class="text-center">Cliente</th>
								<th class="text-center">Inicio</th>
								<th class="text-center">Fin</th>
								<th class="text-center">Status</th>
								<th class="text-center">Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach($tareas_clientes as $tarea_cliente)
							{
							?>
							<tr>
								<td class="text-center"><?= $tarea_cliente->id ?></td>
								<td class="text-center"><a href="javascript:void(0)"><?= $tarea_cliente->nombre ?></a></td>
								<td class="text-center"><?= $tarea_cliente->descripcion ?></td>
								<td class="text-center"><?= $tarea_cliente->cliente ?></td>
								<td class="text-center"><?= $tarea_cliente->fecha_inicio ?></td>
								<td class="text-center"><?= $tarea_cliente->fecha_fin ?></td>
								<td class="text-center">
								<?php
									if($tarea_cliente->estatus == '0'){ echo "<a haref='javascript:void(0)' class='btn-sm btn-warning'>En proceso</a> ";}
									else{ echo "<a haref='javascript:void(0)' class='btn-sm btn-info'>Terminado</a> ";}
								?>
								</td>
								<td class="text-center">
									<a href="<?= site_url('tareas/ver_tarea/'.$tarea_cliente->id) ?>" data-toggle="tooltip" data-original-title="Ver Tarea" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
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

<script src="<?= asset_url('js/pages/tablaproyectos.js') ?>"></script>
<script>$(function(){ TablesDatatables.init(); });</script>