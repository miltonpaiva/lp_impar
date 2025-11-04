<?php

$content = LP::getPostsByTax('home', 1, 'section_home', 'nossa_visao', 'DESC');

echo '<h1>$content</h1><pre>';
print_r($content);
exit();

?>

<section class="section-banner">
    <div class="container">
        <div class="display-banner"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo-Imparbranca.png.png" loading="lazy" alt="">
            <h3 class="banner-title">Nossa visão do amanã, começa hoje</h3>
            <a href="#" class="button-banner w-inline-block">
                <div class="button-banner-text">Inove agora</div>
            </a><img src="<?php echo get_template_directory_uri(); ?>/assets/images/imgbola3d.png" loading="lazy" alt="">
        </div>
    </div>
</section>