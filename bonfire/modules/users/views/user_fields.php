<?php /* /users/views/user_fields.php */

$currentMethod = $this->router->method;

$registerClass  = $currentMethod == 'register' ? ' required' : '';
$editSettings   = $currentMethod == 'edit';

$defaultLanguage = isset($user->language) ? $user->language : strtolower(settings_item('language'));
$defaultTimezone = isset($user->timezone) ? $user->timezone : strtoupper(settings_item('site.default_user_timezone'));

$showLabel = isset($showLabel) ? $showLabel : false;

?>
<div class="form-group">
<?php if ($showLabel): ?>
	<label for="email" class="required"><?php echo lang('bf_email'); ?></label>
<?php endif; ?>
	<input id="email" class="form-control <?php echo iif(form_error('email'), 'is-invalid'); ?>" type="email" name="email" value="<?php echo set_value('email', isset($user) ? $user->email : ''); ?>" placeholder="<?php echo iif($showLabel, '', lang('bf_email')); ?>">
	<div class="invalid-feedback"><?php echo form_error('email'); ?></div>
</div>

<div class="form-group">
<?php if ($showLabel): ?>
	<label for="display_name"><?php echo lang('bf_display_name'); ?></label>
<?php endif; ?>
	<input id="display_name" class="form-control <?php echo iif(form_error('display_name'), 'is-invalid'); ?>" type="text" name="display_name" value="<?php echo set_value('display_name', isset($user) ? $user->display_name : ''); ?>" placeholder="<?php echo iif($showLabel, '', lang('bf_display_name')); ?>">
	<div class="invalid-feedback"><?php echo form_error('display_name'); ?></div>
</div>

<?php if (settings_item('auth.login_type') !== 'email' || settings_item('auth.use_usernames')) : ?>
<div class="form-group">
<?php if ($showLabel): ?>
	<label for="username" class="required"><?php echo lang('bf_username'); ?></label>
<?php endif; ?>
	<input id="username" class="form-control <?php echo iif(form_error('username'), 'is-invalid'); ?>" type="text" name="username" value="<?php echo set_value('username', isset($user) ? $user->username : ''); ?>" placeholder="<?php echo iif($showLabel, '', lang('bf_username')); ?>">
	<div class="invalid-feedback"><?php echo form_error('username'); ?></div>
</div>
<?php endif; ?>

<div class="form-row">
	<div class="form-group col-6">
<?php if ($showLabel): ?>
		<label for="password" class="required"><?php echo lang('bf_password'); ?></label>
<?php endif; ?>
		<input id="password" class="form-control <?php echo iif(form_error('password'), 'is-invalid'); ?>" type="password" name="password" value="" placeholder="<?php echo iif($showLabel, '', lang('bf_password')); ?>">
		<div class="invalid-feedback"><?php echo form_error('password'); ?></div>
		<small id="passwordHelpBlock" class="form-text text-muted"><?php echo isset($password_hints) ? $password_hints : ''; ?></small>
	</div>
	<div class="form-group col-6">
<?php if ($showLabel): ?>
		<label for="pass_confirm" class="required"><?php echo lang('bf_password_confirm'); ?></label>
<?php endif; ?>
		<input id="pass_confirm" class="form-control <?php echo iif(form_error('pass_confirm'), 'is-invalid'); ?>" type="password" name="pass_confirm" value="" placeholder="<?php echo iif($showLabel, '', lang('bf_password_confirm')); ?>">
		<div class="invalid-feedback"><?php echo form_error('pass_confirm'); ?></div>
	</div>
</div>
<?php if ($editSettings) : ?>
<div class="custom-control custom-checkbox">
	<input class="custom-control-input" type="checkbox" id="force_password_reset" name="force_password_reset" value="1" <?php echo set_checkbox('force_password_reset', empty($user->force_password_reset)); ?>/>
	<label class="custom-control-label" for="force_password_reset"><?php echo lang('us_force_password_reset'); ?></label>
</div>
<?php endif; ?>
<?php 
if (!empty($languages) && is_array($languages)) :
	if (count($languages) == 1) :
?>
<input type="hidden" id="language" name="language" value="<?php echo $languages[0]; ?>" />
<?php
	else :
?>
<div class="form-group">
<?php if ($showLabel): ?>
	<label for="language"><?php echo lang('bf_language'); ?></label>
<?php endif; ?>
	<select class="form-control <?php echo iif(form_error('language'), 'is-invalid'); ?>" id="language" name="language">
<?php foreach ($languages as $language) : ?>
		<option value="<?php e($language); ?>" <?php echo set_select('language', $language, $defaultLanguage == $language); ?>>
			<?php e(ucfirst($language)); ?>
		</option>
<?php endforeach; ?>
	</select>
	<div class="invalid-feedback"><?php echo form_error('language'); ?></div>
</div>
<?php
	endif;
endif;
?>
<div class="form-group">
<?php if ($showLabel): ?>
	<label for="timezones"><?php echo lang('bf_timezone'); ?></label>
<?php endif; ?>
<?php
echo timezone_menu(
	set_value('timezones', isset($user) ? $user->timezone : $defaultTimezone),
	'form-control',
	'timezones',
	array('id' => 'timezones')
);
?>
	<div class="invalid-feedback"><?php echo form_error('timezones'); ?></div>
</div>