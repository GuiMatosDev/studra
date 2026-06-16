<?php

session_start();

if (!isset($_SESSION['usuario_id']))
{
    header('Location: ../login.php');
    exit;
}

if (!isset($_GET['id']))
{
    die('ID da anotação não informado.');
}

require_once '../../config/database.php';
require_once '../../models/anotacoes_model.php';

$model = new anotacoes_model($pdo);

$anotacao = $model->buscar_id(
    $_GET['id']
);

if (!$anotacao)
{
    die('Anotação não encontrada.');
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>
        Editar Anotação - Studra
    </title>

    <link
        rel="stylesheet"
        href="../../assets/css/dashboard.css"
    >

    <link
        rel="stylesheet"
        href="../../assets/css/forms.css"
    >

    <link
        rel="icon"
        type="image/svg+xml"
        href="../../assets/img/logo-studra.svg"
    >

</head>

<body>

<div class="form-page">

    <div class="form-card">

        <div class="form-header">

            <h1>
                Editar Anotação
            </h1>

            <p>
                Atualize as informações da anotação.
            </p>

        </div>

        <form
            action="../../controllers/anotacoes_controller.php?acao=editar"
            method="POST"
            class="studra-form"
        >

            <input
                type="hidden"
                name="id"
                value="<?= $anotacao['id'] ?>"
            >

            <div class="form-group">

                <label>
                    Título
                </label>

                <input
                    type="text"
                    name="titulo"
                    value="<?= htmlspecialchars($anotacao['titulo']) ?>"
                    required
                >

            </div>

            <div class="form-group">

                <label>
                    Conteúdo
                </label>

                <textarea
                    name="conteudo"
                    rows="10"
                    required
                ><?= htmlspecialchars($anotacao['conteudo']) ?></textarea>

            </div>

            <div class="form-actions">

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Salvar Alterações
                </button>

                <a
                    href="../materias/visualizar.php?id=<?= $anotacao['materia_id'] ?>"
                    class="btn btn-secondary"
                >
                    Cancelar
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>