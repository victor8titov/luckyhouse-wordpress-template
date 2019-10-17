
<!-- Services -->
<section class="page-section" id="services">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2 class="section-heading text-uppercase"><?php echo lh_get_meta_box('whyBest_heading'); ?></h2>
					<h3 class="section-subheading text-muted"><?php echo lh_get_meta_box('whyBest_subtitle'); ?></h3>
				</div>
			</div>
			<div class="row text-center">
			<?php
				$query = new WP_Query(array(
					'post_type' => 'why_we_best',
					'orderby'	=> 'date',
					'order'		=> 'ASC',
				)); 
				 
				if( $query->have_posts() ){
					while( $query->have_posts() ){
						$query->the_post();
						?>
						<div class="col-md-4">

							<span class="fa-stack fa-4x">
								<i class="fas fa-circle fa-stack-2x text-primary"></i>
								<?php echo get_the_post_thumbnail(get_the_ID(),'full',array('class'=>'fa-stack-1x')); ?>
								<!-- <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i> -->
							</span>
							<h4 class="service-heading"><?php the_title(); ?></h4>
							<p class="text-muted"><?php the_content(); ?></p>
						</div>						
						<?php
					}
					wp_reset_postdata(); // сбрасываем переменную $post
				} 
				else
					echo 'Записей нет.';
				
			?>
			<!--
				<div class="col-md-4">
					<span class="fa-stack fa-4x">
						<i class="fas fa-circle fa-stack-2x text-primary"></i>
						<i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
					</span>
					<h4 class="service-heading">E-Commerce</h4>
					<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
				</div>
				<div class="col-md-4">
					<span class="fa-stack fa-4x">
						<i class="fas fa-circle fa-stack-2x text-primary"></i>
						<i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
					</span>
					<h4 class="service-heading">Responsive Design</h4>
					<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
				</div>
				<div class="col-md-4">
					<span class="fa-stack fa-4x">
						<i class="fas fa-circle fa-stack-2x text-primary"></i>
						<i class="fas fa-lock fa-stack-1x fa-inverse"></i>
					</span>
					<h4 class="service-heading">Web Security</h4>
					<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
				</div>
			</div>
		</div>
		-->
	</section>