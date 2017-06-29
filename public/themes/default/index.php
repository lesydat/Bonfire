<?php echo theme_view('header'); ?>
<?php echo theme_view('_sitenav'); ?>
<section id="main">
	<section id="content" class="content-alt">
		<div class="container">
<?php echo isset($content) ? $content : Template::content(); ?>
		</div>
	</section>
</section>
<?php echo theme_view('footer'); ?>