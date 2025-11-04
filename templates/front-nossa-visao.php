<?php

$result   = LP::getPostsByTax('home', 1, 'section_home', 'nossa_visao', 'DESC');
$contents = $result ? $result['posts'] : [];
$content  = current($contents);

if ($content):

?>

  <!-- Hero Section -->
  <section id="inicio" class="relative pt-20 pb-32 px-6 text-center" data-aos="fade-up">
    <div class="container mx-auto">
      <div class="flex items-center justify-center space-x-3 mb-8" data-aos="zoom-in">
        <div
          class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-500/50">
          <i class="fa-solid fa-code text-4xl"></i>
        </div>
        <div class="text-left">
          <h1 class="text-3xl font-bold">impar</h1>
          <p class="text-xs text-slate-400 tracking-widest uppercase">Tecnologia</p>
        </div>
      </div>

      <h2
        class="text-5xl md:text-6xl font-bold mb-6 bg-gradient-to-r from-white via-blue-100 to-cyan-200 bg-clip-text text-transparent"
        data-aos="fade-up" data-aos-delay="100">
        <?= $content->titulo; ?>
      </h2>

      <p class="text-slate-400 text-lg mb-10 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="200">
        <?= $content->descricao; ?>
      </p>

      <a href="<?= $content->link_botao; ?>">
          <button
          class="bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 text-white px-8 py-4 rounded-full font-semibold transition-all transform hover:scale-105 shadow-lg shadow-blue-500/50"
          data-aos="zoom-in" data-aos-delay="300">
          <?= $content->texto_botao; ?>
        </button>
      </a>

      <div class="mt-16 relative" data-aos="fade-up" data-aos-delay="400">
        <div class="w-128 h-80 mx-auto relative">
          <div class="absolute inset-0 bg-gradient-to-br from-blue-500/20 to-cyan-400/20 rounded-full blur-2xl"></div>
          <img src="<?= $content->img ?: get_template_directory_uri(); ?>/assets/images/Photoroom1.png"
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" loading="lazy" width="auto" height="60"
            alt="">
        </div>
      </div>
    </div>
  </section>


<?php endif; ?>