<?php 
	/* 
		Template name: Recherche
	*/ 
?>
<?php get_header(); ?>
	
    <h1>Recherche pour: <?php echo $_GET['q']; ?></h1>
            
    <script>
        (function() {
          var cx = '012255199774390524229:f4knl5caxtm';
          var gcse = document.createElement('script');
          gcse.type = 'text/javascript';
          gcse.async = true;
          gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
              '//www.google.com/cse/cse.js?cx=' + cx;
          var s = document.getElementsByTagName('script')[0];
          s.parentNode.insertBefore(gcse, s);
        })();
    </script>

    <gcse:searchresults-only></gcse:searchresults-only>

<?php get_footer(); ?>
