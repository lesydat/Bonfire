<?php echo theme_view('header'); ?>
<div class="login-content">
<?php echo isset($content) ? $content : Template::content(); ?>
</div>
<?php echo theme_view('footer', array('show' => false)); ?>