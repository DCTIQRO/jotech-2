<ul class="breadcrumb breadcrumb-top">
	<a href="<?= site_url('clientes/ver/'.$datos_cliente->id) ?>" Style="float:left; margin-right:100px; padding-top:10px"><?= $datos_cliente->nombre ?></a>
	<ul class="nav nav-pills">
		<li><a href="<?= site_url('clientes/ver/'.$datos_cliente->id) ?>">Detalles</a></li>
		<li class="active"><a href="<?= site_url('proyectos/cliente/'.$datos_cliente->id) ?>">Proyectos</a></li>
		<li><a href="<?= site_url('tareas/cliente/'.$datos_cliente->id) ?>">Tareas</a></li>
		<li><a href="<?= site_url('clientes/contacto/'.$datos_cliente->id) ?>">Contactos</a></li>
		<li><a href="<?= site_url('bitacora/cliente/'.$datos_cliente->id) ?>">Bitacora</a></li>
	</ul>
</ul>
<ul class="breadcrumb breadcrumb-top">
	<div class="block-options pull-right">
		<div class="btn-group btn-group-sm">
			<a href="javascript:void(0)" class="btn btn-alt btn-sm btn-info dropdown-toggle enable-tooltip" data-toggle="dropdown" title="" data-original-title="Options" aria-expanded="false"><span class="caret"></span></a>
			<ul class="dropdown-menu dropdown-custom dropdown-menu-right">
				<li>
					<?php
					if($status == 1){
					?>
					<a href="<?= site_url('proyectos/cerrar_proyecto/'.$id_proyecto); ?>"><i class="gi gi-cloud pull-right"></i>Cerrar Proyecto</a>
					<?php 
					}
					else
					{
					?>
					<a href="<?= site_url('proyectos/abrir_proyecto/'.$id_proyecto); ?>"><i class="gi gi-cloud pull-right"></i>Abrir Proyecto</a>
					<?php	
					}
					?>
					<a href="<?= site_url('proyectos/cliente/'.$cliente); ?>"><i class="gi gi-airplane pull-right"></i>Proyectos del Cliente</a>
				</li>
				<li class="divider"></li>
				<li>
					<a href="<?= site_url('proyectos'); ?>"><i class="fa fa-wrench fa-fw pull-right"></i>Todos los Proyectos</a>
				</li>
			</ul>
		</div>
	</div>
	<a href="<?= site_url('proyectos/ver_proyecto/'.$id_proyecto) ?>" Style="float:left; margin-right:100px; padding-top:10px"><?= $titulo ?></a>
	<ul class="nav nav-pills">
		<li><a href="javascript:void(0)" onClick="despliega_detalles()">Detalles <span id="desplegar_detalles"><i class="fa fa-chevron-down"></i></span></a></li>
		<li><a href="javascript:void(0)" onClick="despliega_usuarios()">Usuarios <span id="desplegar_usuario"><i class="fa fa-chevron-down"></i></span></a></li>
		<li><a href="javascript:void(0)" onClick="despliega_contactos()">Contactos <span id="desplegar_contacto"><i class="fa fa-chevron-down"></i></span></a></li>
		<li><a href="javascript:void(0)" onClick="despliega_tareas()">Tareas <span id="desplegar_tarea"><i class="fa fa-chevron-down"></i></span></a></li>
		<li><a href="javascript:void(0)" onClick="despliega_anexos()">Anexos <span id="desplegar_anexo"><i class="fa fa-chevron-down"></i></span></a></li>
		<div class="col-xs-4">
		<label class="control-label col-xs-2">División</label><div class="col-xs-4"><input class="form-control" id="divisor" value="<?= $divisor ?>" placeholder="Divisor" /></div>
		<label class="control-label col-xs-2">Avisador</label><div class="col-xs-4"><input class="form-control" id="avisador" value="<?= $avisador ?>" placeholder="Avisador" /></div>
		</div>
	</ul>
