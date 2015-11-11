<?php $this->load->view('basic/tabs_cliente') ?>
<div class="row">
	<div class="col-xs-12" >
		<div class="block">
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
									<th class="text-center">Proyecto</th>
									<th class="text-center">Descripción</th>
									<th class="text-center">Inicio</th>
									<th class="text-center">Etiquetas</th>
									<th class="text-center">Clasificación</th>
									<th class="text-center">Prioridad</th>
									<th class="text-center">Estatus</th>
									<th class="text-center">Usuarios</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach($proyectos as $proyecto)
								{
								?>
								<tr>
									<td class="text-center" onClick="ver_proyect(<?= $proyecto->id ?>)"><a href="javascript:void(0)"><?= $proyecto->nombre ?></a></td>
									<td class="text-center"><?= $proyecto->descripcion ?></td>
									<td class="text-center"><?= $proyecto->fecha_inicio ?></td>
									<td class="text-center">
									<?php
										foreach($etiquetas as $etiqueta)
										{
											if($etiqueta->id_proyecto_fk == $proyecto->id && $etiqueta->etiqueta != "")
											{
												echo '<label class="btn btn-sm btn-default">'.$etiqueta->etiqueta.'</label>';
											}
										}
									?>
									</td>
									<td class="text-center">
									<?php
										foreach($clasificaciones as $clasificacion)
										{
											if($clasificacion->id_proyecto_fk == $proyecto->id)
											{
												echo '<label class="btn btn-sm btn-primary">'.$clasificacion->nombre.'</label>';
											}
										}
									?>
									</td>
									<td class="text-center">
									<?php
										foreach($clasificaciones as $clasificacion)
										{
											if($clasificacion->id_proyecto_fk == $proyecto->id)
											{
												$prioridad="";
												if($clasificacion->prioridad == 1)$prioridad="Baja";
												if($clasificacion->prioridad == 2)$prioridad="Mediana";
												if($clasificacion->prioridad == 3)$prioridad="Alta";
												echo '<label class="btn btn-sm btn-info">'.$prioridad.'</label>';
											}
										}
									?>
									</td>
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
								<?php
									foreach($usuarios as $usuario)
									{
										if($usuario->id_proyecto_fk == $proyecto->id)
										{
											echo '<a href="javascript:void(0)" class="btn btn-sm btn-default">'.$usuario->first_name." ".$usuario->last_name.'</a>';
										}
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