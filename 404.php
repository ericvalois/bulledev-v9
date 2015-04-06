<?php get_header(); ?>
    
    <section id="jumbotron">
        <div class="container">
            <h1>Oops! Cette page n'existe pas.</h1>
        </div>
    </section>
    
    <div class="container">

        <div class="row">
            <div class="col-sm-8 clear">
				<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

            </div>

            <div class="col-sm-4">
                <?php get_sidebar(); ?>
            </div>

        </div>

    </div>
   

<?php get_footer(); ?>