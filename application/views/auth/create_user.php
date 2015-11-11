<div class="row">
	<div class="col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-2 site-block" >
		<div class="block">
			<div class="block-title">
				<h2>Editar <strong>Usuario</strong></h2>
			</div>
			<div class="row">

				<div id="infoMessage"><?php echo $message;?></div>
					<form class="form-horizontal form-bordered" action="<?= site_url('auth/create_user') ?> " method="post" accept-charset="utf-8">
						<div class="form-group">
						<label class="col-md-4 control-label" for="first_name"><?php echo lang('create_user_fname_label', 'first_name');?> </label>
						<div class="col-md-6">
							<div class="input-group">
								<?php echo form_input($first_name);?>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label" for="first_name"><?php echo lang('create_user_lname_label', 'last_name');?> </label>
						<div class="col-md-6">
							<div class="input-group">
								<?php echo form_input($last_name);?>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-4 control-label" for="first_name"><?php echo lang('create_user_company_label', 'company');?> </label>
						<div class="col-md-6">
							<div class="input-group">
								<?php echo form_input($company);?>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-4 control-label" for="first_name"><?php echo lang('create_user_email_label', 'email');?> </label>
						<div class="col-md-6">
							<div class="input-group">
								<?php echo form_input($email);?>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label" for="first_name"><?php echo lang('create_user_phone_label', 'phone');?> </label>
						<div class="col-md-6">
							<div class="input-group">
								<?php echo form_input($phone);?>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-4 control-label" for="password"><?php echo lang('create_user_password_label', 'password');?> </label>
						<div class="col-md-6">
							<div class="input-group">
								<?php echo form_input($password);?>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-4 control-label" for="password_confirm"><?php echo lang('create_user_password_confirm_label', 'password_confirm');?> </label>
						<div class="col-md-6">
							<div class="input-group">
								<?php echo form_input($password_confirm);?>
							</div>
						</div>
					</div>

					<div class="form-group form-actions" Style="  margin-left: 15px; margin-right: 15px;">
						<div class="col-xs-12 text-center">
							<?php echo form_submit(array( 'type'=>'submit','class'=>'btn btn-success'), lang('create_user_submit_btn'));?>
						</div>
					</div>

<?php echo form_close();?>
