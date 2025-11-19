-- ========================================
-- SCRIPT SQL PARA MYSQL WORKBENCH
-- Schema: site_mvc
-- Sistema E-commerce com MVC
-- ========================================

-- Usar o schema site_mvc
USE site_mvc;

-- ========================================
-- 1. TABELA DE CATEGORIAS
-- ========================================
CREATE TABLE IF NOT EXISTS tbl_categoria (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nome_categoria VARCHAR(100) NOT NULL,
    descricao TEXT,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- 2. TABELA DE PRODUTOS
-- ========================================
CREATE TABLE IF NOT EXISTS tbl_produto (
    id_produto INT AUTO_INCREMENT PRIMARY KEY,
    nome_produto VARCHAR(200) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10, 2) NOT NULL,
    estoque INT NOT NULL DEFAULT 0,
    id_categoria INT,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_categoria) REFERENCES tbl_categoria(id_categoria) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- 3. TABELA DE CLIENTES
-- ========================================
CREATE TABLE IF NOT EXISTS tbl_cliente (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nome_cliente VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    telefone VARCHAR(20),
    endereco TEXT,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- DADOS DE EXEMPLO PARA TESTES
-- ========================================

-- Inserir categorias de exemplo
INSERT INTO tbl_categoria (nome_categoria, descricao) VALUES
('Eletrônicos', 'Produtos eletrônicos e tecnologia'),
('Roupas', 'Vestuário e acessórios'),
('Livros', 'Livros e publicações'),
('Esportes', 'Artigos esportivos e fitness'),
('Casa e Decoração', 'Móveis e decoração para casa');

-- Inserir produtos de exemplo
INSERT INTO tbl_produto (nome_produto, descricao, preco, estoque, id_categoria) VALUES
('Smartphone Samsung Galaxy', 'Smartphone com tela de 6.5 polegadas, 128GB', 1899.99, 50, 1),
('Notebook Dell Inspiron', 'Notebook com Intel i5, 8GB RAM, 256GB SSD', 3499.99, 30, 1),
('Fones de Ouvido Bluetooth', 'Fones wireless com cancelamento de ruído', 299.99, 100, 1),
('Camiseta Básica', 'Camiseta 100% algodão, diversas cores', 49.99, 200, 2),
('Calça Jeans', 'Calça jeans masculina, corte reto', 159.99, 80, 2),
('Harry Potter - Coleção Completa', 'Box com os 7 livros da saga', 189.99, 45, 3),
('Bola de Futebol', 'Bola oficial de futebol profissional', 89.99, 60, 4),
('Esteira Ergométrica', 'Esteira dobrável com painel digital', 1299.99, 15, 4),
('Sofá 3 Lugares', 'Sofá confortável para sala de estar', 1899.99, 20, 5),
('Luminária LED', 'Luminária de mesa com regulagem de intensidade', 79.99, 90, 5);

-- Inserir clientes de exemplo
INSERT INTO tbl_cliente (nome_cliente, email, telefone, endereco) VALUES
('João Silva', 'joao.silva@email.com', '(11) 98765-4321', 'Rua das Flores, 123 - São Paulo, SP'),
('Maria Santos', 'maria.santos@email.com', '(21) 97654-3210', 'Av. Atlântica, 456 - Rio de Janeiro, RJ'),
('Pedro Oliveira', 'pedro.oliveira@email.com', '(31) 96543-2109', 'Rua da Liberdade, 789 - Belo Horizonte, MG'),
('Ana Costa', 'ana.costa@email.com', '(41) 95432-1098', 'Rua XV de Novembro, 321 - Curitiba, PR'),
('Carlos Souza', 'carlos.souza@email.com', '(51) 94321-0987', 'Av. Independência, 654 - Porto Alegre, RS');

-- ========================================
-- CONSULTAS ÚTEIS PARA VERIFICAÇÃO
-- ========================================

-- Verificar todas as categorias
-- SELECT * FROM tbl_categoria;

-- Verificar todos os produtos com suas categorias
-- SELECT p.*, c.nome_categoria 
-- FROM tbl_produto p 
-- LEFT JOIN tbl_categoria c ON p.id_categoria = c.id_categoria;

-- Verificar todos os clientes
-- SELECT * FROM tbl_cliente;

-- ========================================
-- FIM DO SCRIPT
-- ========================================
