<?php

$errorClass   = empty($errorClass) ? ' has-error' : $errorClass;
$controlClass = empty($controlClass) ? 'form-control' : $controlClass;
$useIconsInsteadLabel = false;
$fieldData = array(
    'errorClass'    => $errorClass,
    'controlClass'  => $controlClass,
	'useIconsInsteadLabel' => $useIconsInsteadLabel,
);

?>
<style scoped='scoped'>
#register p.already-registered {
    text-align: center;
}
</style>
<!-- Register -->
<!-- <div class="notification" data-notification-type="info">
	<strong><?php echo lang('bf_required_note'); ?></strong>
<?php
if (isset($password_hints)) {
	echo '<br/>' . $password_hints;
}
?>
</div> -->
<div class="lc-block toggled" id="l-register">
	<?php echo form_open(site_url(REGISTER_URL), array('autocomplete' => 'off')); ?>
	<div class="lcb-form" <?php echo $useIconsInsteadLabel ? '' : 'style="text-align: left;"'; ?>>
		<?php Template::block('user_fields', 'user_fields', $fieldData); ?>
		<?php
		// Allow modules to render custom fields. No payload is passed
		// since the user has not been created, yet.
		Events::trigger('render_user_form');
		?>
		<!-- Start of User Meta -->
		<?php $this->load->view('users/user_meta', array('frontend_only' => true)); ?>
		<!-- End of User Meta -->

		<button type="submit" class="btn btn-login btn-success btn-float" name="register"><i class="zmdi zmdi-check"></i></button>
	</div>
	<?php echo form_close(); ?>

	<div class="lcb-navigation">
		<a href="<?php echo site_url(LOGIN_URL); ?>" data-ma-block="#l-login"><i class="zmdi zmdi-long-arrow-right"></i> <span><?php echo lang('us_let_me_in'); ?></span></a>
		<a href="<?php echo site_url('forgot_password'); ?>" data-ma-block="#l-forget-password"><i>?</i> <span><?php echo lang('us_forgot_your_password'); ?></span></a>
	</div>
</div>
