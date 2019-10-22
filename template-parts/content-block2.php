<!-- Portfolio Grid -->
<!-- Group of companies  -->
<section class="bg-light page-section" id="<?php echo lh_get_meta_box('groupCompaines_id'); ?>">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase"><?php echo lh_get_meta_box('groupCompaines_heading'); ?></h2>
          <h3 class="section-subheading text-muted"><?php echo lh_get_meta_box('groupCompaines_subtitle'); ?></h3>
        </div>
      </div>
      <div class="row">
      <?php
				$query = new WP_Query(array(
					'post_type' => 'group_of_companies',
					'orderby'	=> 'date',
					'order'		=> 'ASC',
				)); 
				 
				if( $query->have_posts() ){
					while( $query->have_posts() ){
						$query->the_post();
						?>
						<div class="col-md-4 col-sm-6 portfolio-item">
							<a class="portfolio-link" data-toggle="modal" href="#portfolioModal<?php echo get_the_ID(); ?>">
								<div class="portfolio-hover">
								<div class="portfolio-hover-content">
									<i class="fas fa-plus fa-3x"></i>
								</div>
								</div>
								 <?php echo get_the_post_thumbnail(get_the_ID(),'lh_thumbnail',array('class'=>'img-fluid')); ?> 
							</a>
							<div class="portfolio-caption">
								<h4><?php the_title(); ?></h4>
								<p class="text-muted"><?php echo lh_get_meta_box('group_subtitle_card'); ?></p>
							</div>
						</div>
						<?php
					}
					wp_reset_postdata(); // сбрасываем переменную $post
				} 
				
				
			?>
  </section>


<?php
	$query = new WP_Query(array(
		'post_type' => 'group_of_companies',
	)); 
		
	if( $query->have_posts() ){
		while( $query->have_posts() ){
			$query->the_post();
?>
	<!-- Modal <?php echo get_the_ID(); ?> -->
	<div class="portfolio-modal modal fade" id="portfolioModal<?php echo get_the_ID(); ?>" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
					<div class="modal-content">
						<div class="close-modal" data-dismiss="modal">
						<div class="lr">
							<div class="rl"></div>
						</div>
						</div>
						<div class="container">
						<div class="row">
							<div class="col-lg-8 mx-auto">
							<div class="modal-body">
								<!-- Project Details Go Here -->
								<h2 class="text-uppercase"><?php the_title(); ?></h2>
								<p class="item-intro text-muted"><?php echo lh_get_meta_box('group_subtitle_article'); ?></p>
								<?php echo get_the_post_thumbnail(get_the_ID(),'full',array('class'=>'img-fluid d-block mx-auto')); ?>
								<?php the_content(); ?> 
								<button class="btn btn-primary" data-dismiss="modal" type="button">
								<i class="fas fa-times"></i>
								Close Project</button>
							</div>
							</div>
						</div>
						</div>
					</div>
					</div>
				</div>
			<?php
		}
		wp_reset_postdata(); // сбрасываем переменную $post
	} 
?>

