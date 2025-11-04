<?php
/*
* Share Functions
* Desenvolvedor: Darmison Fonteles
*/

// COMPARTILHAR
function get_compartilhe($link) {

    $share = "javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=500');return false;";

    $compartilhe  = '<ul class="mem-share">';
        $compartilhe .= '<li class="mem-share__item"><a class="mem-share__link" title="Compartilhar no Twitter" href="http://twitter.com/share?url='.$link.'" onclick="'.$share.'"><i class="mem-share__icone twitter"></i><span></span></a></li>';
        $compartilhe .= '<li class="mem-share__item"><a class="mem-share__link" title="Compartilhar no Facebook" href="https://www.facebook.com/sharer/sharer.php?u='.$link.'" onclick="'.$share.'"><i class="mem-share__icone facebook"></i><span></span></a></li>';
        if ( wp_is_mobile() ) {
            $compartilhe .= '<li class="mem-share__item"><a class="mem-share__link" title="Compartilhar no Whatsapp" href="https://api.whatsapp.com/send?phone=5585988117211"><i class="mem-share__icone whatsapp"></i></a></li>';
        } else {
            $compartilhe .= '<li class="mem-share__item"><a class="mem-share__link" title="Compartilhar no Whatsapp" href="https://web.whatsapp.com/send?phone=5585988117211"><i class="mem-share__icone whatsapp"></i></a></li>';  
        }
    $compartilhe .= '</ul>';

    echo $compartilhe;
}

function wp_midia_social($atts) {
    extract(shortcode_atts(array(
    'facebook'    => '',
    'twitter'     => '',
    'gplus'       => '',
    'instagram'   => '',
    'youtube'     => '',
    'foursquare'  => '',
    'rss'         => '',
    'site'        => '',
    'email'       => '',
    ), $atts));
    //$social = '<ul>';
    if($facebook) {$social .= '<li><a class="icon-facebook" href="https://www.facebook.com/'.$facebook.'" target="_blank" title="Curta nossa página" alt="Curta nossa página"></a></li>';}
    if($gplus) {$social .= '<li><a class="icon-gplus" href="https://instagram.com/'.$gplus.'" target="_blank" title="Siga Círculo" alt="Siga Círculo"></a></li>';}
    if($twitter) {$social .= '<li><a class="icon-twitter" href="https://twitter.com/'.$twitter.'" target="_blank" title="Siga no Twitter" alt="Siga no Twitter"></a></li>';}
    if($instagram) {$social .= '<li><a class="icon-instagram" href="http://instagram.com/'.$instagram.'" target="_blank" title="Siga no Instagram" alt="Siga no Instagram"></a></li>';}
    if($youtube) {$social .= '<li><a class="icon-youtube" href="http://www.youtube.com/user/'.$youtube.'" target="_blank" title="Acesse nosso Canal" alt="Acesse nosso Canal"></a></li>';}
    if($foursquare) {$social .= '<li><a class="icon-foursquare" href="https://pt.foursquare.com/'.$foursquare.'" target="_blank" title="Acesse no Foursquare" alt="Acesse no Foursquare"></a></li>';}
    if($rss) {$social .= '<li><a class="icon-rss" href="'.$rss.'" target="_blank" title="Assine nosso RSS" alt="Assine nosso RSS"></a></li>';}
    if($site) {$social .= '<li><a class="icon-site" href="'.$site.'" target="_blank" title="Acesse nosso site" alt="Acesse nosso site"></a></li>';}
    if($email) {$social .= '<li><a class="icon-email" href="mailto:'.$email.'" title="Enviar e-mail" alt="Enviar e-mail"></a></li>';}
    //$social .= '</ul>';
    echo $social;
}

add_shortcode('midias_sociais', 'wp_midia_social');