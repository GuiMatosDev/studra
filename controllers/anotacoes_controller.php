<?php

session_start();

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/anotacoes_model.php';

$model = new anotacoes_model($pdo);

$acao = $_GET['acao'] ?? '';

//Criar Anotação
if ($acao === 'criar')
{
    $materia_id = $_POST['materia_id'];

    $titulo = $_POST['titulo'];

    $conteudo = $_POST['conteudo'];

    $model->criar_anotacao(
        $materia_id,
        $titulo,
        $conteudo
    );

    header(
        'Location: ../views/materias/visualizar.php?id='
        . $materia_id
    );

    exit;
}

//Editar Anotação
if ($acao === 'editar')
{
    $id = $_POST['id'];

    $titulo = $_POST['titulo'];

    $conteudo = $_POST['conteudo'];

    $model->editar_anotacao(
        $id,
        $titulo,
        $conteudo
    );

    $anotacao = $model->buscar_id($id);

    header(
        'Location: ../views/materias/visualizar.php?id=' .
        $anotacao['materia_id']
    );

    exit;

}

//Arquivar anotação
if ($acao === 'arquivar')
{
    $id = $_GET['id'];

    $model->arquivar_anotacao($id);

    header('Location: ../views/materias/listar.php');

    exit;
}

//Apagar anotação
if ($acao === 'apagar')
{
    $id = $_GET['id'];

    $materia_id = $_GET['materia_id'];

    $model->apagar($id);

    header(
        'Location: ../views/materias/visualizar.php?id='
        . $materia_id
    );

    exit;
}

