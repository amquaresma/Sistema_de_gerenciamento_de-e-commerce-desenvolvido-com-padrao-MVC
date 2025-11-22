# Sistema E-commerce MVC

Sistema de gerenciamento de e-commerce desenvolvido com padrão MVC (Model-View-Controller) utilizando PHP, MySQL, HTML, CSS e JavaScript.

## 🚀 Tecnologias Utilizadas

- **Backend:** PHP 8.2 com PDO
- **Frontend:** HTML5, CSS3, JavaScript (Vanilla)
- **Banco de Dados:** MySQL 8.0
- **Arquitetura:** MVC (Model-View-Controller)

## 📋 Funcionalidades

### ✅ CRUD Completo de Categorias
- Criar, listar, editar e excluir categorias de produtos
- Validação de formulários (frontend e backend)

### ✅ CRUD Completo de Produtos
- Gerenciamento completo de produtos
- Relacionamento com categorias
- Controle de estoque e preços
- Catálogo público de produtos

### ✅ CRUD Completo de Clientes
- Cadastro de clientes com informações completas
- Email único para cada cliente
- Validação de dados

### ✅ Design Responsivo
- Interface adaptável para desktop, tablet e mobile
- CSS moderno com Flexbox e Grid
- Menu hambúrguer para dispositivos móveis

## 📁 Estrutura do Projeto

```
.
├── Controller/           # Controladores (lógica de negócio)
│   ├── CategoriaController.php
│   ├── ProdutoController.php
│   └── ClienteController.php
├── Model/               # Models (interação com banco de dados)
│   ├── CategoriaModel.php
│   ├── ProdutoModel.php
│   └── ClienteModel.php
├── View/                # Views (interface do usuário)
│   ├── layouts/
│   │   ├── header.php
│   │   └── footer.php
│   ├── categorias/
│   ├── produtos/
│   └── clientes/
├── config/              # Configurações
│   └── database.php     # Conexão com banco de dados
├── assets/              # Recursos estáticos
│   ├── css/
│   │   └── style.css
│   └── js/
│       └── script.js
├── database_setup.sql   # Script SQL para criar o banco
├── index.php           # Ponto de entrada da aplicação
└── README.md           # Este arquivo
```

## 🗄️ Configuração do Banco de Dados

### Passo 1: Criar o Schema no MySQL Workbench

1. Abra o MySQL Workbench
2. Conecte-se ao seu servidor MySQL
3. Execute o seguinte comando para criar o schema:

```sql
CREATE DATABASE IF NOT EXISTS site_mvc;
```

### Passo 2: Executar o Script SQL

1. No MySQL Workbench, abra o arquivo `database_setup.sql`
2. Execute todo o script (clique no ícone de raio ⚡ ou pressione Ctrl+Shift+Enter)
3. O script irá:
   - Usar o schema `site_mvc`
   - Criar as tabelas: `tbl_categoria`, `tbl_produto`, `tbl_cliente`
   - Inserir dados de exemplo para testes

### Estrutura das Tabelas

#### tbl_categoria
- `id_categoria` (INT, AUTO_INCREMENT, PRIMARY KEY)
- `nome_categoria` (VARCHAR(100), NOT NULL)
- `descricao` (TEXT)
- `data_criacao` (TIMESTAMP, DEFAULT CURRENT_TIMESTAMP)

#### tbl_produto
- `id_produto` (INT, AUTO_INCREMENT, PRIMARY KEY)
- `nome_produto` (VARCHAR(200), NOT NULL)
- `descricao` (TEXT)
- `preco` (DECIMAL(10,2), NOT NULL)
- `estoque` (INT, NOT NULL, DEFAULT 0)
- `id_categoria` (INT, FOREIGN KEY)
- `data_criacao` (TIMESTAMP, DEFAULT CURRENT_TIMESTAMP)

#### tbl_cliente
- `id_cliente` (INT, AUTO_INCREMENT, PRIMARY KEY)
- `nome_cliente` (VARCHAR(150), NOT NULL)
- `email` (VARCHAR(150), NOT NULL, UNIQUE)
- `telefone` (VARCHAR(20))
- `endereco` (TEXT)
- `data_cadastro` (TIMESTAMP, DEFAULT CURRENT_TIMESTAMP)

## ⚙️ Configuração da Aplicação

### Configurar Conexão com Banco de Dados

Edite o arquivo `config/database.php` e ajuste as credenciais:

```php
private $host = 'localhost';      // Host do MySQL
private $db_name = 'site_mvc';    // Nome do schema
private $username = 'root';        // Usuário do MySQL
private $password = '';            // Senha do MySQL
```

## 🎯 Como Usar

### Acessar o Sistema

1. Abra o navegador
2. Acesse: `http://localhost` ou o endereço do seu servidor PHP
3. Navegue pelo menu para acessar diferentes funcionalidades

### Páginas Principais

- **Início:** Página inicial com visão geral do sistema
- **Catálogo:** Visualização pública dos produtos
- **Categorias:** Gerenciamento de categorias
- **Produtos:** Gerenciamento de produtos
- **Clientes:** Gerenciamento de clientes

## 🎨 Recursos de Design

- **Paleta de Cores Moderna:** Azul primário (#2563eb) com gradientes
- **Cards Responsivos:** Para produtos e funcionalidades
- **Tabelas Interativas:** Com hover effects
- **Formulários Validados:** Validação no frontend e backend
- **Mensagens de Feedback:** Alertas de sucesso e erro
- **Menu Responsivo:** Adaptável para mobile com menu hambúrguer

## 📱 Responsividade

O sistema é totalmente responsivo e funciona perfeitamente em:

- **Desktop:** > 768px
- **Tablet:** 481px - 768px
- **Mobile:** < 480px

## 🔒 Segurança

- Uso de PDO com prepared statements (prevenção de SQL Injection)
- Validação de dados no frontend e backend
- Escapamento de HTML com `htmlspecialchars()`
- Sessões PHP para mensagens temporárias

## 🛠️ Requisitos do Sistema

- PHP 8.0 ou superior
- MySQL 8.0 ou superior
- Servidor web (Apache, Nginx, ou PHP built-in server)
- Navegador moderno (Chrome, Firefox, Safari, Edge)

## 📝 Notas Importantes

- O arquivo `database_setup.sql` já inclui dados de exemplo para facilitar os testes
- Todas as operações CRUD possuem validação e tratamento de erros
- O sistema usa sessões PHP para exibir mensagens de sucesso/erro
- O design é moderno e profissional, adequado para um e-commerce real

## 🎓 Padrão MVC Implementado

- **Model:** Responsável pela lógica de dados e interação com o banco
- **View:** Responsável pela apresentação e interface do usuário
- **Controller:** Coordena Model e View, processa requisições

## 📄 Licença

Este projeto foi desenvolvido para fins educacionais.
Matheus Rodrigues Quaresma
Maria Fernanda Munakata Arevalo
Pedro Vincentin Jacobetti Guimarães
---

**Desenvolvido com PHP, MySQL, HTML, CSS e JavaScript**
