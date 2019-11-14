 <!-- Clients -->
<section class="block-slide-brand py-5 page-section ">
	<div class="container">
  		<div class="row">
			<div class="col-lg-12 text-center mb-5">
 				
				<?php if (!empty(lh_get_meta_box('partners_heading'))): ?>
				<h2 class="section-heading text-uppercase"><?php echo lh_get_meta_box('partners_heading'); ?></h2>
				<?php endif; ?>

				<?php if (!empty(lh_get_meta_box('partners_subtitle'))): ?>
				<h3 class="section-subheading text-muted mb-0"><?php echo lh_get_meta_box('partners_subtitle'); ?></h3>
				<?php endif; ?>
			</div>
    	</div>
		<div class="row">
			<div class="col-12">
				<div class="slider-brand">
				<?php $stack_imgs = lh_get_meta_box('partners_images');
					foreach( $stack_imgs as $id) : ?>
          			<div class="item px-4">
          				<div class="icon" style="background-image: url('<?php echo wp_get_attachment_image_url($id, 'full'); ?>'); "></div>
					</div>
				<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>