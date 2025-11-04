<?php



    $prefix = 'wpcf_';
    add_filter('rwmb_meta_boxes', 'wpcf_meta_boxes');
    function wpcf_meta_boxes($meta_boxes) {

  
      
    return $meta_boxes;

}

