<?php
/*
* AJAX functions
*/

function load_more_projects() {
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    error_log('AJAX chamado, página: ' . $page);
    $query = new WP_Query([
        'post_type' => 'portfolio', // Altere para o tipo de post correto
        'posts_per_page' => 6, // Ajuste conforme sua necessidade
        'paged' => $page,
    ]);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            include(locate_template('templates/content/loop-projetos-port.php'));
        endwhile;
    else :
        wp_send_json(false); // Retorna falso quando não há mais projetos
    endif;

    wp_reset_postdata();
    wp_die();
}
add_action('wp_ajax_load_more_projects', 'load_more_projects');
add_action('wp_ajax_nopriv_load_more_projects', 'load_more_projects');


?>