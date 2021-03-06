$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#tabla_papelera thead th').each( function () {
        var title = $('#tabla_papelera tfoot th').eq( $(this).index() ).text();
        $(this).html( '<input class="busqueda" type="text" placeholder="'+title+'" />' );
    } );
    // DataTable
	 App.datatables();
    var table = $('#tabla_papelera').DataTable({
		columnDefs: [ { orderable: false, targets: [2] } ],
                pageLength: -1,
				autoWidth: true,
                lengthMenu: [[10, 20, 30, -1], [10, 20, 30, 'Todos']],
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
	$('.dataTables_filter input').attr('placeholder', 'Search');
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.header() ).on( 'keyup change', function () {
            that
                .search( this.value )
                .draw();
        } );
    } );
} );