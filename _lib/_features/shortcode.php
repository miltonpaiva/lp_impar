<?php 
  
  // SHORTCODE DOS BANNERS E ZONA
  function shortcode_banner($atts) { 

    // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
    date_default_timezone_set('America/Fortaleza');

    // ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
    $dataLocal = date('Y/m/d H:i:s', time());

    // PEGA O IP DO USUÁRIO COM BASE NO ESTADO EM QUE SE ENCONTRA
    $estado    = get_location_banner();

    // PEGA O SLUG DA PAGINA QUE ESTÁ SENDO VISUALIZADA
    
    //vard_dump($slug);
    //$slug = 'materias';
      
    $banner = new WP_Query(array('post_type'=>'banner',
    'tax_query' => array(

      'relation' => 'AND',
      //array('taxonomy'=>'local','field'=>'slug','terms'=>$slug,
      array('taxonomy'=>'local','field'=>'slug','terms'=>$atts['slug']),
      array('taxonomy'=>'zona','field'=>'slug','terms'=>$atts['zona']),
      array('taxonomy'=>'estados','field'=>'slug','terms'=>$estado),

    ),'meta_query' => array(

      array(
        'key' => 'banner_expiracao',
        'value' => $dataLocal,   
        'compare' => '>=', 
        'type' => 'DATETIME',
      ),

    ),'showposts'=>-1,'orderby'=>'date','order'=>'ASC'));
          
    if( $banner->have_posts()) :
      $zona_css = str_replace(' ', '-', $atts['zona']); 
      $total_banner  = $banner->post_count;
      $imgBanner="";
      $items = "";
      while ( $banner->have_posts() ) : $banner->the_post();
        $banner_mobile   = get_post_meta(get_the_ID(), 'banner_thumb', false); // MOBILE
        $banner_desktop  = get_post_meta(get_the_ID(), 'banner_thumb_desktop', false); // HEADER E FOOTER DE TODAS AS PAGES         
        $banner_sidebar  = get_post_meta(get_the_ID(), 'banner_thumb_vertical_desktop', false); // SIDEBAR        
        $banner_interno  = get_post_meta(get_the_ID(), 'banner_interno_desktop', false);  // INTERNO DE NOTICIAS E MATERIAS                
        $banner_interno_mobile  = get_post_meta(get_the_ID(), 'banner_interno_mobile', false);  // INTERNO DE NOTICIAS E MATERIAS - MOBILE               
        $banner_interno_vest = get_post_meta(get_the_ID(), 'banner_interno_vestibular_desktop', false); // INTERNO DE VESTIBULAR                   
        $banner_interno_vest_mobile  = get_post_meta(get_the_ID(), 'banner_interno_vestibular_mobile', false); // INTERNO DE VESTIBULAR - MOBILE                   
        $link            = get_post_meta(get_the_ID(), 'banner_link', true);
        $page_current    = $atts['slug']; // get page
                                          
        count_views_banner(get_the_ID());  

        if ( wp_is_mobile() ):

          if($atts['zona'] == 'interna-vestibular'):
          
            foreach($banner_interno_vest_mobile as $img):
              $imgBanner = wp_get_attachment_image( $img, 'full', "", array("class" => "banner__thumb" ));
              $thumb_url = wp_get_attachment_url($img);
              banner_details(get_the_ID(), $page_current, $thumb_url);
            endforeach;
          
          elseif($atts['zona'] == 'interna'):

            foreach ($banner_interno_mobile as $img):
              $imgBanner = wp_get_attachment_image( $img, 'thumb-large', "", array("class" => "banner__thumb" ));
              $thumb_url = wp_get_attachment_url($img);
              banner_details(get_the_ID(), $page_current, $thumb_url);      
            endforeach;
          
          else:

            foreach ($banner_mobile as $img):
              $imgBanner = wp_get_attachment_image( $img, 'full', "", array("class" => "banner__thumb"));
              $thumb_url = wp_get_attachment_url($img);
              banner_details(get_the_ID(), $page_current, $thumb_url);
            endforeach;

          endif;

        elseif($atts['zona'] == 'sidebar'):

          foreach ($banner_sidebar as $img):
            $imgBanner = wp_get_attachment_image( $img, 'full', "", array("class" => "banner__thumb" ));
            $thumb_url = wp_get_attachment_url($img);
            banner_details(get_the_ID(), $page_current, $thumb_url);      
          endforeach;
        
        elseif($atts['zona'] == 'interna'):
              
          foreach ($banner_interno as $img):
            $imgBanner = wp_get_attachment_image( $img, 'full', "", array("class" => "banner__thumb" ));
            $thumb_url = wp_get_attachment_url($img);
            banner_details(get_the_ID(), $page_current, $thumb_url);      
          endforeach;

        elseif($atts['zona'] == 'interna-vestibular'):
            
          foreach($banner_interno_vest as $img):
            $imgBanner = wp_get_attachment_image( $img, 'full', "", array("class" => "banner__thumb" ));
            $thumb_url = wp_get_attachment_url($img);
            banner_details(get_the_ID(), $page_current, $thumb_url);
          endforeach;

        else:
              
          foreach ($banner_desktop as $img):
            $imgBanner = wp_get_attachment_image( $img, 'full', "", array("class" => "banner__thumb" )); 
            $thumb_url = wp_get_attachment_url($img);
            banner_details(get_the_ID(), $page_current, $thumb_url);     
          endforeach;

        endif;

        $items .= '<a href="/pagina-redirect-banner?post_id='.get_the_ID().'&link_redirect='.$link.'" target="_blank" title="'.get_the_title().'" class="item">'.$imgBanner.'</a>';
      endwhile;
    endif;

    $class_css = ($zona_css == 'interna' || $zona_css == 'interna-vestibular') ? 'main-container--interna' : '';
    $sub_class_css = ($total_banner > 1) ? 'anuncio owl-carousel owl-theme' : '';  
      
    $return_string = '
    <div class="main-container '.$class_css.'">
        <div data-zone="'.$atts['zona'].'" class="banner-'.$zona_css.' '.$sub_class_css.'">
          '.$items.'
        </div>
    </div>
    ';


    return $return_string;
    
  }
  add_shortcode('banner', 'shortcode_banner');


  // VERIFY IF IS USER BOT
  function is_a_bot(){

    $is_bot      = false;

    $user_agents = array( 'GTmetrix', 'Googlebot', 'Bingbot', 'BingPreview', 'msnbot', 'slurp', 'Ask Jeeves/Teoma', 'Baidu', 'DuckDuckBot', 'AOLBuild' );

    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    foreach ( $user_agents as $agent ){
    
      if ( strpos( $user_agent, $agent) ){
        $is_bot = true;
      }
    }

    return $is_bot;

  }

  function count_views_banner($post_ID) {

    if ( ! is_a_bot() ){

      // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
      date_default_timezone_set('America/Fortaleza');
    
      // ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
      $dataLocal = date('Y/m/d H:i:s', time());
                
      global $wpdb;
      $query = "INSERT INTO vp_cvtt_wp_banners (ID, POST_ID, VIEW, DATA ) 
      VALUES (null, '$post_ID', 1, '$dataLocal') ON DUPLICATE KEY UPDATE VIEW = (VIEW + VALUES(VIEW))";
      $wpdb->query( $query );
    
    }  
  }

  function count_click_banner($post_ID, $_URL_ID) {

    if($_URL_ID) {

      // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
      date_default_timezone_set('America/Fortaleza');
    
      // ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
      $dataLocal = date('Y/m/d H:i:s', time());

      global $wpdb;

      $query = "INSERT INTO vp_cvtt_wp_banners (ID, POST_ID, CLICK, DATA) 
      VALUES (null, '$post_ID', 1, '$dataLocal') ON DUPLICATE KEY UPDATE CLICK = (CLICK + VALUES(CLICK))";
      $wpdb->query( $query );
        
        /* ID do registro que acabou de ser inserido. */
        //$lastid = $wpdb->insert_id;
    }
  }

  function banner_details($post_ID, $page, $thumb_url) {
 
    if ( ! is_a_bot() ){


      // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
      date_default_timezone_set('America/Fortaleza');
    
      // ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
      $dataLocal = date('Y/m/d H:i:s', time());
    
      global $wpdb;
     
    
      if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {

        //check ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];

      } elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
        
        //to check ip is pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

      } else {
        
        $ip = $_SERVER['REMOTE_ADDR'];

      }
        
      $user_agent = $_SERVER['HTTP_USER_AGENT'];
   
      $query = "INSERT INTO vp_cvtt_wp_banners_details (ID, POST_ID, URL, IP, DATA, PAGE, AGENTE) VALUES (null, '$post_ID', '$thumb_url', '$ip', '$dataLocal', '$page', '$user_agent')";
      $wpdb->query( $query );
   
    }   
  }

  // ADC AS COLUNAS VIEWS E CLICKS NO POST TYPE REVISTA
  add_filter('manage_edit-banner_columns', 'add_columns_banners');  
  function add_columns_banners($columns) {
    $columns['views']  = 'Views';
    $columns['clicks'] = 'Clicks';
    return $columns;
  }
        
  add_filter( 'manage_edit-banner_sortable_columns', 'sortable_banner_column' );
  function sortable_banner_column( $columns ) {
    $columns['views'] = 'views';
    $columns['clicks'] = 'clicks';
    //To make a column 'un-sortable' remove it from the array
    //unset($columns['date']);
    return $columns;
  }

  // EXIBE OS VALORES NAS COLUNA VIEW E CLICKS NO POST TYPE BANNER.
  function show_column_view_clicks( $column, $post_ID ) {

    global $wpdb;

    if($column == 'views') {

        $results = $wpdb->get_results( "SELECT VIEW FROM vp_cvtt_wp_banners WHERE POST_ID = {$post_ID}" );
        
        if ($results) {

            foreach($results as $item) {

              $soma = $soma + $item->VIEW;
              
            }
        } 
          
        echo number_format($soma, 0, ",", ".");

    
    } elseif($column == 'clicks') {

        $results = $wpdb->get_results( "SELECT CLICK FROM vp_cvtt_wp_banners WHERE POST_ID = {$post_ID}" );
        
        if ($results) {

            foreach($results as $item) {

              $soma = $soma + $item->CLICK;
              
            }
        } 
          
        echo number_format($soma, 0, "," , ".");
    }
 
  }
  add_action( 'manage_banner_posts_custom_column' , 'show_column_view_clicks', 10, 2 );



  

  // ADICIONANDO SHORTCODE NO EDITOR
  
  // Filter Functions with Hooks
  function custom_mce_button() {
    // Check if user have permission
    if ( !current_user_can( 'edit_posts' ) || !current_user_can( 'edit_pages' ) ) {
      return;
    }
    // Check if WYSIWYG is enabled
    if ( 'true' == get_user_option( 'rich_editing' ) ) {
      add_filter( 'mce_external_plugins', 'custom_tinymce_plugin' );
      add_filter( 'mce_buttons', 'register_mce_button' );
    }
  }
  add_action('admin_head', 'custom_mce_button');

  // Function for new button
  function custom_tinymce_plugin( $plugin_array ) {

    $plugin_array['custom_mce_button'] = get_template_directory_uri() .'/_lib/_admin/assets/js/shortcode-v2.js';
    return $plugin_array;
  }

  // Register new button in the editor
  function register_mce_button( $buttons ) {
    array_push( $buttons, 'custom_mce_button' );
    return $buttons;
  }