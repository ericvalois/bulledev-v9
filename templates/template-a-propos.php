<?php 
	/* 
		Template name: À propos
	*/ 
?>
<?php get_header(); ?>
    
    <section id="jumbotron">
        <div class="container">
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

                 <h1><?php the_title(); ?></h1>

            <?php endwhile; ?>
        </div>
    </section>

    <div class="container">

        <div class="row">
            <div class="col-sm-8 clear">
               <?php the_content(); ?>

               <div class="wrap_page">
                    <h3>Abonnez-vous à notre infolettre!</h3>
                    <form class="mc-embedded-subscribe-form validate" action="//bulledev.us1.list-manage.com/subscribe/post?u=7264b91f91da7aa36c6142ac0&amp;id=8bbcc78d1e" method="post" name="mc-embedded-subscribe-form" target="_blank">
                        <p class="p">Inscrivez-vous pour recevoir nos articles de performance Web par courriel.</p>
                        <input id="mce-EMAIL" class="required email" name="EMAIL" type="email" value="" placeholder="Courriel" required>
                        <div class="clearfix"></div>
                        <input id="mc-embedded-subscribe" class="button button-blue" name="subscribe" type="submit" value="S'abonner" />
                        <div style="position: absolute; left: -5000px;"><input name="b_7264b91f91da7aa36c6142ac0_8bbcc78d1e" type="text" value="" /></div>
                        <div class="clearfix"></div>
                        <small>Ne vous inquiétez pas, nous détestons le spam!</small>
                    </form>
                </div>

            </div>

            <div class="col-sm-4">
                <?php get_sidebar(); ?>
            </div>

        </div>

    </div>
   

<?php get_footer(); ?>