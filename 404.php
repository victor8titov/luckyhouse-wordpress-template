<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Lucky_House
 */

get_header();
* 
  Why we are the best
*/
if ( show_block('whyBest_show') ) {
  get_template_part('template-parts/content','block-cards');
}

/* 
  block 2
  Group of companies 
*/
if ( show_block('groupCompaines_show') ) {
  get_template_part('template-parts/content','block-cards-more');
}

/* 
  block 3
  History
*/
if ( show_block('history_show') ) {
  get_template_part('template-parts/content','timeline');
}

/* 
  block 4
  References

*/
if ( show_block('references_show') ) {
  get_template_part('template-parts/content','cards-team');
}

/* 
  block 5
  partners
*/
if ( show_block('partners_show') ) {
  get_template_part('template-parts/content','slide-brand');
}

/* 
  block 6
  form
*/
if ( show_block('form_show') ) {
  get_template_part('template-parts/content','form');
}

get_footer();
