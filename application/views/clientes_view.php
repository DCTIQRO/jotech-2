<div class="block full">
	<div class="block-title">
		<h2>Información <strong>Clientes</strong></h2>
		<div class="block-options pull-right">
			<a href="<?= site_url('clientes/nuevo_cliente') ?>" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="" data-original-title="Agregar Cliente"><i class="fa fa-plus"></i> Agregar Cliente</a>
		</div>
	</div>
	<?php
	if($deshacer != 0)
	{
	?>
	<div class="alert alert-warning alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="fa fa-exclamation-circle"></i> Deshacer</h4>El cliente <?= $cliente_borrado ?> se ha enviado a la Papelera. <a href="<?= site_url('clientes/deshacer/'.$deshacer) ?>" class="alert-link">¡Deshacer!</a>
	</div>
	<?php
	}
	?>
	<div class="table-responsive">
		<table id="tabla_clientes" class="table table-vcenter table-condensed table-bordered">
			<thead>
				<tr>
					<th class="text-center">Cliente</th>
					<th class="text-center">Clasificaciones</th>
					<th class="text-center">Prioridad</th>
					<th class="text-center hidden">WebSite</th>
					<th class="text-center hidden">Correo</th>
					<th class="text-center hidden">Telefono</th>
					<th class="text-center hidden">Direccion</th>
					<th class="text-center">Ciudad</th>
					<th class="text-center ">Estado</th>
					<th class="text-center ">CP</th>
					<th class="text-center hidden">Pais</th>
					<th class="text-center hidden">Detalles</th>
					<th class="text-center hidden">Fecha Registro</th>
					<th class="text-center">Contactos</th>
					<th class="text-center">Acciones</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th class="text-center">Cliente</th>
					<th class="text-center">Clasificaciones</th>
					<th class="text-center">Prioridad</th>
					<th class="text-center hidden">WebSite</th>
					<th class="text-center hidden">Correo</th>
					<th class="text-center hidden">Telefono</th>
					<th class="text-center hidden">Direccion</th>
					<th class="text-center">Ciudad</th>
					<th class="text-center">Estado</th>
					<th class="text-center ">CP</th>
					<th class="text-center hidden">Pais</th>
					<th class="text-center hidden">Detalles</th>
					<th class="text-center hidden">Fecha Registro</th>
					<th class="text-center">Contactos</th>
					<th class="text-center">Acciones</th>
				</tr>
			</tfoot>
			<tbody>
				<?php
				foreach($clientes as $cliente)
				{
				?>
				<tr>
					<td class="text-center" onClick="irCliente('<?= $cliente->id ?>')"><a href="<?= site_url('clientes/ver/'.$cliente->id) ?>"><?= $cliente->nombre ?></a></td>
					<td class="text-center" onClick="irCliente('<?= $cliente->id ?>')">
						<?php
							foreach($clasificaciones as $clasificacion)
							{
								if($clasificacion->id_cliente_fk == $cliente->id){
									echo '<label class="btn btn-xs btn-primary">'.$clasificacion->nombre.'</label><br>';
								}
							}
						?>
					</td>
					<td class="text-center" onClick="irCliente('<?= $cliente->id ?>')">
						<?php
							foreach($clasificaciones as $clasificacion)
							{
								if($clasificacion->id_cliente_fk == $cliente->id){
									echo '<label class="btn btn-xs btn-info">Prioridad '.$clasificacion->prioridad.'</label><br>';
								}
							}
						?>
					</td>
					<td class="text-center hidden" onClick="irCliente('<?= $cliente->id ?>')"><?= $cliente->website ?></td>
					<td class="text-center hidden" onClick="irCliente('<?= $cliente->id ?>')"><?= $cliente->correo ?></td>
					<td class="text-center hidden" onClick="irCliente('<?= $cliente->id ?>')"><?= $cliente->telefono ?></td>
					<td class="text-center hidden"><?= ($cliente->calle) ?></td>
					<td class="text-center" onClick="irCliente('<?= $cliente->id ?>')"><?= $cliente->ciudad ?></td>
					<td class="text-center " onClick="irCliente('<?= $cliente->id ?>')"><?= $cliente->estado ?></td>
					<td class="text-center" onClick="irCliente('<?= $cliente->id ?>')"><?= ($cliente->cp) ?></td>
					<td class="text-center hidden" onClick="irCliente('<?= $cliente->id ?>')"><?= $cliente->pais ?></td>
					<td class="text-center hidden" onClick="irCliente('<?= $cliente->id ?>')"><p class="texto_desc"><?= $cliente->detalles ?></p></td>
					<td class="text-center hidden" onClick="irCliente('<?= $cliente->id ?>')"><?= $cliente->fecha_registro ?></td>
					<td class="text-center">
						<?php
							foreach($contactos as $contacto)
							{
								if($contacto->id_cliente_fk == $cliente->id){
									echo '<a href="'.site_url('clientes/ver_contacto/'.$contacto->id.'/'.$cliente->id).'" class="btn btn-xs btn-info fancybox fancybox.iframe">'.$contacto->titulo." ".$contacto->nombre.'</a><br>';
								}
							}
						?>
					</td>
					<td class="text-center" >
						<a href="<?= site_url('clientes/ver/'.$cliente->id) ?>" data-toggle="tooltip" data-original-title="Ver Cliente" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
						<a href="<?= site_url('proyectos/nuevo_proyecto/'.$cliente->id) ?>" data-toggle="tooltip" data-original-title="Nuevo Proyecto" class="btn btn-xs btn-default"><i class="fa fa-briefcase"></i></a>
						<a href="<?= site_url('tareas/nueva_tarea/'.$cliente->id) ?>" data-toggle="tooltip" data-original-title="Nueva Tarea Cliente" class="btn btn-xs btn-default"><i class="fa fa-check-square-o"></i></a>
						<a href="<?= site_url('clientes/eliminar/'.$cliente->id) ?>" data-toggle="tooltip" data-original-title="Eliminar Cliente" data-title="Confirmar Eliminación de Cliente"  data-text="Esta seguro de eliminar al cliente <?= $cliente->nombre ?>" data-confirm-button="Si" data-cancel-button="No" class="btn btn-xs btn-default eliminar"><i class="fa fa-trash-o"></i></a>
					</td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>
<script>
$( document ).ready(function() {
	$('.texto_desc').readmore({
      moreLink: '<a href="javascript:void(0)">Ver mas</a>',
      collapsedHeight: 100,
      afterToggle: function(trigger, element, expanded) {
        if(! expanded) { // The "Close" link was clicked
          $('html, body').animate({scrollTop: $(element).offset().top}, {duration: 100});
        }
      }
    });

    $('article').readmore({speed: 500});
	
	
});

function irCliente(id)
{
var pagina="<?= site_url('clientes/ver') ?>"+"/"+id;
location.href=pagina;   
}
</script>
<script>
$(".eliminar").confirm();
</script>
<script src="<?= asset_url('js/pages/tablaclientes.js') ?>"></script>
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