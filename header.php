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
	<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

	<?php wp_head(); ?>
</head>

<body  id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top"><?php echo lh_get_meta_box('main_brand'); ?></a>
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
</nav>

<?php /*
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top"><?php echo lh_get_meta_box('main_brand'); ?></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <?php if ( show_block('whyBest_show') ): ?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Services</a>
          </li>
          <?php endif; ?>
         <?php if ( show_block('groupCompaines_show') ): ?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>
          </li>
          <?php endif; ?>
          <?php if ( show_block('history_show') ): ?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <?php endif; ?>
          <?php if ( show_block('references_show') ): ?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#team">Team</a>
          </li>
          <?php endif; ?>
          <?php if ( show_block('form_show') ): ?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
*/ ?>
<!-- Header -->
<header class="masthead" style="background-image: url(<?php echo wp_get_attachment_image_url( lh_get_meta_box('main_foto'),'full' ); ?>); ">
<div class="container">
	<div class="intro-text">
	<div class="intro-lead-in"><?php echo lh_get_meta_box('main_intro'); ?></div>
	<div class="intro-heading text-uppercase"><?php echo lh_get_meta_box('main_heading'); ?></div>
	<a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Tell Me More</a>        
	</div>
</div>
</header>

<section class="page-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
		  <?php 
		  	if( have_posts() ): 
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


