<!-- Contact -->
<section class="page-section" id="<?php echo lh_get_meta_box('form_id'); ?>">
    <div class="container">
		<div class="row">
        	<div class="col-lg-12 text-center mb-5">
				<?php if (!empty(lh_get_meta_box('form_heading'))): ?>
          		<h2 class="section-heading text-uppercase"><?php echo lh_get_meta_box('form_heading'); ?></h2>
				<?php endif; ?>
				<?php if (!empty(lh_get_meta_box('form_subtitle'))): ?>
         		 <h3 class="section-subheading text-muted mb-0"><?php echo lh_get_meta_box('form_subtitle'); ?></h3>
				<?php endif; ?>
        	</div>
      	</div>
		<div class="row">
        	<div class="col-lg-12">
				<form id="contactForm" name="sentMessage" novalidate="novalidate">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name.">
								<p class="help-block text-danger"></p>
							</div>
							<div class="form-group">
								<input class="form-control" id="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address.">
								<p class="help-block text-danger"></p>
							</div>
							<div class="form-group">
								<input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number.">
								<p class="help-block text-danger"></p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<textarea class="form-control" id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
								<p class="help-block text-danger"></p>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="col-lg-12 text-center">
							<div id="success"></div>
							<button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
						</div>
					</div>
          		</form>
        	</div>
      	</div>
    </div>
</section>