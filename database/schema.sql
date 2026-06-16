-- Tabela Usuários
CREATE TABLE usuarios(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR (150) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    pontuacao_total INT DEFAULT 0,
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Tabela Matérias
CREATE TABLE materias(
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT NOT NULL,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    icone VARCHAR(50) NOT NULL,
    pontuacao INT DEFAULT 0,
    arquivada BOOLEAN DEFAULT FALSE,
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,

    -- Relação com tabela usuários
    FOREIGN KEY (usuario_id)
    REFERENCES usuarios(id)
    ON DELETE CASCADE
);

-- Tabela Anotações
CREATE TABLE anotacoes(
    id INT PRIMARY KEY AUTO_INCREMENT,
    materia_id INT NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    conteudo TEXT NOT NULL,
    arquivada BOOLEAN DEFAULT FALSE,
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,

    -- Relação com tabela matéria
    FOREIGN KEY (materia_id)
    REFERENCES materias(id)
    ON DELETE CASCADE

);

-- Tabela tarefas
CREATE TABLE tarefas(
    id INT PRIMARY KEY AUTO_INCREMENT,
    materia_id INT NOT NULL,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    status_ ENUM('andamento', 'concluida', 'pendente') DEFAULT 'andamento',
    data_termino DATE NOT NULL,
    pontuacao INT DEFAULT 10,
    recorrente BOOLEAN DEFAULT FALSE,
    frequencia ENUM('nenhuma', 'diaria', 'semanal', 'mensal'),
    arquivada BOOLEAN DEFAULT FALSE,
    criaddo_em DATETIME DEFAULT CURRENT_TIMESTAMP,

    -- Relação com a Tabela Matéria
    FOREIGN KEY (materia_id)
    REFERENCES materias(id)
    ON DELETE CASCADE

);


