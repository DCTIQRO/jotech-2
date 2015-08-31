<div class="row">
	<div class="col-xs-12" >
		<div class="block">
			<div class="block-title">
				<h2>Mis <strong>Tareas</strong></h2>
			</div>
			<div class="row">
				<div class="table-resposive">
					<table id="tabla_tareas_generales" class="table table-vcenter table-condensed table-bordered">
						<thead>
							<tr>
								<th class="text-center">Tarea</th>
								<th class="text-center">Tipo</th>
								<th class="text-center">Inicio</th>
								<th class="text-center">Fin</th>
								<th class="text-center">Status</th>
								<th class="text-center">Descripción</th>
								<th class="text-center">Proyecto/Cliente</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th class="text-center">Tarea</th>
								<th class="text-center">Tipo</th>
								<th class="text-center">Inicio</th>
								<th class="text-center">Fin</th>
								<th class="text-center">Status</th>
								<th class="text-center">Descripción</th>
								<th class="text-center">Proyecto/Cliente</th>
							</tr>
						</tfoot>
						<tbody>
							<?php
							foreach($tareas_generales as $tarea_general)
							{
							?>
							<tr>
								<td class="text-center" onClick="irTareaGeneral(<?= $tarea_general->id ?>)"><a href="javascript:void(0)"><?= $tarea_general->nombre ?></a></td>
								<td class="text-center" onClick="irTareaGeneral(<?= $tarea_general->id ?>)">Tarea General</td>
								<?php list($año,$mes,$dia)=explode('-',$tarea_general->fecha_inicio) ?>
								<td class="text-center"><label id="oculto_inicio_general<?= $tarea_general->id ?>" class="label_oculto"><?= $dia."-".$mes."-".$año ?></label><input type="text" class="text-center input-datepicker" data-date-format="dd-mm-yyyy" id="inicio_general<?= $tarea_general->id ?>" value="<?= $dia."-".$mes."-".$año ?>" onchange="cambiar_inicio_general(<?= $tarea_general->id ?>)" Style="border:0px"/></td>
								<?php list($año,$mes,$dia)=explode('-',$tarea_general->fecha_fin) ?>
								<td class="text-center"><label id="oculto_fin_general<?= $tarea_general->id ?>" class="label_oculto"><?= $dia."-".$mes."-".$año ?></label><input type="text" class="text-center input-datepicker" data-date-format="dd-mm-yyyy" id="fin_general<?= $tarea_general->id ?>" value="<?= $dia."-".$mes."-".$año ?>" onchange="cambiar_fin_general(<?= $tarea_general->id ?>)" Style="border:0px"/></td>
								<td class="text-center">
								<?php
									if($tarea_general->estatus == '0'){ echo "<a haref='javascript:void(0)' class='btn-sm btn-success'>Abierto</a> ";}
									else{ echo "<a haref='javascript:void(0)' class='btn-sm btn-danger'>Cerrado</a> ";}
								?>
								</td>
								<td class="text-center"><?= $tarea_general->descripcion ?></td>
								<td class="text-center">Sin vinculos</td>
							</tr>
							<?php
							}
							foreach($tareas_proyectos as $tarea_proyecto)
							{
							?>
							<tr>
								<td class="text-center" onClick="irTareaProyecto(<?= $tarea_proyecto->id ?>)"><a href="javascript:void(0)"><?= $tarea_proyecto->nombre ?></a></td>
								<td class="text-center">Tarea Proyecto</td>
								<?php list($año,$mes,$dia)=explode('-',$tarea_proyecto->fecha_inicio) ?>
								<td class="text-center"><label id="oculto_inicio_proyecto<?= $tarea_proyecto->id ?>" class="label_oculto"><?= $dia."-".$mes."-".$año ?></label><input type="text" class="text-center input-datepicker" data-date-format="dd-mm-yyyy" id="inicio_proyecto<?= $tarea_proyecto->id ?>" value="<?= $dia."-".$mes."-".$año ?>" onchange="cambiar_inicio_proyecto(<?= $tarea_proyecto->id ?>)" Style="border:0px"/></td>
								<?php list($año,$mes,$dia)=explode('-',$tarea_proyecto->fecha_fin) ?>
								<td class="text-center"><label id="oculto_fin_proyecto<?= $tarea_proyecto->id ?>" class="label_oculto"><?= $dia."-".$mes."-".$año ?></label><input type="text" class="text-center input-datepicker" data-date-format="dd-mm-yyyy" id="fin_proyecto<?= $tarea_proyecto->id ?>" value="<?= $dia."-".$mes."-".$año ?>" onchange="cambiar_fin_proyecto(<?= $tarea_proyecto->id ?>)" Style="border:0px"/></td>
								<td class="text-center">
								<?php
									if($tarea_proyecto->estatus == '0'){ echo "<a haref='javascript:void(0)' class='btn-sm btn-success'>Abierto</a> ";}
									else{ echo "<a haref='javascript:void(0)' class='btn-sm btn-danger'>Cerrado</a> ";}
								?>
								</td>
								<td class="text-center"><?= $tarea_proyecto->descripcion ?></td>
								<td class="text-center"><a href="<?= site_url('proyectos/ver_proyecto/'.$tarea_proyecto->id_proyecto_fk) ?>"><?= $tarea_proyecto->proyecto ?></a></td>
							</tr>
							<?php
							}
							foreach($tareas_clientes as $tarea_cliente)
							{
							?>
							<tr>
								<td class="text-center" onClick="irTarea(<?= $tarea_cliente->id ?>)"><a href="javascript:void(0)"><?= $tarea_cliente->nombre ?></a></td>
								<td class="text-center">Tarea Cliente</td>
								<?php list($año,$mes,$dia)=explode('-',$tarea_cliente->fecha_inicio) ?>
								<td class="text-center"><label id="oculto_inicio_cliente<?= $tarea_cliente->id ?>" class="label_oculto"><?= $dia."-".$mes."-".$año ?></label><input type="text" class="text-center input-datepicker" data-date-format="dd-mm-yyyy" id="inicio_cliente<?= $tarea_cliente->id ?>" value="<?= $dia."-".$mes."-".$año ?>" onchange="cambiar_inicio_cliente(<?= $tarea_cliente->id ?>)" Style="border:0px"/></td>
								<?php list($año,$mes,$dia)=explode('-',$tarea_cliente->fecha_fin) ?>
								<td class="text-center"><label id="oculto_fin_cliente<?= $tarea_cliente->id ?>" class="label_oculto"><?= $dia."-".$mes."-".$año ?></label><input type="text" class="text-center input-datepicker" data-date-format="dd-mm-yyyy" id="fin_cliente<?= $tarea_cliente->id ?>" value="<?= $dia."-".$mes."-".$año ?>" onchange="cambiar_fin_cliente(<?= $tarea_cliente->id ?>)" Style="border:0px"/></td>
								<td class="text-center">
								<?php
									if($tarea_cliente->estatus == '0'){ echo "<a haref='javascript:void(0)' class='btn-sm btn-success'>Abierto</a> ";}
									else{ echo "<a haref='javascript:void(0)' class='btn-sm btn-danger'>Cerrado</a> ";}
								?>
								</td>
								<td class="text-center"><?= $tarea_cliente->descripcion ?></td>
								<td class="text-center"><a href="<?= site_url('clientes/ver/'.$tarea_cliente->id_cliente_fk) ?>"><?= $tarea_cliente->cliente ?></a></td>
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

<script>
function irTarea(id)
{
var pagina="<?= site_url('tareas/ver_tarea') ?>"+"/"+id;
location.href=pagina;   
}
function irTareaProyecto(id)
{
var pagina="<?= site_url('tareas_proyectos/ver_tarea') ?>"+"/"+id;
location.href=pagina;   
}

function irTareaGeneral(id)
{
var pagina="<?= site_url('tareas_generales/ver_tarea') ?>"+"/"+id;
location.href=pagina;   
}

function cambiar_inicio_proyecto(id)
{
	$('#oculto_inicio_proyecto'+id).html($('#inicio_proyecto'+id).val());
	$.post("<?= site_url('proyectos/cambiar_inicio_tarea') ?>", {
		id_tarea: id, 
		fecha:$('#inicio_proyecto'+id).val()
	}, function(result){
       console.log(result);
    });
}
function cambiar_fin_proyecto(id)
{
	$('#oculto_fin_proyecto'+id).html($('#fin_proyecto'+id).val());
	$.post("<?= site_url('proyectos/cambiar_fin_tarea') ?>", {
		id_tarea: id, 
		fecha:$('#fin_proyecto'+id).val()
	}, function(result){
       console.log(result);
    });
}

function cambiar_inicio_general(id)
{
	$('#oculto_inicio_general'+id).html($('#inicio_general'+id).val());
	$.post("<?= site_url('tareas_generales/cambiar_inicio_tarea') ?>", {
		id_tarea: id, 
		fecha:$('#inicio_general'+id).val()
	}, function(result){
       console.log(result);
    });
}
function cambiar_fin_general(id)
{
	$('#oculto_fin_general'+id).html($('#fin_general'+id).val());
	$.post("<?= site_url('tareas_generales/cambiar_fin_tarea') ?>", {
		id_tarea: id, 
		fecha:$('#fin_general'+id).val()
	}, function(result){
       console.log(result);
    });
}

function cambiar_inicio_cliente(id)
{
	$('#oculto_inicio_cliente'+id).html($('#inicio_cliente'+id).val());
	$.post("<?= site_url('tareas/cambiar_inicio_tarea') ?>", {
		id_tarea: id, 
		fecha:$('#inicio_cliente'+id).val()
	}, function(result){
       console.log(result);
    });
}
function cambiar_fin_cliente(id)
{
	$('#oculto_fin_cliente'+id).html($('#fin_cliente'+id).val());
	$.post("<?= site_url('tareas/cambiar_fin_tarea') ?>", {
		id_tarea: id, 
		fecha:$('#fin_cliente'+id).val()
	}, function(result){
       console.log(result);
    });
}
</script>

<script src="<?= asset_url('js/pages/tablamistareas.js') ?>"></script>