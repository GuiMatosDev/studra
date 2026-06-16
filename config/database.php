<?php

//Variáveis
$host = "localhost";
$dbname = "studra";
$user = "root";
$password = "";

try{

    //Conexão com o banco
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $user,
        $password
    );

    //Tratamento de erros
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e){
    die("Erro na conexão: " . $e->getMessage());
}

    
