<?php if ( ! isset($show) || $show == true) : ?>
	<footer id="footer" class="footer-alt">
		<p>Powered by <a href="http://cibonfire.com" target="_blank">Bonfire <?php echo BONFIRE_VERSION; ?></a></p>
	</footer>
<?php endif; ?>
	<!-- Older IE warning message -->
	<!--[if lt IE 9]>
		<div class="ie-warning">
			<h1 class="c-white">Warning!!</h1>
			<p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
			<div class="iew-container">
				<ul class="iew-download">
					<li>
						<a href="http://www.google.com/chrome/">
							<img src="<?php echo img_path(); ?>browsers/chrome.png" alt="">
							<div>Chrome</div>
						</a>
					</li>
					<li>
						<a href="https://www.mozilla.org/en-US/firefox/new/">
							<img src="<?php echo img_path(); ?>browsers/firefox.png" alt="">
							<div>Firefox</div>
						</a>
					</li>
					<li>
						<a href="http://www.opera.com">
							<img src="<?php echo img_path(); ?>browsers/opera.png" alt="">
							<div>Opera</div>
						</a>
					</li>
					<li>
						<a href="https://www.apple.com/safari/">
							<img src="<?php echo img_path(); ?>browsers/safari.png" alt="">
							<div>Safari</div>
						</a>
					</li>
					<li>
						<a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
							<img src="<?php echo img_path(); ?>browsers/ie.png" alt="">
							<div>IE (New)</div>
						</a>
					</li>
				</ul>
			</div>
			<p>Sorry for the inconvenience!</p>
		</div>
	<![endif]-->
	<!-- Page Loader -->
	<div class="page-loader">
		<div class="preloader pls-blue">
			<svg class="pl-circular" viewBox="25 25 50 50">
				<circle class="plc-path" cx="50" cy="50" r="20" />
			</svg>
			<p>Please wait...</p>
		</div>
	</div>
	<div id="debug"><!-- Stores the Profiler Results --></div>
	<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php echo assets_path(); ?>vendors/bower_components/jquery/dist/jquery.min.js"><\/script>');</script>
	<?php echo Assets::js(); ?>
</body>
</html>