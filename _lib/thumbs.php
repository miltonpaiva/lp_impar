<?php
/*
* Thumbnail functions
* Desenvolvedor: Darmison Fonteles
*/

//=========================================================================================
// ADICIONANDO TAMANHHO DE IMAGENS
//=========================================================================================

if (function_exists('add_image_size')) {
    add_image_size('thumb-medium', 345, 352, true );
    add_image_size('thumb-ultimos', 375, 195, true );
    add_image_size('thumb-single', 810, 428, true );
    add_image_size('full', 1920, 1080, false );
    add_image_size('thumb', 150, 150, true );
    add_image_size('thumb-small', 80, 80, true );
}

// FUNÇÃO PARA CUSTOMIZAR O TEMA ATRAVÉS DO PAINEL.
// https://codex.wordpress.org/Theme_Customization_API
// tutor: https://scriptcerto.com.br/blogwordpress/o-guia-completo-personalizador-tema-wordpress/
function cd_customizer_settings ($wp_customize) {

    // adiciona a config. para fazer upload da logo desktop.
    $wp_customize->add_setting( 'logo_header_desktop' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_header_desktop', array(
        'label'    => __( 'Logo Header Desktop', 'm1' ),
        'section'  => 'title_tagline',
        'settings' => 'logo_header_desktop',
    ))); 

    $wp_customize->add_setting( 'logo_footer_desktop' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_footer_desktop', array(
        'label'    => __( 'Logo Footer Desktop', 'm1' ),
        'section'  => 'title_tagline',
        'settings' => 'logo_footer_desktop',
    )));
    
    // adiciona a config. para fazer upload da logo mobile.
    $wp_customize->add_setting( 'logo_mobile' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_mobile', array(
        'label'    => __( 'Logo Mobile', 'm1' ),
        'section'  => 'title_tagline',
        'settings' => 'logo_mobile',
    ))); 

    $wp_customize->add_setting( 'logo_mobile_marca' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_mobile_marca', array(
        'label'    => __( 'Logo Mobile Marca', 'm1' ),
        'section'  => 'title_tagline',
        'settings' => 'logo_mobile_marca',
    )));

}
add_action ('customize_register', 'cd_customizer_settings');