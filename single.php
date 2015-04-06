<?php get_header(); ?>


<section id="jumbotron">
    <div class="container">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        
        <div id="meta">
			<img alt="Eric Valois" src="<?php echo get_bloginfo("template_directory"); ?>/images/ericvalois.png" data-no-lazy="1" width="40" height="40" >
			
			<a class="author" href="https://plus.google.com/u/0/+EricValois/" rel="author">Eric Valois</a>

			<?php 
				$publication = get_the_date('d/m/Y');
				$modification = get_the_modified_date('d/m/Y');
			?> 
			
			 - Publié le 	<time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo $publication; ?></time>
			
			<?php if( $publication != $modification ): ?>
				 - Dernière modification <time datetime="<?php the_modified_date('Y-m-d'); ?>"><?php echo $modification; ?></time>
			<?php endif; ?>
			
			 - Catégorie <?php echo get_the_term_list( $post->ID, 'category', ' ', ', ', '' ); ?>

			<?php the_tags(' - Sujets: ', ', ', ''); ?> 
		</div>

    </div>
</section>

<div class="container">

    <div class="row">
        <div class="col-md-8">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single' ); ?>

			<?php endwhile; // end of the loop. ?>
		</div>

		<div class="col-md-4">
            <?php get_sidebar(); ?>
        </div>
    </div> <?php // row ?>

    <div class="row">
        <div class="col-md-8">

	        <?php if( comments_open() ): ?>
	        	<h3><?php comments_number( 'Laisser un commentaire', 'Un commentaire', '% commentaires' ); ?></h3>
	       	<?php else: ?>
	       		<h4>Commentaire fermé</h4>
	        <?php endif; ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template( '', true );
				endif;
			?>
		</div>

    </div> <?php // row ?>

</div> <?php // container ?>

<?php get_footer(); ?>

