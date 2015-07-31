<div class="row">
	<div class="block">
		<?php $this->load->view('basic/tabs_cliente') ?>
		<div class="row">
			<div class="col-xs-12">
				<form class="" id="new_cliente" method="post" action="<?= site_url('clientes/actualizar/'.$datos->id) ?>" >
					<div class="form-group">
						<label class="col-md-2 control-label" for="nombre">Nombre <span class="text-danger">*</span></label>
						<div class="col-md-4">
							<div class="input-group">
								<input type="text" id="nombre" name="nombre" class="form-control" value="<?= $datos->nombre ?>" placeholder="Nombre del cliente..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
						<label class="col-md-2 control-label" for="web">WebSite</label>
						<div class="col-md-4">
							<div class="input-group">
								<input type="text" id="web" name="web" class="form-control" value="<?= $datos->website ?>" placeholder="WebSite del cliente..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="correo">Correo <span class="text-danger">*</span></label>
						<div class="col-md-4">
							<div class="input-group">
								<input type="text" id="correo" name="correo" class="form-control" value="<?= $datos->correo ?>" placeholder="Correo del cliente..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
						<label class="col-md-2 control-label" for="telefono">Teléfono <span class="text-danger">*</span></label>
						<div class="col-md-4">
							<div class="input-group">
								<input type="text" id="telefono" name="telefono" class="form-control" value="<?= $datos->telefono ?>" placeholder="Teléfono del cliente..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="telefono">Calle</label>
						<div class="col-md-4">
							<div class="input-group">
								<input type="text" id="calle" name="calle" class="form-control" value="<?= $datos->calle ?>" placeholder="Calle de ubicación..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
						<label class="col-md-2 control-label" for="colonia">Colonia</label>
						<div class="col-md-4">
							<div class="input-group">
								<input type="text" id="colonia" name="colonia" class="form-control" value="<?= $datos->colonia ?>" placeholder="Colonia de ubicación..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="cp">CP</label>
						<div class="col-md-4">
							<div class="input-group">
								<input type="text" id="cp" name="cp" class="form-control" value="<?= $datos->cp ?>" placeholder="CP de ubicación..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
						<label class="col-md-2 control-label" for="ciudad">Ciudad</label>
						<div class="col-md-4">
							<div class="input-group">
								<input type="text" id="ciudad" name="ciudad" class="form-control" value="<?= $datos->ciudad ?>" placeholder="Ciudad..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="estado">Estado</label>
						<div class="col-md-4">
							<div class="input-group">
								<input type="text" id="estado" name="estado" class="form-control" value="<?= $datos->estado ?>" placeholder="Estado..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
						<label class="col-md-2 control-label" for="pais">País</label>
						<div class="col-md-4">
							<div class="input-group">
								<input type="text" id="pais" name="pais" class="form-control" value="<?= $datos->pais ?>" placeholder="País..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="comentario">Comentarios</label>
						<div class="col-md-4">
							<div class="input-group">
								<textarea id="comentario" name="comentario" class="form-control" rows="2" placeholder="Numero de ubicación.."><?= $datos->comentarios ?></textarea>
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
						<label class="col-md-2 control-label" for="detalles">Claves</label>
						<div class="col-md-4">
							<div class="input-group">
								<input type="text" id="detalles" name="detalles" class="input-tags"  value="<?= $datos->detalles ?>">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					<?php 
					$options="";
						foreach($clasificaciones as $tipo)
						{
							$options.='<option value="'.$tipo->id.'" >'.$tipo->nombre.'</option>';
						}
					?>
					<?php
					$i=1;
					foreach($clasificaciones_cliente as $clasificacion_cliente){?>
					<div class="form-group" id="grupo<?= $i ?>">
						<label class="col-md-2 control-label"  for="clasificacion<?= $i ?>">Clasificación <?= $i ?></label>
						<div class="col-md-4">
							<div class="input-group">
								<select id="clasificacion<?= $i ?>" name="clasificacion<?= $i ?>" class="select-chosen form-control" onchange="checar_clasificacion();">
									<option value="a">Seleccione una Clasificación</option>
									<?php 
										foreach($clasificaciones as $tipo)
										{
											$select="";
											if($tipo->id == $clasificacion_cliente->clasificacion){$select="selected";}
											echo '<option value="'.$tipo->id.'" '.$select.'>'.$tipo->nombre.'</option>';
											$options.='<option value="'.$tipo->id.'" >'.$tipo->nombre.'</option>';
										}
									?>
								</select>
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
						<label class="col-md-2 control-label"  for="prioridad<?= $i ?>"> Prioridad<?= $i ?></label>
						<div class="col-md-3">
							<div class="input-group">
								<select id="prioridad<?= $i ?>" name="prioridad<?= $i ?>" class="select-chosen form-control">
									<option value="">Seleccione una Prioridad</option>
									<?php  $selec=""; if($clasificacion_cliente->prioridad == 1){$selec="selected";} ?>
									<option value="1" <?= $selec ?> >Prioridad 1</option>
									<?php  $selec=""; if($clasificacion_cliente->prioridad == 2){$selec="selected";} ?>
									<option value="2" <?= $selec ?> >Prioridad 2</option>
									<?php  $selec=""; if($clasificacion_cliente->prioridad == 3){$selec="selected";} ?>
									<option value="3" <?= $selec ?> >Prioridad 3</option>
									<?php  $selec=""; if($clasificacion_cliente->prioridad == 4){$selec="selected";} ?>
									<option value="4" <?= $selec ?> >Prioridad 4</option>
									<?php  $selec=""; if($clasificacion_cliente->prioridad == 5){$selec="selected";} ?>
									<option value="5" <?= $selec ?> >Prioridad 5</option>
									<?php  $selec=""; if($clasificacion_cliente->prioridad == 6){$selec="selected";} ?>
									<option value="6" <?= $selec ?> >Prioridad 6</option>
								</select>
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
						<div class="col-sm-1"  Style="padding-top:10px">
							<label onClick="quitarClasif (<?= $i ?>)" class="btn-sm btn-danger">Eliminar</label>
						</div>
					</div>
					<?php $i++; } ?>
					<div id="new_clasif" name="new_clasif">
						<!--Aqui se pondran las nuevas clasificaciones-->
					</div>
					<input type="hidden" name="numero_clas" id="numero_clas" value="<?= $i ?>" />
					<div class="form-group text-center">
						<hr Style="border-color:#FFF ; width: 100%;">
					</div>
					<div class="form-group text-center">
						<a href="javascript:void(0)" class="btn-sm btn-info" onClick="agregarClasif()">Nueva Clasificación</a>
					</div>
					<div class="form-group text-center">
							<button type="submit" class="btn btn-sm btn-success"><i class="fa fa-arrow-right"></i> Actualizar Cambios</button>
					</div>			
				</form>
			</div>
		</div>
	</div>
