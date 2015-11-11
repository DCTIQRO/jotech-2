<div class="row">
	<div class="col-xs-12" >
		<div class="block">
			<div class="block-title">
				<h2>Listar <strong>Proyectos</strong></h2>
			</div>
			<div class="row">
				<div class="table-responsive">
					<table id="tabla_proyectos" class="table table-vcenter table-condensed table-bordered">
						<thead>
							<tr>
								<th class="text-center">Proyecto</th>
								<th class="text-center">Status</th>
								<th class="text-center">Cliente</th>
								<th class="text-center">Clasificaciones</th>
								<th class="text-center">Prioridades</th>
								<th class="text-center hidden" >Descripción</th>
								<th class="text-center">Contactos</th>
								<th class="text-center">Usuarios</th>
								<th class="text-center hidden">Acciones</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th class="text-center">Proyecto</th>
								<th class="text-center">Status</th>
								<th class="text-center">Cliente</th>
								<th class="text-center">Clasificaciones</th>
								<th class="text-center">Prioridades</th>
								<th class="text-center hidden">Descripción</th>
								<th class="text-center">Contactos</th>
								<th class="text-center">Usuarios</th>
								<th class="text-center hidden">Acciones</th>
							</tr>
						</tfoot>
						<tbody>
							<?php
							foreach($proyectos as $proyecto)
							{
							?>
							<tr>
								<td class="text-center" onClick="irProyecto('<?= $proyecto->id ?>')"><a href="javascript:void(0)"><?= $proyecto->nombre ?></a></td>
								<td class="text-center">
									<?php
									if($proyecto->estatus == '0'){echo '<label class="btn btn-sm btn-danger">Cerrado</label>';}
									if($proyecto->estatus == '1'){echo '<label class="btn btn-sm btn-success">Abierto</label>';}
									?>
								</td>
								<td class="text-center"><a href="<?= site_url('clientes/ver/'.$proyecto->id_cliente) ?>"><?= $proyecto->cliente ?></a></td>
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
								<td class="text-center hidden"><?= $proyecto->descripcion ?></td>
								<td class="text-center">
								<?php
									foreach($contactos as $contacto)
									{
										if($contacto->id_proyecto_fk == $proyecto->id)
										{
											echo '<a href="'.site_url('clientes/ver_contacto/'.$contacto->id."/".$contacto->id_cliente_fk).'" class="btn btn-sm btn-info fancybox fancybox.iframe">'.$contacto->nombre.'</a>';
										}
									}
								?>
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
								<td class="text-center hidden">
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


<script src="<?= asset_url('js/pages/tablaproyectos.js') ?>"></script>
<style>
tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
		color: #394263;
		border: 1px solid #ccc;
		border-radius: 4px;
    }
</style>
<script>
function irProyecto(id)
{
var pagina="<?= site_url('proyectos/ver_proyecto') ?>"+"/"+id;
location.href=pagina;   
}
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox({
			maxWidth	: 800,
			maxHeight	: 600,
			fitToView	: false,
			width		: '100%',
			height		: '70%',
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none'
		});
	});
</script>