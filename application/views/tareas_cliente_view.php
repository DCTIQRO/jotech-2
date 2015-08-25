<div class="content-header">
	<div class="header-section">
		<div class="widget">
			<div class="widget-simple">
			<a href="javascript:void(0)" class="widget-icon pull-left themed-background-fire animation-fadeIn">
				<i class="fa fa-suitcase sidebar-nav-icon"></i>
			</a>
			<h1 class="widget-content text-letf animation-pullDown">
				<strong>Listado de Tareas Cliente</strong>
			</h1>
			</div>
		</div>
	</div>
</div>
<ul class="breadcrumb breadcrumb-top">
	<li>Tareas Cliente</li>
	<li><a href="">Listado</a></li>
</ul>
<div class="row">
	<div class="col-xs-12" >
		<div class="block">
			<div class="block-title">
				<h2>Listar <strong>Tareas Cliente</strong></h2>
			</div>
			<div class="row">
				<div class="table-responsive">
					<table id="tabla_proyectos" class="table table-vcenter table-condensed table-bordered">
						<thead>
							<tr>
								<th class="text-center">ID</th>
								<th class="text-center">Tarea</th>
								<th class="text-center">Descripción</th>
								<th class="text-center">Cliente</th>
								<th class="text-center">Fecha Inicio</th>
								<th class="text-center">Fecha Termino</th>
								<th class="text-center">Status</th>
								<th class="text-center">Acciones</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th class="text-center">ID</th>
								<th class="text-center">Tarea</th>
								<th class="text-center">Descripción</th>
								<th class="text-center">Cliente</th>
								<th class="text-center">Fecha Inicio</th>
								<th class="text-center">Fecha Termino</th>
								<th class="text-center">Status</th>
								<th class="text-center">Acciones</th>
							</tr>
						</tfoot>
						<tbody>
							<?php
							foreach($tareas_clientes as $tarea)
							{
							?>
							<tr>
								<td class="text-center" onClick="irTarea(<?= $tarea->id ?>)"><?= $tarea->id ?></td>
								<td class="text-center" onClick="irTarea(<?= $tarea->id ?>)"><a href="javascript:void(0)"><?= $tarea->nombre ?></a></td>
								<td class="text-center" onClick="irTarea(<?= $tarea->id ?>)"><?= $tarea->descripcion ?></td>
								<td class="text-center" onClick="irTarea(<?= $tarea->id ?>)"><?= $tarea->id_cliente_fk ?></td>
								<td class="text-center" onClick="irTarea(<?= $tarea->id ?>)"><?= $tarea->fecha_inicio ?></td>
								<td class="text-center" onClick="irTarea(<?= $tarea->id ?>)"><?= $tarea->fecha_fin ?></td>
								<td class="text-center">
								<?php
								if($tarea->estatus == '0'){echo '<label class="btn btn-sm btn-danger">Cerrado</label>';}
								if($tarea->estatus == '1'){echo '<label class="btn btn-sm btn-success">Abierto</label>';}
								?>
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

<script src="<?= asset_url('js/pages/tablaclientes.js') ?>"></script>
<script>
function irTarea(id)
{
var pagina="<?= site_url('tareas/ver_tarea') ?>"+"/"+id;
location.href=pagina;   
}
</script>