<?php 
    /*
    *   API: http://www.geoplugin.net
    */
    
    function get_ip_user() {
        
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        }
        else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else {
            return $_SERVER['REMOTE_ADDR'];
        }

    }


    function get_location_banner() {
        
        // Store the IP address
        $ip = get_ip_user();
        
        
        // Use JSON encoded string and converts https://www.geoplugin.com/
        // it into a PHP variable
        //$ipdat  = @json_decode(file_get_contents("https://api.cvtt.com.br/geolocation?ip=".$ip));
        $ipdat  = @json_decode(file_get_contents("https://ipinfo.io/".$ip));

        // if(is_super_admin()) {
        //     echo '<div class="code"><pre>🐘🐱‍👤';
        //     var_dump($ipdat);
        //     echo '</pre></div>';
        // }
        
        //$estado = strtolower($ipdat->geoplugin_regionName);
        //$estado = strtolower($ipdat->region);
        //$estado = 'ceara';

        return 'distrito-federal';
    }

?>