</div>

<script>
var i=$('#numero_clas').val();
function agregarClasif ()
{
	x=	'<div class="form-group" id="grupo'+i+'">'+
			'<label class="col-sm-2 control-label"  for="clasificacion'+i+'">Clasificación '+i+'</label>'+
			'<div class="col-sm-4">'+
				'<div class="input-group">'+
					'<select id="clasificacion'+i+'" name="clasificacion'+i+'" class="select-chosen form-control clasifi">'+
						'<option value="0">Seleccione una Clasificación</option>'+
						'<?= $options ?>'+
					'</select>'+
					'<span class="input-group-addon"><i class="gi gi-user"></i></span>'+
				'</div>'+
			'</div>'+
			'<label class="col-sm-2 control-label"  for="prioridad'+i+'">Prioridad '+i+'</label>'+
			'<div class="col-sm-3">'+
				'<div class="input-group">'+
					'<select id="prioridad'+i+'" name="prioridad'+i+'" class="select-chosen form-control prioridades">'+
						'<option value="">Seleccione una Prioridad</option>'+
						'<option value="1">Prioridad 1</option>'+
						'<option value="2">Prioridad 2</option>'+
						'<option value="3">Prioridad 3</option>'+
						'<option value="4">Prioridad 4</option>'+
						'<option value="5">Prioridad 5</option>'+
						'<option value="6">Prioridad 6</option>'+
					'</select>'+
					'<span class="input-group-addon"><i class="gi gi-user"></i></span>'+
				'</div>'+
			'</div>'+
			'<div class="col-sm-1"  Style="padding-top:10px">'+
				'<label onClick="quitarClasif ('+i+')" class="btn-sm btn-danger">Eliminar</label>'+
			'</div><br><br>'+
		'</div>';
	$("#new_clasif").append( x );
	$('.select-chosen').chosen();
	$('#div_nueva_clasificacion'+i).hide();
	$('#numero_clas').val(i);
	i++;
}

function quitarClasif (num)
{
		$('#grupo'+num).remove();
}
</script>

<script>
$( document ).ready(function() {
    $( "#nombre" ).focus();
});
</script>

<script src="<?= asset_url('js/pages/nuevocliente.js') ?>"></script>
<script>$(function(){ FormsValidation.init(); });</script>