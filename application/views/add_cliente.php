<div class="row">
<div class="col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-2 site-block" >
<div class="block">
	<div class="block-title">
		<h2>Agregar <strong>Cliente</strong></h2>
	</div>
	<div class="row">
		<form class="form-horizontal form-bordered" id="new_cliente" method="post" action="<?= site_url('clientes/guardar_cliente') ?>">
			<div class="form-group">
				<label class="col-md-4 control-label" for="nombre">Nombre <span class="text-danger">*</span></label>
				<div class="col-md-6">
					<div class="input-group">
						<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre del cliente..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="web">WebSite</label>
				<div class="col-md-6">
					<div class="input-group">
						<input type="text" id="web" name="web" class="form-control" placeholder="WebSite del cliente..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="correo">Correo <span class="text-danger">*</span></label>
				<div class="col-md-6">
					<div class="input-group">
						<input type="text" id="correo" name="correo" class="form-control" placeholder="Correo del cliente..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="telefono">Teléfono <span class="text-danger">*</span></label>
				<div class="col-md-6">
					<div class="input-group">
						<input type="text" id="telefono" name="telefono" class="form-control" placeholder="Teléfono del cliente..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="telefono">Calle</label>
				<div class="col-md-6">
					<div class="input-group">
						<input type="text" id="calle" name="calle" class="form-control" placeholder="Calle de ubicación..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="numero">Numero</label>
				<div class="col-md-6">
					<div class="input-group">
						<input type="text" id="numero" name="numero" class="form-control" placeholder="Numero de ubicación..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="colonia">Colonia</label>
				<div class="col-md-6">
					<div class="input-group">
						<input type="text" id="colonia" name="colonia" class="form-control" placeholder="Colonia de ubicación..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="referencia">Referencia</label>
				<div class="col-md-6">
					<div class="input-group">
						<input type="text" id="referencia" name="referencia" class="form-control" placeholder="Referencia de ubicación..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="ciudad">Ciudad</label>
				<div class="col-md-6">
					<div class="input-group">
						<input type="text" id="ciudad" name="ciudad" class="form-control" placeholder="Ciudad..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="estado">Estado</label>
				<div class="col-md-6">
					<div class="input-group">
						<input type="text" id="estado" name="estado" class="form-control" placeholder="Estado..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="pais">País</label>
				<div class="col-md-6">
					<div class="input-group">
						<input type="text" id="pais" name="pais" class="form-control" placeholder="País..">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="detalles">Detalles</label>
				<div class="col-md-6">
					<div class="input-group">
						<textarea id="detalles" name="detalles" class="form-control" rows="6" placeholder="Detalles..."></textarea>
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
									echo '<option value="'.$tipo->clasificacion.'">'.$tipo->clasificacion.'</option>';
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
							<option value="1">Prioridad 1</option>
							<option value="2">Prioridad 2</option>
							<option value="3">Prioridad 3</option>
							<option value="4">Prioridad 4</option>
						</select>
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
					</div>
				</div>			 
			</div>
			<div class="form-group text-center">
					<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Guardar</button>
					<button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Limpiar</button>
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