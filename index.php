<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Studra - Gestão de tarefas simples e gratuita">
    <title>Studra</title>
    <link rel="stylesheet" href="assets/css/lading.css">

    <link 
        rel="icon" 
        type="image/svg+xml" 
        href="assets/img/logo-studra.svg"
    >
</head>
<body>
    <!-- Header do Projeto -->
    <header id="header">
        <nav class="nav-container">
            <div class="nav-content">
                <!-- Logo -->
                <a href="#início" class="logo">
                    <div class="logo-icon">
                        <img 
                            src="/studra/assets/img/logo-studra.svg"
                            alt="Studra Logo"
                            class="logo-image"
                        >
                    </div>
                    <span class="logo-text">Studra</span>
                </a>

                <!-- Navegação no Desktop -->
                <div class="nav-links">
                    <a href="#recursos" class="nav-link">Recursos</a>
                    <a href="#sobre" class="nav-link">Sobre</a>
                    <a href="#contato" class="nav-link">Contato</a>
                </div>

                <!-- Botão Criar Conta no Desktop -->
                <div class="nav-cta">

                    <a
                        href="views/login.php"
                        class="btn btn-secondary"
                    >
                        Entrar
                    </a>

                    <a
                        href="views/cadastro.php"
                        class="btn btn-primary"
                     >
                        Criar Conta Grátis
                    </a>
                </div>

                <!-- Botão Menu no Celular -->
                <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Menu">
                    <svg class="menu-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M3 12h18M3 6h18M3 18h18" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    <svg class="close-icon hidden" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M18 6L6 18M6 6l12 12" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </button>
            </div>

            <!-- Navegação no Celular -->
            <div class="mobile-nav hidden" id="mobileNav">
                <a href="#recursos" class="mobile-nav-link">Recursos</a>
                <a href="#sobre" class="mobile-nav-link">Sobre</a>
                <a href="#contato" class="mobile-nav-link">Contato</a>
                <button class="btn btn-primary btn-full">Criar Conta Grátis</button>
            </div>
        </nav>
    </header>

    <main>
        <!-- Seção de Destaque (Hero) -->
        <section id="início" class="hero-section">
            <!-- Decoração -->
            <div class="decoração-bg">
                <div class="circle circle-1"></div>
                <div class="circle circle-2"></div>
                <div class="circle circle-3"></div>
                <div class="circle circle-4"></div>
                <div class="circle circle-5"></div>
                <div class="circle circle-6"></div>
                <div class="square square-1"></div>
                <div class="square square-2"></div>
            </div>

            <div class="hero-conteúdo">
                <h1 class="hero-título">Organize sua vida acadêmica</h1>
                <p class="hero-subtítulo">Crie, acompanhe e complete suas matérias com tarefas e anotações.</p>
                
                <div class="hero-cta">
                    <a
                        href="views/cadastro.php"
                        class="btn btn-primary btn-large"
                    >
                        Começar Grátis
                    </a>
                </div>
                <p class="hero-aviso">100% gratuito • Sem cartão de crédito</p>
            </div>
        </section>

        <!-- Seção de Features -->
        <section id="recursos" class="features-section">
            <div class="container">
                <!-- Header -->
                <div class="section-header">
                    <h2 class="section-título">Recursos</h2>
                    <p class="section-subtítulo">Uma plataforma simples para organizar seus estudos.</p>
                </div>

                <!-- Features do Grid -->
                <!-- Card 1 -->
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-ícone">
                            📚
                        </div>
                        <h3 class="feature-título">Organize Suas Matérias</h3>
                        <p class="feature-descrição">Crie, organize e Crie matérias e centralize suas tarefas e anotações em um único lugar.</p>
                    </div>

                    <!-- Card 2 -->
                    <div class="feature-card">
                        <div class="feature-ícone">
                            ✅
                        </div>
                        <h3 class="feature-título">Gerencie Tarefas</h3>
                        <p class="feature-descrição">Acompanhe atividades pendentes e organize seus estudos com facilidade.</p>
                    </div>

                    <!-- Card 3 -->
                    <div class="feature-card">
                        <div class="feature-ícone">
                            📝
                        </div>
                        <h3 class="feature-título">Salve Anotações</h3>
                        <p class="feature-descrição">Guarde resumos, lembretes e conteúdos importantes rapidamente.</p>
                    </div>

                    <!-- Card 4 -->
                    <div class="feature-card">
                        <div class="feature-ícone">
                            ⭐
                        </div>
                        <h3 class="feature-título">Evolua sua Pontuação</h3>
                        <p class="feature-descrição">Ganhe pontos conforme avança nas suas tarefas e acompanhe seu progresso.</p>
                    </div>
                </div>

                <!-- Features Detalhados -->
                <div class="features-detalhados">
                    <!-- Feature Detalhe 1 -->
                    <div class="feature-detalhe">
                        <div class="feature-detalhe-conteúdo">
                            <h3 class="feature-detalhe-título">Organize seus estudos em um só lugar</h3>
                            <p class="feature-detalhe-desc">
                                Crie matérias, acompanhe tarefas e registre anotações sem precisar alternar entre diferentes aplicativos.
                            </p>
                            <ul class="feature-lista">
                                <li>📖 Todos seus estudos centralizados</li>
                                <li>✔️ Tarefas organizadas por pendentes e concluidas</li>
                                <li>📝 Anotações rápidas e acessíveis</li>
                            </ul>
                        </div>
                        <div class="feature-detalhe-visual">
                            <div class="visual-placeholder">
                                📚
                            </div>
                        </div>
                    </div>

                     <!-- Feature Detalhe 2 -->
                    <div class="feature-detalhe feature-detalhe-reverso">
                        <div class="feature-detalhe-visual">
                            <div class="visual-placeholder">
                                📈
                            </div>
                        </div>
                        <div class="feature-detalhe-conteúdo">
                            <h3 class="feature-detalhe-título">Acompanhe seu progresso</h3>
                            <p class="feature-detalhe-desc">
                                Ganhe pontuação ao concluir tarefas e visualize sua evolução ao longo dos estudos.
                            </p>
                            <ul class="feature-lista">
                                <li>⭐ Sistema de pontuação</li>
                                <li>✔️ Controle de tarefas concluídas</li>
                                <li>📌 Histórico de anotações</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Seção Sobre -->
        <section id="sobre" class="sobre-section">
            <!-- Decoração -->
            <div class="decorative-bg">
                <div class="circle circle-7"></div>
                <div class="circle circle-8"></div>
                <div class="circle circle-9"></div>
                <div class="circle circle-10"></div>
                <div class="circle circle-11"></div>
                <div class="circle circle-12"></div>
                <div class="square square-3"></div>
                <div class="square square-4"></div>
                <div class="square square-5"></div>
            </div>

            <div class="container">
                <div class="section-header">
                    <h2 class="section-título">Sobre o Studra</h2>
                    Somos uma platataforma simples para organizar seus estudos, centralizando suas matérias, tarefas e anotações.
                </div>

            <!-- Grid Motivos -->
            <div class="motivos-grid">

                    <!--Card 1-->
                    <div class="motivos-card">
                        <div class="motivos-icon">
                            📚
                        </div>
                        <div class="motivos-conteúdo">
                            <h3 class="motivos-título">Organização dos Estudos</h3>
                            <p class="motivos-desc">Crie matérias, acompanhe tarefas e mantenha suas anotações organizadas em um só lugar.</p>
                        </div>
                    </div>

                    <!--Card 2-->
                    <div class="motivos-card">
                        <div class="motivos-icon">
                            📝
                        </div>
                        <div class="motivos-conteúdo">
                            <h3 class="motivos-título">Tarefas Acadêmicas</h3>
                            <p class="motivos-desc">Controle trabalhos, exercícios e atividades pendentes sem perder prazos.</p>
                        </div>
                    </div>

                    <!--Card 3-->
                    <div class="motivos-card">
                        <div class="motivos-icon">
                            🎯
                        </div>
                        <div class="motivos-conteúdo">
                            <h3 class="motivos-título">Foco na Produtividade</h3>
                            <p class="motivos-desc">Visualize seu progresso e mantenha constância nos estudos diariamente.</p>
                        </div>
                    </div>

                    <!--Card 4-->
                    <div class="motivos-card">
                        <div class="motivos-icon">
                            📂
                        </div>
                        <div class="motivos-conteúdo">
                            <h3 class="motivos-título">Tudo Centralizado</h3>
                            <p class="motivos-desc">Suas matérias, tarefas e anotações conectadas dentro da mesma plataforma.</p>
                        </div>
                    </div>

                    <!--Card 5-->
                    <div class="motivos-card">
                        <div class="motivos-icon">
                            ⚡
                        </div>
                        <div class="motivos-conteúdo">
                            <h3 class="motivos-título">Simples e Rápido</h3>
                            <p class="motivos-desc">Interface limpa e objetiva para você estudar sem distrações.</p>
                        </div>
                    </div>

                    <!-- Card 6-->
                    <div class="motivos-card">
                        <div class="motivos-icon">
                            🔒
                        </div>
                        <div class="motivos-conteúdo">
                            <h3 class="motivos-título">Seus Dados Seguros</h3>
                            <p class="motivos-desc">Tudo salvo com segurança e acessível sempre que precisar.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Rodapé do Site -->
    <footer id="contato" class="rodapé">
        <div class="container">
            <div class="rodapé-grid">
                <!-- Marca do Rodapé -->
                <div class="rodapé-marca">
                    <div class="rodapé-logo">
                        <div class="logo-icon">
                            <img 
                            src="/studra/assets/img/logo-studra.svg"
                            alt="Studra Logo"
                            class="logo-image"
                            >
                        </div>
                        <span class="logo-text">Studra</span>
                    </div>
                    <p class="rodapé-linha">Plataforna simples de organização de estudos.</p>
                    <div class="redes-sociais">
                        <a href="#" class="rede-social" aria-label="Facebook">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/>
                            </svg>
                        </a>
                        <a href="#" class="rede-social" aria-label="Twitter">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/>
                            </svg>
                        </a>
                        <a href="#" class="rede-social" aria-label="Instagram">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5" stroke-width="2"/>
                                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zM17.5 6.5h.01" stroke-width="2"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Links do Rodapé -->
                <div class="rodapé-links-col">
                    <h4 class="rodapé-cabeçalho">Links</h4>
                    <ul class="rodapé-links">
                        <li><a href="#recursos">Recursos</a></li>
                        <li><a href="#sobre">Sobre</a></li>
                    </ul>
                </div>

                <!-- Contatos do Rodapé -->
                <div class="rodapé-contato-col">
                    <h4 class="rodapé-cabeçalho">Contato</h4>
                    <ul class="rodapé-links">
                        <li>
                            <a href="mailto:guilhermes.matos@uni9.edu.br" class="rodapé-email">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" stroke-width="2"/>
                                    <path d="M22 6l-10 7L2 6" stroke-width="2"/>
                                </svg>
                                guilhermes.matos@uni9.edu.br
                            </a>

                            <a href="mailto:thekaike78@uni9.edu.br" class="rodapé-email">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" stroke-width="2"/>
                                    <path d="M22 6l-10 7L2 6" stroke-width="2"/>
                                </svg>
                                thekaike78@uni9.edu.br
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Baixo do Rodapé -->
            <div class="rodapé-baixo">
                <p class="copyright">© 2026 Studra. Todos os direitos reservados.</p>
                <div class="rodapé-direitos">
                    <a href="#">Privacidade</a>
                    <a href="#">Termos</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="assets/js/lading.js"></script>
</body>
</html>





