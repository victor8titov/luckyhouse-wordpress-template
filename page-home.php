<?php
/*

Template Name: Главная

*/

get_header();

/* 
  Why we are the best
*/
if ( show_block('whyBest_show') ) {
  get_template_part('template-parts/content','block1');
}

/* 
  block 2
  Group of companies 
*/
if ( show_block('groupCompaines_show') ) {
  get_template_part('template-parts/content','block2');
}

/* 
  block 3
  History
*/
if ( show_block('history_show') ) {
  get_template_part('template-parts/content','block3');
}

/* 
  block 4
  References

*/
if ( show_block('references_show') ) {
  get_template_part('template-parts/content','block4');
}

/* 
  block 5
  partners
*/
if ( show_block('partners_show') ) {
  get_template_part('template-parts/content','block5');
}

/* 
  block 6
  form
*/
if ( show_block('form_show') ) {
  get_template_part('template-parts/content','form');
}

get_footer();
