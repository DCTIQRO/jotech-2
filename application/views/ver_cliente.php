<div class="row">
	<div class="block">
		<?php $this->load->view('basic/tabs_cliente') ?>
		<div class="row">
			<div class="col-xs-12">
				<form class="form-horizontal form-bordered" id="new_cliente" method="post" action="<?= site_url('clientes/actualizar/'.$datos->id) ?>" >
					<div class="form-group">
						<label class="col-md-4 control-label" for="nombre">Nombre <span class="text-danger">*</span></label>
						<div class="col-md-6">
							<div class="input-group">
								<input type="text" id="nombre" name="nombre" class="form-control" value="<?= $datos->nombre ?>" placeholder="Nombre del cliente..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="web">WebSite</label>
						<div class="col-md-6">
							<div class="input-group">
								<input type="text" id="web" name="web" class="form-control" value="<?= $datos->website ?>" placeholder="WebSite del cliente..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="correo">Correo <span class="text-danger">*</span></label>
						<div class="col-md-6">
							<div class="input-group">
								<input type="text" id="correo" name="correo" class="form-control" value="<?= $datos->correo ?>" placeholder="Correo del cliente..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="telefono">Teléfono <span class="text-danger">*</span></label>
						<div class="col-md-6">
							<div class="input-group">
								<input type="text" id="telefono" name="telefono" class="form-control" value="<?= $datos->telefono ?>" placeholder="Teléfono del cliente..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="telefono">Calle</label>
						<div class="col-md-6">
							<div class="input-group">
								<input type="text" id="calle" name="calle" class="form-control" value="<?= $datos->calle ?>" placeholder="Calle de ubicación..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="numero">Numero</label>
						<div class="col-md-6">
							<div class="input-group">
								<input type="text" id="numero" name="numero" class="form-control" value="<?= $datos->numero ?>" placeholder="Numero de ubicación..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="colonia">Colonia</label>
						<div class="col-md-6">
							<div class="input-group">
								<input type="text" id="colonia" name="colonia" class="form-control" value="<?= $datos->colonia ?>" placeholder="Colonia de ubicación..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="referencia">Referencia</label>
						<div class="col-md-6">
							<div class="input-group">
								<input type="text" id="referencia" name="referencia" class="form-control" value="<?= $datos->entre_calles ?>" placeholder="Referencia de ubicación..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="ciudad">Ciudad</label>
						<div class="col-md-6">
							<div class="input-group">
								<input type="text" id="ciudad" name="ciudad" class="form-control" value="<?= $datos->ciudad ?>" placeholder="Ciudad..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="estado">Estado</label>
						<div class="col-md-6">
							<div class="input-group">
								<input type="text" id="estado" name="estado" class="form-control" value="<?= $datos->estado ?>" placeholder="Estado..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="pais">País</label>
						<div class="col-md-6">
							<div class="input-group">
								<input type="text" id="pais" name="pais" class="form-control" value="<?= $datos->pais ?>" placeholder="País..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="detalles">Detalles</label>
						<div class="col-md-6">
							<div class="input-group">
								<textarea id="detalles" name="detalles" class="form-control" rows="6" placeholder="Detalles..."><?= $datos->detalles ?></textarea>
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-4 control-label"  for="clasificacion">Clasificación</label>
						<div class="col-md-6">
							<div class="input-group">
								<select id="clasificacion" name="clasificacion" class="select-chosen form-control" onchange="checar_clasificacion();">
									<option value="a">Seleccione una Clasificación</option>
									<?php 
										foreach($clasificaciones as $tipo)
										{
											$select="";
											if($tipo->clasificacion == $clasificacion->clasificacion){$select="selected";}
											echo '<option value="'.$tipo->clasificacion.'" '.$select.'>'.$tipo->clasificacion.'</option>';
										}
									?>
									<option value="0">Otra Clasificación</option>
								</select>
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>			 
					</div>
					<div class="form-group" id="div_nueva_clasificacion">
						<label class="col-md-4 control-label" for="new_clas">Nueva Clasificación</label>
						<div class="col-md-6">
							<div class="input-group">
								<input type="text" id="new_clas" name="new_clas" class="form-control" placeholder="Escriba la nueva clasificación..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label"  for="prioridad">Prioridad</label>
						<div class="col-md-6">
							<div class="input-group">
								<select id="prioridad" name="prioridad" class="select-chosen form-control">
									<option value="">Seleccione una Prioridad</option>
									<?php  $selec=""; if($clasificacion->prioridad == 1){$selec="selected";} ?>
									<option value="1" <?= $selec ?> >Prioridad 1</option>
									<?php  $selec=""; if($clasificacion->prioridad == 2){$selec="selected";} ?>
									<option value="2" <?= $selec ?> >Prioridad 2</option>
									<?php  $selec=""; if($clasificacion->prioridad == 3){$selec="selected";} ?>
									<option value="3" <?= $selec ?> >Prioridad 3</option>
									<?php  $selec=""; if($clasificacion->prioridad == 4){$selec="selected";} ?>
									<option value="4" <?= $selec ?> >Prioridad 4</option>
								</select>
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>			 
					</div>
					<div class="form-group text-center">
							<button type="submit" class="btn btn-sm btn-info"><i class="fa fa-arrow-right"></i> Actualizar Cambios</button>
					</div>			
				</form>
			</div>
		</div>
	</div>
</div>

<script>

    $('#div_nueva_clasificacion').hide();
    
    function checar_clasificacion(){
    
        if(document.getElementById('clasificacion').value=='0'){
         $('#div_nueva_clasificacion').show();
        }
        else{
         $('#div_nueva_clasificacion').hide();
        }
        
        
    }

</script>

<script src="<?= asset_url('js/pages/nuevocliente.js') ?>"></script>
<script>$(function(){ FormsValidation.init(); });</script>