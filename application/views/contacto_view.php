<div class="content-header">
	<div class="header-section">
		<div class="widget">
			<div class="widget-simple">
				<a href="javascript:void(0)" class="widget-icon pull-left themed-background-fire animation-fadeIn">
					<i class="fa fa-suitcase sidebar-nav-icon"></i>
				</a>
				<h1 class="widget-content text-letf animation-pullDown">
					<strong>Listado de Contactos</strong>
				</h1>
			</div>
		</div>
	</div>
</div>
<ul class="breadcrumb breadcrumb-top">
	<li>Contacto</li>
	<li><a href="">Listado</a></li>
</ul>
<div class="row">
	<div class="col-xs-12" >
		<div class="block">
			<div class="block-title">
				<h2>Listar <strong>Contactos</strong></h2>
			</div>
			<div class="row">
				<div class="table-responsive">
					<table id="tabla_contactos" class="table table-vcenter table-condensed table-bordered">
						<thead>
							<tr>
								<th class="text-center">Status 2</th>
								<th class="text-center">Nombre</th>
								<th class="text-center">Cliente</th>
								<th class="text-center">Teléfono</th>
								<th class="text-center">Correo</th>
								<th class="text-center">Acciones</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th class="text-center">Status 2</th>
								<th class="text-center">Nombre</th>
								<th class="text-center">Cliente</th>
								<th class="text-center">Teléfono</th>
								<th class="text-center">Correo</th>
								<th class="text-center">Acciones</th>
							</tr>
						</tfoot>
						<tbody>
							<?php
							foreach($contactos as $contacto)
							{
							?>
							<tr>
								<td class="text-center">
								<?php
									if($contacto->activo2 == 1){echo '<label class="btn-xs btn-warning">Ex trabajador</label>';}
									if($contacto->activo2 == 2){echo '<label class="btn-xs btn-success">No nos conoce</label>';}
									if($contacto->activo2 == 3){echo '<label class="btn-xs btn-info">Sí nos conoce: Es contacto principal</label>';}
									if($contacto->activo2 == 4){echo '<label class="btn-xs btn-success">Si nos conoce: Aunque no sea contacto principal</label>';}
								?></td>
								<td class="text-center"><a href="<?= site_url('clientes/editar_contacto/'.$contacto->id.'/'.$contacto->cliente) ?>" class="fancybox fancybox.iframe"><?=  $contacto->titulo." ".$contacto->nombre ?></a></td>
								<td class="text-center"><a href="<?= site_url('clientes/ver/'.$contacto->cliente) ?>"><?= $contacto->name_cliente ?></a></td>
								<td class="text-center"><?= $contacto->telefono ?></td>
								<td class="text-center"><a href="mailto:<?= $contacto->correo ?>"><?= $contacto->correo ?></a></td>
								<td class="text-center">
									<a href="<?= site_url('clientes/ver_contacto/'.$contacto->id.'/'.$contacto->cliente) ?>" data-toggle="tooltip" data-original-title="Ver Contacto" class="btn btn-xs btn-default fancybox fancybox.iframe"><i class="fa fa-eye"></i></a>
									<a href="<?= site_url('clientes/editar_contacto/'.$contacto->id."/".$contacto->cliente) ?>" class="fancybox fancybox.iframe btn btn-xs btn-default" data-toggle="tooltip" data-original-title="Editar" ><i class="fa fa-pencil"></i></a>
									<a href="<?= site_url('clientes/eliminar_contacto/'.$contacto->id."/".$contacto->cliente) ?>" data-toggle="tooltip" data-original-title="Eliminar" class="btn btn-xs btn-default"><i class="fa fa-trash-o"></i></a>
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

<script>
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

<script src="<?= asset_url('js/pages/tablacontactos.js') ?>"></script>
<script>$(function(){ TablesDatatables.init(); });</script>