</ul>
<div class="row">
	<div class="col-sm-12">
		<div class="block full hidden" id="detalles_proyectos">
			<div class="block-title">
				<h2>Detalles del <strong><?= $titulo ?></strong></h2>
			</div>
			<div class="row">
				<div class="col-xs-12 text-center">
					<div class="list-group-item">
						<a href="<?= site_url('proyectos/editar_descripcion/'.$id_proyecto) ?>" class="badge fancybox fancybox.iframe"><i class="fa fa-pencil"></i>  Editar</a>
						<h4 class="list-group-item-heading"><strong>Descripción</strong></h4>
						<p class="list-group-item-text"><?= $descripcion ?></p>
					</div>
					
					<div class="col-xs-12" Style="border:1px solid #ddd; padding-top:10px; padding-bottom:10px; margin-top:15px">
						<div class="col-xs-12">
							<div class="col-sm-4 col-xs-6 col-sm-offset-4 text-center">
								<h4><strong>Clasificación</strong></h4>
							</div>
							<div class="col-sm-4 col-xs-6 text-right">
								<a href="<?= site_url('proyectos/editar_clasificaciones/'.$id_proyecto) ?>" class="badge fancybox fancybox.iframe"><i class="fa fa-pencil"></i>  Editar</a>
							</div>
						</div>
						<?php 
							foreach($clasificaciones as $clasificacion){
								$prioridad="";
								if($clasificacion->prioridad == "3")$prioridad="Alta";
								if($clasificacion->prioridad == "2")$prioridad="Mediana";
								if($clasificacion->prioridad == "1")$prioridad="Baja";
						?>
								<div class="col-xs-12 col-sm-4 col-md-3">
									<div class="list-group-item">
										<span class="badge">Prioridad  <?= $prioridad ?></span>
										<h4 class="list-group-item-heading"></h4><br>
										<p class="list-group-item-text"><strong><h4><?= $clasificacion->nombre ?><h4></strong></p>
									</div>
								</div>
						<?php
							}
						?>
					</div>
					
				</div>
			</div>
		</div>
		<div class="block full hidden" id="usuarios_proyectos">
			<div class="block-title">
				<h2>Usuarios del <strong><?= $titulo ?></strong></h2>
			</div>
			<div class="row">
				<div class="col-xs-4 col-xs-offset-4 text-center">
					<form action="<?= site_url('proyectos/asignar_usuario') ?>" class="form-horizontal form-bordered" method="post" accept-charset="utf-8" >
						<div class="form-group">
							<?php
							$options[''] ='Selecciona un Usuario';
							if(!empty($usuarios)){
								foreach($usuarios as $usuario){
									$options[$usuario->id] =  ($usuario->first_name)." ".$usuario->last_name;
								}
							}
							?>
							<div class="col-xs-12">
								<?= form_dropdown('usuarios', $options, '','class="form-control select-chosen" id="usuarios"'); ?>
							</div>
						</div>	
						<div class="form-group">
							<div class="col-xs-12 text-center">
								<a href="javascript:void(0)" onClick="asignar()" class="btn-sm btn-success" />Agregar</a>
							</div>
						</div>	
						<input type="hidden" id="id_proyecto" name="id_proyecto" value="<?= $id_proyecto ?>" />
					</form>
					<div class="row">
						<hr class="style-four">
					</div>
					<form class="form-horizontal form-bordered">
						<?php
						if(!empty($asignados)){
							foreach($asignados as $asignado){
						?>
								<div class="form-group text-center">
									<label class="label-control"><?= ($asignado->first_name)." ".$asignado->last_name ?></label>
									<a href="<?= site_url('proyectos/desasignar_usuario/'.($asignado->id)."/".$id_proyecto) ?>" class="btn-sm btn-danger pull-right"><i class="fa fa-times"></i></a>
								</div>
						<?php	
							}
						}
						?>
					</form>
				</div>
			</div>
		</div>
		<div class="block full hidden" id="contactos_proyectos">
			<div class="block-title">
				<h2>Contactos del <strong><?= $titulo ?></strong></h2>
			</div>
			<div class="row">
				<div class="col-xs-4 col-xs-offset-4 text-center">
					<form action="<?= site_url('proyectos/asignar_contacto') ?>" class="form-horizontal form-bordered" method="post" accept-charset="utf-8" >
						<div class="form-group">
							<?php
							$options2[''] ='Selecciona un Contacto';
							if(!empty($usuarios)){
								foreach($contactos as $contacto){
									$options2[$contacto->id] =  ($contacto->nombre);
								}
								foreach($contactos_all as $contacto){
									$options2[$contacto->id] =  ($contacto->nombre);
								}
							}
							?>
							<div class="col-xs-12">
								<?= form_dropdown('contactos', $options2, '','class="form-control select-chosen" id="contactos"'); ?>
							</div>
						</div>	
						<div class="form-group">
							<div class="col-xs-12 text-center">
								<a href="javascript:void(0)" onClick="asignar2()" class="btn-sm btn-success" />Agregar</a>
							</div>
						</div>	
						<input type="hidden" id="id_proyecto" name="id_proyecto" value="<?= $id_proyecto ?>" />
					</form>
				</div>
				<div class="col-xs-8 col-xs-offset-2 text-center">
					<div class="table-responsive">
						<table id="tabla_contactos" class="table table-vcenter table-condensed table-bordered">
							<thead>
								<tr>
									<th class="text-center">Nombre</th>
									<th class="text-center">Teléfono</th>
									<th class="text-center">Correo</th>
									<th class="text-center">Acciones</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if(!empty($asignados)){
									foreach($asignados_contactos as $asignado_contacto){
								?>
								<tr>
									<td class="text-center"><?= $asignado_contacto->nombre ?></td>
									<td class="text-center"><?= $asignado_contacto->telefono ?></td>
									<td class="text-center"><?= $asignado_contacto->correo ?></td>
									<td class="text-center"><a href="<?= site_url('proyectos/desasignar_contacto/'.($asignado_contacto->id)."/".$id_proyecto) ?>" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a></td>
								</tr>
								<?php	
									}
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		
		<div class="block full hidden" id="tareas_proyectos">
			<div class="block-title">
				<h2>Tareas del <strong><?= $titulo ?></strong></h2>
			</div>
			<div class="row">
				<div class="col-xs-6 col-xs-offset-3 text-center">
					<form id="nueva_tarea" action="<?= site_url('proyectos/crear_tarea_proyecto') ?>" class="form-horizontal form-bordered hidden animation-pullDown" method="post" accept-charset="utf-8">
						<div class="form-group">
							<div class="col-xs-12 ">
								<div class="input-group">
									<input type="text" id="nombre_tarea" name="nombre_tarea" required class="form-control" placeholder="Nombre de la Tarea">
									<span class="input-group-addon"><i class="gi gi-user"></i></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-12 ">
								<div class="input-group">
									<textarea id="descripcion_tarea" name="descripcion_tarea" class="form-control" rows="2" placeholder="Descripción de la Tarea"></textarea>
									<span class="input-group-addon"><i class="gi gi-user"></i></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-12 ">
								<div class="input-group">
									<input type="text" id="fecha_inicio" name="fecha_inicio" required class="form-control input-datepicker" data-date-format="dd/mm/yyyy" placeholder="Fecha Inicio">
									<span class="input-group-addon"><i class="gi gi-user"></i></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-12 ">
								<div class="input-group">
									<input type="text" id="fecha_fin" name="fecha_fin" required class="form-control input-datepicker" data-date-format="dd/mm/yyyy" placeholder="Fecha Fin">
									<span class="input-group-addon"><i class="gi gi-user"></i></span>
								</div>
							</div>
						</div>
						<?php
							if(!empty($asignados)){
								foreach($asignados as $asignado){
									$users[$asignado->id] =  ($asignado->first_name)." ".$asignado->last_name;
								}
							}
						?>
						<div class="form-group">
							<div class="col-xs-12 ">
								<div class="input-group">
									<?= form_multiselect('usuarios_tarea[]', $users, '','class="form-control select-chosen" id="usuarios_tarea" data-placeholder="Selecciona un usuario" '); ?>
									<span class="input-group-addon"><i class="gi gi-user"></i></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-6 col-xs-offset-4 ">
								<input type="submit" class="btn-sm btn-success" value="Guardar Tarea" />
							</div>
						</div>
						<input type="hidden" id="proyecto" name="proyecto" value="<?= $id_proyecto ?>" />
					</form>
				</div>
				<div class="col-xs-12 text-center">
					<a id="boton-tarea" href="javascript:void(0)" onClick="agregar_tarea()" class="btn-sm btn-success" />Nueva Tarea</a>
					<br><br>
				</div>
				<div class="col-xs-8 col-xs-offset-2">
					<div class="table-responsive">
						<table id="tabla_tareas_proyectos" class="table table-vcenter table-condensed table-bordered">
							<thead>
								<tr>
									<th class="text-center">Tarea</th>
									<th class="text-center">Descripción</th>
									<th class="text-center">Inicio</th>
									<th class="text-center">Fin</th>
									<th class="text-center">Status</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if(!empty($tareas)){
									$i=0;
									foreach($tareas as $tarea){
										$check="";
										if($tarea->estatus == 1){$check="checked";}
								?>
								<tr>
									<td class="text-center"><a href="<?= site_url('tareas_proyectos/ver_tarea/'.$tarea->id) ?>"><?= $tarea->nombre ?></a></td>
									<td class="text-center"><?= $tarea->descripcion ?></td>
									<?php list($año,$mes,$dia)=explode('-',$tarea->fecha_inicio) ?>
									<?php list($año2,$mes2,$dia2)=explode('-',$tarea->fecha_fin) ?>
									<td class="text-center"><input type="text" class="text-center input-datepicker" data-date-format="dd-mm-yyyy" id="inicio<?= $tarea->id ?>" value="<?= $dia."-".$mes."-".$año ?>" onchange="cambiar_inicio(<?= $tarea->id ?>)" Style="border:0px"/></td>
									<td class="text-center"><input type="text" class="text-center input-datepicker" data-date-format="dd-mm-yyyy" id="fin<?= $tarea->id ?>" value="<?= $dia2."-".$mes2."-".$año2 ?>" onchange="cambiar_fin(<?= $tarea->id ?>)" Style="border:0px"/></td>
									<td class="text-center">
										<section>  
										  <!-- Squared TWO -->
										  <div class="squaredTwo">
											<input type="checkbox" value="None" id="squaredTwo<?= $i ?>" name="check<?= $i ?>" <?= $check ?> onChange="estado(<?= $tarea->id ?>)" />
											  <label for="squaredTwo<?= $i ?>"></label>
										  </div>
										</section>
									</td>
								</tr>
								<?php
									$i++;
									}
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="block full hidden" id="anexos_proyectos">
			<div class="block-title">
				<h2>Archivos del <strong><?= $titulo ?></strong></h2>
			</div>
			<div class="row">
				<form action="<?= site_url('proyectos/upload/'.$id_proyecto) ?>" class="dropzone"></form>
			</div>
			<div class="row">
				<hr class="style-four">
			</div>
			<div class="row">
				<?php
				foreach($archivos as $archivo)
				{
					$extension = extension($archivo->archivo);
					
					if($extension == 'jpg' || $extension == 'png' || $extension == 'gif' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'GIF' )
					{
					?>
					<div class="col-xs-6 col-sm-4 col-md-2">
						<a class="widget widget-hover-effect1" href="<?= site_url('proyectos/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/camera.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
						<div class="col-xs-12 text-center" Style="margin-top:10px">
							<a href="<?= site_url('proyectos/borrar_archivo/'.$archivo->id) ?>" class="btn btn-sm btn-danger confirm" data-title="Confirmar Eliminación de Clasificación"  data-text="Esta seguro de eliminar el archivo <?= $archivo->archivo ?>" data-confirm-button="Si" data-cancel-button="No" ><i class="fa fa-trash-o"></i> Eliminar</a>
						</div>
					</div>
					<?php 
					}
					else if($extension == 'mp3' || $extension == 'MP3' || $extension == 'wav' || $extension == 'WAV' || $extension == 'arm' || $extension == 'ARM' || $extension == 'wmv' || $extension == 'WMV' )
					{
					?>
					<div class="col-xs-6 col-sm-4 col-md-2">
						<a class="widget widget-hover-effect1" href="<?= site_url('proyectos/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/audio.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
						<div class="col-xs-12 text-center" Style="margin-top:10px">
							<a href="<?= site_url('proyectos/borrar_archivo/'.$archivo->id) ?>" class="btn btn-sm btn-danger confirm" data-title="Confirmar Eliminación de Clasificación"  data-text="Esta seguro de eliminar el archivo <?= $archivo->archivo ?>" data-confirm-button="Si" data-cancel-button="No" ><i class="fa fa-trash-o"></i> Eliminar</a>
						</div>
					</div>
					<?php 
					}
					else if($extension == 'doc' || $extension == 'DOC' || $extension == 'docx' || $extension == 'DOCX')
					{
					?>
					<div class="col-xs-6 col-sm-4 col-md-2">
						<a class="widget widget-hover-effect1" href="<?= site_url('proyectos/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/Word.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
						<div class="col-xs-12 text-center" Style="margin-top:10px">
							<a href="<?= site_url('proyectos/borrar_archivo/'.$archivo->id) ?>" class="btn btn-sm btn-danger confirm" data-title="Confirmar Eliminación de Clasificación"  data-text="Esta seguro de eliminar el archivo <?= $archivo->archivo ?>" data-confirm-button="Si" data-cancel-button="No" ><i class="fa fa-trash-o"></i> Eliminar</a>
						</div>
					</div>
					<?php 
					}
					else if($extension == 'xls' || $extension == 'XLS' || $extension == 'xlsx' || $extension == 'XLSX')
					{
					?>
					<div class="col-xs-6 col-sm-4 col-md-2">
						<a class="widget widget-hover-effect1" href="<?= site_url('proyectos/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/Excel.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
						<div class="col-xs-12 text-center" Style="margin-top:10px">
							<a href="<?= site_url('proyectos/borrar_archivo/'.$archivo->id) ?>" class="btn btn-sm btn-danger confirm" data-title="Confirmar Eliminación de Clasificación"  data-text="Esta seguro de eliminar el archivo <?= $archivo->archivo ?>" data-confirm-button="Si" data-cancel-button="No" ><i class="fa fa-trash-o"></i> Eliminar</a>
						</div>
					</div>
					<?php 
					}
					else if($extension == 'ppt' || $extension == 'PPT' || $extension == 'pptx' || $extension == 'pptx')
					{
					?>
					<div class="col-xs-6 col-sm-4 col-md-2">
						<a class="widget widget-hover-effect1" href="<?= site_url('proyectos/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/PowerPoint.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
						<div class="col-xs-12 text-center" Style="margin-top:10px">
							<a href="<?= site_url('proyectos/borrar_archivo/'.$archivo->id) ?>" class="btn btn-sm btn-danger confirm" data-title="Confirmar Eliminación de Clasificación"  data-text="Esta seguro de eliminar el archivo <?= $archivo->archivo ?>" data-confirm-button="Si" data-cancel-button="No" ><i class="fa fa-trash-o"></i> Eliminar</a>
						</div>
					</div>
					<?php 
					}
					else if($extension == 'pdf' || $extension == 'PDF')
					{
					?>
					<div class="col-xs-6 col-sm-4 col-md-2">
						<a class="widget widget-hover-effect1" href="<?= site_url('proyectos/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/pdf.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
						<div class="col-xs-12 text-center" Style="margin-top:10px">
							<a href="<?= site_url('proyectos/borrar_archivo/'.$archivo->id) ?>" class="btn btn-sm btn-danger confirm" data-title="Confirmar Eliminación de Clasificación"  data-text="Esta seguro de eliminar el archivo <?= $archivo->archivo ?>" data-confirm-button="Si" data-cancel-button="No" ><i class="fa fa-trash-o"></i> Eliminar</a>
						</div>
					</div>
					<?php 
					}
					else if($extension == 'txt' || $extension == 'TXT')
					{
					?>
					<div class="col-xs-6 col-sm-4 col-md-2">
						<a class="widget widget-hover-effect1" href="<?= site_url('proyectos/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/text.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
						<div class="col-xs-12 text-center" Style="margin-top:10px">
							<a href="<?= site_url('proyectos/borrar_archivo/'.$archivo->id) ?>" class="btn btn-sm btn-danger confirm" data-title="Confirmar Eliminación de Clasificación"  data-text="Esta seguro de eliminar el archivo <?= $archivo->archivo ?>" data-confirm-button="Si" data-cancel-button="No" ><i class="fa fa-trash-o"></i> Eliminar</a>
						</div>
					</div>
					<?php 
					}
					else
					{
					?>
					<div class="col-xs-6 col-sm-4 col-md-2">
						<a class="widget widget-hover-effect1" href="<?= site_url('proyectos/descargar/'.($archivo->archivo)."/".$archivo->url) ?>">
							<div class="col-xs-12 imagen_fondo" Style="background-image:url('<?= asset_url('images/iconos/file_search.png') ?>'); height:100px" ></div>
							<div class="col-xs-12 text-center" Style="text-shadow:0px 0px 5px #389096; color:#46B7BF" ><strong><?= $archivo->archivo ?></strong></div>
						</a>
						<div class="col-xs-12 text-center" Style="margin-top:10px">
							<a href="<?= site_url('proyectos/borrar_archivo/'.$archivo->id) ?>" class="btn btn-sm btn-danger confirm" data-title="Confirmar Eliminación de Clasificación"  data-text="Esta seguro de eliminar el archivo <?= $archivo->archivo ?>" data-confirm-button="Si" data-cancel-button="No" ><i class="fa fa-trash-o"></i> Eliminar</a>
						</div>
					</div>
					<?php 
					}
					?>
				<?php
				}
				?>
			</div>
		</div>
		<div class="block full">
			<div class="block-title">
				<h2>Bitacora <strong><?= $titulo ?></strong></h2>
			</div>
			<div class="row">
				<form action="<?= site_url('proyectos/guardar_bitacora') ?>" class="form-horizontal form-bordered" method="post" accept-charset="utf-8" >
					<div class="form-group">
						<div class="col-xs-12 col-sm-10 text-center">
							<label class="label-control col-xs-12 col-sm-10" for="comentario">Comentario</label>
							<label class="label-control col-xs-12 col-sm-2" for="fecha">Fecha Actividad</label>
							<div class="col-xs-12 col-sm-10">
								<textarea class="form-control ckeditor" rows="3" id="comentario" name="comentario" required placeholder="Escribe un comentario" value="<?= set_value('comentario') ?>" ></textarea>
							</div>
							<div class="col-xs-12 col-sm-2">
								<input type="text" class="form-control input-datepicker" data-date-format="dd-mm-yyyy" id="fecha" name="fecha" required placeholder="dd-mm-yyyy" value="<?= set_value('fecha') ?>" />
							</div>
						</div>
						<div class="col-xs-12 col-sm-2 text-center">
							<input type="submit" class="btn-sm btn-success" value="Guardar"/>
						</div>
						<div class="col-xs-12 text-center"><?php echo form_error('comentario'); ?></div>
						<div class="col-xs-12 text-center"><?php echo form_error('fecha'); ?></div>
					</div>	
					<input type="hidden" id="id_proyecto" name="id_proyecto" value="<?= $id_proyecto ?>" />
				</form>
			</div>
			<div class="row">
				<div class="table-responsive">
					<table id="tabla_bitacora_proyectos" class="table table-vcenter table-condensed table-bordered">
						<thead>
							<tr>
								<th class="text-center">Fecha</th>
								<th class="text-center">Descripción</th>
								<th class="text-center">Usuario</th>
								<th class="text-center">Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach($bitacoras as $bitacora)
							{
								list($año,$mes,$dia)=explode("-",$bitacora->fecha_actividad);
							?>
							<tr>
								<td class="text-center"><input type="text" class="form-control input-datepicker" data-date-format="dd-mm-yyyy" id="fecha<?= $bitacora->id_bitacora  ?>" onBlur="cambiarFecha(<?= $bitacora->id_bitacora ?>)" placeholder="dd-mm-yyyy" value="<?= $dia."-".$mes."-".$año ?>" /></td>
								<td><?= $bitacora->comentario?></td>
								<td class="text-center"><?= ($bitacora->first_name)." ".$bitacora->last_name ?></td>
								<td class="text-center">
									<?php
									if($this->session->userdata('user_id') == $bitacora->id_usuario && $bitacora->tipo != 2){
									?>
									<a href="<?= site_url('proyectos/editar_bitacora_proyecto/'.$bitacora->id_comentario) ?>" class="fancybox fancybox.iframe" data-toggle="tooltip" data-original-title="Editar" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
									<a href="<?= site_url('proyectos/eliminar_bitacora_proyecto/'.$bitacora->id_comentario."/".$id_proyecto) ?>" data-toggle="tooltip" data-original-title="Eliminar" class="btn btn-xs btn-default"><i class="fa fa-trash-o"></i></a>
									<?php
									}
									?>
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
<!--ckeditor-->
<script src="//cdn.ckeditor.com/4.5.2/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'comentario', {
    customConfig: '<?= asset_url('js/helpers/config ckeditor/config.js') ?>'
} );
</script>

<script src="<?= asset_url('js/pages/tablabitacoraproyectos.js') ?>"></script>
<script>$(function(){ TablesDatatables.init(); });</script>

<script>
function despliega_tareas()
{
	if($('#tareas_proyectos').hasClass('hidden')){
		$('#tareas_proyectos').removeClass('hidden');
		$('#desplegar_tarea').html('<i class="fa fa-chevron-up"></i>');
	}
	else{
		$('#tareas_proyectos').addClass('hidden');
		$('#desplegar_tarea').html('<i class="fa fa-chevron-down"></i>');
	}
}

function despliega_contactos()
{
	if($('#contactos_proyectos').hasClass('hidden')){
		$('#contactos_proyectos').removeClass('hidden');
		$('#desplegar_contacto').html('<i class="fa fa-chevron-up"></i>');
	}
	else{
		$('#contactos_proyectos').addClass('hidden');
		$('#desplegar_contacto').html('<i class="fa fa-chevron-down"></i>');
	}
}

function despliega_detalles()
{
	if($('#detalles_proyectos').hasClass('hidden')){
		$('#detalles_proyectos').removeClass('hidden');
		$('#desplegar_detalles').html('<i class="fa fa-chevron-up"></i>');
	}
	else{
		$('#detalles_proyectos').addClass('hidden');
		$('#desplegar_detalles').html('<i class="fa fa-chevron-down"></i>');
	}
}

function despliega_usuarios()
{
	if($('#usuarios_proyectos').hasClass('hidden')){
		$('#usuarios_proyectos').removeClass('hidden');
		$('#desplegar_usuario').html('<i class="fa fa-chevron-up"></i>');
	}
	else{
		$('#usuarios_proyectos').addClass('hidden');
		$('#desplegar_usuario').html('<i class="fa fa-chevron-down"></i>');
	}
}

function despliega_anexos()
{
	if($('#anexos_proyectos').hasClass('hidden')){
		$('#anexos_proyectos').removeClass('hidden');
		$('#desplegar_anexo').html('<i class="fa fa-chevron-up"></i>');
	}
	else{
		$('#anexos_proyectos').addClass('hidden');
		$('#desplegar_anexo').html('<i class="fa fa-chevron-down"></i>');
	}
}
</script>
<script>
function asignar()
{
	if($('#usuarios').val() != ""){
		$.post("<?= site_url('proyectos/asignar_usuario') ?>",{
				usuario: $('#usuarios').val(),
				id_proyecto: $('#id_proyecto').val(),
			}, function(result){
			//console.log(result);
			location.reload(true);
		});
	}
	else
	{
		alert('No ha seleccionado un usuario');
	}
}

function asignar2()
{
	if($('#contactos').val() != ""){
		$.post("<?= site_url('proyectos/asignar_contacto') ?>",{
				usuario: $('#contactos').val(),
				id_proyecto: $('#id_proyecto').val(),
			}, function(result){
			//console.log(result);
			location.reload(true);
		});
	}
	else
	{
		alert('No ha seleccionado un usuario');
	}
}

function agregar_tarea()
{
	$('#nueva_tarea').removeClass('hidden');
	$('#boton-tarea').addClass('hidden');
}

function estado(tarea)
{
	$.post("<?= site_url('proyectos/cambiar_estado_tarea') ?>"+"/"+tarea, {id_proyecto:<?= $id_proyecto ?>}, function(result){
        console.log(result);
    });
}
$(".input-datepicker").datepicker({
	autoclose:true,
});
function cambiarFecha(id)
{
	$.post("<?= site_url('proyectos/cambiar_fecha') ?>", {
		id_bitacora: id, 
		fecha:$('#fecha'+id).val()
	}, function(result){
       console.log(result);
    });
}

function cambiar_inicio(id)
{
	$.post("<?= site_url('proyectos/cambiar_inicio_tarea') ?>", {
		id_tarea: id, 
		fecha:$('#inicio'+id).val()
	}, function(result){
       console.log(result);
    });
}
function cambiar_fin(id)
{
	$.post("<?= site_url('proyectos/cambiar_fin_tarea') ?>", {
		id_tarea: id, 
		fecha:$('#fin'+id).val()
	}, function(result){
       console.log(result);
    });
}
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox({
			maxWidth	: 800,
			maxHeight	: 600,
			fitToView	: false,
			width		: '100%',
			height		: '70%',
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none'
		});
	});
</script>

<script>
$( document ).ready(function() {
    $( "#comentario" ).focus();
    $( ".confirm" ).confirm();
});
</script>

<script>
$( "#divisor" ).change(function() {
	$.post( "<?= site_url('proyectos/divisor/'.$id_proyecto) ?>", {divisor:$('#divisor').val()}, function( data ) {
		console.log(data);
	});
});

$( "#avisador" ).change(function() {
	$.post( "<?= site_url('proyectos/avisador/'.$id_proyecto) ?>", {avisor:$('#avisador').val()}, function( data ) {
		console.log(data);
	});
});
</script>
