<?php

require_once __DIR__ . "/../config/database.php";

class materia_model{
    #Conexão com o bacno de dados
    private $pdo;
    public function __construct($pdo){
        $this->pdo = $pdo;

    }

    #Criar Matéria
    public function criar_materia(
        $usuario_id,
        $nome,
        $descricao,
        $icone
    ){

        $sql = "
            INSERT INTO materias(
                usuario_id,
                nome,
                descricao,
                icone
            )
            VALUES
            (
                :usuario_id,
                :nome,
                :descricao,
                :icone
            
            )
        ";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
        ':usuario_id' => $usuario_id,
        ':nome' => $nome,
        ':descricao' => $descricao,
        ':icone' => $icone
        ]);
    }

    #Listar materia por usuário e por criação
    public function m_listar_materia($usuario_id){

        $sql = "
        SELECT *
        FROM materias
        WHERE usuario_id = :usuario_id
        AND arquivada = 0
        ORDER BY criado_em DESC
    
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
        ':usuario_id' => $usuario_id
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    #buscar materia por Id
    public function buscar_materia_id($id){
    $sql = "
        SELECT *
        FROM materias
        WHERE id = :id
    ";

    $stmt = $this->pdo->prepare($sql);

    $stmt->execute([
        ':id' => $id
    ]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    #Editar Matéria
    public function editar_materia(
    $id,
    $nome,
    $descricao,
    $icone
    )
    {
    $sql = "
        UPDATE materias
        SET
            nome = :nome,
            descricao = :descricao,
            icone = :icone
        WHERE id = :id
    ";

    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute([
        ':id' => $id,
        ':nome' => $nome,
        ':descricao' => $descricao,
        ':icone' => $icone
    ]);
    }


    #Arquivar Matéria
    public function arquivar_materia($id)
    {
    $sql = "
        UPDATE materias
        SET arquivada = 1
        WHERE id = :id
    ";

    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute([
        ':id' => $id
    ]);
    }

public function buscar_por_id($id)
    {
    $sql = "SELECT * FROM materias WHERE id = :id";

    $stmt = $this->pdo->prepare($sql);

    $stmt->execute([
        ':id' => $id
    ]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function apagar_materia($id)
    {
    $sql = "DELETE FROM materias WHERE id = :id";

    $stmt = $this->pdo->prepare($sql);

    $stmt->execute([
        ':id' => $id
    ]);
    }

    public function listar_arquivadas($usuarioId)
    {
    $sql = "
        SELECT *
        FROM materias
        WHERE usuario_id = :usuario_id
        AND arquivada = True
    ";

    $stmt = $this->pdo->prepare($sql);

    $stmt->execute([
        ':usuario_id' => $usuarioId
    ]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }




}   

