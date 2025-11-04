<?php

/*
* Metabox Settings
* Desenvolvedor: Darmison Fonteles
*/

// CREATE PAGE
add_filter( 'mb_settings_pages', 'prefix_options_page' );
function prefix_options_page($settings_pages){

  $settings_pages[] = array(
    'id'          => 'theme-options',
    'option_name' => 'options_gerais',
    'menu_title'  => 'Frontpage',
  );

  return $settings_pages;
}

// START DEFINITION OF META BOXES
add_filter( 'rwmb_meta_boxes', 'prefix_options_meta_boxes' );
function prefix_options_meta_boxes( $meta_boxes ) {

  // Exemplo
  // $meta_boxes[] = array(
  //   'id'        => 'gtm_codes',
  //   'title'     => 'GTM Code',
  //   'context'   => 'side',
  //   'priority'  => 'high',
  //   'settings_pages' => 'theme-options',
  //   'fields'    => array(

  //     array(
  //       'name'  => '',
  //       'id'    => 'gtm_head',
  //       'desc'  => 'Code Head',
  //       'type'  => 'textarea',

  //     ),

  //     array(
  //       'name'  => '',
  //       'id'    => 'gtm_body',
  //       'desc'  => 'Code Body',
  //       'type'  => 'textarea',

  //     ),
  //   )
  // );


  return $meta_boxes;

}