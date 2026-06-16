<?php

class tarefa_model 
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    //Criar Tarefa
    public function criar_tarefa(
    $materia_id,
    $nome,
    $descricao,
    $data_termino,
    $recorrente,
    $frequencia
    )
    {
    $sql = "
        INSERT INTO tarefas
        (
            materia_id,
            nome,
            descricao,
            data_termino,
            recorrente,
            frequencia
        )
        VALUES
        (
            :materia_id,
            :nome,
            :descricao,
            :data_termino,
            :recorrente,
            :frequencia
        )
    ";

    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute([
        ':materia_id' => $materia_id,
        ':nome' => $nome,
        ':descricao' => $descricao,
        ':data_termino' => $data_termino,
        ':recorrente' => $recorrente,
        ':frequencia' => $frequencia
    ]);
    }

    //Listar por Matérias
    public function t_listar_por_materia($materia_id)
    {
    $sql = "
        SELECT *
        FROM tarefas
        WHERE materia_id = :materia_id
        AND arquivada = 0
        ORDER BY data_termino ASC
    ";
    

    $stmt = $this->pdo->prepare($sql);

    $stmt->execute([
        ':materia_id' => $materia_id
    ]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function t_buscar_por_id($id)
    {
    $sql = "
        SELECT *
        FROM tarefas
        WHERE id = :id
    ";

    $stmt = $this->pdo->prepare($sql);

    $stmt->execute([
        ':id' => $id
    ]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    //Editar Tarefa
    public function editarTarefa(
    $id,
    $nome,
    $descricao,
    $data_termino,
    $recorrente,
    $frequencia
    )
    {
    $sql = "
        UPDATE tarefas
        SET
            nome = :nome,
            descricao = :descricao,
            data_termino = :data_termino,
            recorrente = :recorrente,
            frequencia = :frequencia
        WHERE id = :id
    ";

    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute([
        ':id' => $id,
        ':nome' => $nome,
        ':descricao' => $descricao,
        ':data_termino' => $data_termino,
        ':recorrente' => $recorrente,
        ':frequencia' => $frequencia
    ]);
    }

    //Arquivar Tarefa
    public function arquivar_tarefa($id)
    {
    $sql = "
        UPDATE tarefas
        SET arquivada = 1
        WHERE id = :id
    ";

    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute([
        ':id' => $id
    ]);
    }

    //Conclusão da Tarefa 
    public function concluir_tarefa($id)
    {
    $sql = "
        UPDATE tarefas
        SET status_ = 'concluida'
        WHERE id = :id
    ";

    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute([
        ':id' => $id
    ]);
    }

    //Pontuação
    public function adicionar_pontos_materia(
    $materia_id,
    $pontos
    )
    {
    $sql = "
        UPDATE materias
        SET pontuacao = pontuacao + :pontos
        WHERE id = :materia_id
    ";

    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute([
        ':pontos' => $pontos,
        ':materia_id' => $materia_id
    ]);
    }

    public function buscarMateriaDaTarefa($id)
{
    $sql = "
        SELECT
            t.id,
            m.id AS materia_id,
            m.usuario_id
        FROM tarefas t
        INNER JOIN materias m
            ON m.id = t.materia_id
        WHERE t.id = :id
    ";

    $stmt = $this->pdo->prepare($sql);

    $stmt->execute([
        ':id' => $id
    ]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function apagar_tarefa($id)
    {
    $sql = "DELETE FROM tarefas WHERE id = ?";

    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute([$id]);
    }





}