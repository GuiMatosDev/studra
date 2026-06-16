<?php
session_start();

//Se usuário tiver logado ele vai para o dashboard direto
if (isset($_SESSION['usuario_id'])) {
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login e Cadastro - Studra">
    <title>Entrar - Studra</title>
    <link rel="stylesheet" href="../assets/css/login.css">

    <link 
        rel="icon" 
        type="image/svg+xml" 
        href="../assets/img/logo-studra.svg"
    >
    
</head>
<body>
    <!-- Header do Site -->
    <header class="auth-header">
        <div class="container">
            <a href="../index.php" class="logo">
                <div class="logo-ícone">
                    <img 
                        src="/studra/assets/img/logo-studra.svg" 
                        alt="Studra Logo"
                        class="logo-image"
                    >
                </div>
                <span class="logo-texto">Studra</span>
            </a>
        </div>
    </header>

    <!-- Conteúdo Principal -->
    <main class="auth-principal">
        <!-- Decorações do Fundo (Círculos e Quadrados) -->
        <div class="auth-fundo-decorativo">
            <div class="auth-circle auth-circle-1"></div>
            <div class="auth-circle auth-circle-2"></div>
            <div class="auth-circle auth-circle-3"></div>
            <div class="auth-circle auth-circle-4"></div>
            <div class="auth-circle auth-circle-5"></div>
            <div class="auth-square auth-square-1"></div>
            <div class="auth-square auth-square-2"></div>
            <div class="auth-square auth-square-3"></div>
        </div>

        <!-- Container de Autenticação -->
        <div class="auth-container">
            <div class="auth-card">
                
                <!-- Título do Formulário -->
                <div class="auth-header-texto">
                    <h2 class="auth-título">Bem-vindo de volta!</h2>
                    <p class="auth-subtítulo">Entre para acessar suas tarefas</p>
                </div>

                <!-- Formulário do Login -->
                <form
                    id="loginForm"
                    class="auth-form ativo"
                    action="../controllers/auth_controller.php?acao=login"
                    method="POST"
                    >

                    <!-- Email -->
                    <div class="form-grupo">
                        <label for="loginEmail" class="form-label">E-mail</label>
                        <div class="input-w">
                            <svg class="input-ícone" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" stroke-width="2"/>
                                <path d="M22 6l-10 7L2 6" stroke-width="2"/>
                            </svg>
                            <input 
                                type="email" 
                                id="loginEmail" 
                                name="email" 
                                placeholder="seu@email.com" 
                                class="form-input"
                                required
                            />
                        </div>
                    </div>

                    <!-- Senha do Login -->
                    <div class="form-grupo">
                        <label for="loginPassword" class="form-label">Senha</label>
                        <div class="input-w">
                            <svg class="input-ícone" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2" stroke-width="2"/>
                                <path d="M7 11V7a5 5 0 0110 0v4" stroke-width="2"/>
                            </svg>
                            <input 
                                type="password" 
                                id="loginPassword" 
                                name="senha" 
                                placeholder="••••••••" 
                                class="form-input"
                                required
                            />
                            <button type="button" class="esconder-senha" data-target="loginPassword">
                                <svg class="olho-ícone" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" stroke-width="2"/>
                                    <circle cx="12" cy="12" r="3" stroke-width="2"/>
                                </svg>
                                <svg class="olho-fechado-ícone hidden" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19m-6.72-1.07a3 3 0 11-4.24-4.24M1 1l22 22" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Botão de Entrar -->
                    <button type="submit" class="btn-entrar">
                        Entrar
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M5 12h14M12 5l7 7-7 7" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </button>
                </form>


                <!-- Termos e Condições (Aparece apenas em Cadastro) -->
                <p class="termos-texto" id="termsText" style="display: none;">
                    Ao criar uma conta, você concorda com nossos 
                    <a href="#">Termos de Uso</a> e 
                    <a href="#">Política de Privacidade</a>
                </p>
            </div>

            <!-- Informações Adicionais -->
            <p class="auth-rodapé-texto">
                Não tem uma conta?

            <a
                href="cadastro.php"
                class="switch-link"
            >
                Cadastre-se gratuitamente
            </a>
</p>
        </div>
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

    <script src="../assets/js/login.js"></script>
</body>
</html>