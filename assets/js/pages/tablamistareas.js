$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#tabla_tareas_clientes thead th').each( function () {
        var title = $('#tabla_tareas_clientes tfoot th').eq( $(this).index() ).text();
        $(this).html( '<input class="busqueda" type="text" placeholder="'+title+'" />' );
    } );
	$('#tabla_tareas_proyecto thead th').each( function () {
        var title = $('#tabla_tareas_proyecto tfoot th').eq( $(this).index() ).text();
        $(this).html( '<input class="busqueda" type="text" placeholder="'+title+'" />' );
    } );
	$('#tabla_tareas_generales thead th').each( function () {
        var title = $('#tabla_tareas_generales tfoot th').eq( $(this).index() ).text();
        $(this).html( '<input class="busqueda" type="text" placeholder="'+title+'" />' );
    } );
    // DataTable
	 App.datatables();
    var table = $('#tabla_tareas_clientes').DataTable({
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
	
	var table3 = $('#tabla_tareas_generales').DataTable({
		columnDefs: [ { orderable: false, targets: [6] } ],
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
	var table2 = $('#tabla_tareas_proyecto').DataTable({
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
	$('.dataTables_filter input').attr('placeholder', 'Buscar');
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.header() ).on( 'keyup change', function () {
            that
                .search( this.value )
                .draw();
        } );
    } );
	
	table2.columns().every( function () {
        var that = this;
 
        $( 'input', this.header() ).on( 'keyup change', function () {
            that
                .search( this.value )
                .draw();
        } );
    } );
	
	table3.columns().every( function () {
        var that = this;
 
        $( 'input', this.header() ).on( 'keyup change', function () {
            that
                .search( this.value )
                .draw();
        } );
    } );
	
} );