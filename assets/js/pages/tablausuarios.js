$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#tabla_usuarios tfoot th').each( function () {
        var title = $('#tabla_usuarios thead th').eq( $(this).index() ).text();
        $(this).html( '<input class="" type="text" placeholder="'+title+'" />' );
    } );
    // DataTable
	 App.datatables();
    var table = $('#tabla_usuarios').DataTable({
		columnDefs: [ { orderable: false, targets: [5] } ],
		pageLength: -1,
		lengthMenu: [[10, 20, 30, -1], [10, 20, 30, 'Todos']],
		dom: "<'row'<'col-sm-4 col-xs-12 text-center'l><'col-sm-4 col-xs-12 text-center'B><'col-sm-4 col-xs-12 text-center'f>>" +'tr' +"<'row'<'col-sm-5'i><'col-sm-7'p>>",
		stateSave: true,
		buttons: [
			'copyHtml5',
			'excelHtml5',
			'csvHtml5',
			'pdfHtml5',
			'print',
			{
				extend: 'colvis',
				columns: ':not(:first-child)'
			}
		],
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
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            that
                .search( this.value )
                .draw();
        } );
    } );
} );