<div class="row">
	<div class="col-md-3 col-sm-2"></div>
	<div class="col-md-6 col-sm-8">
		<div class="card">
			<?php echo form_open($this->uri->uri_string(), array('autocomplete' => 'off')); ?>
				<div class="card-header bgm-blue">
					<h2>
						<?php echo lang('us_reset_password_title'); ?>
						<small><?php echo lang('us_reset_password_note'); ?></small>
					</h2>
				</div>
				<div class="card-body card-padding">
					<input type="hidden" name="user_id" value="<?php echo $user->id ?>" />
					<?php echo form_password('password', set_value('password'), lang('bf_password')); ?>
					<?php echo form_password('pass_confirm', set_value('pass_confirm'), lang('bf_password_confirm')); ?>
					<button type="submit" class="btn btn-primary btn-block waves-effect"><?php echo lang('us_set_password') ?></button>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
