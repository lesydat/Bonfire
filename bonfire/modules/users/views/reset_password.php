<div class="row flex-center min-vh-100 py-6 text-center">
	<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
		<a class="d-flex flex-center mb-4" href="<?php echo site_url(); ?>">
			<img class="mr-2" src="<?php echo base_url('assets/images/bonfire_logo.png'); ?>" alt="<?php e(class_exists('Settings_lib') ? settings_item('site.title') : 'Bonfire'); ?>" height="64">
		</a>
		<div class="card">
			<div class="card-body p-4 p-sm-5">
				<?php echo Template::message(); ?>
				<h5 class="mb-0"><?php echo lang('us_reset_password'); ?></h5>
				<small><?php echo lang('us_reset_password_note'); ?></small>
				<?php echo form_open($this->uri->uri_string(), array('class' => "mt-4", 'autocomplete' => 'off')); ?>
					<input type="hidden" name="user_id" value="<?php echo $user->id ?>" />
					<div class="form-group">
						<input class="form-control <?php echo iif(form_error('password'), 'is-invalid'); ?>" type="password" name="password" value="" placeholder="<?php echo lang('bf_password'); ?>...">
						<small id="passwordHelpBlock" class="form-text text-muted text-left"><?php echo lang('us_password_mins'); ?></small>
					</div>
					<div class="form-group">
						<input class="form-control <?php echo iif(form_error('pass_confirm'), 'is-invalid'); ?>" type="password" name="pass_confirm" value="" placeholder="<?php echo lang('bf_password_confirm'); ?>">
					</div>
					<div class="form-group">
						<button class="btn btn-primary btn-block mt-3" type="submit" name="set_password"><?php echo lang('us_set_password') ?></button>
					</div>
				<?php echo form_close(); ?>
				<a class="fs--1 text-600" href="<?php echo site_url(LOGIN_URL); ?>"><span class="d-inline-block mr-1">←</span><?php echo lang('back_to_login_page'); ?></a>
			</div>
		</div>
	</div>
</div>
