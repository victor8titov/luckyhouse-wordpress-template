<!-- About -->
<!-- History -->
<section class="page-section" id="<?php echo lh_get_meta_box('history_id'); ?>">
    <div class="container">
		<div class="row">
			<div class="col-lg-12 text-center mb-5">
			
				<?php if (!empty(lh_get_meta_box('history_heading'))): ?>	
				<h2 class="section-heading text-uppercase"><?php echo lh_get_meta_box('history_heading'); ?></h2>
				<?php endif; ?>

				<?php if (!empty(lh_get_meta_box('history_subtitle'))): ?>
				<h3 class="section-subheading text-muted mb-0"><?php echo lh_get_meta_box('history_subtitle'); ?></h3>
				<?php endif; ?>
			</div>
      	</div>
		<div class="row">
			<div class="col-lg-12">
				<ul class="timeline">
					<?php 
					$query = new WP_Query(array(
					'post_type' 	=> 'history',
					'meta_key'	=> 'lh_history_position',
					'orderby'		=> 'meta_value_num',
					'order'		=> 'ASC',

					
					));
					$interation = 0;
					if ( $query->have_posts() ):
					while( $query->have_posts() ):
						$query->the_post();
						++$interation;
					?>
					<li <?php echo $interation%2 === 0 ? 'class="timeline-inverted"': ""; ?>>
					<?php if ( has_post_thumbnail( get_the_ID() ) ): ?>
					<div class="timeline-image">
						<?php echo get_the_post_thumbnail(get_the_ID(),'lh_thumbnail',array('class'=>'rounded-circle img-fluid')); ?> 
					</div>
					<?php else: ?>
					<div class="timeline-year">
						<h4><?php echo lh_get_meta_box('history_time'); ?></h4>
					</div>
					<?php endif; ?>
					<div class="timeline-panel">
						<div class="timeline-heading">

							<?php if (has_post_thumbnail( get_the_ID() )): ?>
							<h4><?php echo lh_get_meta_box('history_time'); ?></h4>
							<?php endif; ?>
							
							<?php if (!empty(get_the_title())): ?>
							<h4 class="subheading"><?php echo get_the_title(); ?></h4>
							<?php endif; ?>

						</div>
						<div class="timeline-body">
							
							<?php if (!empty( get_the_content())): ?>
							<p class="text-muted"><?php echo get_the_content(); ?></p>
							<?php endif; ?>

						</div>
					</div>
					</li>
					<?php 
					endwhile;
					wp_reset_postdata(); // сбрасываем переменную $post
					endif; 
					?>
					<li class="timeline-inverted">
					<div class="timeline-image">
						<h4>Be Part
						<br>Of Our
						<br>Story!</h4>
					</div>
					</li>
				</ul>
			</div>
		</div>
    </div>
</section>