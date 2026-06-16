<?php

session_start();

if (!isset($_SESSION['usuario_id'])) {

    header('Location: ../login.php');
    exit;
}

require_once '../../config/database.php';

require_once '../../config/icones.php';

require_once '../../models/materia_model.php';
require_once '../../models/tarefa_model.php';
require_once '../../models/anotacoes_model.php';

if (!isset($_GET['id'])) {

    header('Location: ../dashboard.php');
    exit;
}

$idMateria = $_GET['id'];

$materiaModel = new materia_model($pdo);
$tarefaModel = new tarefa_model($pdo);
$anotacaoModel = new anotacoes_model($pdo);

$materia = $materiaModel->buscar_por_id($idMateria);

$tarefas = $tarefaModel->t_listar_por_materia($idMateria);

$anotacoes = $anotacaoModel->listar_por_materia($idMateria);

$icones = obter_icones();

$icone = $icones[$materia['icone']] ?? '📚';

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>
        <?php echo $materia['nome']; ?> - Studra
    </title>

    <link
        rel="stylesheet"
        href="../../assets/css/dashboard.css"
    >

    <link
        rel="stylesheet"
        href="../../assets/css/materia.css"
    >
    
    <link 
        rel="icon" 
        type="image/svg+xml" 
        href="../../assets/img/logo-studra.svg"
    >
</head>

<body>

<div class="dashboard-container">

    <main class="main-content">

        <div class="content-area materia-page">

            <!-- Header -->

            <div class="section-card">

                <div class="materia-header">

                    <div class="materia-icon">

                        <?php echo $icone; ?>

                    </div>

                    <div>

                        <h1>

                            <?php echo ucwords($materia['nome']); ?>

                        </h1>

                        <p class="text-gray">

                            <?php echo $materia['descricao']; ?>

                        </p>

                    </div>

                </div>

            </div>

            <!-- Botões -->

            <div class="view-actions">

                <a
                    href="../dashboard.php"
                    class="btn btn-primary"
                >
                    ← Voltar ao Painel
                </a>

                <a
                    href="../tarefas/criar.php?materia_id=<?php echo $materia['id']; ?>"
                    class="btn btn-secondary"
                >
                    Nova Tarefa
                </a>

                <a
                    href="../anotacoes/criar.php?materia_id=<?php echo $materia['id']; ?>"
                    class="btn btn-secondary"
                >
                    Nova Anotação
                </a>

                <a
                    href="editar.php?id=<?php echo $materia['id']; ?>"
                    class="btn btn-secondary"
                >
                    Editar Matéria
                </a>

                <a
                    href="../../controllers/materia_controller.php?acao=arquivar&id=<?php echo $materia['id']; ?>"
                    class="btn btn-danger"
                    onclick="return confirm('Deseja arquivar esta matéria?');"
                >
                    Arquivar Matéria
                </a>

                <a
                    href="../../controllers/materia_controller.php?acao=apagar&id=<?php echo $materia['id']; ?>"
                    class="btn btn-delete"
                    onclick="return confirm('Deseja apagar esta matéria permanentemente?');"
                >
                    Apagar Matéria
                </a>

                
            </div>

            <!-- Tarefas -->

            <div class="section-card">

                <h2>
                    Tarefas
                </h2>

                <?php if (count($tarefas) > 0): ?>

                    <?php foreach ($tarefas as $tarefa): ?>

                        <div class="task-card">

                            <div class="task-top">

                                <div class="task-info">

                                    <h3 class="task-title">
                                        <?php echo $tarefa['nome']; ?>
                                    </h3>

                                    <?php if (!empty($tarefa['descricao'])): ?>

                                        <p class="task-description">
                                            Descrição: <?php echo $tarefa['descricao']; ?>
                                        </p>

                                    <?php endif; ?>

                                </div>

                                <div class="task-status">

                                    <?php if ($tarefa['status_'] === 'concluida'): ?>

                                        <span class="status-complete">
                                            Status: ✅ Concluída
                                        </span>

                                    <?php else: ?>

                                        <span class="status-pending">
                                            Status: 〽️ em andamento
                                        </span>

                                    <?php endif; ?>

                                </div>

                            </div>

                            <div class="task-footer">

                                <div class="task-meta">

                                    <span>
                                        Término: 📅
                                        <?php echo $tarefa['data_termino']; ?>
                                    </span>

                                

                                   

                                </div>

                                <div class="task-actions">

                                    <?php if ($tarefa['status_'] != 'concluida'): ?>

                                        <a
                                            href="../../controllers/tarefa_controller.php?acao=concluir&id=<?php echo $tarefa['id']; ?>&materia_id=<?php echo $materia['id']; ?>"
                                            class="btn btn-success"
                                        >
                                            Concluir
                                        </a>

                                    <?php endif; ?>

                                    <a
                                        href="../tarefas/editar.php?id=<?php echo $tarefa['id']; ?>"
                                        class="btn btn-secondary"
                                    >
                                        Editar
                                    </a>

                                    <a
                                        href="../../controllers/tarefa_controller.php?acao=apagar&id=<?php echo $tarefa['id']; ?>&materia_id=<?php echo $materia['id']; ?>"
                                        class="btn btn-delete"
                                        onclick="return confirm('Deseja apagar esta tarefa?');"
                                    >
                                        Apagar
                                    </a>


                                </div>

                            </div>

                        </div>

                    <?php endforeach; ?>

                <?php else: ?>

                    <p class="text-gray">

                        Nenhuma tarefa cadastrada.

                    </p>

                <?php endif; ?>

            </div>

            <!-- Anotações -->

            <div class="section-card">

                <h2>
                    Anotações
                </h2>

                <?php if (count($anotacoes) > 0): ?>

                    <?php foreach ($anotacoes as $anotacao): ?>

                        <div class="note-card">

                            <div class="note-top">

                                <div class="note-info">

                                    <h3 class="note-title">
                                        <?php echo $anotacao['titulo']; ?>
                                    </h3>

                                    <p class="note-content">

                                        <?php
                                            echo nl2br(
                                                htmlspecialchars(
                                                    substr($anotacao['conteudo'], 0, 250)
                                                )
                                            );
                                        ?>

                                    </p>

                                </div>

                            </div>

                            <div class="note-footer">

                                <div class="note-actions">

                                    <a
                                        href="../anotacoes/editar.php?id=<?php echo $anotacao['id']; ?>"
                                        class="btn btn-secondary"
                                    >
                                        Editar
                                    </a>

                                    <a
                                        href="../../controllers/anotacoes_controller.php?acao=apagar&id=<?php echo $anotacao['id']; ?>&materia_id=<?php echo $materia['id']; ?>"
                                        class="btn btn-delete"
                                        onclick="return confirm('Deseja apagar esta anotação?');"
                                    >
                                        Apagar
                                    </a>

                                </div>

                            </div>

                        </div>

                    <?php endforeach; ?>

                <?php else: ?>

                    <p class="text-gray">

                        Nenhuma anotação cadastrada.

                    </p>

                <?php endif; ?>

            </div>

        </div>

    </main>

</div>

</body>
</html>