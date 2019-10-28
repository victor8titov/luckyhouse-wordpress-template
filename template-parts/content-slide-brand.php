 <!-- Clients -->
<section class="block-slide-brand py-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="slider-brand">
				<?php $stack_imgs = lh_get_meta_box('partners_images');
					foreach( $stack_imgs as $id) : ?>
          <div class="item px-4">
          <div class="icon" style="background-image: url(<?php echo wp_get_attachment_image_url($id, 'full'); ?>"></div>
					
					</div>
				<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>



    <!-- <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="<?php echo get_template_directory_uri() . '/img/logos/envato.jpg';  ?>" alt="">
          </a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="<?php echo get_template_directory_uri() . '/img/logos/designmodo.jpg';  ?>" alt="">
          </a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="<?php echo get_template_directory_uri() . '/img/logos/themeforest.jpg';  ?>" alt="">
          </a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="<?php echo get_template_directory_uri() . '/img/logos/creative-market.jpg';  ?>" alt="">
          </a>
        </div>
      </div>
    </div> -->
  </section>