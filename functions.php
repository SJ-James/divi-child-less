<?php
function divi_less_scripts() {
  // Enqueue Divi Styles
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
  // Enqueue your main LESS file
  wp_enqueue_style( 'less', get_stylesheet_directory_uri() . '/LESS/style.less' );
  // Filter for rel="stylesheet/less"
  add_filter('style_loader_tag','divi_less_replace_rel');
  // Get LESS JS from CDN
  wp_enqueue_script( 'less-js' , '//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.2/less.min.js' );
}
add_action( 'wp_enqueue_scripts', 'divi_less_scripts' );

function divi_less_replace_rel($tag){ // rel="stylesheet/less"
  return preg_replace("/='stylesheet' id='less-css'/", "='stylesheet/less' id='less-css'", $tag);
}
