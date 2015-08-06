<div class="content-header">
	<div class="header-section">
		<div class="widget">
			<div class="widget-simple">
			<a href="<?= site_url('clientes/nuevo_cliente') ?>" class="widget-icon pull-left themed-background-fire animation-fadeIn">
			<i class="gi gi-user_add sidebar-nav-icon"></i>
			</a>
			<h1 class="widget-content text-letf animation-pullDown">
			<strong>Clientes</strong>
			</h1>
			</div>
		</div>
	</div>
</div>
<ul class="breadcrumb breadcrumb-top">
	<li>Clientes</li>
	<li><a href="">Registrados</a></li>
</ul>

<div class="block full">
	<div class="block-title">
		<h2>Información <strong>Clientes</strong></h2>
		<div class="block-options pull-right">
			<a href="<?= site_url('clientes/nuevo_cliente') ?>" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="" data-original-title="Agregar Cliente"><i class="fa fa-plus"></i> Agregar Cliente</a>
		</div>
	</div>
	<div class="table-responsive">
		<table id="tabla_clientes" class="table table-vcenter table-condensed table-bordered">
			<thead>
				<tr>
					<th class="text-center">ID</th>
					<th class="text-center">Cliente</th>
					<th class="text-center hidden">WebSite</th>
					<th class="text-center">Correo</th>
					<th class="text-center">Telefono</th>
					<th class="text-center hidden">Direccion</th>
					<th class="text-center ">CP</th>
					<th class="text-center">Ciudad</th>
					<th class="text-center hidden">Estado</th>
					<th class="text-center">Pais</th>
					<th class="text-center">Detalles</th>
					<th class="text-center hidden">Fecha Registro</th>
					<th class="text-center">Acciones</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th class="text-center">ID</th>
					<th class="text-center">Cliente</th>
					<th class="text-center hidden">WebSite</th>
					<th class="text-center">Correo</th>
					<th class="text-center">Telefono</th>
					<th class="text-center hidden">Direccion</th>
					<th class="text-center ">CP</th>
					<th class="text-center">Ciudad</th>
					<th class="text-center hidden">Estado</th>
					<th class="text-center">Pais</th>
					<th class="text-center">Detalles</th>
					<th class="text-center hidden">Fecha Registro</th>
					<th class="text-center">Acciones</th>
				</tr>
			</tfoot>
			<tbody>
				<?php
				foreach($clientes as $cliente)
				{
				?>
				<tr onClick="irCliente('<?= $cliente->id ?>')">
					<td class="text-center"><?= $cliente->id ?></td>
					<td class="text-center"><a href="<?= site_url('clientes/ver/'.$cliente->id) ?>"><?= $cliente->nombre ?></a></td>
					<td class="text-center hidden"><?= $cliente->website ?></td>
					<td class="text-center"><?= $cliente->correo ?></td>
					<td class="text-center"><?= $cliente->telefono ?></td>
					<td class="text-center hidden"><?= ($cliente->calle) ?></td>
					<td class="text-center"><?= ($cliente->cp) ?></td>
					<td class="text-center"><?= $cliente->ciudad ?></td>
					<td class="text-center hidden"><?= $cliente->estado ?></td>
					<td class="text-center"><?= $cliente->pais ?></td>
					<td class="text-center"><p class="texto_desc"><?= $cliente->detalles ?></p></td>
					<td class="text-center hidden"><?= $cliente->fecha_registro ?></td>
					<td class="text-center">
						<a href="<?= site_url('clientes/ver/'.$cliente->id) ?>" data-toggle="tooltip" data-original-title="Ver Cliente" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
						<a href="<?= site_url('proyectos/nuevo_proyecto/'.$cliente->id) ?>" data-toggle="tooltip" data-original-title="Nuevo Proyecto" class="btn btn-xs btn-default"><i class="fa fa-briefcase"></i></a>
						<a href="<?= site_url('tareas/nueva_tarea/'.$cliente->id) ?>" data-toggle="tooltip" data-original-title="Nueva Tarea Cliente" class="btn btn-xs btn-default"><i class="fa fa-check-square-o"></i></a>
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
<script src="<?= asset_url('js/pages/tablaclientes.js') ?>"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
