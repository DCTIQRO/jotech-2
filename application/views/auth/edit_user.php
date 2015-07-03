<div class="row">
	<div class="col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-2 site-block" >
		<div class="block">
			<div class="block-title">
				<h2>Editar <strong>Usuario</strong></h2>
			</div>
			<div class="row">

				<div id="infoMessage"><?php echo $message;?></div>

				<form class="form-horizontal form-bordered" action="<?= site_url('auth/edit_user/'.$user->id) ?> " method="post" accept-charset="utf-8">

					<div class="form-group">
						<label class="col-md-4 control-label" for="first_name"><?php echo lang('edit_user_fname_label', 'first_name');?> </label>
						<div class="col-md-6">
							<div class="input-group">
								<?php echo form_input($first_name);?>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label" for="first_name"><?php echo lang('edit_user_lname_label', 'last_name');?> </label>
						<div class="col-md-6">
							<div class="input-group">
								<?php echo form_input($last_name);?>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label" for="first_name"><?php echo lang('edit_user_company_label', 'company');?> </label>
						<div class="col-md-6">
							<div class="input-group">
								<?php echo form_input($company);?>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label" for="first_name"><?php echo lang('edit_user_phone_label', 'phone');?> </label>
						<div class="col-md-6">
							<div class="input-group">
								<?php echo form_input($phone);?>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-6 control-label" for="first_name"><?php echo lang('edit_user_password_label', 'password');?> </label>
						<div class="col-md-6">
							<div class="input-group">
								<?php echo form_input($password);?>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-6 control-label" for="first_name"><?php echo lang('edit_user_password_confirm_label', 'password_confirm');?></label>
						<div class="col-md-6">
							<div class="input-group">
								<?php echo form_input($password_confirm);?>
							</div>
						</div>
					</div>
					<div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3  site-block" >
						<?php if ($this->ion_auth->is_admin()): ?>
							<h3 class="text-center"><?php echo lang('edit_user_groups_heading');?></h3>
							<div class="col-xs-6 col-xs-offset-3 site-block" >
								<?php foreach ($groups as $group):?>
									<label class="checkbox">
										<?php
											$gID=$group['id'];
											$checked = null;
											$item = null;
											foreach($currentGroups as $grp) {
												if ($gID == $grp->id) {
													$checked= ' checked="checked"';
													break;
												}
											}
										?>
										<input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
										<?php echo htmlspecialchars($group['description'],ENT_QUOTES,'UTF-8');?>
									</label>
								<?php endforeach?>
							</div>
						<?php endif ?>

						<?php echo form_hidden('id', $user->id);?>
						<?php echo form_hidden($csrf); ?>
						
						<div class="col-xs-12 text-center"><br /><?php echo form_submit(array('type' => 'submit', 'class' => 'btn btn-success'), lang('edit_user_submit_btn'));?></div>
					</div>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</div>
