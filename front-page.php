<?php
/* Template Name: Página - Home */
?>
<?php get_template_part('templates/html', 'header'); ?>

<div class="min-h-screen bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950 text-white relative">


  <?php get_template_part('templates/front', 'nossa-visao'); ?>

  <?php get_template_part('templates/front', 'nossos-produtos'); ?>

  <?php get_template_part('templates/front', 'porque-escolher'); ?>

  <?php get_template_part('templates/front', 'inovamos'); ?>

  <?php get_template_part('templates/front', 'conectando-pessoas'); ?>

  <?php get_template_part('templates/front', 'presenca-brasil'); ?>

  <!-- Contact Section -->
  <section id="contato" class="relative py-20 px-6">
    <div class="container mx-auto max-w-6xl grid md:grid-cols-2 gap-12 items-center">
      <!-- Contact Illustration -->
      <div class="relative order-2 md:order-1" data-aos="fade-right">
        <div
          class="aspect-square bg-gradient-to-br from-orange-500/20 to-yellow-500/20 rounded-3xl backdrop-blur-sm border border-white/10 p-8 flex items-center justify-center">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.3242992781948!2d-38.475833425026046!3d-3.739338796234563!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7c74706b9a4dcd3%3A0xfec6d393e34f1dbc!2sCactos%20Coworking!5e0!3m2!1spt-BR!2sbr!4v1761577654088!5m2!1spt-BR!2sbr"
            width="100%" height="100%" style="border:0; border-radius: 25px;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="order-1 md:order-2 bg-white/5 backdrop-blur-sm rounded-3xl p-8 border border-white/10 shadow-lg"
        data-aos="fade-left" data-aos-delay="200">
        <h2 class="text-3xl font-bold mb-6">Contato</h2>
        <form class="space-y-4" method="POST" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
          <input type="hidden" name="action" value="send_contact_form">
          <div>
            <label class="block text-sm font-medium mb-2">Nome*</label>
            <input type="text" name="first_name" required placeholder="Seu nome"
              class="w-full bg-slate-900/50 border border-slate-700 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500 transition-colors text-white" />
          </div>
          <div>
            <label class="block text-sm font-medium mb-2">Sobrenome*</label>
            <input type="text" name="last_name" required placeholder="Seu sobrenome"
              class="w-full bg-slate-900/50 border border-slate-700 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500 transition-colors text-white" />
          </div>
          <div>
            <label class="block text-sm font-medium mb-2">Email*</label>
            <input type="email" name="email" required placeholder="seu@email.com"
              class="w-full bg-slate-900/50 border border-slate-700 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500 transition-colors text-white" />
          </div>
          <div>
            <label class="block text-sm font-medium mb-2">Assunto*</label>
            <input type="text" name="subject" required placeholder="Como podemos ajudar?"
              class="w-full bg-slate-900/50 border border-slate-700 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500 transition-colors text-white" />
          </div>
          <div>
            <label class="block text-sm font-medium mb-2">Mensagem*</label>
            <textarea name="message" required rows="4" placeholder="Descreva seu projeto ou dúvida..."
              class="w-full bg-slate-900/50 border border-slate-700 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500 transition-colors resize-none text-white"></textarea>
          </div>
          <button type="submit"
            class="w-full bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 text-white py-3 rounded-lg font-semibold transition-all transform hover:scale-105 shadow-lg shadow-blue-500/50">Enviar</button>
        </form>
      </div>
    </div>
  </section>

  <?php get_template_part('templates/html', 'footer'); ?>