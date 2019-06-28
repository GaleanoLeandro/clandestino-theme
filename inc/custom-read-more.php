<?php 
  function clandestino_read_more() {
    return '<span>...</span>';
  }

  add_filter('excerpt_more', 'clandestino_read_more');

  function clandestino_excerpt_length() {
    return 35;
  }

  add_filter('excerpt_length', 'clandestino_excerpt_length');
?>