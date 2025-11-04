 <section class="section section-contato py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Imagem lateral -->
            <div class="col-md-6 text-center mb-4 mb-md-0">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Group91.png" alt="Contato" class="img-fluid">
            </div>

            <!-- Formulário -->
            <div class="col-md-6">
                <div class="card shadow border-0 p-4">
                    <h3 class="mb-4 text-center forms-title">Contato</h3>

                    <form id="contactForm" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome*</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email*</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="subject" class="form-label">Assunto*</label>
                            <input type="text" class="form-control" id="subject" name="subject" required>
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Mensagem*</label>
                            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>

                    <!-- Mensagens de feedback -->
                    <div id="formSuccess" class="alert alert-success mt-3 d-none">
                        Obrigado! Sua mensagem foi enviada com sucesso!
                    </div>
                    <div id="formError" class="alert alert-danger mt-3 d-none">
                        Ocorreu um erro ao enviar o formulário. Tente novamente.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>