<?php

session_start();

require_once '../../config/database.php';
require_once '../../models/tarefa_model.php';

$model = new tarefa_model($pdo);

$materia_id = $_GET['materia_id'];

$tarefas = $model->t_listar_por_materia(
    $materia_id
);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tarefas</title>
</head>
<body>

<h1>Tarefas</h1>

<a href="criar.php?materia_id=<?= $materia_id ?>">
    Nova Tarefa
</a>

<hr>

<?php foreach ($tarefas as $tarefa): ?>

    <h3>
        <?= $tarefa['nome'] ?>
    </h3>

    <p>
        <?= $tarefa['descricao'] ?>
    </p>

    <p>
        Status:
        <?= $tarefa['status_'] ?>
    </p>

    <p>
        Término:
        <?= $tarefa['data_termino'] ?>
    </p>

    <a href="../../controllers/tarefa_controller.php?acao=arquivar&id=<?= $tarefa['id'] ?>">
        Arquivar
    </a>

    <a href="editar.php?id=<?= $tarefa['id'] ?>">
    Editar
    </a>

    <?php if ($tarefa['status_'] !== 'concluida'): ?>

    <a href="../../controllers/tarefa_controller.php?acao=concluir&id=<?= $tarefa['id'] ?>">
        Concluir
    </a>

    <?php endif; ?>

    <hr>

<?php endforeach; ?>

</body>
</html>