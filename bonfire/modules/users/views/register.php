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
						<h5><?php echo lang('us_sign_up'); ?></h5>
					</div>
					<div class="col-auto">
						<p class="fs--1 text-600 mb-0">or <?php echo anchor(LOGIN_URL, lang('us_login')); ?></p>
					</div>
				</div>
				<?php echo form_open(site_url(REGISTER_URL), array('autocomplete' => 'off')); ?>
					<?php Template::block('user_fields', 'user_fields'); ?>
					<?php
					// Allow modules to render custom fields. No payload is passed
					// since the user has not been created, yet.
					Events::trigger('render_user_form');
					?>
					<!-- Start of User Meta -->
					<?php $this->load->view('users/user_meta', array('frontend_only' => true)); ?>
					<!-- End of User Meta -->

					<div class="custom-control custom-checkbox">
						<input class="custom-control-input" type="checkbox" id="basic-register-checkbox">
						<label class="custom-control-label" for="basic-register-checkbox">I accept the <a href="#!">terms </a>and <a href="#!">privacy policy</a></label>
					</div>
					<div class="form-group"><button class="btn btn-primary btn-block mt-3" type="submit" name="register"><?php e(lang('us_register')); ?></button></div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
