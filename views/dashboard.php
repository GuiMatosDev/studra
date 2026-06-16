<?php

session_start();

//Valida sessão senão redireciona para login
if (!isset($_SESSION['usuario_id'])) {

    header('Location: login.php');
    exit;
}



$usuario_nome = $_SESSION['usuario_nome'];
$usuario_email = $_SESSION['usuario_email'];
$usuario_pontos = $_SESSION['us_pontos_total'];


//Requisições
require_once '../config/database.php';

require_once '../models/materia_model.php';
require_once '../models/tarefa_model.php';
require_once '../models/anotacoes_model.php';

require_once '../config/icones.php';
$icones = obter_icones();

//Conexão com o banco de dados
$materiaModel = new materia_model($pdo);
$tarefaModel = new tarefa_model($pdo);
$anotacaoModel = new anotacoes_model($pdo);

//Listagem das matérias
$materias = $materiaModel->m_listar_materia($_SESSION['usuario_id']);

$tarefas = [];
$anotacoes = [];


//listagem anotações e tarefas
foreach ($materias as $materia) {


    $tarefasMateria = $tarefaModel->t_listar_por_materia($materia['id']);

    $anotacoesMateria = $anotacaoModel->listar_por_materia($materia['id']);

    $tarefas = array_merge($tarefas, $tarefasMateria);

    $anotacoes = array_merge($anotacoes, $anotacoesMateria);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dashboard - Studra">
    <title>Dashboard - Studra</title>
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link 
        rel="icon" 
        type="image/svg+xml" 
        href="../assets/img/logo-studra.svg"
    >
</head>
<body>
    <!-- Decoração de Fundo do Site -->
    <div class="decorative-bg">
        <div class="bg-circle bg-circle-1"></div>
        <div class="bg-circle bg-circle-2"></div>
        <div class="bg-circle bg-circle-3"></div>
    </div>

    <!-- Contêiner do Dashboard -->
    <div class="dashboard-container">
        <!-- Barra Lateral -->
        <aside class="sidebar" id="sidebar">
            <!-- Logo -->
            <div class="sidebar-header">
                <div class="logo">
                    <div class="logo-icon">
                        <img 
                            src="/studra/assets/img/logo-studra.svg" 
                            alt="Studra Logo"
                            class="logo-image"
                        >
                    </div>
                    <span class="logo-text">Studra</span>
                </div>
            </div>

            

            <!-- Navegação -->
            <nav class="sidebar-nav">
                <ul>
                    <li>
                        <a href="#dashboard" class="nav-item active" data-view="dashboard">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <rect x="3" y="3" width="7" height="7" stroke-width="2"/>
                                <rect x="14" y="3" width="7" height="7" stroke-width="2"/>
                                <rect x="14" y="14" width="7" height="7" stroke-width="2"/>
                                <rect x="3" y="14" width="7" height="7" stroke-width="2"/>
                            </svg>
                            <span>Painel</span>
                        </a>
                    </li>

                    <li>
                        <a href="#materias" class="nav-item"    data-view="Materias">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                            </svg>
                            <span>Matérias</span>
                        </a>
                    </li>

                    <li>
                        <a href="#configuracoes"class="nav-item" data-view="settings">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <circle cx="12" cy="12" r="3" stroke-width="2"/>
                                <path d="M12 1v6m0 6v6M5.6 5.6l4.3 4.3m4.2 4.2l4.3 4.3M1 12h6m6 0h6M5.6 18.4l4.3-4.3m4.2-4.2l4.3-4.3" stroke-width="2"/>
                            </svg>
                            <span>Configurações</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Perfil do Usuário -->
            <div class="sidebar-footer">
                <div class="user-profile">
                    <div class="user-avatar">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2M12 11a4 4 0 100-8 4 4 0 000 8z" stroke-width="2"/>
                        </svg>
                    </div>
                    <div class="user-info">
                        <p class="user-name">
                            <?php echo $usuario_nome; ?>
                        </p>
                        <p class="user-email">
                            <?php echo $usuario_email; ?>
                        </p>

                        <a href="../controllers/auth_controller.php?acao=logout"
                        class="logout-btn">
    
                        <svg width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor">
                        <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"
                        stroke-width="2"/>
                        <path d="M16 17l5-5-5-5"
                        stroke-width="2"/>
                        <path d="M21 12H9"
                        stroke-width="2"/>
                         </svg>

                        <span>Sair</span>

                         </a>

                    </div>
                </div>
            </div>
        </aside>

        <!-- Conteúdo Principal -->
        <main class="main-content">
            <!-- Header -->
            <header class="header">
                <div class="header-content">
                    
                    <h2> Bem Vindo,
                        <?php echo ucwords($usuario_nome); ?> 

                        <?php 
                        
                        $numero = random_int(1,2);
                        
                        if($numero == 1) {
                            echo "\u{1F600}";
                        }
                        else{
                            echo "\u{1F44D}";
                        }
                        ?>    

                    </h2>
                    
                </div>
            </header>

            <!-- Área de Conteúdo -->
            <div class="content-area">
                <!-- Visualização do Dashboard -->
                <div class="view-container" id="dashboard">
                    <div class="section-card">

                        <h2>Estatísticas</h2>

                        <div class="section-card">

                            <div class="stats-grid">

                                <div class="stat-card stat-card-purple">

                                    <!--Card Pontuação -->
                                    <div class="stat-header">

                                        <h3>Pontuação Total</h3>

                                        <span>⭐</span>

                                    </div>

                                    <p class="stat-value">

                                        <?php echo number_format($usuario_pontos, 0, ',', '.'); ?>

                                    </p>

                                </div>

                                <!--Card Matérias -->
                                <div class="stat-card stat-card-blue">

                                    <div class="stat-header">

                                        <h3>Total de Matérias</h3>

                                        <span>📚</span>

                                    </div>

                                    <p class="stat-value">

                                        <?php echo count($materias); ?>

                                    </p>

                                </div>

                                <!--Card Tarefas -->
                                <div class="stat-card stat-card-green">

                                    <div class="stat-header">

                                        <h3>Total de Tarefas</h3>

                                        <span>📝</span>

                                    </div>

                                    <p class="stat-value">

                                        <?php echo count($tarefas); ?>

                                    </p>

                                </div>

                                <!--Card Tarefas Concluidas-->
                                <!--em desenvolvimento-->

                                <!--Card Anotações-->
                                <div class="stat-card stat-card-yellow">

                                    <div class="stat-header">

                                        <h3>Total de Anotações</h3>

                                        <span>📌</span>

                                    </div>

                                    <p class="stat-value">

                                        <?php echo count($anotacoes); ?>

                                    </p>

                                </div>


                            </div>
                        </div>

                    </div>

                            
                        
                    

            

                <!-- Visualização das Matérias -->
                 <div class="section-card" id="materias">

                    <div class="section-header">

                        <h2>
                            Minhas Matérias
                        </h2>

                        <div class="section-actions">

                            <a
                                href="materias/arquivadas.php"
                                class="btn btn-secondary"
                            >
                                Arquivadas
                            </a>

                            <a
                                href="materias/criar.php"
                                class="btn btn-primary"
                            >
                                Nova Matéria
                            </a>

                        </div>

                    </div>

                    <!-- listagem Das Matérias -->
                    <div class="subjects-grid">

                        <?php if (count($materias) > 0): ?>

                            <?php foreach ($materias as $materia): ?>

                                <?php

                                $qtdTarefas = count(
                                    $tarefaModel->t_listar_por_materia($materia['id'])
                                );

                                $qtdAnotacoes = count(
                                    $anotacaoModel->listar_por_materia($materia['id'])
                                );

                                ?>

                                <!-- Redirecionamento -->
                                <a 
                                    href="materias/visualizar.php?id=<?php echo $materia['id']; ?>" 
                                    class="subject-card"
                                >

                                    <div class="subject-icon">
                                        <?php

                                            echo $icones[$materia['icone']] ?? '📘';

                                        ?>
                                    </div>

                                    <div class="subject-content">

                                        <h3>
                                            <?php echo $materia['nome']; ?>
                                        </h3>

                                        <div class="subject-info">

                                            <span>
                                               ⭐ <?php echo $materia['pontuacao']; ?> pontuação 
                                            </span>

                                            <span>
                                               📝 <?php echo $qtdTarefas; ?> tarefas
                                            </span>

                                            <span>
                                               📌 <?php echo $qtdAnotacoes; ?> anotações
                                            </span>

                                        </div>

                                    </div>

                                </a>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <p class="text-gray">
                                Nenhuma matéria cadastrada.
                            </p>

                        <?php endif; ?>

                    </div>

                </div>

                <!-- Visualização das Tarefas -->
                <div class="view-container hidden" id="tasksView">
                    <div class="view-header">
                        <h1>Tarefas</h1>
                        <button class="btn btn-primary" onclick="showTaskModal()">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M12 5v14M5 12h14" stroke-width="2"/>
                            </svg>
                            Nova Tarefa
                        </button>
                    </div>
                    <div id="allTasksList" class="tasks-list"></div>
                </div>

                <!-- Visualização das Anotações -->
                <div class="view-container hidden" id="notesView">
                    <div class="view-header">
                        <h1>Anotações</h1>
                        <button class="btn btn-primary" onclick="showNoteModal()">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M12 5v14M5 12h14" stroke-width="2"/>
                            </svg>
                            Nova Anotação
                        </button>
                    </div>
                    <div id="allNotesList" class="notes-grid"></div>
                </div>

                <!-- Visualização das Configurações -->
                <div class="section-card" id="configuracoes">

                    <h2>Configurações</h2>

                    <div class="settings-group">

                        <h3>Minha Conta</h3>

                        <div class="settings-item">
                            <span>Nome</span>
                            <strong><?php echo $usuario_nome; ?></strong>
                        </div>

                        <div class="settings-item">
                            <span>Email</span>
                            <strong><?php echo $usuario_email; ?></strong>
                        </div>

                        <div class="settings-item">
                            <span>Pontuação</span>
                            <strong>
                                <?php echo $usuario_pontos?>
                            </strong>
                        </div>

                    </div>

                    <div class="settings-group">

                        <h3>Aparência</h3>

                        <button class="btn btn-secondary">
                            Tema Escuro
                        </button>

                    </div>

                    <div class="settings-group">

                        <h3>Segurança</h3>

                        <button class="btn btn-secondary">
                            Alterar Senha
                        </button>

                    </div>


                    <div class="settings-group">

                        <h3>Resumo da Conta</h3>

                        <div class="settings-item">
                            <span>Total de matérias</span>
                            <strong><?php echo count($materias); ?></strong>
                        </div>

                        <div class="settings-item">
                            <span>Total de tarefas</span>
                            <strong><?php echo count($tarefas); ?></strong>
                        </div>

                        <div class="settings-item">
                            <span>Total de anotações</span>
                            <strong><?php echo count($anotacoes); ?></strong>
                        </div>

                            <a href="../controllers/auth_controller.php?acao=logout"
                            class="btn btn-primary">

                                Sair da Conta

                            </a>
                        

                    </div>

                </div>


            </div>
        </main>
    </div>

    <!-- Janela Modal das Tarefas -->
    <div class="modal hidden" id="taskModal">
        <div class="modal-backdrop" onclick="hideTaskModal()"></div>
        <div class="modal-content">
            <div class="modal-header">
                <h2>Nova Tarefa</h2>
                <button class="modal-close" onclick="hideTaskModal()">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M18 6L6 18M6 6l12 12" stroke-width="2"/>
                    </svg>
                </button>
            </div>
            <form id="taskForm" onsubmit="handleTaskSubmit(event)">
                <div class="form-group">
                    <label for="taskTitle">Título</label>
                    <input type="text" id="taskTitle" required>
                </div>
                <div class="form-group">
                    <label for="taskDescription">Descrição</label>
                    <textarea id="taskDescription" rows="3" required></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="taskPriority">Prioridade</label>
                        <select id="taskPriority" required>
                            <option value="low">Baixa</option>
                            <option value="medium">Média</option>
                            <option value="high">Alta</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="taskDueDate">Data de Vencimento</label>
                        <input type="date" id="taskDueDate" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="hideTaskModal()">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Criar Tarefa</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Janela Modal das Anotações -->
    <div class="modal hidden" id="noteModal">
        <div class="modal-backdrop" onclick="hideNoteModal()"></div>
        <div class="modal-content">
            <div class="modal-header">
                <h2>Nova Anotação</h2>
                <button class="modal-close" onclick="hideNoteModal()">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M18 6L6 18M6 6l12 12" stroke-width="2"/>
                    </svg>
                </button>
            </div>
            <form id="noteForm" onsubmit="handleNoteSubmit(event)">
                <div class="form-group">
                    <label for="noteTitle">Título</label>
                    <input type="text" id="noteTitle" required>
                </div>
                <div class="form-group">
                    <label for="noteContent">Conteúdo</label>
                    <textarea id="noteContent" rows="5" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="hideNoteModal()">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Criar Anotação</button>
                </div>
            </form>
        </div>
    </div>

    <script>

    let tasks = <?php echo json_encode($tarefas); ?>;

    let notes = <?php echo json_encode($anotacoes); ?>;

    </script>

    <script src="assets/js/dashboard.js"></script>
</body>
</html>
