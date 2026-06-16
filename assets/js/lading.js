// Código para esconder o menu no celular

const mobileMenuBtn = document.getElementById('mobileMenuBtn');
const mobileNav = document.getElementById('mobileNav');
const menuIcon = mobileMenuBtn.querySelector('.menu-icon');
const closeIcon = mobileMenuBtn.querySelector('.close-icon');

mobileMenuBtn.addEventListener('click', () => {
    const isOpen = !mobileNav.classList.contains('hidden');
    
    if (isOpen) {
        // Fechar menu
        mobileNav.classList.add('hidden');
        menuIcon.classList.remove('hidden');
        closeIcon.classList.add('hidden');
    } else {
        // Abrir menu
        mobileNav.classList.remove('hidden');
        menuIcon.classList.add('hidden');
        closeIcon.classList.remove('hidden');
    }
});

// Código para fechar o menu quando abrir os links no celular

const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');
mobileNavLinks.forEach(link => {
    link.addEventListener('click', () => {
        mobileNav.classList.add('hidden');
        menuIcon.classList.remove('hidden');
        closeIcon.classList.add('hidden');
    });
});

// Código para scroll suave no computador

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.getAttribute('href');
        
        if (targetId === '#') return;
        
        const targetElement = document.querySelector(targetId);
        
        if (targetElement) {
            const headerOffset = 64; // Altura fixa
            const elementPosition = targetElement.getBoundingClientRect().top;
            const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });
        }
    });
});

// Código para deixar a header fixa quando o usuário scrollar

const header = document.getElementById('header');
let lastScroll = 0;

window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset;
    
    // Adiciona uma sombra quando scrolla
    if (currentScroll > 10) {
        header.style.boxShadow = '0 4px 6px rgba(0, 0, 0, 0.3)';
    } else {
        header.style.boxShadow = 'none';
    }
    
    lastScroll = currentScroll;
});

// Código para animações

const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);