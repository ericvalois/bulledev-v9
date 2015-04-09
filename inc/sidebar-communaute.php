<div class="sidebar_box">

	<h4>Questions <br>de performance Web</h4>
	
	<a href="<?php echo get_permalink(1485); ?>" class="button button-blue">Poser une question</a>

	<ul>
		<?php 
			$questions = new WP_Query( array('order' => 'DESC', 'posts_per_page' => 3, 'post_type' => 'question' )); 
		
			while ($questions->have_posts()) : $questions->the_post(); ?>
				<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
		<?php 
			endwhile; 

			wp_reset_query();
		?>
	</ul>
</div>