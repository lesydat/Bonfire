<?php
$site_open = $this->settings_lib->item('auth.allow_register');
?>

<div class="row flex-center min-vh-100 py-6">
	<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
		<a class="d-flex flex-center mb-4" href="<?php echo site_url(); ?>">
			<img class="mr-2" src="<?php echo base_url('assets/images/bonfire_logo.png'); ?>" alt="<?php e(class_exists('Settings_lib') ? settings_item('site.title') : 'Bonfire'); ?>" height="64">
		</a>
		<div class="card">
			<div class="card-body p-4 p-sm-5">
				<?php echo Template::message(); ?>
				<div class="row text-left justify-content-between align-items-center mb-2">
					<div class="col-auto">
						<h5><?php echo lang('us_login'); ?></h5>
					</div>
<?php if ($site_open) : ?>
					<div class="col-auto">
						<p class="fs--1 text-600 mb-0">or <?php echo anchor(REGISTER_URL, lang('us_sign_up')); ?></p>
					</div>
<?php endif; ?>
				</div>
				<?php echo form_open(site_url(LOGIN_URL), array('autocomplete' => 'off')); ?>
					<div class="form-group">
						<input class="form-control <?php echo iif(form_error('login'), 'is-invalid'); ?>" type="text" name="login" value="<?php echo set_value('login'); ?>" placeholder="<?php echo $this->settings_lib->item('auth.login_type') == 'both' ? lang('bf_username') . '/' . lang('bf_email') : ucwords($this->settings_lib->item('auth.login_type')) ?>" autocomplete="off">
					</div>
					<div class="form-group">
						<input class="form-control <?php echo iif(form_error('password'), 'is-invalid'); ?>" type="password" name="password" placeholder="<?php echo lang('bf_password'); ?>" autocomplete="off">
					</div>
					<div class="row justify-content-between align-items-center">
						<div class="col-auto">
							<div class="custom-control custom-checkbox">
								<input class="custom-control-input" type="checkbox" id="basic-checkbox" checked="checked" name="remember_me" value="1"><label class="custom-control-label" for="basic-checkbox"><?php echo lang('us_remember_note'); ?></label>
							</div>
						</div>
						<div class="col-auto"><?php echo anchor('/forgot_password', lang('us_forgot_your_password')); ?></div>
					</div>
					<div class="form-group"><button class="btn btn-primary btn-block mt-3" type="submit" name="log-me-in"><?php e(lang('us_let_me_in')); ?></button></div>
				<?php echo form_close(); ?>
<?php // show for Email Activation (1) only
if ($this->settings_lib->item('auth.user_activation_method') == 1) : ?>
				<!-- Activation Block -->
				<hr>
				<?php echo lang('bf_login_activate_title'); ?><br />
				<?php
				$activate_str = str_replace('[ACCOUNT_ACTIVATE_URL]', anchor('/activate', lang('bf_activate')), lang('bf_login_activate_email'));
				$activate_str = str_replace('[ACTIVATE_RESEND_URL]', anchor('/resend_activation', lang('bf_activate_resend')), $activate_str);
				echo $activate_str; ?>
<?php endif; ?>
			</div>
		</div>
	</div>
</div>
