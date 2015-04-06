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
            </div>

            <div class="col-sm-4">
                <?php get_sidebar(); ?>
            </div>

        </div>

    </div>
   

<?php get_footer(); ?>
