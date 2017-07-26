<?php
	$site_open = $this->settings_lib->item('auth.allow_register');
?>
<!-- Login Block -->
<div class="lc-block toggled" id="l-login">
	<?php echo form_open(LOGIN_URL, array('autocomplete' => 'off')); ?>
	<div class="lcb-form">
		<div class="input-group m-b-20">
			<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
			<div class="fg-line">
				<input type="text" name="login" class="form-control" tabindex="1" placeholder="<?php echo $this->settings_lib->item('auth.login_type') == 'both' ? lang('bf_username') .'/'. lang('bf_email') : ucwords($this->settings_lib->item('auth.login_type')) ?>">
			</div>
		</div>

		<div class="input-group m-b-20">
			<span class="input-group-addon"><i class="zmdi zmdi-male"></i></span>
			<div class="fg-line">
				<input type="password" name="password" class="form-control" tabindex="2" placeholder="<?php echo lang('bf_password'); ?>">
			</div>
		</div>

		<div class="checkbox">
			<label>
				<input type="checkbox" name="remember_me" value="1" tabindex="3">
				<i class="input-helper"></i>
				<?php echo lang('us_remember_note'); ?>
			</label>
		</div>

		<button type="submit" class="btn btn-login btn-success btn-float" tabindex="5" name="log-me-in"><i class="zmdi zmdi-arrow-forward"></i></button>
		
	</div>
	<?php echo form_close(); ?>

	<div class="lcb-navigation">
		<a href="<?php echo site_url(); ?>" data-ma-block="#l-backtohome"><i class="zmdi zmdi-home"></i> <span><?php echo lang('us_back_to'); ?></span></a>
		<?php if ( $site_open ) { ?>
		<a href="<?php echo site_url(REGISTER_URL); ?>" data-ma-block="#l-register"><i class="zmdi zmdi-plus"></i> <span><?php echo lang('us_sign_up'); ?></span></a>
		<?php } ?>
		<a href="<?php echo site_url('forgot_password'); ?>" data-ma-block="#l-forget-password"><i>?</i> <span><?php echo lang('us_forgot_your_password'); ?></span></a>
		<?php if ($this->settings_lib->item('auth.user_activation_method') == 1) { ?>
		<a href="#" data-ma-action="login-switch" data-ma-block="#l-activation"><i class="zmdi zmdi-lock-open"></i> <span><?php echo lang('us_activate'); ?></span></a>
		<?php } ?>
	</div>
</div>

<?php // show for Email Activation (1) only
	if ($this->settings_lib->item('auth.user_activation_method') == 1) { ?>
<!-- Activation Block -->
<div class="lc-block" id="l-activation">
	<div class="lcb-form">
		<p style="text-align: left">
			<?php echo lang('bf_login_activate_title'); ?><br />
			<?php
			$activate_str = str_replace('[ACCOUNT_ACTIVATE_URL]',anchor('/activate', lang('bf_activate')),lang('bf_login_activate_email'));
			$activate_str = str_replace('[ACTIVATE_RESEND_URL]',anchor('/resend_activation', lang('bf_activate_resend')),$activate_str);
			echo $activate_str; ?>
		</p>
	</div>

	<div class="lcb-navigation">
		<a href="<?php echo site_url(); ?>" data-ma-block="#l-backtohome"><i class="zmdi zmdi-home"></i> <span><?php echo lang('us_back_to'); ?></span></a>
		<a href="#" data-ma-action="login-switch" data-ma-block="#l-login"><i class="zmdi zmdi-long-arrow-right"></i> <span><?php echo lang('us_let_me_in'); ?></span></a>
		<?php if ( $site_open ) { ?>
		<a href="<?php echo site_url(REGISTER_URL); ?>" data-ma-block="#l-register"><i class="zmdi zmdi-plus"></i> <span><?php echo lang('us_sign_up'); ?></span></a>
		<?php } ?>
		<a href="<?php echo site_url('forgot_password'); ?>" data-ma-block="#l-forget-password"><i>?</i> <span><?php echo lang('us_forgot_your_password'); ?></span></a>
	</div>
</div>
<?php } ?>
