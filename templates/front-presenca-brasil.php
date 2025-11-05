<?php

$result   = LP::getPostsByTax('home', 1, 'section_home', 'presenca_brasil', 'DESC');
$contents = $result ? $result['posts'] : [];
$content  = current($contents);

if ($content):

?>

  <!-- Map Connection Section -->
  <section class="relative py-20 px-6 bg-slate-900/50">
    <div class="container mx-auto grid md:grid-cols-2 gap-12 items-center">

      <!-- Imagem à esquerda -->
      <div class="relative order-2 md:order-1" data-aos="fade-right">
        <img src="<?= $content->img ?: $content->imagem ?: get_template_directory_uri() . '/assets/images/Mapa.png'; ?>" class="" loading="lazy"
          width="auto" height="60" alt="Mapa do Brasil com regiões destacadas">
      </div>

      <!-- Texto à direita -->
      <div class="order-1 md:order-2" data-aos="fade-left" data-aos-delay="200">
        <h2 class="text-4xl md:text-5xl font-bold mb-6">
            <?= $content->titulo; ?>
        </h2>
        <p class="text-slate-400 mb-6">
            <?= $content->descricao; ?>
        </p>
      </div>

    </div>
  </section>


<?php endif; ?>