$(document).ready(function () {
	var idprofesor = $('#idprofesor').val();
	//Inicializar el elemento data table//
        var table = $('#table_id').dataTable({
			"retrieve": true,
            "lengthMenu": [[10, 25, 50], [10, 25, 50]]
        });
		
	llenarTabla(table,idprofesor);
	//alert (idprofesor);
	//para llenar el data table empleamos AJAX, enviamos parametros para evitar problemas con caracteres especiales
	function llenarTabla(table,idprofesor){
		$.ajax({
		          dataType: "JSON",
				  type: "POST",
				  url: "php/calificar/listaGrupos.php",
				  data: {idprofesor:idprofesor}
				})
				.done(function(datos) {
				console.log(datos);
					table.fnClearTable();
					for(var i = 0; i < datos.length; i++) {
						table.fnAddData([
						datos[i]['nomidioma'],
						datos[i]['nomgrupo'],
						datos[i]['nomcurso'],
						datos[i]['nometapa'],
						datos[i]['nomtipoclase'],
						datos[i]['nommodaliad'],
						datos[i]['periodoini']+' / '+datos[i]['periodofin'],
						datos[i]['options'],
						datos[i]['options2']
						]);
					}
				})
				.fail(function() {
					alert( "error en al insertar" );
				});	
	}
	

	
		//definimos las herramineta en el encabezado de la datatable.
        var tableTools = new $.fn.dataTable.TableTools(table, {
            "buttons": [
                "pdf",
                {"type": "print", "buttonText": "Imprimir"}
            ]
        });
        //aqui podemos dar estilos adicionales a los elementos genereados por dataTable
		$(".DTTT_container").css("float", "right");
		
		
		
//------- funcion para dar altas
		$( "#advance-form" ).submit(function( event ) {
		  $('#mensajeForm').addClass( "hide" );
		  console.log( $( this ).serialize() );
		  var serialize = $( this ).serialize();
		  
		$.ajax({
				  type: "POST",
				  url: "php/calificar/insertar.php",
				  data: serialize
				})
				.done(function(respuesta) {
					if(respuesta==1){
						$('#mensaje').html('Ya existe este idioma.');
						$('#mensajeForm').removeClass( "hide" ).addClass( "alert-warning" );
					}
					else{
						llenarTabla(table);
						$('#modal-Idioma').modal('hide').delay( 1000 );
					}
				})
				.fail(function() {
					alert( "error en al insertar" );
				});				
		  
		  
		  event.preventDefault();
		});
		
	//--------------LLENAR MENSAJES
	
	$.ajax({
		dataType: "JSON",
		encoding:"UTF-8",
		type: "POST",
		contentType: "text/json; charset=UTF-8",
		url: "php/calificar/listamensaje.php",
		data: "",
		success: function(datos){
			//console.log(datos);
			selectedIdMensaje = datos[0]['id_mensaje'];
			for(var i = 0; i < datos.length; i++) {
				$("#id_mensaje").append(datos[i]['optionsM']);
			}
		},
		error: function(datos) {
			alert('error'+datos);
		}
		});
	//-------------FIN LLENAR  MENSAJE
		
		
		
		
//------- LLENA TABLA PARA CALIFICAR PERIODO	
		$('.panel-body').on( "click", ".editarIdioma", function() {
		  id = $(this).attr("idgrupo");
		  tipoclase = $(this).attr("tipoclase");
		  modalidad = $(this).attr("modalidad");
		  idtipocal = $(this).attr("idtipocal");
		  idprofesor = $(this).attr("idprofesor");
	//Inicializar el elemento data table 2//
        var table_ = $('#table_id_').dataTable({
			"retrieve": true,
            "lengthMenu": [[10, 25, 50], [10, 25, 50]]
        });
	llenarTabla_(table_,id,tipoclase,modalidad,idtipocal,idprofesor);
	//para llenar el data table empleamos AJAX, enviamos parametros para evitar problemas con caracteres especiales
	function llenarTabla_(table,id,tipoclase,modalidad,idtipocal,idprofesor){
	//alert(id+'tipoclase  '+tipoclase+'moda '+modalidad+'idtipocal '+idtipocal+' profr: '+idprofesor);
		$.ajax({
				dataType: "JSON",
				encoding:"UTF-8",
				type: "POST",
				url: "php/calificar/alumnosGrupo.php",
				data: {id:id,tipoclase:tipoclase,modalidad:modalidad,idtipocal:idtipocal,idprofesor:idprofesor}
				})
				.done(function(datos) {
					console.log(datos);
					console.log('GRUPO '+id+'TIPOCLASE '+tipoclase+'MODALIDAD '+modalidad+'TIPO CAL '+idtipocal+'idprofesor '+idprofesor);
					contador=(datos.length);
					console.log(contador);
					/*usamos la variable que contiene el data table y usando la funcion fnClearTable() 
					limpiamos lo que contenga y para agregar datos simplemente usando a funcion fnAddData() enviando del objeto JSON el orden y nombre de los atributos para cada columna (respetando el orden definido en el diseño)*/
					table.fnClearTable();
					//alert(datos.length);
					for(var i = 0; i < datos.length; i++) {
						table.fnAddData([
						datos[i]['apatalumno']+' '+datos[i]['amatalumno']+' '+ datos[i]['nomalumno'],
						datos[i]['nomTipoclase'],
						datos[i]['nomtipocal'],
						datos[i]['exafechaini']+' / '+datos[i]['exafechafin'],
						datos[i]['evaluacion1'],
						datos[i]['evaluacion2']+datos[i]['idcal']+datos[i]['tipoparcial']+datos[i]['modalida'],
						datos[i]['mensaj'],
						$("#nommateria").html(datos[0]['detalletipoclase'])
						
						]);

					
					}

					//--------------LLENAR MENSAJES
	
					$.ajax({
						dataType: "JSON",
						encoding:"UTF-8",
						type: "POST",
						//contentType: "text/json; charset=UTF-8",
						url: "php/calificar/listamensaje.php",
						data: "",
						success: function(datos){
							//console.log(datos);
							for(var con= 0; con <= contador; con++){
							selectedIdMensaje = datos[0]['id_mensaje'],con;
							for(var i = 0; i < datos.length; i++) {
								$('#id_mensaje'+con).append(datos[i]['optionsM']);
							}
							}
						},
						error: function(datos) {
							alert('error'+datos);
						}
						});
					//-------------FIN LLENAR  MENSAJE
					$('#contador').val(contador);
				})
				.fail(function() {
					alert( "error al obtener datos del registro" );
				});
	}
		   
		  $('#modal-IdiomaEdit').modal('show');
		  
		});

	//------------FIN PARA LLENAR LA TABLA DE CALIFICAR PERIODO

		
		
	//-------------ACTUALIZA LA CALIFICACION
		
		$( "#advance-formEdit" ).submit(function( event ) {
		  console.log( $( this ).serialize() );
		  var serialize = $( this ).serialize();
		  var datosCalificaciones=($('#calificaciones').serialize());

		$.ajax({
				  type: "POST",
				  url: "php/calificar/actualizar.php",
				  data: serialize+"&"+datosCalificaciones
				})
				.done(function(respuesta) {
					llenarTabla(table,idprofesor);
					$('#modal-IdiomaEdit').modal('hide');
				})
				.fail(function(respuesta) {
					alert( "error al modificar"+respuesta);
				});				
		  
		  
		  event.preventDefault();
		});
	//---------------FIN ACTUALIZAR CALIFICACION
		
		

});