<?php get_header(); ?>

<section id="jumbotron">
    <div class="container">
        <h1>Personne n'aime un site lent</h1>
        <h4>La vitesse est devenue si importante pour l'expérience utilisateur <br>que Google en a fait un facteur clé pour déterminer le classement de recherche.</h4>
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
                
            <?php else : ?>
                <p>Désolé, aucun article ne </p>
            <?php endif; ?>

            <div class="alignleft"><?php next_posts_link( 'Articles précédents' ); ?></div>
            <div class="alignright"><?php previous_posts_link( 'Articles suivants' ); ?></div>

        </div><?php // col-md-8 ?>

        <div class="col-md-4">
            <?php get_sidebar(); ?>
        </div>
    </div> <?php // row ?>
</div> <?php // container ?>

<?php get_footer(); ?>