<?php $this->load->view('basic/tabs_cliente') ?>
<div class="row">
<div class="col-xs-12" >
<div class="block">
	<div class="row" Style="margin-bottom:10px">
		<div class="col-xs-12">
			<a href="<?= site_url('clientes/nuevo_contacto/'.$id_cliente) ?>" class="btn-sm btn-info">Nuevo Contacto</a>
		</div>
	</div>
	<?php
	if($deshacer != 0)
	{
	?>
	<div class="alert alert-warning alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="fa fa-exclamation-circle"></i> Deshacer</h4>El cliente <?= $contacto_borrado ?> se ha enviado a la Papelera. <a href="<?= site_url('clientes/regresar_contacto/'.$deshacer) ?>" class="alert-link">¡Deshacer!</a>
	</div>
	<?php
	}
	?>
	<div class="row">
		<div class="table-responsive">
			<table id="tabla_contacto" class="table table-vcenter table-condensed table-bordered">
				<thead>
					<tr>
						<!--<th class="text-center">ID</th>-->
						<th class="text-center">Nombre</th>
						<th class="text-center">Puesto</th>
						<th class="text-center">Teléfono</th>
						<th class="text-center">Correo</th>
						<th class="text-center">Status</th>
						<th class="text-center">Status 2</th>
						<th class="text-center">Comentarios</th>
						<th class="text-center">Clasificación</th>
						<th class="text-center">Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach($contactos as $contacto)
					{
					?>
					<tr>
						<!--<td class="text-center"><?= $contacto->id ?></td-->
						<td class="text-center"><a href="javascript:void(0)"><?= $contacto->titulo ?> <?= $contacto->nombre ?></a></td>
						<td class="text-center"><?= $contacto->puesto ?></td>
						<td class="text-center"><?= $contacto->telefono ?></td>
						<td class="text-center"><?= $contacto->correo ?></td>
						<td class="text-center">
						<?php
							if($contacto->activo == 1){echo '<label class="btn-xs btn-warning">Puede no estar al corriente</label>';}
							if($contacto->activo == 2){echo '<label class="btn-xs btn-success">Conoce de los proyectos</label>';}
							if($contacto->activo == 3){echo '<label class="btn-xs btn-info">Recomienda</label>';}
							if($contacto->activo == 4){echo '<label class="btn-xs btn-primary">Participa en la decisión</label>';}
						?></td>
						
						<td class="text-center">
						<?php
							if($contacto->activo2 == 1){echo '<label class="btn-xs btn-warning">Ex trabajador</label>';}
							if($contacto->activo2 == 2){echo '<label class="btn-xs btn-success">No nos conoce</label>';}
							if($contacto->activo2 == 3){echo '<label class="btn-xs btn-info">Sí nos conoce: Es contacto principal</label>';}
							if($contacto->activo2 == 4){echo '<label class="btn-xs btn-success">Si nos conoce: Aunque no sea contacto principal</label>';}
						?></td>
						<td class="text-center"><?= $contacto->comentarios ?></td>
						<td class="text-center">
						<?php
						foreach($clasificaciones as $clasificacion)
						{
							if($clasificacion->id_miembro_fk == $contacto->id){
								echo "<label class='btn-sm btn-default'>".$clasificacion->nombre."</label><br>";
							}
						}
						?>
						</td>
						<td class="text-center">
							<a href="<?= site_url('clientes/ver_contacto/'.$contacto->id."/".$id_cliente) ?>" data-toggle="tooltip" data-original-title="Ver Contacto" class="btn btn-xs btn-default fancybox fancybox.iframe"><i class="fa fa-eye"></i></a>
							<a href="<?= site_url('clientes/editar_contacto/'.$contacto->id."/".$id_cliente) ?>" class="fancybox fancybox.iframe btn btn-xs btn-default" data-toggle="tooltip" data-original-title="Editar" ><i class="fa fa-pencil"></i></a>
							<a href="<?= site_url('clientes/eliminar_contacto/'.$contacto->id."/".$id_cliente) ?>" data-toggle="tooltip" data-original-title="Eliminar" data-title="Confirmar Eliminación de Contacto"  data-text="Esta seguro de eliminar al contacto <?= $contacto->titulo ?> <?= $contacto->nombre ?>" data-confirm-button="Si" data-cancel-button="No" class="btn btn-xs btn-default eliminar"><i class="fa fa-trash-o"></i></a>
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

<script src="<?= asset_url('js/pages/contactoclientes.js') ?>"></script>
<script>$(function(){ TablesDatatables.init(); });</script>

<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox({
			maxWidth	: 1100,
			maxHeight	: 800,
			fitToView	: false,
			width		: '100%',
			height		: '85%',
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none'
		});
	});
</script>

<script>
$(".eliminar").confirm();
</script>