<?php get_template_part('templates/html', 'head'); ?>

<!-- Animated Background Elements -->
<div class="fixed inset-0 overflow-hidden pointer-events-none">
  <div class="absolute top-20 left-10 w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
  <div class="absolute top-40 right-20 w-2 h-2 bg-cyan-400 rounded-full animate-pulse delay-100"></div>
  <div class="absolute bottom-32 left-1/4 w-2 h-2 bg-orange-500 rounded-full animate-pulse delay-200"></div>
  <div class="absolute bottom-20 right-1/3 w-2 h-2 bg-green-400 rounded-full animate-pulse delay-300"></div>
  <div class="absolute top-1/2 left-1/2 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl"></div>
  <div class="absolute top-1/3 right-1/4 w-96 h-96 bg-cyan-500/5 rounded-full blur-3xl"></div>
</div>

<!-- Header -->
<header class="relative z-50 bg-slate-950/80 backdrop-blur-md border-b border-slate-800">
  <nav class="container mx-auto px-6 py-4 flex items-center justify-between">
    <div class="flex items-center space-x-2">
      <!-- <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-lg flex items-center justify-center">
        <i class="fa-solid fa-code text-white text-lg"></i>
      </div>
      <span class="text-2xl font-bold">impar<span class="text-blue-500">.</span></span>
      <span class="text-xs text-slate-400 tracking-widest uppercase">Tecnologia</span> -->
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo-Imparbranca.png.png" loading="lazy" width="auto" height="60" alt="">
    </div>

    <!-- Desktop Menu -->
    <div class="hidden md:flex items-center space-x-8">
      <a href="#inicio" class="text-slate-300 hover:text-white transition-colors">Início</a>
      <a href="#sobre" class="text-slate-300 hover:text-white transition-colors">Sobre</a>
      <a href="#contato" class="text-slate-300 hover:text-white transition-colors">Contato</a>
    </div>

    <!-- Mobile Menu Button -->
    <button id="menu-btn" class="md:hidden text-white text-xl">
      <i class="fa-solid fa-bars"></i>
    </button>
  </nav>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="md:hidden pt-4 pb-2 hidden">
    <div class="flex flex-col space-y-3 px-6">
      <a href="#inicio" class="text-slate-300 hover:text-white transition-colors">Início</a>
      <a href="#sobre" class="text-slate-300 hover:text-white transition-colors">Sobre</a>
      <a href="#contato" class="text-slate-300 hover:text-white transition-colors">Contato</a>
    </div>
  </div>
</header>
