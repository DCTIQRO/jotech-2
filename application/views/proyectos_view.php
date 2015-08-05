<div class="content-header">
	<div class="header-section">
		<div class="widget">
			<div class="widget-simple">
			<a href="javascript:void(0)" class="widget-icon pull-left themed-background-fire animation-fadeIn">
				<i class="fa fa-suitcase sidebar-nav-icon"></i>
			</a>
			<h1 class="widget-content text-letf animation-pullDown">
				<strong>Listado de Proyectos</strong>
			</h1>
			</div>
		</div>
	</div>
</div>
<ul class="breadcrumb breadcrumb-top">
	<li>Proyectos</li>
	<li><a href="">Listado</a></li>
</ul>
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
								<th class="text-center">ID</th>
								<th class="text-center">Proyecto</th>
								<th class="text-center" Style="width:10%">Descripción</th>
								<th class="text-center">Descripción Corta</th>
								<th class="text-center">Cliente</th>
								<th class="text-center">Inicio</th>
								<th class="text-center">Status</th>
								<th class="text-center">Acciones</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th class="text-center">ID</th>
								<th class="text-center">Proyecto</th>
								<th class="text-center">Descripción</th>
								<th class="text-center">Descripción Corta</th>
								<th class="text-center">Cliente</th>
								<th class="text-center">Inicio</th>
								<th class="text-center">Status</th>
							</tr>
						</tfoot>
						<tbody>
							<?php
							foreach($proyectos as $proyecto)
							{
							?>
							<tr onClick="irProyecto('<?= $proyecto->id ?>')">
								<td class="text-center"><?= $proyecto->id ?></td>
								<td class="text-center"><a href="javascript:void(0)"><?= $proyecto->nombre ?></a></td>
								<td class="text-center"><?= $proyecto->descripcion ?></td>
								<td class="text-center"><?= $proyecto->descripcion_corta ?></td>
								<td class="text-center"><?= $proyecto->cliente ?></td>
								<td class="text-center"><?= $proyecto->fecha_inicio ?></td>
								<td class="text-center">
								<?php
								if($proyecto->estatus == '0'){echo '<label class="btn btn-sm btn-danger">Cerrado</label>';}
								if($proyecto->estatus == '1'){echo '<label class="btn btn-sm btn-success">Abierto</label>';}
								?>
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

<script src="<?= asset_url('js/datatable.min.js') ?>"></script>
<script>
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#tabla_proyectos tfoot th').each( function () {
        var title = $('#tabla_proyectos thead th').eq( $(this).index() ).text();
        $(this).html( '<input class="form-control" type="text" placeholder="'+title+'" />' );
    } );
 
    // DataTable
    var table = $('#tabla_proyectos').DataTable({
		columnDefs: [ { orderable: false, targets: [7] } ],
                pageLength: 10,
				autoWidth: true,
                lengthMenu: [[10, 20, 30, -1], [10, 20, 30, 'All']],
				language:{
					"sProcessing":     "Procesando...",
					"sLengthMenu":     "Mostrar _MENU_ registros",
					"sZeroRecords":    "No se encontraron resultados",
					"sEmptyTable":     "Ningún dato disponible en esta tabla",
					"sInfo":           "Registros del _START_ al _END_ de un total de _TOTAL_ registros",
					"sInfoEmpty":      "Sin registros",
					"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
					"sInfoPostFix":    "",
					"sSearch":         "Buscar: ",
					"sUrl":            "",
					"sInfoThousands":  ",",
					"sLoadingRecords": "Cargando...",
					"oPaginate": {
						"sFirst":    "Primero",
						"sLast":     "Último",
						"sNext":     "Siguiente",
						"sPrevious": "Anterior"
					},
					"oAria": {
						"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
						"sSortDescending": ": Activar para ordenar la columna de manera descendente"
					}
				}
	});
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            that
                .search( this.value )
                .draw();
        } );
    } );
} );
</script>
<style>
tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
</style>
<script>
function irProyecto(id)
{
var pagina="<?= site_url('proyectos/ver_proyecto') ?>"+"/"+id;
location.href=pagina;   
}
</script>