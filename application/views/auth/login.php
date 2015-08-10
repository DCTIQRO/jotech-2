<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>Administrador Jotech</title>

        <meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
		
		
		<?php
			$cssface=array('css/bootstrap.min.css','css/plugins.css','css/main.css','css/themes.css');
			foreach($cssface as $url)

			{
				echo '<link rel="stylesheet" href="'.asset_url($url).'" />';
			}
		 ?>
		<script src="<?= asset_url('js/vendor/modernizr-respond.min.js') ?>"></script>
    </head>
    <body>
	
		<div id="login-background">
            <!-- For best results use an image with a resolution of 2560x400 pixels (prefer a blurred image for smaller file size) -->
            <img src="<?= asset_url('img/placeholders/headers/login_header.jpg') ?>" alt="Login Background" class="animation-pulseSlow">
        </div>
		
		<div id="login-container" class="animation-fadeIn">
            <!-- Login Title -->
            <div class="login-title text-center">
				<h1><i class="gi gi-flash"></i> <strong><?php echo lang('login_heading');?></strong><br>
				<small><?php echo lang('login_subheading');?></small></h1>
				<div id="infoMessage"><?php echo $message;?></div>
            </div>
            <!-- END Login Title -->

            <!-- Login Block -->
            <div class="block push-bit">
                <!-- Login Form -->
				<?php $atributos=array('id'=>'form-login', 'class'=>'form-horizontal form-bordered form-control-borderless', 'method'=>'post'); ?>
				<?php echo form_open("auth/login",$atributos);?>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
								<?php echo form_input($identity);?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
								<?php echo form_input($password);?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-4">
                            <label class="switch switch-primary" data-toggle="tooltip" title="Recuerdame?">
								<?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                                <span></span>
                            </label>
                        </div>
                        <div class="col-xs-8 text-right">
							<?php echo form_submit($entrar, lang('login_submit_btn'));?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 text-center">
							<a href="javascript:void(0)" id="link-reminder-login" ><small><?php echo lang('login_forgot_password');?></small></a>
                        </div>
                    </div>
                </form>
				
				<?php $atributos=array('id'=>'form-reminder', 'class'=>'form-horizontal form-bordered form-control-borderless display-none', 'method'=>'post'); ?>
				<?php echo form_open("auth/forgot_password",$atributos);?>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                <input type="text" id="reminder-email" name="reminder-email" class="form-control input-lg" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
							<?php echo form_submit($entrar2, lang('forgot_password_submit_btn'));?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 text-center">
                            <small>Te acuerdas de tu contraseña?</small> <a href="javascript:void(0)" id="link-reminder"><small>Iniciar Sesión</small></a>
                        </div>
                    </div>
                </form>
			</div>		
		</div>
	</body>
</html>

<?php 
$jsface=array('js/vendor/jquery-1.11.2.min.js','js/vendor/bootstrap.min.js','js/plugins.js','js/app.js','js/pages/login.js');
foreach($jsface as $url)
{
	echo '<script src="'.asset_url($url).'"></script>';
} 
?>

<script>$(function(){ Login.init(); });</script>