<?php /* /users/views/user_fields.php */

$currentMethod = $this->router->method;

$errorClass     = empty($errorClass) ? ' has-error' : $errorClass;
$controlClass   = empty($controlClass) ? 'form-control' : $controlClass;
$registerClass  = $currentMethod == 'register' ? ' required' : '';
$editSettings   = $currentMethod == 'edit';
$useIconsInsteadLabel = empty($useIconsInsteadLabel) ? false : true;

$defaultLanguage = isset($user->language) ? $user->language : strtolower(settings_item('language'));
$defaultTimezone = isset($user->timezone) ? $user->timezone : strtoupper(settings_item('site.default_user_timezone'));

?>
<div class="<?php echo ($useIconsInsteadLabel ? 'input-group m-b-20' : 'form-group fg-float') . (form_error('email') ? $errorClass : ''); ?>">
<?php if ($useIconsInsteadLabel) { ?>
	<span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
<?php } ?>
    <div class="fg-line">
<?php if (! $useIconsInsteadLabel) { ?>
		<label class="fg-label required"><?php echo lang('bf_email'); ?></label>
<?php } ?>
        <input class="<?php echo $controlClass; ?>" type="text" id="email" name="email" value="<?php echo set_value('email', isset($user) ? $user->email : ''); ?>" <?php echo $useIconsInsteadLabel ? 'placeholder="' . lang('bf_email') . '"' : ''; ?>/>
    </div>
	<small class="help-block"><?php echo form_error('email'); ?></small>
</div>

<div class="<?php echo ($useIconsInsteadLabel ? 'input-group m-b-20' : 'form-group fg-float') . (form_error('display_name') ? $errorClass : ''); ?>">
<?php if ($useIconsInsteadLabel) { ?>
	<span class="input-group-addon"><i class="zmdi zmdi-face"></i></span>
<?php } ?>
    <div class="fg-line">
<?php if (! $useIconsInsteadLabel) { ?>
		<label class="fg-label"><?php echo lang('bf_display_name'); ?></label>
<?php } ?>
        <input class="<?php echo $controlClass; ?>" type="text" id="display_name" name="display_name" value="<?php echo set_value('display_name', isset($user) ? $user->display_name : ''); ?>" <?php echo $useIconsInsteadLabel ? 'placeholder="' . lang('bf_display_name') . '"' : ''; ?>/>
    </div>
	<small class="help-block"><?php echo form_error('display_name'); ?></small>
</div>

<?php if (settings_item('auth.login_type') !== 'email' || settings_item('auth.use_usernames')) : ?>
<div class="<?php echo ($useIconsInsteadLabel ? 'input-group m-b-20' : 'form-group fg-float') . (form_error('username') ? $errorClass : ''); ?>">
<?php if ($useIconsInsteadLabel) { ?>
	<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
<?php } ?>
    <div class="fg-line">
<?php if (! $useIconsInsteadLabel) { ?>
		<label class="fg-label required"><?php echo lang('bf_username'); ?></label>
<?php } ?>
        <input class="<?php echo $controlClass; ?>" type="text" id="username" name="username" value="<?php echo set_value('username', isset($user) ? $user->username : ''); ?>" <?php echo $useIconsInsteadLabel ? 'placeholder="' . lang('bf_username') . '"' : ''; ?>/>
    </div>
	<small class="help-block"><?php echo form_error('username'); ?></small>
</div>
<?php endif; ?>

<div class="<?php echo ($useIconsInsteadLabel ? 'input-group m-b-20' : 'form-group fg-float') . (form_error('password') ? $errorClass : ''); ?>">
<?php if ($useIconsInsteadLabel) { ?>
	<span class="input-group-addon"><i class="zmdi zmdi-key"></i></span>
<?php } ?>
    <div class="fg-line">
