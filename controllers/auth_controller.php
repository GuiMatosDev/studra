<?php

session_start();

//Imports
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/usuario_model.php';

//Gera instâcia
$model = new usuario_model($pdo);

//Inicialização do GET e desdobrametos
$acao = $_GET['acao'] ?? '';

//Cadastro
if ($acao === 'cadastro'){

    //Recebimento dos dados
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    //Cria o Usuário
    $model->criar_usuario($nome, $email, $senha);

    //Direciona para login
    header('Location: ../views/login.php');
    exit;
}

//Login
if ($acao === 'login'){

    //Recebimento de dados
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    //Acha usuário pelo email 
    $usuario =$model->buscar_email($email);

    //Validação da senha
    if($usuario && password_verify($senha, $usuario['senha'])){

        //Sessão do usuário
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome'];
        $_SESSION['usuario_email'] = $usuario['email'];
        $_SESSION['us_pontos_total'] = $usuario['pontuacao_total'];

        //Direciona para o Dashboard
        header('Location: ../views/dashboard.php');
        exit;
    } else {

        echo "Email ou senha inválidos";
    }
}

//logout
if ($acao === 'logout'){

    //Destroi a sessão
    session_destroy();

    //Direciona para o login
    header('Location: ../views/login.php');
    exit;
}

