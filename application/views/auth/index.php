<div class="content-header">
	<div class="header-section">
		<div class="widget">
			<div class="widget-simple">
			<a href="<?= site_url('auth/create_user') ?>" class="widget-icon pull-left themed-background-fire animation-fadeIn">
			<i class="fa fa-user-plus sidebar-nav-icon"></i>
			</a>
			<h1 class="widget-content text-letf animation-pullDown">
			<strong>Usuarios</strong>
			</h1>
			</div>
		</div>
	</div>
</div>
<ul class="breadcrumb breadcrumb-top">
	<li>Usuarios</li>
	<li><a href="">Registrados</a></li>
</ul>

<div class="block full">
	<div class="block-title">
		<h2>Información <strong>Usuarios</strong></h2>
		<div class="block-options pull-right">
			<a href="<?= site_url('auth/create_user') ?>" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="" data-original-title="Agregar Usuario"><i class="fa fa-plus"></i> Agregar Usuario</a>
		</div>
	</div>
	<div class="table-responsive">
		<table id="tabla_usuarios" class="table table-vcenter table-condensed table-bordered" cellpadding=0 cellspacing=10>
			<thead>
				<tr>
					<th class="text-center"><?php echo lang('index_fname_th');?></th>
					<th class="text-center"><?php echo lang('index_lname_th');?></th>
					<th class="text-center"><?php echo lang('index_email_th');?></th>
					<th class="text-center"><?php echo lang('index_groups_th');?></th>
					<th class="text-center"><?php echo lang('index_status_th');?></th>
					<th class="text-center"><?php echo lang('index_action_th');?></th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($users as $user):?>
				<tr>
					<td class="text-center"><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
					<td class="text-center"><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
					<td class="text-center"><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
					<td class="text-center">
						<?php foreach ($user->groups as $group):?>
							<label class="btn-sm btn-default"><?php echo htmlspecialchars($group->description,ENT_QUOTES,'UTF-8'); ?></label><br />
						<?php endforeach?>
					</td>
					<td class="text-center">
						<?php 
						if($user->active == true){
							echo '<a href="'.site_url('auth/deactivate/'.$user->id).'" class="btn-sm btn-success">'.lang('index_active_link').'</a>';
						}else{
							echo '<a href="'.site_url('auth/activate/'. $user->id).'" class="btn-sm btn-warning">'.lang('index_inactive_link').'</a>';
						} ?></td>
					<td class="text-center"><?php echo anchor("auth/edit_user/".$user->id, 'Edit') ;?></td>
				</tr>
			<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>

<script src="<?= asset_url('js/pages/tablausuarios.js') ?>"></script>
<script>$(function(){ TablesDatatables.init(); });</script>