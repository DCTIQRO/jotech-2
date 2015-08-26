<div class="row">
	<div class="col-xs-12" >
		<div class="block">
			<?php $this->load->view('basic/tabs_cliente') ?>
			<div class="row" Style="margin-bottom: 15px;">
				<div class="col-sm-12">
					<a href="<?= site_url('tareas/nueva_tarea/'.$id_cliente) ?>" class="btn-sm btn-info">Nueva Tarea Cliente</a>
					<br>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<table id="tabla_tareas" class="table table-vcenter table-condensed table-bordered">
							<thead>
								<tr>
									<th class="text-center">ID</th>
									<th class="text-center">Tarea</th>
									<th class="text-center">Inicio</th>
									<th class="text-center">Entrega</th>
									<th class="text-center">Progreso</th>
									<th class="text-center">Acciones</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach($tareas as $tarea)
								{
									list($año,$mes,$dia)=explode('-',$tarea->fecha_inicio);
									list($año2,$mes2,$dia2)=explode('-',$tarea->fecha_fin);
								?>
								<tr>
									<td class="text-center" onClick="ver_tarea(<?= $tarea->id ?>)"><?= $tarea->id ?></td>
									<td class="text-center" onClick="ver_tarea(<?= $tarea->id ?>)"><a href="javascript:void(0)"><?= $tarea->nombre ?></a></td>
									<td class="text-center"><input type="text" class="text-center input-datepicker" data-date-format="dd-mm-yyyy" id="inicio<?= $tarea->id ?>" value="<?= $dia."-".$mes."-".$año ?>" onchange="cambiar_inicio(<?= $tarea->id ?>)" Style="border:0px"/></td>
									<td class="text-center"><input type="text" class="text-center input-datepicker" data-date-format="dd-mm-yyyy" id="fin<?= $tarea->id ?>" value="<?= $dia2."-".$mes2."-".$año2 ?>" onchange="cambiar_fin(<?= $tarea->id ?>)" Style="border:0px"/></td>
									<td class="text-center">
										<?php if($tarea->estatus == "0"){echo "<label class='btn-xs btn-success' >Abierto</label>";} ?>
										<?php if($tarea->estatus == "1"){echo "<label class='btn-xs btn-danger' >Cerrado</label>";} ?>
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

function cambiar_inicio(id)
{
	$.post("<?= site_url('tareas/cambiar_inicio_tarea') ?>", {
		id_tarea: id, 
		fecha:$('#inicio'+id).val()
	}, function(result){
       console.log(result);
    });
}
function cambiar_fin(id)
{
	$.post("<?= site_url('tareas/cambiar_fin_tarea') ?>", {
		id_tarea: id, 
		fecha:$('#fin'+id).val()
	}, function(result){
       console.log(result);
    });
}
</script>

<script src="<?= asset_url('js/pages/tablaclientesproyectos.js') ?>"></script>
<script>$(function(){ TablesDatatables.init(); });</script>