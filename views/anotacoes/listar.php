<?php

session_start();

require_once '../../config/database.php';
require_once '../../models/anotacoes_model.php';

$model = new anotacoes_model($pdo);

$materia_id = $_GET['materia_id'];

$anotacoes = $model->listar_por_materia(
    $materia_id
);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Anotações</title>
</head>
<body>

<h1>Anotações</h1>

<a href="criar.php?materia_id=<?= $materia_id ?>">
    Nova Anotação
</a>

<hr>

<?php foreach ($anotacoes as $anotacao): ?>

    <h3>
        <?= $anotacao['titulo'] ?>
    </h3>

    <p>
        <?= nl2br($anotacao['conteudo']) ?>
    </p>

    <a href="editar.php?id=<?= $anotacao['id'] ?>">
        Editar
    </a>

    |

    <a href="../../controllers/anotacoes_controller.php?acao=arquivar&id=<?= $anotacao['id'] ?>">
        Arquivar
    </a>

    <hr>

<?php endforeach; ?>

</body>
</html>