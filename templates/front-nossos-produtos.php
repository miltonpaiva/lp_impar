<?php

$result   = LP::getPostsByTax('home', 3, 'section_home', 'nossos_produtos', 'ASC');
$contents = $result ? $result['posts'] : [];

if (!empty($contents)) :

?>

  <!-- Products Section -->
  <section class="relative py-20 px-6 bg-slate-900/50" data-aos="fade-up">

    <?php $content = $contents[0]; ?>

    <div class="container mx-auto text-center mb-12">
      <h2 class="text-4xl md:text-5xl font-bold mb-4" data-aos="fade-right"><?= $content->titulo; ?></h2>
      <p class="text-slate-400 max-w-2xl mx-auto" data-aos="fade-left">
        <?= $content->descricao; ?>
      </p>
    </div>

    <div class="container mx-auto grid md:grid-cols-2 gap-8">

      <?php $content = $contents[1] ?? null; ?>

      <?php if ($content) : ?>

        <div class="bg-slate-800/60 backdrop-blur-sm border border-white/10 rounded-2xl p-8 text-center hover:scale-105 transition-transform duration-300" data-aos="zoom-in">
            <div class="flex justify-center mb-6">
                <img src="<?= $content->img ?: $content->imagem ?:  get_template_directory_uri() . '/assets/images/samu-logo.png'; ?>" alt="Logo padrão" class="w-20 h-20 object-contain">
            </div>
            <h3 class="text-2xl font-semibold mb-4"><?= $content->titulo; ?></h3>
            <p class="text-slate-400 mb-6">
                <?= $content->descricao; ?>
            </p>
            <a href="<?= $content->link_botao; ?>" class="inline-block bg-gradient-to-r from-blue-500 to-purple-600 text-white font-medium py-2 px-6 rounded-full hover:opacity-90 transition">
                <?= $content->texto_botao; ?>
            </a>
        </div>

      <?php endif; ?>

      <?php $content = $contents[2] ?? null; ?>

      <?php if ($content) : ?>

        <div class="bg-slate-800/60 backdrop-blur-sm border border-white/10 rounded-2xl p-8 text-center hover:scale-105 transition-transform duration-300" data-aos="zoom-in" data-aos-delay="200">
            <div class="flex justify-center mb-6">
                <img src="<?= $content->img ?: $content->imagem ?:  get_template_directory_uri() . '/assets/images/samu-logo.png'; ?>" alt="Logo padrão" class="w-20 h-20 object-contain">
            </div>
            <h3 class="text-2xl font-semibold mb-4"><?= $content->titulo; ?></h3>
            <p class="text-slate-400 mb-6">
                <?= $content->descricao; ?>
            </p>
            <a href="<?= $content->link_botao; ?>" class="inline-block bg-gradient-to-r from-blue-500 to-purple-600 text-white font-medium py-2 px-6 rounded-full hover:opacity-90 transition">
                <?= $content->texto_botao; ?>
            </a>
        </div>

      <?php endif; ?>

    </div>
  </section>

<?php endif; ?>