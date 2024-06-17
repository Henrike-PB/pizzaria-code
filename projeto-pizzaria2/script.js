alert('Seja muito bem vindo! Uma dica: a pizza de Python é bem boa!!!')

// Função para ativar o efeito de Scroll Reveal
document.addEventListener('DOMContentLoaded', function() {
    window.sr = ScrollReveal({ reset: true });
    sr.reveal('.section3', { duration: 1200 });
    sr.reveal('.conteudo', { duration: 1200 });
    sr.reveal('.menu', { duration: 1200 });
});

// Função do menu hamburguer
document.addEventListener('DOMContentLoaded', function() {
    var hamburgerBtn = document.getElementById('hamburger-btn');
    var navMenu = document.getElementById('nav-menu');

    // Adiciona evento de clique ao botão de hambúrguer
    hamburgerBtn.addEventListener('click', function() {
        // Toggle da classe 'open' no menu de navegação
        navMenu.classList.toggle('open');

        // Verifica se o menu está aberto
        var isOpen = navMenu.classList.contains('open');

        // Altera o texto do botão de hambúrguer baseado no estado do menu
        if (isOpen) {
            hamburgerBtn.innerHTML = '&times;'; // Altera para o ícone de fechar (X)
        } else {
            hamburgerBtn.innerHTML = '&#9776;'; // Altera para o ícone de hambúrguer
        }

        // Exibe ou oculta o botão de hambúrguer conforme necessário
        hamburgerBtn.classList.toggle('active', isOpen);
    });

    // Fecha o menu ao clicar em um item de menu
    var navLinks = navMenu.querySelectorAll('.nav-link');
    navLinks.forEach(function(navLink) {
        navLink.addEventListener('click', function() {
            navMenu.classList.remove('open');
            hamburgerBtn.innerHTML = '&#9776;'; // Altera de volta para o ícone de hambúrguer
            hamburgerBtn.classList.remove('active'); // Remove a classe 'active' do botão
        });
    });
});



