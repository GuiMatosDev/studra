<?php

//Imports
require_once __DIR__ . '/../config/database.php';

//Comportamento usuário
class usuario_model{

    //Conexão com o Banco de Dados
    private $pdo; 
    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    //Função: Criar Usuário
    public function criar_usuario($nome, $email, $senha){

        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nome, email, senha)
                VALUES (:nome, :email, :senha)";

        //Usa o prepare para preparar a tabela
        $molde = $this->pdo->prepare($sql);

        //Usa o execute para enviar somente os dados
        return $molde->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':senha' => $senha_hash
        ]);
        //Feito dessa forma para evitar SQL INJECTION 
    }

    //Validar usuário pelo email
    public function buscar_email($email){

        $sql = "SELECT * FROM usuarios WHERE email = :email";

        $molde = $this->pdo->prepare($sql);

        $molde-> execute([
            ':email' => $email
        ]);

        //Usa o fetch para mostrar os dados
        return $molde-> fetch(PDO::FETCH_ASSOC);
    }
}