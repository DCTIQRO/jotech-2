<div class="block full">
	<div class="block-title">
		<h2><?= $datos->titulo ?> <strong><?= $datos->nombre ?></strong></h2>
	</div>
	<div class="row">
		<?php
			if(!empty($datos->direccion)){
				echo '<div class="col-xs-12"><h3>Dirección</h3><h5 class="themed-color-flatie">'.$datos->direccion.'</h5></div>';
			}
		?>
		<?php
			if(!empty($datos->telefono)){
				echo '<div class="col-xs-6"><h3>Teléfono</h3><h5 class="themed-color-flatie">'.$datos->telefono.'</h5></div>';
			}
		?>
		<?php
			if(!empty($datos->correo)){
				echo '<div class="col-xs-6"><h3>Correo</h3><h5 class="themed-color-flatie">'.$datos->correo.'</h5></div>';
			}
		?>
		<?php
			if(!empty($datos->puesto)){
				echo '<div class="col-xs-6"><h3>Puesto</h3><h5 class="themed-color-flatie">'.$datos->puesto.'</h5></div>';
			}
		?>
		<?php
			if(!empty($datos->activo)){
				$status1="";
				if($datos->activo == 1){$status1="Puede no estar al corriente";}
				if($datos->activo == 2){$status1="Conoce de los proyectos";}
				if($datos->activo == 3){$status1="Recomienda";}
				if($datos->activo == 4){$status1="Participa en la decisión";}
				echo '<div class="col-xs-6"><h3>Status 1</h3><h5 class="themed-color-flatie">'.$status1.'</h5></div>';
			}
		?>
		<?php
			if(!empty($datos->activo2)){
				$status2="";
				if($datos->activo2 == 1){$status2="ExTrabajador";}
				if($datos->activo2 == 2){$status2="No nos conoce";}
				if($datos->activo2 == 3){$status2="Es contacto principal";}
				if($datos->activo2 == 4){$status2="Si nos conoce";}
				echo '<div class="col-xs-6"><h3>Status 2</h3><h5 class="themed-color-flatie">'.$status2.'</h5></div>';
			}
		?>
		<?php
			if(!empty($datos->comentarios)){
				echo '<div class="col-xs-12"><h3>Comentarios</h3><h5 class="themed-color-flatie">'.$datos->comentarios.'</h5></div>';
			}
		?>
		<?php
			if(!empty($clasificaciones) && !empty($clasificaciones_cliente)){
				echo '<div class="col-xs-12"><h3>Clasificaciones</h3>';
			
				foreach($clasificaciones as $clasificacion)
				{
					if($clasificacion->clasificacion == "1"){
						foreach($clasificaciones_cliente as $clasificacion_cliente)
						{
							echo '<div class="col-sm-3 col-xs-6"><div class="widget">
									<div class="widget-simple">
										<h4 class="widget-content text-right">
											<a href="javascript:void(0)" class="themed-color-flatie">
												<strong>'.$clasificacion_cliente->nombre.'</strong>
											</a>
											<small></small>
										</h4>
									</div>
								</div></div>';
						}
						
					}
					else{
						echo '<div class="col-sm-3 col-xs-6"><div class="widget">
								<div class="widget-simple">
									<h4 class="widget-content text-right">
										<a href="javascript:void(0)" class="themed-color-flatie">
											<strong>'.$clasificacion->nombre.'</strong>
										</a>
										<small></small>
									</h4>
								</div>
							</div></div>';
					}
				}
				echo "</div>";
			}
		?>
	</div>
</div>

<script>
cambio();
function cambio() {
	var encontrado=0;
	$("#clasificacion :selected").map(function(i, el) {
		if($(el).val() == "1"){encontrado=1;}
	});
	if(encontrado == 1){
		$(".ocultar").each(function() {
			$(this).addClass('hidden');
		});
		$('#clasificacion').val('1').trigger('chosen:updated');
	}
	if(encontrado == 0){
		$(".ocultar").each(function() {
			$(this).removeClass('hidden');
		});
		$('#clasificacion').trigger('chosen:updated');
	}
}
</script>

<script>
$( document ).ready(function() {
    $( "#titulo" ).focus();
});
</script>