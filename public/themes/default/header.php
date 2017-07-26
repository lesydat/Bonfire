<?php

Assets::add_css([
	'vendors/bower_components/sweetalert2/dist/sweetalert2.min.css',
	'vendors/bower_components/animate.css/animate.min.css',
	'vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css',
	'vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css',
	'vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css',
	'vendors/bower_components/chosen/chosen.css',
	'app_1.min.css', 
	'app_2.min.css',
]);

Assets::add_js([
	'vendors/bower_components/bootstrap/dist/js/bootstrap.min.js',
	'vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js',
	'vendors/bower_components/Waves/dist/waves.min.js',
	'vendors/bootstrap-growl/bootstrap-growl.min.js',
	'vendors/bower_components/sweetalert2/dist/sweetalert2.min.js',
	'vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js',
	'vendors/bower_components/chosen/chosen.jquery.js',
	'app.min.js',
]);

?>
<!doctype html>
<head>
	<meta charset="utf-8">
	<title><?php
		echo isset($page_title) ? "{$page_title} : " : '';
		e(class_exists('Settings_lib') ? settings_item('site.title') : 'Bonfire');
	?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php e(isset($meta_description) ? $meta_description : ''); ?>">
	<meta name="author" content="<?php e(isset($meta_author) ? $meta_author : ''); ?>">

	<!--Modernizr is loaded before CSS so CSS can utilize its features-->
	<!--<script src="<?php echo js_path() . 'modernizr-2.5.3.js'; ?>"></script>-->

	<?php echo Assets::css(); ?>
	<link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico">
</head>
<body>
<?php echo Template::message(); ?>