<?php if (! $useIconsInsteadLabel) { ?>
		<label class="fg-label required"><?php echo lang('bf_password'); ?></label>
<?php } ?>
        <input class="<?php echo $controlClass; ?>" type="password" id="password" name="password" value="" <?php echo $useIconsInsteadLabel ? 'placeholder="' . lang('bf_password') . '"' : ''; ?>/>
    </div>
	<small class="help-block"><?php echo ! empty(form_error('password')) ? form_error('password') : (isset($password_hints) ? $password_hints : ''); ?></small>
</div>

<div class="<?php echo ($useIconsInsteadLabel ? 'input-group m-b-20' : 'form-group fg-float') . (form_error('pass_confirm') ? $errorClass : ''); ?>">
<?php if ($useIconsInsteadLabel) { ?>
	<span class="input-group-addon"><i class="zmdi zmdi-key"></i></span>
<?php } ?>
    <div class="fg-line">
<?php if (! $useIconsInsteadLabel) { ?>
		<label class="fg-label required"><?php echo lang('bf_password_confirm'); ?></label>
<?php } ?>
        <input class="<?php echo $controlClass; ?>" type="password" id="pass_confirm" name="pass_confirm" value="" <?php echo $useIconsInsteadLabel ? 'placeholder="' . lang('bf_password_confirm') . '"' : ''; ?>/>
    </div>
	<small class="help-block"><?php echo form_error('pass_confirm'); ?></small>
</div>

<?php if ($editSettings) : ?>
<div class="<?php echo ($useIconsInsteadLabel ? 'input-group m-b-20' : 'form-group fg-float') . (form_error('force_password_reset') ? $errorClass : ''); ?>">
	<div class="checkbox">
		<label>
			<input type="checkbox" id="force_password_reset" name="force_password_reset" value="1" <?php echo set_checkbox('force_password_reset', empty($user->force_password_reset)); ?> />
			<i class="input-helper"></i>
			<?php echo lang('us_force_password_reset'); ?>
		</label>
	</div>
</div>
<?php
endif;

if (! empty($languages) && is_array($languages)) :
    if (count($languages) == 1) :
?>
<input type="hidden" id="language" name="language" value="<?php echo $languages[0]; ?>" />
<?php
    else :
?>
<div class="<?php echo $useIconsInsteadLabel ? 'input-group m-b-20' : 'form-group fg-float'; ?><?php echo form_error('language') ? $errorClass : ''; ?>">
<?php if ($useIconsInsteadLabel) { ?>
	<span class="input-group-addon"><i class="zmdi zmdi-flag"></i></span>
<?php } ?>
    <div class="fg-line">
<?php if (! $useIconsInsteadLabel) { ?>
    	<label class="fg-label required"><?php echo lang('bf_language'); ?></label>
<?php } ?>
		<!-- <div class="select"> -->
			<select name="language" id="language" class="<?php echo $controlClass; ?> chosen">
				<?php foreach ($languages as $language) : ?>
				<option value="<?php e($language); ?>" <?php echo set_select('language', $language, $defaultLanguage == $language); ?>><?php e(ucfirst($language)); ?></option>
				<?php endforeach; ?>
			</select>
		<!-- </div> -->
    </div>
	<small class="help-block"><?php echo form_error('language'); ?></small>
</div>
<?php
    endif;
endif;
?>

<div class="<?php echo $useIconsInsteadLabel ? 'input-group m-b-20' : 'form-group fg-float'; ?><?php echo form_error('timezones') ? $errorClass : ''; ?>">
<?php if ($useIconsInsteadLabel) { ?>
	<span class="input-group-addon"><i class="zmdi zmdi-time"></i></span>
<?php } ?>
    <div class="fg-line">
<?php if (! $useIconsInsteadLabel) { ?>
    	<label class="fg-label required"><?php echo lang('bf_timezone'); ?></label>
<?php } ?>
		<!-- <div class="select"> -->
			<?php
			echo timezone_menu(
				set_value('timezones', isset($user) ? $user->timezone : $defaultTimezone),
				$controlClass . ' chosen',
				'timezones',
				array('id' => 'timezones')
			);
			?>
		<!-- </div> -->
    </div>
	<small class="help-block"><?php echo form_error('timezones'); ?></small>
</div>