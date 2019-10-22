<!-- Team -->
<section class="bg-light page-section" id="<?php echo lh_get_meta_box('references_id'); ?>">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase"><?php echo lh_get_meta_box('references_heading'); ?></h2>
          <h3 class="section-subheading text-muted"><?php echo lh_get_meta_box('references_subtitle'); ?></h3>
        </div>
      </div>
      <div class="row">
      <?php 
            $query = new WP_Query(array(
			  	'post_type' 	=> 'references',
			  	'orderby'	=> 'date',
				'order'		=> 'ASC',	
			));
            if ( $query->have_posts() ):
			  while( $query->have_posts() ):
				$query->the_post();
              ?>
			<div class="col-sm-4">
				<div class="team-member">
					<?php echo get_the_post_thumbnail(get_the_ID(), 'full',array('class'=>'mx-auto rounded-circle')); ?>
					<h4><?php the_title(); ?></h4>
					<p class="text-muted"><?php echo lh_get_meta_box('references_subtitle'); ?></p>
					<ul class="list-inline social-buttons">
					<li class="list-inline-item">
						<a href="#">
						<i class="fab fa-twitter"></i>
						</a>
					</li>
					<li class="list-inline-item">
						<a href="#">
						<i class="fab fa-facebook-f"></i>
						</a>
					</li>
					<li class="list-inline-item">
						<a href="#">
						<i class="fab fa-linkedin-in"></i>
						</a>
					</li>
					</ul>
				</div>
			</div>
		<?php 
			endwhile;
			wp_reset_postdata(); // сбрасываем переменную $post
		endif; 
		?>

        
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <p class="large text-muted"><?php echo lh_get_meta_box('references_text'); ?></p>
        </div>
      </div>
    </div>
  </section>