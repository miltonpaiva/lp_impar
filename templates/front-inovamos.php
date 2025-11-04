<?php

$result   = LP::getPostsByTax('home', 1, 'section_home', 'por_que_escolher', 'DESC');
$contents = $result ? $result['posts'] : [];

if (!empty($contents)) :

?>

  <!-- Innovation Section -->
  <section class="relative py-20 px-6">
    <div class="container mx-auto grid md:grid-cols-2 gap-12 items-center">

      <?php $content = $contents[0]; ?>

      <div data-aos="fade-right">
        <h2 class="text-4xl md:text-5xl font-bold mb-6">
            <?= $content->titulo; ?>
        </h2>
        <p class="text-slate-400 mb-6">
            <?= $content->descricao; ?>
        </p>
      </div>

      <div class="relative" data-aos="fade-left" data-aos-delay="200">
        <div
          class="aspect-square bg-gradient-to-br from-blue-500/20 to-purple-500/20 rounded-3xl backdrop-blur-sm border border-white/10 p-8 flex items-center justify-center">
          <div class="text-center space-y-4">
            <img src="<?= $content->img ?: get_template_directory_uri(); ?>/assets/images/conceito-de-colagem.jpg"
              class="rounded-3xl" loading="lazy" width="auto" height="60" alt="">
          </div>
        </div>
      </div>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mt-20 container mx-auto text-center">

      <?php $content = $contents[1] ?? null; ?>

      <?php if ($content) : ?>

        <div data-aos="zoom-in" data-aos-delay="100">
            <div class="w-16 h-16 mx-auto bg-blue-500/10 rounded-2xl flex items-center justify-center mb-4">
            <i class="fa-solid fa-code text-blue-400 text-2xl"></i>
            </div>
            <h3 class="text-2xl font-bold mb-2"><?= $content->titulo; ?></h3>
            <p class="text-slate-400 text-sm"><?= $content->descricao; ?></p>
        </div>

      <?php endif; ?>

      <?php $content = $contents[2] ?? null; ?>

      <?php if ($content) : ?>

        <div data-aos="zoom-in" data-aos-delay="200">
            <div class="w-16 h-16 mx-auto bg-cyan-500/10 rounded-2xl flex items-center justify-center mb-4">
            <i class="fa-solid fa-users text-cyan-400 text-2xl"></i>
            </div>
            <h3 class="text-2xl font-bold mb-2"><?= $content->titulo; ?></h3>
            <p class="text-slate-400 text-sm"><?= $content->descricao; ?></p>
        </div>

      <?php endif; ?>

      <?php $content = $contents[3] ?? null; ?>

      <?php if ($content) : ?>

        <div data-aos="zoom-in" data-aos-delay="300">
            <div class="w-16 h-16 mx-auto bg-purple-500/10 rounded-2xl flex items-center justify-center mb-4">
            <i class="fa-solid fa-bolt text-purple-400 text-2xl"></i>
            </div>
            <h3 class="text-2xl font-bold mb-2"><?= $content->titulo; ?></h3>
            <p class="text-slate-400 text-sm"><?= $content->descricao; ?></p>
        </div>

      <?php endif; ?>

      <?php $content = $contents[4] ?? null; ?>

      <?php if ($content) : ?>

        <div data-aos="zoom-in" data-aos-delay="400">
            <div class="w-16 h-16 mx-auto bg-green-500/10 rounded-2xl flex items-center justify-center mb-4">
            <i class="fa-solid fa-building text-green-400 text-2xl"></i>
            </div>
            <h3 class="text-2xl font-bold mb-2"><?= $content->titulo; ?></h3>
            <p class="text-slate-400 text-sm"><?= $content->descricao; ?></p>
        </div>

      <?php endif; ?>

    </div>
  </section>

<?php endif; ?>