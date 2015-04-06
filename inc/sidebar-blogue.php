<div class="mc_embed_signup sidebar_box">

	<h4>Blogue</h4>
	
	<form action="//bulledev.us1.list-manage.com/subscribe/post?u=7264b91f91da7aa36c6142ac0&amp;id=8bbcc78d1e" method="post" class="mc-embedded-subscribe-form validate" name="mc-embedded-subscribe-form" target="_blank" >
		
		
		<div class="pulse animated">
			<input type="email" value="" name="EMAIL" placeholder="Courriel" class="required email" id="mce-EMAIL" required>
			<input type="submit" value="S'abonner" name="subscribe" id="mc-embedded-subscribe" class="button button-blue">
		</div>

		<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
	    <div style="position: absolute; left: -5000px;"><input type="text" name="b_7264b91f91da7aa36c6142ac0_8bbcc78d1e" value=""></div>
		<div class="clear"></div>
		<small>Ne vous inquiétez pas, nous détestons le spam!</small>
	</form>

	<ul>
		<?php 
			$pc = new WP_Query( array('order' => 'DESC', 'posts_per_page' => 3 )); 
		
			while ($pc->have_posts()) : $pc->the_post(); ?>
				<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
		<?php 
			endwhile; 

			wp_reset_query();
		?>
	</ul>
</div>