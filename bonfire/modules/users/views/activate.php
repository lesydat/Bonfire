<div class="row">
	<div class="col-md-3 col-sm-2"></div>
	<div class="col-md-6 col-sm-8">
		<div class="card">
			<?php echo form_open($this->uri->uri_string(), array('autocomplete' => 'off')); ?>
				<div class="card-header bgm-blue">
					<h2>
						<?php echo lang('us_activate'); ?>
						<small><?php echo lang('us_user_activate_note'); ?></small>
					</h2>
				</div>
				<div class="card-body card-padding">
					<?php echo form_input('code', set_value('code'), lang('us_activate_code')); ?>
					<button type="submit" class="btn btn-primary btn-block waves-effect"><?php echo lang('us_confirm_activate_code') ?></button>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
