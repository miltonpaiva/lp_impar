<?php

/*
* Scripts
* Desenvolvedor: Darmison Fonteles
*/



// function call_script() {


//     wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.min.css', array(), '1.0', null);
//     wp_register_script('main', get_template_directory_uri() . '/assets/js/main.min.js', array(), '3.1', true);

//     wp_enqueue_script('main');

// }



// add_action('wp_enqueue_scripts', 'call_script', 100);

// function call_script() {
//     wp_deregister_script('main'); // Remove registros anteriores
//     wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.min.css', array(), '1.0', null);
//     wp_register_script('main', get_template_directory_uri() . '/assets/js/main.min.js', array(), '3.1', true);
//     wp_enqueue_script('main');
// }
// add_action('wp_enqueue_scripts', 'call_script', 10);


function call_script() {
    $css_file = get_template_directory() . '/assets/css/main.min.css';
    $css_url = get_template_directory_uri() . '/assets/css/main.min.css';

    if (file_exists($css_file)) {
        wp_enqueue_style(
            'main',
            $css_url,
            array(),
            filemtime($css_file),
            'all'
        );
    } else {
        if (current_user_can('administrator')) {
            error_log("O arquivo CSS não foi encontrado: $css_file");
            echo '<!-- Arquivo CSS não encontrado: ' . esc_html($css_file) . ' -->';
        }
    }

    $js_file = get_template_directory() . '/assets/js/main.min.js';
    $js_url = get_template_directory_uri() . '/assets/js/main.min.js';

    if (file_exists($js_file)) {
        wp_register_script(
            'main',
            $js_url,
            array('jquery'),
            filemtime($js_file),
            true
        );
        wp_enqueue_script('main');
    } else {
        if (current_user_can('administrator')) {
            error_log("O arquivo JS não foi encontrado: $js_file");
            echo '<!-- Arquivo JS não encontrado: ' . esc_html($js_file) . ' -->';
        }
    }
}
add_action('wp_enqueue_scripts', 'call_script');


