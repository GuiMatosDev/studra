<?php

session_start();

require_once '../../config/icones.php';

//Validação usuário
if (!isset($_SESSION['usuario_id']))
{
    header('Location: ../login.php');
    exit;
}

//requisições
require_once '../../config/database.php';
require_once '../../models/materia_model.php';

//model matéria
$model = new materia_model($pdo);

//Função listar matérias
$materias = $model->m_listar_materia(
    $_SESSION['usuario_id']
);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Minhas Matérias</title>
</head>
<body>


<h1>Minhas Matérias</h1>

<a href="criar.php">
    Nova Matéria
</a>

<hr>

<?php foreach ($materias as $materia): ?>

    <h3>
        <?php echo $icone = $icones[$materia['icone']] ?? '📁'; ?>
        <?php echo $materia['nome']; ?>
    </h3>

    <p>
        <?php echo $materia['descricao']; ?>
    </p>

    <p>
        Pontuação:
        <?php echo $materia['pontuacao']; ?>
    </p>

    <hr>

    <a href="editar.php?id=<?= $materia['id'] ?>">
    Editar
    </a>

    <a href="../../controllers/materia_controller.php?acao=arquivar&id=<?= $materia['id'] ?>">
    Arquivar
    </a>

    <a href="../anotacoes/listar.php?materia_id=<?= $materia['id'] ?>">
    Anotações
    </a>

    <a href="../tarefas/listar.php?materia_id=<?= $materia['id'] ?>">
    Tarefas
    </a>

<?php endforeach; ?>

</body>
</html>