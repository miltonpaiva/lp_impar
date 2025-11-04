<?php
/*
* Configurações do Tema
* Desenvolvedor: Darmison Fonteles
* Email: darmisonfontelesdev@gmail.com
*/


//===================================Painel================================================
require_once locate_template('/_lib/dashboard.php');

//================================Funções Dashboard========================================
require_once locate_template('/_lib/admin.php');//..................STYLE LOGIN/ADMIN
//require_once locate_template('/_lib/filtros.php');//..............FILTROS FIELDS

//===================================Features==============================================
require_once locate_template('/_lib/_features/social.php');//.......SOCIAL FIELDS
require_once locate_template('/_lib/_features/blog.php');//.........BLOG FUNCTIONS
require_once locate_template('/_lib/_features/remove.php');//.......CLEAN FUNCTIONS
require_once locate_template('/_lib/_features/excerpt.php');//......EXCERPT FUNCTIONS
require_once locate_template('/_lib/_features/share.php');//........SHARE FUNCTIONS
require_once locate_template('/_lib/_features/bem.php');//..........MENU BEM CSS
require_once locate_template('/_lib/_features/breadcrumbs.php');//..BREADCRUMBS
require_once locate_template('/_lib/_features/cforms.php');//.......CF7 SELECTS
require_once locate_template('/_lib/_features/dataformat.php');//...DATA FORMAT EVENTOS
require_once locate_template('/_lib/_features/sidebar.php');   //...SIDEBAR
require_once locate_template('/_lib/_features/pagnav.php');//.......PAGINATION

//===================================Backend===============================================
require_once locate_template('/_lib/posts.php');//..................POST TYPE FUNCTIONS
require_once locate_template('/_lib/taxonomies.php');//.............TAXONOMIES FUNCTIONS
require_once locate_template('/_lib/thumbs.php');//.................THUMBNAIL FUNCTIONS

//===================================Tema==================================================
require_once locate_template('/_lib/scripts.php');//................SCRIPTS E CSS
require_once locate_template('/_lib/ajax.php');//...................FUNÇÕES AJAX


// CONFIGURAÇÕES DO TEMA
function tema_setup() {

  // Register wp_nav_menu() menus (http://codex.wordpress.org/Function_Reference/register_nav_menus)
  register_nav_menus(array(
    'menu_1' => 'Menu Header',
    'menu_2' => 'Menu Footer',
  ));

  add_editor_style('/assets/css/editor-style.css');//..Tell the TinyMCE editor to use a custom stylesheet
  add_theme_support('post-thumbnails');//..............Add post thumbnails (http://codex.wordpress.org/Post_Thumbnails)
  set_post_thumbnail_size(1200, 0, true);

}

add_action('after_setup_theme', 'tema_setup');

// METABOX CLASS (Fields + Taxonomies Fields)
if (is_admin()):
  define('RWMBC_URL', trailingslashit( get_stylesheet_directory_uri() . '/_lib/_metabox'));
  define('RWMBC_DIR', trailingslashit( STYLESHEETPATH . '/_lib/_metabox'));
  require_once RWMBC_DIR . 'functions.php';
  require_once RWMBC_DIR . 'campos.php';
  require_once RWMBC_DIR . 'campos-pages.php';
  require_once RWMBC_DIR . 'campos-taxonomy.php';
  require_once RWMBC_DIR . 'settings.php';
endif;


add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );
function remove_wp_logo( $wp_admin_bar ) {
  $wp_admin_bar->remove_node( 'wp-logo' );
}


add_action( 'parse_request', 'maybe_redirect_old_permalinks' );
function maybe_redirect_old_permalinks( $wp ) {
  
  $the_slug = $wp->request;
  $args = array(
    'name'        => $the_slug,
    'post_type'   => 'post',
    'post_status' => 'publish',
    'numberposts' => 1
  );
  $my_posts = get_posts($args);
  
  
  if( $wp->request != null && $my_posts) :
    
    //echo $my_posts[0]->ID;
    $x =  get_permalink( $my_posts[0]->ID );
    //echo 'ID on the first post found ' . $my_posts[0]->ID;

    wp_redirect( $x, 301 );
    exit;
    
  endif;
}



// PARA ESSA FUNÇÃO FUNCIONAR PRECISA ESTAR COM O PLUGIN DO YOAST ATIVADO
function get_primary_category($category){
  
  $useCatLink = true;

  // If post has a category assigned.
  if ($category){

    $category_display = '';
    $category_link    = '';
    $category_color   = '';
    
    if ( class_exists('WPSEO_Primary_Term') ) {
      
      // Show the post's 'Primary' category, if this Yoast feature is available, & one is set
      $wpseo_primary_term = new WPSEO_Primary_Term( 'category', get_the_id() );
      $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
      
      $term = get_term( $wpseo_primary_term );

      if (is_wp_error($term)) {
        // Default to first category (not Yoast) if an error is returned
        $category_display = $category[0]->name;
        $category_link    = get_category_link( $category[0]->term_id );
        $category_color   = get_term_meta( $category[0]->term_id, 'term_color', true); 
      } else {
        // Yoast Primary category
        $category_display = $term->name;
        $category_link    = get_category_link( $term->term_id );
        $category_color   = get_term_meta( $term->term_id, 'term_color', true);  
      }
      
    } else {
      // Default, display the first category in WP's list of assigned categories
      $category_display = $category[0]->name;
      $category_link    = get_category_link( $category[0]->term_id );
      $category_color   = get_term_meta( $category[0]->term_id, 'term_color', true);  
    }
    
    // Display category
    if ( !empty($category_display) && !empty($category_color) && !empty($category_link)){
      if ( $useCatLink == true && !empty($category_link) && !empty($category_color) ){
      return ['categoria' => $category_display, 'cor' => $category_color, 'link' => $category_link];
    } else {
      return ['categoria' => $category_display, 'cor' => $category_color, 'link' => $category_link];
      }
    }
  }
}


function theme_enqueue_icons() {
  wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_icons' );

function theme_enqueue_aos() {
  wp_enqueue_style('aos-css', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css');
  wp_enqueue_script('aos-js', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js', array(), null, true);
  wp_add_inline_script('aos-js', 'AOS.init({ duration: 1000, once: false });');
}
add_action('wp_enqueue_scripts', 'theme_enqueue_aos');
