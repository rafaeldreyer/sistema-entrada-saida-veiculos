CREATE DATABASE IF NOT EXISTS controle_veiculos
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE controle_veiculos;

SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS contatos;
DROP TABLE IF EXISTS movimentacoes;
DROP TABLE IF EXISTS veiculos;
DROP TABLE IF EXISTS vagas;
DROP TABLE IF EXISTS condutores;
DROP TABLE IF EXISTS usuarios;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE usuarios (
    id_usuario INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    nome_usuario VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(150) NOT NULL UNIQUE,
    senha_hash VARCHAR(255) NOT NULL,
    perfil ENUM('ADMINISTRADOR', 'OPERADOR') NOT NULL DEFAULT 'OPERADOR',
    status ENUM('ATIVO', 'INATIVO') NOT NULL DEFAULT 'ATIVO',
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE condutores (
    id_condutor INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(120) NOT NULL,
    cpf CHAR(11) NULL UNIQUE,
    telefone VARCHAR(20) NULL,
    email VARCHAR(150) NULL,
    tipo_condutor ENUM('FUNCIONARIO', 'VISITANTE', 'PRESTADOR', 'OUTRO') NOT NULL DEFAULT 'VISITANTE',
    unidade_setor VARCHAR(100) NULL,
    status ENUM('ATIVO', 'INATIVO') NOT NULL DEFAULT 'ATIVO',
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_condutores_nome (nome)
) ENGINE=InnoDB;

CREATE TABLE veiculos (
    id_veiculo INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_condutor INT UNSIGNED NOT NULL,
    placa VARCHAR(8) NOT NULL UNIQUE,
    marca VARCHAR(50) NOT NULL,
    modelo VARCHAR(80) NOT NULL,
    cor VARCHAR(40) NOT NULL,
    ano_modelo SMALLINT UNSIGNED NULL,
    tipo_veiculo ENUM('CARRO', 'MOTO', 'UTILITARIO', 'OUTRO') NOT NULL DEFAULT 'CARRO',
    observacao VARCHAR(255) NULL,
    status ENUM('ATIVO', 'INATIVO') NOT NULL DEFAULT 'ATIVO',
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_veiculos_condutor FOREIGN KEY (id_condutor)
        REFERENCES condutores (id_condutor)
        ON UPDATE CASCADE ON DELETE RESTRICT,
    INDEX idx_veiculos_placa (placa),
    INDEX idx_veiculos_modelo (modelo)
) ENGINE=InnoDB;

CREATE TABLE vagas (
    id_vaga INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    codigo VARCHAR(20) NOT NULL UNIQUE,
    setor VARCHAR(80) NOT NULL,
    tipo_vaga ENUM('CARRO', 'MOTO', 'UTILITARIO', 'GERAL') NOT NULL DEFAULT 'GERAL',
    status ENUM('LIVRE', 'OCUPADA', 'INATIVA') NOT NULL DEFAULT 'LIVRE',
    observacao VARCHAR(255) NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE movimentacoes (
    id_movimentacao INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_veiculo INT UNSIGNED NOT NULL,
    id_condutor INT UNSIGNED NOT NULL,
    id_vaga INT UNSIGNED NOT NULL,
    id_usuario_entrada INT UNSIGNED NOT NULL,
    id_usuario_saida INT UNSIGNED NULL,
    data_hora_entrada DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    data_hora_saida DATETIME NULL,
    motivo_visita VARCHAR(150) NULL,
    observacao VARCHAR(255) NULL,
    status ENUM('ABERTA', 'FINALIZADA') NOT NULL DEFAULT 'ABERTA',
    CONSTRAINT fk_movimentacoes_veiculo FOREIGN KEY (id_veiculo)
        REFERENCES veiculos (id_veiculo) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT fk_movimentacoes_condutor FOREIGN KEY (id_condutor)
        REFERENCES condutores (id_condutor) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT fk_movimentacoes_vaga FOREIGN KEY (id_vaga)
        REFERENCES vagas (id_vaga) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT fk_movimentacoes_usuario_entrada FOREIGN KEY (id_usuario_entrada)
        REFERENCES usuarios (id_usuario) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT fk_movimentacoes_usuario_saida FOREIGN KEY (id_usuario_saida)
        REFERENCES usuarios (id_usuario) ON UPDATE CASCADE ON DELETE RESTRICT,
    INDEX idx_movimentacoes_entrada (data_hora_entrada),
    INDEX idx_movimentacoes_saida (data_hora_saida),
    INDEX idx_movimentacoes_status_veiculo (status, id_veiculo)
) ENGINE=InnoDB;

CREATE TABLE contatos (
    id_contato INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    assunto VARCHAR(150) NOT NULL,
    mensagem TEXT NOT NULL,
    data_envio DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status ENUM('NOVO', 'LIDO') NOT NULL DEFAULT 'NOVO',
    INDEX idx_contatos_data_envio (data_envio)
) ENGINE=InnoDB;

INSERT INTO usuarios (nome, nome_usuario, email, senha_hash, perfil) VALUES
('Administrador de Demonstração', 'admin', 'admin@local.test', '$2y$10$ANEU9ODKgm3AL1GmQ.CrpOj29RLiAfrkJhrUzhWkeVJPBBnnUKv5C', 'ADMINISTRADOR');

INSERT INTO condutores (nome, cpf, telefone, email, tipo_condutor, unidade_setor) VALUES
('João da Silva', '12345678901', '(49) 99999-0001', 'joao@exemplo.local', 'FUNCIONARIO', 'Administrativo'),
('Maria de Souza', '98765432100', '(49) 99999-0002', 'maria@exemplo.local', 'VISITANTE', NULL);

INSERT INTO veiculos (id_condutor, placa, marca, modelo, cor, ano_modelo, tipo_veiculo) VALUES
(1, 'ABC1D23', 'Fiat', 'Argo', 'Prata', 2022, 'CARRO'),
(2, 'XYZ9A87', 'Honda', 'CG 160', 'Vermelha', 2021, 'MOTO');

INSERT INTO vagas (codigo, setor, tipo_vaga) VALUES
('A-01', 'Entrada principal', 'CARRO'),
('A-02', 'Entrada principal', 'CARRO'),
('M-01', 'Entrada principal', 'MOTO');

INSERT INTO movimentacoes
(id_veiculo, id_condutor, id_vaga, id_usuario_entrada, id_usuario_saida, data_hora_entrada, data_hora_saida, motivo_visita, status) VALUES
(1, 1, 1, 1, 1, '2026-07-10 08:00:00', '2026-07-10 17:30:00', 'Expediente', 'FINALIZADA'),
(2, 2, 3, 1, NULL, '2026-07-11 09:15:00', NULL, 'Visita', 'ABERTA');

UPDATE vagas SET status = 'OCUPADA' WHERE codigo = 'M-01';

INSERT INTO contatos (nome, email, assunto, mensagem, status) VALUES
('Mensagem de demonstração', 'exemplo@local.test', 'Teste do formulário', 'Registro criado apenas para demonstrar a consulta no banco.', 'NOVO');
