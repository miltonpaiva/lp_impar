<?php 
$settings = get_option('options_gerais'); 
// $redes    = $settings['rede_social_group']; 
?>

<?php wp_footer(); ?>

 <!-- Footer -->
<footer class="relative py-12 px-6 bg-slate-950 border-t border-slate-800">
  <div class="container mx-auto">
    <div class="grid md:grid-cols-3 gap-8 mb-8">

      <!-- Brand -->
      <div>
        <div class="flex items-center space-x-2 mb-4">
          <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-lg flex items-center justify-center">
            <i data-lucide="code" class="w-6 h-6 text-white"></i>
          </div>
          <span class="text-2xl font-bold">impar<span class="text-blue-500">.</span></span>
        </div>
        <p class="text-slate-400 text-sm mb-4">
          A tecnologia tem o poder de simplificar processos, conectar tempo a data como possibilidades.
        </p>
      </div>

      <!-- Quick Links -->
      <div>
        <h3 class="font-bold mb-4">Links Rápidos</h3>
        <ul class="space-y-2">
          <li><a href="#inicio" class="text-slate-400 hover:text-white text-sm transition-colors">Início</a></li>
          <li><a href="#sobre" class="text-slate-400 hover:text-white text-sm transition-colors">Quem somos</a></li>
          <li><a href="#contato" class="text-slate-400 hover:text-white text-sm transition-colors">Serviços</a></li>
        </ul>
      </div>

      <!-- Contact Info -->
        <div>
            <h3 class="font-bold mb-4">Entre em contato</h3>
            <ul class="space-y-3">
                <li class="flex items-center space-x-2 text-slate-400 text-sm">
                <i class="fa-solid fa-phone text-slate-400" aria-hidden="true"></i>
                <span>Telefone: (48) 0000-00000</span>
                </li>
                <li class="flex items-center space-x-2 text-slate-400 text-sm">
                <i class="fa-solid fa-envelope text-slate-400" aria-hidden="true"></i>
                <span>Email: contato@impartecnologia.com </span>
                </li>
                <li class="flex items-center space-x-2 text-slate-400 text-sm">
                <i class="fa-solid fa-location-dot text-slate-400" aria-hidden="true"></i>
                <span>Endereço: Rua Ary Barroso, n° 70, sala 212 - torre 1, Papicu</span>
                </li>
            </ul>
        </div>

    </div>

    <div class="border-t border-slate-800 pt-8 text-center text-slate-400 text-sm">
      <p>© 2025 Impar Tecnologia.</p>
    </div>
  </div>
</footer>



<script>
document.addEventListener('DOMContentLoaded', function() {
  // Substitui todos os <i data-lucide="..."> por SVG
  Lucide.replace();

  // Mobile menu toggle
  const menuBtn = document.getElementById('menu-btn');
  const mobileMenu = document.getElementById('mobile-menu');
  let menuOpen = false;

  menuBtn.addEventListener('click', () => {
    menuOpen = !menuOpen;
    mobileMenu.classList.toggle('hidden', !menuOpen);

    // Troca o ícone do botão dinamicamente
    menuBtn.innerHTML = menuOpen
      ? '<i data-lucide="x" class="w-6 h-6"></i>'
      : '<i data-lucide="menu" class="w-6 h-6"></i>';

    // Atualiza Lucide para substituir novos ícones
    Lucide.replace();
  });
});

document.addEventListener('DOMContentLoaded', function(){
  const menuBtn = document.getElementById('menu-btn');
  const mobileMenu = document.getElementById('mobile-menu');
  menuBtn.addEventListener('click', function(){
    mobileMenu.classList.toggle('hidden');
    const icon = menuBtn.querySelector('i');
    icon.classList.toggle('fa-bars');
    icon.classList.toggle('fa-xmark');
  });
});
</script>
