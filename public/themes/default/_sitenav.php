<header id="header" class="clearfix" data-ma-theme="blue">
	<ul class="h-inner">
		<li class="hi-logo">
			<a href="<?php echo site_url(); ?>"><?php e(class_exists('Settings_lib') ? settings_item('site.title') : 'Bonfire'); ?></a>
		</li>
		<li class="pull-right">
			<ul class="hi-menu">
				<li <?php echo check_class('home'); ?>>
					<a href="<?php echo site_url(); ?>"><span class="him-label"><?php e(lang('bf_home')); ?></span></a>
				</li>
				<li class="dropdown">
<?php if (empty($current_user)) : ?>
					<a href="<?php echo site_url(LOGIN_URL); ?>" aria-expanded="false">
						<span class="him-label"><?php echo lang('bf_action_login'); ?></span>
					</a>
<?php else : ?>
					<a data-toggle="dropdown" href="#" aria-expanded="false">
						<span class="him-label"><?php echo $current_user->display_name; ?></span>
					</a>
					<ul class="dropdown-menu dm-icon pull-right">
						<li>
							<a href="<?php echo site_url(SITE_AREA) ?>"><i class="zmdi zmdi-tune"></i> Go to the Admin area</a>
						</li>
						<li <?php echo check_method('profile'); ?>>
							<a href="<?php echo site_url('users/profile'); ?>"><i class="zmdi zmdi-account"></i> <?php e(lang('bf_user_settings')); ?></a>
						</li>
						<li>
							<a href="<?php echo site_url('logout'); ?>"><i class="zmdi zmdi-lock"></i> <?php e(lang('bf_action_logout')); ?></a>
						</li>
					</ul>
<?php endif; ?>
				</li>
				<li class="dropdown">
					<a data-toggle="dropdown" href="#" aria-expanded="false"><i class="him-icon zmdi zmdi-more-vert"></i></a>
					<ul class="dropdown-menu dropdown-menu-lg dm-icon pull-right">
						<li class="skin-switch hidden-xs">
							<span class="ss-skin bgm-lightblue" data-ma-action="change-skin" data-ma-skin="lightblue"></span>
							<span class="ss-skin bgm-bluegray" data-ma-action="change-skin" data-ma-skin="bluegray"></span>
							<span class="ss-skin bgm-cyan" data-ma-action="change-skin" data-ma-skin="cyan"></span>
							<span class="ss-skin bgm-teal" data-ma-action="change-skin" data-ma-skin="teal"></span>
							<span class="ss-skin bgm-green" data-ma-action="change-skin" data-ma-skin="green"></span>
							<span class="ss-skin bgm-orange" data-ma-action="change-skin" data-ma-skin="orange"></span>
							<span class="ss-skin bgm-blue" data-ma-action="change-skin" data-ma-skin="blue"></span>
							<span class="ss-skin bgm-purple" data-ma-action="change-skin" data-ma-skin="purple"></span>
						</li>
						<li class="divider hidden-xs"></li>
						<li class="hidden-xs">
							<a data-ma-action="fullscreen" href="#"><i class="zmdi zmdi-fullscreen"></i> Toggle Fullscreen</a>
						</li>
						<li>
							<a data-ma-action="clear-localstorage" href="#"><i class="zmdi zmdi-delete"></i> Clear Local Storage</a>
						</li>
					</ul>
				</li>
			</ul>
		</li>
	</ul>
</header>
