<?php

$result   = LP::getPostsByTax('home', 4, 'section_home', 'por_que_escolher', 'ASC');
$contents = $result ? $result['posts'] : [];

if (!empty($contents)) :

?>

  <!-- Why Choose Us Section -->
  <section class="relative py-20 px-6 bg-slate-900/50" id="sobre" data-aos="fade-up">
    <div class="container mx-auto text-center">

      <?php $content = $contents[0]; ?>

      <p class="text-blue-400 font-semibold mb-2" data-aos="fade-down">
        <?= $content->titulo; ?>
      </p>
      <h2 class="text-4xl md:text-5xl font-bold mb-4" data-aos="fade-right">
        <?= $content->subtitulo; ?>
      </h2>
      <p class="text-slate-400 max-w-3xl mx-auto mb-12" data-aos="fade-up">
        <?= $content->descricao; ?>
      </p>

      <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">

        <?php $content = $contents[1] ?? null; ?>

        <?php if ($content) : ?>

            <div class="bg-gradient-to-br from-slate-800/50 to-slate-900/50 border border-slate-700 rounded-2xl p-8 hover:border-blue-500/50 transition-all hover:shadow-xl hover:shadow-blue-500/10 group" data-aos="flip-left">
            <div class="w-14 h-14 bg-blue-500/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-blue-500/20 transition-colors">
                <i class="fa-solid fa-bolt text-blue-400 text-3xl"></i>
            </div>
            <h3 class="text-2xl font-bold mb-4"><?= $content->titulo; ?></h3>
            <p class="text-slate-400"><?= $content->descricao; ?></p>
            </div>

        <?php endif; ?>

        <?php $content = $contents[2] ?? null; ?>

        <?php if ($content) : ?>

            <div class="bg-gradient-to-br from-slate-800/50 to-slate-900/50 border border-slate-700 rounded-2xl p-8 hover:border-cyan-500/50 transition-all hover:shadow-xl hover:shadow-cyan-500/10 group" data-aos="flip-left" data-aos-delay="150">
            <div class="w-14 h-14 bg-cyan-500/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-cyan-500/20 transition-colors">
                <i class="fa-solid fa-users text-cyan-400 text-3xl"></i>
            </div>
            <h3 class="text-2xl font-bold mb-4"><?= $content->titulo; ?></h3>
            <p class="text-slate-400"><?= $content->descricao; ?></p>
            </div>

        <?php endif; ?>

        <?php $content = $contents[3] ?? null; ?>

        <?php if ($content) : ?>

            <div class="bg-gradient-to-br from-slate-800/50 to-slate-900/50 border border-slate-700 rounded-2xl p-8 hover:border-green-500/50 transition-all hover:shadow-xl hover:shadow-green-500/10 group" data-aos="flip-left" data-aos-delay="300">
                <div class="w-14 h-14 bg-green-500/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-green-500/20 transition-colors">
                    <i class="fa-solid fa-clock text-green-400 text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4"><?= $content->titulo; ?></h3>
                <p class="text-slate-400"><?= $content->descricao; ?></p>
            </div>

        <?php endif; ?>

      </div>

    </div>
  </section>

<?php endif; ?>