<!DOCTYPE html>
<html lang="fr-FR" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<head>

	<title><?php wp_title(''); ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <?php // To be sure you're using the latest rendering mode for IE. ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.png">

	<?php wp_head(); ?>

    <!--[if IE]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body <?php body_class(); ?>>

	<header id="masthead" class="site-header" role="banner">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<a href="<?php bloginfo( 'url' ); ?>" id="logo"><img src="<?php bloginfo( 'template_directory' ); ?>/images/logo-black.png" width="170" height="39" alt="Logo"></a>
				</div>

				<div class="col-sm-4">
					<?php get_search_form(); ?>
				</div>
			</div>

			
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
