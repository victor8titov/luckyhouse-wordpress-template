<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lucky_House
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta property="og:title" content="Lucky House"/>
  <meta property="og:description" content="Our mission: to prolong youth, keep health and beauty of people"/>
  <meta property="og:image" content="<?php echo get_theme_root_uri().'/luckyhouse/brand.jpg'; ?>">    
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="900" />
  
  <meta property="og:url" content= "<?php echo home_url(); ?>" />
  
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

	<?php wp_head(); ?>
</head>

<body  id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <?php if ( lh_get_meta_box('main_brand') ): ?>
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
      <?php echo wp_get_attachment_image( lh_get_meta_box('main_brand'), 'medium', false,array('class'=>'img-fluid')); ?></a>
      <?php endif; ?>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>

<?php
			wp_nav_menu( array(
				'theme_location' => 'custom_header_menu',
        'menu_id'        => 'header-menu',
        'depth'           => 1, // количество уровней вложенности
        'container'       => 'div',
        'container_class' => 'collapse navbar-collapse', // css-класс блока
        'container_id'    => 'navbarResponsive', // id блока
        'menu_class'      => 'navbar-nav text-uppercase ml-auto',
        'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
        'walker'        => new lh_walker_nav_menu
			) );
?>
</div>
</nav>

<!-- Header -->
<header class="masthead" style="background-image: url('<?php echo wp_get_attachment_image_url( lh_get_meta_box('main_foto'),'full' ); ?>'); ">
<div class="container">
	<div class="intro-text">
  <div class="intro-lead-in"><?php echo lh_get_meta_box('main_intro'); ?></div>
  <div class="intro-brand"><?php  
  echo wp_get_attachment_image( lh_get_meta_box('main_brand_foto'), 'full', false,array('class'=>'img-fluid')); ?></div>
	<div class="intro-heading text-uppercase"><?php echo lh_get_meta_box('main_heading'); ?></div>
	<a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#<?php echo lh_get_meta_box('whyBest_id'); ?>">Tell Me More</a>        
	</div>
</div>
</header>

<?php if ( lh_get_meta_box('main_text_show') ) : ?>
<section class="page-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
      <?php 
        if (have_posts() ):
				while( have_posts() ): 
					/* body loop */
				the_post(); ?>
            	<?php the_content(); ?>
			<?php endwhile; /* конец while */ ?>
      <?php endif; ?>
          </div>
        </div>
      </div>  
</section>
        <?php endif; ?>



