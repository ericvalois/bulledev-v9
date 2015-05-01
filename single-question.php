<?php get_header(); ?>


<section id="jumbotron">
    <div class="container">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        
        <div id="meta">
			
			<?php if( validate_gravatar( get_post_meta($post->ID, 'question-courriel', true) ) ): ?>
				<?php echo get_avatar( get_post_meta($post->ID, 'question-courriel', true), 40, $default, $alt ); ?>
			<?php else: ?>
				<div class="wrap_avatar_single" style="background-color: <?php echo get_post_meta($post->ID, 'avatar_color', true); ?>">
					<?php echo substr( get_post_meta($post->ID, 'question-nom', true) , 0, 1); ?>
				</div>
			<?php endif; ?>

			<?php echo get_post_meta($post->ID, 'question-nom', true) ?>
			
			 - Posé il y a <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ); ?></time>

			 - Catégorie <?php echo get_the_term_list( $post->ID, 'cat-question', ' ', ', ', '' ); ?>
			

		</div>

    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-md-8  clear">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single' ); ?>


				<?php if( comments_open() ): ?>
		        	<h3><?php comments_number( 'Laisser une réponse', 'Une réponse', '% réponses' ); ?></h3>
		       	<?php else: ?>
		       		<h4>Les réponse fermé</h4>
		        <?php endif; ?>

				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>
		</div>

		<div class="col-md-4">
            <?php get_sidebar('communaute'); ?>
        </div>
    </div> <?php // row ?>
</div> <?php // container ?>

<?php get_footer(); ?>

