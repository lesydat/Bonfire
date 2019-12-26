<div class="row flex-center min-vh-100 py-6 text-center">
	<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
		<a class="d-flex flex-center mb-4" href="<?php echo site_url(); ?>">
			<img class="mr-2" src="<?php echo base_url('assets/images/bonfire_logo.png'); ?>" alt="<?php e(class_exists('Settings_lib') ? settings_item('site.title') : 'Bonfire'); ?>" height="64">
		</a>
		<div class="card">
			<div class="card-body p-4 p-sm-5">
				<?php echo Template::message(); ?>
				<h5 class="mb-0"><?php echo lang('us_forgot_password'); ?></h5>
				<small><?php echo lang('us_forgot_password_note'); ?></small>
				<?php echo form_open($this->uri->uri_string(), array('class' => "mt-4", 'autocomplete' => 'off')); ?>
					<div class="form-group">
						<input class="form-control <?php echo iif(form_error('email'), 'is-invalid'); ?>" type="text" name="email" value="<?php echo set_value('email') ?>" placeholder="<?php echo lang('bf_email'); ?>">
					</div>
					<div class="form-group">
						<button class="btn btn-primary btn-block mt-3" type="submit" name="send"><?php e(lang('us_send_password')); ?></button>
					</div>
				<?php echo form_close(); ?>
				<a class="fs--1 text-600" href="<?php echo site_url(LOGIN_URL); ?>"><span class="d-inline-block mr-1">←</span><?php echo lang('back_to_login_page'); ?></a>
			</div>
		</div>
	</div>
</div>
