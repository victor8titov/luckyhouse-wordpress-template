<!-- Team -->
<section class="bg-light page-section" id="<?php echo lh_get_meta_box('references_id'); ?>">
    <div class="container">
		<div class="row">
        	<div class="col-lg-12 text-center mb-5">
				<?php if (!empty(lh_get_meta_box('references_heading'))): ?>
				<h2 class="section-heading text-uppercase"><?php echo lh_get_meta_box('references_heading'); ?></h2>
				<?php endif; ?>
				<?php if (!empty(lh_get_meta_box('references_subtitle'))): ?>
				<h3 class="section-subheading text-muted mb-0"><?php echo lh_get_meta_box('references_subtitle'); ?></h3>
				<?php endif; ?>
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
					<?php 
					$content = strip_tags(get_the_content());
					if ( empty( $content ) ): ?>
					<?php echo get_the_post_thumbnail(get_the_ID(), 'full',array('class'=>'rounded-circle no-link')); ?>
					<?php else: ?>
					<a class="team-link " data-toggle="modal" href="#teamModal<?php echo get_the_ID(); ?>">
						<div class="team-hover rounded-circle">
							<div class="team-hover-content">
								<i class="fas fa-plus fa-3x"></i>
							</div>
						</div>
					<?php echo get_the_post_thumbnail(get_the_ID(), 'full',array('class'=>'rounded-circle')); ?>
					</a>
			  		<?php endif; ?>	
					<h4><?php the_title(); ?></h4>

					<?php if (!empty(lh_get_meta_box('references_subtitle'))): ?>
					<p class="text-muted"><?php echo lh_get_meta_box('references_subtitle'); ?></p>
					<?php endif; ?>

				</div>
			</div>
			<?php 
			endwhile;
			wp_reset_postdata(); // сбрасываем переменную $post
			endif; 
			?>
		</div>
        
      	<div class="row">
        	<div class="col-lg-8 mx-auto text-center">
			<?php if (!empty(lh_get_meta_box('references_text'))): ?>
          	<p class="large text-muted"><?php echo lh_get_meta_box('references_text'); ?></p>
			<?php endif; ?>
        	</div>
      	</div>
    </div>
  </section>
  <?php
	$query = new WP_Query(array(
		'post_type' => 'references',
	)); 
		
	if( $query->have_posts() ){
		while( $query->have_posts() ){
			$query->the_post();
			$content = strip_tags(get_the_content());
			if ( empty( $content ) ) continue;
?>
<!-- Modal <?php echo get_the_ID(); ?> -->
<div class="portfolio-modal modal fade" id="teamModal<?php echo get_the_ID(); ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
