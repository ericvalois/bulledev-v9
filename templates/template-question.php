<?php 
	/* 
		Template name: Questions 
	*/ 
?>
<?php get_header(); ?>

<section id="jumbotron">
    <div class="container">
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	        <h1>Questions <br>de performance Web</h1>
	                
	        <?php the_content(); ?>

	    <?php endwhile; ?>
    </div>
</section>

<div class="container">

   <div class="row">
   		<div class="col-sm-8 clear">

   		<div class=" top_questions ">
			<form role="search" method="get" id="question-searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="search-question" placeholder="Rechercher une question..." />
				<input type="hidden" name="post_type" value="question"/>
			</form>
	    </div>

   			<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>

			<?php $the_query = new WP_Query( array('post_type' => 'question', 'posts_per_page' => 6, 'paged' => $paged) ); ?>

            <?php if ( $the_query->have_posts() ) : ?>
                
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    
                    <article  class="post_item">

                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            
                        <div><?php echo 'Posté il y a ' . human_time_diff( get_the_time('U'), current_time('timestamp') ); ?> par <a href=""><?php echo get_post_meta($post->ID, 'question-nom', true); ?></a> </div>
                        
                        <p>
                            <span class="tag">

                                <i class="tag-svg">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                                        <path id="tag-5-icon" d="M405.405,277.378L277.378,405.405L90.013,217.934V90.014h127.918L405.405,277.378 M462,277.368L234.499,50L50,50.001v184.5L277.37,462L462,277.368L462,277.368z M206.408,132.281c-9.632-9.632-22.44-14.938-36.062-14.937c-13.623-0.001-26.431,5.304-36.062,14.938c-19.886,19.884-19.885,52.241,0,72.125c9.633,9.633,22.439,14.938,36.062,14.937c13.622,0.001,26.43-5.304,36.062-14.937C226.293,184.522,226.293,152.167,206.408,132.281z M155.458,183.233c-8.209-8.209-8.208-21.568,0-29.777c8.227-8.226,21.544-8.229,29.774,0c8.209,8.21,8.209,21.567-0.001,29.775C177.008,191.456,163.687,191.462,155.458,183.233z"/>
                                    </svg>
                                </i> 

                                dans

                                <?php echo get_the_term_list( $post->ID, 'cat-question', ' ', ', ', '' ); ?>
                            </span>
                            <span>
                                <i class="tag-comment">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                                        <path id="speech-bubble-11-icon" d="M50,64.991v293.682h64.501v88.336l131.978-88.336H462V64.991H50z M256,283.567H121.841v-30H256V283.567z M391.841,223.567h-270v-30h270V223.567z M391.841,163.567h-270v-30h270V163.567z"/>
                                    </svg>
                                </i>

                                <?php comments_number( 'Non répondu', 'Une réponse', '% résponses' ); ?>
                            </span>
                        </p>

                        <a href="<?php the_permalink(); ?>">Continuer à lire</a>
                            
                       
                    </article>


                <?php endwhile; ?>
               
                <?php wp_reset_postdata(); ?>

            <?php endif; ?>
			
			     <div class=" alignleft"><?php next_posts_link( 'Questions précédentes', $the_query->max_num_pages ); ?></div>
            <div class=" alignright"><?php previous_posts_link( 'Questions suivantes', $the_query->max_num_pages ); ?></div>

   		</div>

   		<div class="col-sm-4">
   			<?php get_sidebar('communaute'); ?>
   		</div>
   </div>
      


</div>

<?php get_footer(); ?>
