<div class="row">
	<div class="col-xs-12" >
		<div class="block">
			<?php $this->load->view('basic/tabs_cliente') ?>
			<div class="row">
				<form class="form-horizontal form-bordered" id="new_cliente" method="post" action="<?= site_url('clientes/guardar_contacto') ?>">
					<div class="form-group">
						<label class="col-sm-2 control-label" for="nombre">Nombre <span class="text-danger">*</span></label>
						<div class="col-sm-4 ">
							<div class="input-group">
								<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre del contacto..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
						<label class="col-sm-2 control-label" for="direccion">Dirección </label>
						<div class="col-sm-4 ">
							<div class="input-group">
								<input type="text" id="direccion" name="direccion" class="form-control" placeholder="Dirección del contacto..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" for="telefono">Teléfono </label>
						<div class="col-sm-4 ">
							<div class="input-group">
								<input type="text" id="telefono" name="telefono" class="form-control" placeholder="Teléfono del contacto..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
						<label class="col-sm-2 control-label" for="correo">Correo </label>
						<div class="col-sm-4 ">
							<div class="input-group">
								<input type="text" id="correo" name="correo" class="form-control" placeholder="Correo del contacto..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" for="puesto">Puesto </label>
						<div class="col-sm-4 ">
							<div class="input-group">
								<input type="text" id="puesto" name="puesto" class="form-control" placeholder="Puesto en la empresa..">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
						<label class="col-sm-2 control-label" for="clasificacion">Clasificación</label>
						<div class="col-sm-4 ">
							<div class="input-group">
								<select id="clasificacion" name="clasificacion[]" class="select-chosen form-control" data-placeholder="Selecciona una clasificación.." multiple >
									<?php 
										$options="";
										foreach($clasificaciones as $clasificacion)
										{
											echo '<option value="'.$clasificacion->id.'" selected>'.$clasificacion->nombre.'</option>';
										}
									?>
								</select>
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="activo">Status</label>
						<div class="col-sm-4 ">
							<div class="input-group">
								<select id="activo" name="activo" class="select-chosen form-control" data-placeholder="Selecciona un status.." >
									<option value="1">Puede no estar al corriente</option>
									<option value="2">Conoce de los proyectos</option>
									<option value="3">Recomienda</option>
									<option value="4"> Participa en la decisión</option>
								</select>
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
						<label class="col-sm-2 control-label" for="activ2o">Status 2</label>
						<div class="col-sm-4 ">
							<div class="input-group">
								<select id="activo2" name="activo2" class="select-chosen form-control" data-placeholder="Selecciona un status 2.." >
									<option value="1">Ex trabajador</option>
									<option value="2">No nos conoce</option>
									<option value="3">Sí nos conoce: Es contacto principal</option>
								</select>
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="comentario">Comentarios </label>
						<div class="col-sm-10 ">
							<div class="input-group">
								<textarea id="comentario" name="comentario" rows="5" class="form-control" placeholder="Comentarios.."></textarea>
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
							</div>
						</div>
					</div>
					<input type="hidden" name="id_cliente" id="id_cliente" value="<?= $id_cliente ?>" />
						
					<div class="form-group text-center">
						<a href="<?= site_url('clientes/contacto/'.$id_cliente) ?>" class="btn btn-sm btn-info"><i class="fa fa-reply"></i> Regresar</a>
						<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Guardar</button>
						<button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Limpiar</button>
					</div>			
				</form>
			</div>
		</div>
	</div>
</div>