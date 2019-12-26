<?php
$currentMethod = $this->router->method;
?>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo site_url(); ?>">
        <img src="<?php echo base_url('assets/images/bonfire_logo.png'); ?>" height="36" alt="<?php e(class_exists('Settings_lib') ? settings_item('site.title') : 'Bonfire'); ?>">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item <?php echo $currentMethod == 'index' ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo site_url(); ?>"><?php e(lang('bf_home')); ?></a>
            </li>
            <?php if (empty($current_user)) : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url(LOGIN_URL); ?>"><?php echo lang('bf_action_login'); ?></a>
            </li>
            <?php else : ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $current_user->display_name; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-md-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo site_url(SITE_AREA) ?>">Go to the Admin area</a>
                    <a class="dropdown-item <?php echo $currentMethod == 'profile' ? 'active' : ''; ?>" href="<?php echo site_url('users/profile'); ?>"><?php e(lang('bf_user_settings')); ?></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('logout'); ?>"><?php e(lang('bf_action_logout')); ?></a>
                </div>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>