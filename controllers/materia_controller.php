<?php

session_start();

//Requisições
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/materia_model.php';

//model materia
$model = new materia_model($pdo);

$acao = $_GET['acao'] ?? '';

//Criar Matéria
if ($acao === 'criar'){

    //Sessão 
    $usuario_id = $_SESSION['usuario_id'];

    //Informações da Matéria
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $icone = $_POST['icone'];

    //Criar no banco de dados
    $model->criar_materia(
    $usuario_id,
    $nome,
    $descricao,
    $icone
    );

    //Redireciona para o Dashboard
    header('Location: ../views/dashboard.php');
    exit;

}

//Editar Matéria
if ($acao === 'editar')
{
    $id = $_POST['id'];

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $icone = $_POST['icone'];

    $model->editar_materia(
        $id,
        $nome,
        $descricao,
        $icone
    );

    header('Location: ../views/materias/visualizar.php?id=' . $id);
    exit;
}

//Arquivar Matéria
if ($acao === 'arquivar')
{
    $id = $_GET['id'];

    $model->arquivar_materia($id);

    header('Location: ../views/dashboard.php#materias');
    exit;
}

//Apagar matéria
if ($acao === 'apagar')
{
    $id = $_GET['id'];

    $model->apagar_materia($id);

    header('Location: ../views/dashboard.php#materias');

    exit;
}