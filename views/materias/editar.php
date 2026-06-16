<?php

session_start();

if (!isset($_SESSION['usuario_id'])) {

    header('Location: ../login.php');
    exit;
}

require_once '../../config/database.php';

require_once '../../models/materia_model.php';

require_once '../../config/icones.php';

$model = new materia_model($pdo);

$materia = $model->buscar_materia_id(
    $_GET['id']
);

$icones = obter_icones();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Editar Matéria - Studra
    </title>

    <link
        rel="stylesheet"
        href="../../assets/css/forms.css"
    >

</head>

<body>

<div class="form-page">

    <div class="form-container">

        <!-- Header -->

        <div class="form-header">

            <h1 class="form-title">

                Editar Matéria

            </h1>

            <p class="form-subtitle">

                Atualize as informações da matéria.

            </p>

        </div>

        <!-- Form -->

        <form
            action="../../controllers/materia_controller.php?acao=editar"
            method="POST"
        >

            <!-- ID -->

            <input
                type="hidden"
                name="id"
                value="<?= $materia['id'] ?>"
            >

            <!-- Nome -->

            <div class="form-group">

                <label for="nome">

                    Nome da Matéria

                </label>

                <input
                    type="text"
                    id="nome"
                    name="nome"
                    value="<?= $materia['nome'] ?>"
                    required
                >

            </div>

            <!-- Descrição -->

            <div class="form-group">

                <label for="descricao">

                    Descrição

                </label>

                <textarea
                    id="descricao"
                    name="descricao"
                ><?= $materia['descricao'] ?></textarea>

            </div>

            <!-- Ícone -->

            <div class="form-group">

                <label for="iconeSelect">

                    Ícone

                </label>

                <select
                    name="icone"
                    id="iconeSelect"
                >

                    <?php foreach ($icones as $chave => $icone): ?>

                        <option
                            value="<?= $chave ?>"
                            <?= $materia['icone'] === $chave ? 'selected' : '' ?>
                        >

                            <?= $icone ?>
                            <?= ucfirst($chave) ?>

                        </option>

                    <?php endforeach; ?>

                </select>

                <!-- Preview -->

                <div
                    class="icon-preview"
                    id="iconPreview"
                >

                    <?= $icones[$materia['icone']] ?? '📚' ?>

                </div>

            </div>

            <!-- Botões -->

            <div class="form-actions">

                <a
                    href="visualizar.php?id=<?= $materia['id'] ?>"
                    class="btn btn-secondary"
                >
                    Cancelar
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Salvar Alterações
                </button>

            </div>

        </form>

    </div>

</div>

<script>

const icones = <?= json_encode($icones); ?>;

const select = document.getElementById('iconeSelect');

const preview = document.getElementById('iconPreview');

select.addEventListener('change', () => {

    preview.textContent = icones[select.value];
});

</script>

</body>
</html>