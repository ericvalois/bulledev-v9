<?php get_header(); ?>

<section id="jumbotron">
    <div class="container">
        <h1><?php printf( __( 'Recherche pour: %s', 'bulledev-v9' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-md-8 clear">

            <?php if ( have_posts() ) : ?>
                
                <?php while ( have_posts() ) : the_post(); ?>
                    <article class="post_item">  
                        <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                        <p>
                            <?php 
                                $content = get_the_content(); 
                                echo substr(strip_tags($content), 0, 130) . '...'; 
                            ?>
                        </p>

                        <a href="<?php the_permalink(); ?>">Continuer à lire</a>
                    </article>
                <?php endwhile; ?>
               

                <?php wp_reset_postdata(); ?>
                
            <?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>

            <div class=" alignleft"><?php next_posts_link( 'Articles précédents' ); ?></div>
            <div class=" alignright"><?php previous_posts_link( 'Articles suivants' ); ?></div>

        </div>

        <div class="col-md-4">
            <?php get_sidebar(); ?>
        </div>
    </div> <?php // row ?>
</div> <?php // container ?>

<?php get_footer(); ?>