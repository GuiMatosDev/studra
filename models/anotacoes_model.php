<?php

class anotacoes_model
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    //Criar Anotação
    public function criar_anotacao(
    $materia_id,
    $titulo,
    $conteudo
    )
    {
    $sql = "
        INSERT INTO anotacoes
        (
            materia_id,
            titulo,
            conteudo
        )
        VALUES
        (
            :materia_id,
            :titulo,
            :conteudo
        )
    ";

    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute([
        ':materia_id' => $materia_id,
        ':titulo' => $titulo,
        ':conteudo' => $conteudo
    ]);
    }

    //Listar por matéria
    public function listar_por_materia($materia_id)
    {
    $sql = "
        SELECT *
        FROM anotacoes
        WHERE materia_id = :materia_id
        AND arquivada = 0
        ORDER BY criado_em DESC
    ";

    $stmt = $this->pdo->prepare($sql);

    $stmt->execute([
        ':materia_id' => $materia_id
    ]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Buscar por id
    public function buscar_id($id)
    {
    $sql = "
        SELECT *
        FROM anotacoes
        WHERE id = :id
    ";

    $stmt = $this->pdo->prepare($sql);

    $stmt->execute([
        ':id' => $id
    ]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //Editar anotação 
    public function editar_anotacao(
    $id,
    $titulo,
    $conteudo
    )
    {
    $sql = "
        UPDATE anotacoes
        SET
            titulo = :titulo,
            conteudo = :conteudo
        WHERE id = :id
    ";

    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute([
        ':id' => $id,
        ':titulo' => $titulo,
        ':conteudo' => $conteudo
    ]);
    }

    //Arquivar Anotação 
    public function arquivar_anotacao($id)
    {
    $sql = "
        UPDATE anotacoes
        SET arquivada = 1
        WHERE id = :id
    ";

    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute([
        ':id' => $id
    ]);
    }

    //apagar anotação
    public function apagar($id)
    {
    $sql = "DELETE FROM anotacoes WHERE id = ?";

    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute([$id]);
    }

}