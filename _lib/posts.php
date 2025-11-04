<?php

/**
* Custom Post Types
* Desenvolvedor: Darmison Fonteles
*/

//==============================================
// SLIDER exemplo
//==============================================

// function post_type_slider_register() {

//     $labels = array(
//         'name' => 'Slides',
//         'singular_name' => 'Slider',
//         'menu_name' => 'Slides',
//         'add_new' => _x('Adicionar Slider', 'item'),
//         'add_new_item' => __('Adicionar Novo Slider'),
//         'edit_item' => __('Editar Slider'),
//         'new_item' => __('Nova Slider')
//     );

//     $args = array(
//         'labels' => $labels,
//         'public' => false,
//         'publicly_queryable' => true,
//         'show_ui' => true,
//         'show_in_menu' => true,
//         'query_var' => true,
//         'rewrite' => array('slug' => 'slider'),
//         'capability_type' => 'post',
//         'has_archive' => false,
//         'hierarchical' => true,
//         'menu_position' => 2,
//         'menu_icon' => 'dashicons-images-alt2',
//         'supports' => array('title', 'thumbnail')

//     );

//     register_post_type('slider', $args);

// }

// add_action('init', 'post_type_slider_register');


