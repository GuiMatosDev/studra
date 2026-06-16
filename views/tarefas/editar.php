<?php

session_start();

require_once '../../config/database.php';
require_once '../../models/tarefa_model.php';

$model = new tarefa_model($pdo);

$tarefa = $model->t_buscar_por_id($_GET['id']);

if (!$tarefa)
{
    die('Tarefa não encontrada');
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>
        Editar Tarefa - Studra
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
                Editar Tarefa
            </h1>

            <p>
                Atualize as informações da tarefa.
            </p>

        </div>

        <form
            action="../../controllers/tarefa_controller.php?acao=editar"
            method="POST"
            class="studra-form"
        >

            <input
                type="hidden"
                name="id"
                value="<?= $tarefa['id'] ?>"
            >

            <div class="form-group">

                <label>
                    Nome da tarefa
                </label>

                <input
                    type="text"
                    name="nome"
                    value="<?= htmlspecialchars($tarefa['nome']) ?>"
                    required
                >

            </div>

            <div class="form-group">

                <label>
                    Descrição
                </label>

                <textarea
                    name="descricao"
                    rows="5"
                ><?= htmlspecialchars($tarefa['descricao']) ?></textarea>

            </div>

            <div class="form-group">

                <label>
                    Data de término
                </label>

                <input
                    type="date"
                    name="data_termino"
                    value="<?= $tarefa['data_termino'] ?>"
                >

            </div>

    

            <div class="form-actions">

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Salvar Alterações
                </button>

                <a
                    href="../materias/visualizar.php?id=<?= $tarefa['materia_id'] ?>"
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