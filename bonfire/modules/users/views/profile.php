<?php

$errorClass   = empty($errorClass) ? ' has-error' : $errorClass;
$controlClass = empty($controlClass) ? 'form-control' : $controlClass;
$fieldData = array(
    'errorClass'   => $errorClass,
    'controlClass' => $controlClass,
);

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

if (isset($user) && $user->role_name == 'Banned') {
?>
<div class="notification" data-notification-type="error">
	<?php echo lang('us_banned_admin_note'); ?>
</div>
<?php
}
?>

<div class="row">
	<div class="col-md-3 col-sm-2"></div>
	<div class="col-md-6 col-sm-8">
		<div class="card">
			<?php echo form_open($this->uri->uri_string(), array('autocomplete' => 'off')); ?>
				<div class="card-header bgm-blue">
					<h2>
						<?php echo lang('us_edit_profile'); ?>
						<small><?php echo lang('bf_required_note'); ?></small>
					</h2>
				</div>
				<div class="card-body card-padding">
					<?php Template::block('user_fields', 'user_fields', $fieldData); ?>
					<?php
					// Allow modules to render custom fields
					Events::trigger('render_user_form', $renderPayload);
					?>
					<!-- Start User Meta -->
					<?php $this->load->view('users/user_meta', array('frontend_only' => true)); ?>
					<!-- End of User Meta -->
					
					<button type="submit" class="btn btn-primary waves-effect"><?php echo lang('bf_action_save') . ' ' . lang('bf_user'); ?></button>
					<?php echo lang('bf_or') . ' ' . anchor('/', lang('bf_action_cancel')); ?>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
