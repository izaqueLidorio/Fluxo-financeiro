# Fluxo-financeiro
Projeto para a Vaga para Desenvolvedor Backend Dotum.

Para testar a aplicação é bem simples basta ter o php instalado no xampp ou laragon por exemplo, criar o banco baixar o projeto e testar localmente,verifique a conexão com o banco para ter certeza que ira funcionar.

-- Criar banco de dados

CREATE DATABASE IF NOT EXISTS financeiro;
USE financeiro;

-- Criar tabela de contas

CREATE TABLE IF NOT EXISTS contas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    descricao VARCHAR(255) NOT NULL,
    valor DECIMAL(10,2) NOT NULL,
    data_vencimento DATE NOT NULL,
    status ENUM('PENDENTE', 'PAGO', 'RECEBIDO') NOT NULL DEFAULT 'PENDENTE',
    tipo ENUM('PAGAR', 'RECEBER') NOT NULL
);

apos isso é só adicionar dados ao banco pelo front da aplicação mesmo.
