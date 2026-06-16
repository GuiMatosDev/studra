<?php

session_start();

if (!isset($_GET['materia_id']))
{
    die('Matéria não informada.');
}

$materiaId = $_GET['materia_id'];

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
        Nova Tarefa
    </title>

    <link
        rel="stylesheet"
        href="../../assets/css/dashboard.css"
    >

</head>

<body>

<div class="content-area">

    <div class="section-card">

        <div class="view-header">

            <h1>
                Nova Tarefa
            </h1>

            <a
                href="../materias/visualizar.php?id=<?php echo $materiaId; ?>"
                class="btn btn-secondary"
            >
                Voltar
            </a>

        </div>

        <form
            action="../../controllers/tarefa_controller.php?acao=criar"
            method="POST"
        >

            <input
                type="hidden"
                name="materia_id"
                value="<?php echo $materiaId; ?>"
            >

            <div class="form-group">

                <label>
                    Nome da tarefa
                </label>

                <input
                    type="text"
                    name="nome"
                    placeholder="Digite o nome da tarefa"
                    required
                >

            </div>

            <div class="form-group">

                <label>
                    Descrição
                </label>

                <textarea
                    name="descricao"
                    placeholder="Descreva a tarefa"
                ></textarea>

            </div>

            <div class="form-row">

                <div class="form-group">

                    <label>
                        Data de término
                    </label>

                    <input
                        type="date"
                        name="data_termino"
                        required
                    >

                </div>

            
            <div class="modal-footer">

                <a
                    href="../materias/visualizar.php?id=<?php echo $materiaId; ?>"
                    class="btn btn-secondary"
                >
                    Cancelar
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Salvar Tarefa
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>