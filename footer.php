</div><!-- #content -->

<footer class="site-footer">
	<div class="container">

		<form action="//bulledev.us1.list-manage.com/subscribe/post?u=7264b91f91da7aa36c6142ac0&amp;id=8bbcc78d1e" method="post" class="mc-embedded-subscribe-form-footer validate" name="mc-embedded-subscribe-form" target="_blank" >
			<h3>Abonnez-vous au blogue</h3>
			
			<div class="pulse animated">
				<input type="email" value="" name="EMAIL" placeholder="Votre courriel" class="required email" id="mce-EMAIL-footer" required>
				<input type="submit" value="S'abonner" name="subscribe" id="mc-embedded-subscribe-footer" class="button button-blue">
			</div>

			<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
		    <div style="position: absolute; left: -5000px;"><input type="text" name="b_7264b91f91da7aa36c6142ac0_8bbcc78d1e" value=""></div>
			<div class="clear"></div>
			<small>Ne vous inquiétez pas, nous détestons le spam!</small>
		</form>

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
	<?php /* ?>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-43847997-1', 'auto');
	  ga('create', 'UA-43847997-1', {'siteSpeedSampleRate': 100});
	  ga('send', 'pageview');

	</script>
	<?php */ ?>
<?php endif; ?>
	
</body>
</html>
