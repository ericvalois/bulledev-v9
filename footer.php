</div><!-- #content -->

<footer class="site-footer">
	<div class="container">
		<small>© <?php echo date("Y"); ?> Bulle Développement</small>
	</div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>

<?php if( strpos($_SERVER['SERVER_NAME'], 'bulledev.com') ): ?>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','<?php echo get_bloginfo("template_directory"); ?>/js/analytics.js','ga');

		ga('create', 'UA-43847997-1', {'siteSpeedSampleRate': 100});
		ga('send', 'pageview');
	</script>
<?php endif; ?>
	
</body>
</html>
