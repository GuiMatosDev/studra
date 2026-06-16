<?php

session_start();

if (!isset($_SESSION['usuario_id']))
{
    header('Location: ../login.php');
    exit;
}

if (!isset($_GET['materia_id']))
{
    die('Matéria não informada.');
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>
        Nova Anotação - Studra
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
                Nova Anotação
            </h1>

            <p>
                Registre informações importantes da matéria.
            </p>

        </div>

        <form
            action="../../controllers/anotacoes_controller.php?acao=criar"
            method="POST"
            class="studra-form"
        >

            <input
                type="hidden"
                name="materia_id"
                value="<?= $_GET['materia_id'] ?>"
            >

            <div class="form-group">

                <label>
                    Título
                </label>

                <input
                    type="text"
                    name="titulo"
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
                ></textarea>

            </div>

            <div class="form-actions">

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Salvar Anotação
                </button>

                <a
                    href="../materias/visualizar.php?id=<?= $_GET['materia_id'] ?>"
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