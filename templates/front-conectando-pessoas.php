<?php

$result   = LP::getPostsByTax('home', 1, 'section_home', 'conectando_pessoas', 'DESC');
$contents = $result ? $result['posts'] : [];
$content  = current($contents);

if ($content):

?>

  <!-- Team Connection Section -->
  <section class="relative py-20 px-6 bg-slate-900/50">
    <div class="container mx-auto grid md:grid-cols-2 gap-12 items-center">
      <div data-aos="fade-right">
        <h2 class="text-4xl md:text-5xl font-bold mb-6"><?= $content->titulo; ?></h2>
        <p class="text-slate-400 mb-6">
            <?= $content->descricao; ?>
        </p>
      </div>

      <div class="relative" data-aos="fade-left" data-aos-delay="200">
        <div
          class="aspect-square bg-gradient-to-br from-purple-500/20 to-pink-500/20 rounded-full backdrop-blur-sm border border-white/10 p-12 flex items-center justify-center">
          <img src="<?= $content->img ?: $content->imagem ?: get_template_directory_uri() . '/assets/images/futurista-em-smartwatch.jpg'; ?>"
            class="rounded-full" loading="lazy" width="auto" height="60" alt="">
        </div>
      </div>
    </div>
  </section>

<?php endif; ?>