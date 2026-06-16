<?php

session_start();

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/tarefa_model.php';

$model = new tarefa_model($pdo);

$acao = $_GET['acao'] ?? '';

//Criar Tarefa
if ($acao === 'criar')
{
    $materia_id = $_POST['materia_id'];

    $nome = $_POST['nome'];

    $descricao = $_POST['descricao'];

    $data_termino = $_POST['data_termino'];

    $recorrente = isset($_POST['recorrente']) ? 1 : 0;

    $frequencia = $_POST['frequencia'];

    $model->criar_tarefa(
        $materia_id,
        $nome,
        $descricao,
        $data_termino,
        $recorrente,
        $frequencia
    );

    header(
        'Location: ../views/materias/visualizar.php?id=' . $materia_id
    );

    exit;
}

//Arquivar Tarefa
if ($acao === 'arquivar')
{
    $id = $_GET['id'];

    $tarefa = $model->t_buscar_por_id($id);

    $model->arquivar_tarefa($id);

    header(
        'Location: ../views/tarefas/listar.php?materia_id=' .
        $tarefa['materia_id']
    );

    exit;
}

//Editar Tarefa
if ($acao === 'editar')
{
    $id = $_POST['id'];

    $nome = $_POST['nome'];

    $descricao = $_POST['descricao'];

    $data_termino = $_POST['data_termino'];

    $recorrente = isset($_POST['recorrente']) ? 1 : 0;

    $frequencia = $_POST['frequencia'];

    $model->editarTarefa(
        $id,
        $nome,
        $descricao,
        $data_termino,
        $recorrente,
        $frequencia
    );

    $tarefa = $model->t_buscar_por_id($id);

    header(
        'Location: ../views/materias/visualizar.php?id=' .
    $tarefa['materia_id']
    );

    exit;
}

//Concluir Tarefa
if ($acao === 'concluir')
{
    $id = $_GET['id'];

    $dados = $model->buscarMateriaDaTarefa($id);

    $model->concluir_tarefa($id);

    $model->adicionar_pontos_materia(
        $dados['materia_id'],
        10
    );

    $sql = "
        UPDATE usuarios
        SET pontuacao_total =
            pontuacao_total + 10
        WHERE id = ?
    ";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $dados['usuario_id']
    ]);

    header(
        'Location: ../views/materias/visualizar.php?id=' .
    $dados['materia_id']
    );

    exit;
}

// Apagar tarefa
if ($acao === 'apagar')
{
    $id = $_GET['id'];

    $materiaId = $_GET['materia_id'];

    $model->apagar_tarefa($id);

    header(
        'Location: ../views/materias/visualizar.php?id=' .
        $materiaId
    );

    exit;
}