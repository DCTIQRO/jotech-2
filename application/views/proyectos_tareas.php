<div class="row">
	<div class="col-xs-12" >
		<div class="block">
			<?php $this->load->view('basic/tabs_cliente') ?>
			<div class="row" Style="margin-bottom: 15px;">
				<div class="col-sm-12">
					<a href="<?= site_url('proyectos/nuevo_proyecto/'.$id_cliente) ?>" class="btn-sm btn-info">Nuevo Proyecto</a>
					<br>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<table id="tabla_proyectos" class="table table-vcenter table-condensed table-bordered">
							<thead>
								<tr>
									<th class="text-center">ID</th>
									<th class="text-center">Proyecto</th>
									<th class="text-center">Inicio</th>
									<th class="text-center">Estatus</th>
									<th class="text-center">Acciones</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach($proyectos as $proyecto)
								{
								?>
								<tr onClick="ver_proyect(<?= $proyecto->id ?>)">
									<td class="text-center"><?= $proyecto->id ?></td>
									<td class="text-center"><a href="javascript:void(0)"><?= $proyecto->nombre ?></a></td>
									<td class="text-center"><?= $proyecto->fecha_inicio ?></td>
									<td class="text-center">
									<?php
										if($proyecto->estatus == 0){echo '<label class="btn-sm btn-danger">Cerrado</label>';}
										if($proyecto->estatus == 1){echo '<label class="btn-sm btn-success">Abierto</label>';}
									?>
										<!--<div class="progress progress-striped active">
											<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?= $proyecto->progreso ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $proyecto->progreso ?>%"><?= $proyecto->progreso ?>%</div>
										</div>-->
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
			</div>
		</div>
	</div>
</div>

<script>
function ver_proyect(id)
{
var pagina="<?= site_url('proyectos/ver_proyecto') ?>"+"/"+id;

location.href=pagina;
}

function ver_tarea(id)
{
var pagina="<?= site_url('tareas/ver_tarea') ?>"+"/"+id;

location.href=pagina;
}
</script>

<script src="<?= asset_url('js/pages/tablaclientesproyectos.js') ?>"></script>
<script>$(function(){ TablesDatatables.init(); });</script>