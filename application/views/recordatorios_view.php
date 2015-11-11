<div class="content-header">
	<div class="header-section">
		<div class="widget">
			<div class="widget-simple">
			<a href="<?= site_url('recordatorios/nuevo_recordatorio') ?>" class="widget-icon pull-left themed-background-fire animation-fadeIn">
			<i class="gi gi-user_add sidebar-nav-icon"></i>
			</a>
			<h1 class="widget-content text-letf animation-pullDown">
			<strong>Recordatorios</strong>
			</h1>
			</div>
		</div>
	</div>
</div>
<ul class="breadcrumb breadcrumb-top">
	<li>Recordatorios</li>
	<li><a href="">Listado</a></li>
</ul>

<div class="block full">
	<div class="block-title">
		<h2>Mis <strong>Recordatorios</strong></h2>
	</div>
	<div class="row">
		<form action="<?= site_url('recordatorios/guardar_recordatorio') ?>" class="form-horizontal form-bordered" method="post" accept-charset="utf-8" >
			<div class="form-group">
				<div class="col-xs-12 col-sm-10 text-center">
					<div class="col-xs-12 col-sm-10">
						<textarea class="form-control" rows="1" id="descripcion" name="descripcion" required placeholder="Escribe un comentario"  ></textarea>
					</div>
					<div class="col-xs-12 col-sm-2">
						<input type="text" class="form-control input-datepicker" data-date-format="dd-mm-yyyy" id="fecha" name="fecha" required placeholder="dd-mm-yyyy"  />
					</div>
				</div>
				<div class="col-xs-12 col-sm-2 text-center">
					<input type="submit" class="btn-sm btn-success" value="Guardar"/>
				</div>
			</div>	
		</form>
	</div>
	<div class="row">
		<div class="responsive">
			<table id="tabla_recordatorios" class="table table-vcenter table-condensed table-bordered">
				<thead>
					<tr>
						<th class="text-center">Recordatorio</th>
						<th class="text-center">Fecha</th>
						<th class="text-center">Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach($recordatorios as $recordatorio)
					{
					?>
					<tr>
						<td class="text-center"><p class="texto_desc"><?= $recordatorio->descripcion ?></p></td>
						<td class="text-center"><?= $recordatorio->Fecha ?></td>
						<td class="text-center">
							<a href="<?= site_url('recordatorios/editar_recordatorio/'.$recordatorio->idRecordatorios) ?>" class="fancybox fancybox.iframe btn btn-xs btn-default" data-toggle="tooltip" data-original-title="Editar" ><i class="fa fa-pencil"></i></a>
							<a href="<?= site_url('recordatorios/eliminar_recordatorio/'.$recordatorio->idRecordatorios) ?>" data-toggle="tooltip" data-original-title="Eliminar" class="btn btn-xs btn-default"><i class="fa fa-trash-o"></i></a>
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
<script src="<?= asset_url('js/pages/tablarecordatorios.js') ?>"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
