<?php

if (isset($password_hints)) {
	$fieldData['password_hints'] = $password_hints;
}

// In order for $renderPayload to be set properly, the order of the isset() checks
// for $current_user, $user, and $this->auth should be maintained. An if/elseif
// structure could be used for $renderPayload, but the separate if statements would
// still be needed to set $fieldData properly.
$renderPayload = null;
if (isset($current_user)) {
	$fieldData['current_user'] = $current_user;
	$renderPayload = $current_user;
}
if (isset($user)) {
	$fieldData['user'] = $user;
	$renderPayload = $user;
}
if (empty($renderPayload) && isset($this->auth)) {
	$renderPayload = $this->auth->user();
}

$fieldData['showLabel'] = true;

?>
<div class="card">
	<h5 class="card-header"><?php echo lang('us_edit_profile'); ?></h5>
	<div class="card-body">
		<p class="card-text"><?php echo lang('bf_required_note'); ?></p>
		<?php echo form_open($this->uri->uri_string(), array('autocomplete' => 'off')); ?>
			<?php Template::block('user_fields', 'user_fields', $fieldData); ?>
			<?php
			// Allow modules to render custom fields
			Events::trigger('render_user_form', $renderPayload);
			?>
			<!-- Start User Meta -->
			<?php $this->load->view('users/user_meta', array('frontend_only' => true, 'showLabel' => true)); ?>
			<!-- End of User Meta -->
			<button type="submit" name="save" class="btn btn-primary"><i class="fas fa-save"></i> <?php echo lang('bf_action_save'); ?></button>
			<!-- <?php echo lang('bf_or') . ' ' . anchor('/', lang('bf_action_cancel')); ?> -->
		<?php echo form_close(); ?>
	</div>
</div>
