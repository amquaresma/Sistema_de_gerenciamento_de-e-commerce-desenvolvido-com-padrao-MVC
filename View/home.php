<?php 
$titulo = 'Bem-vindo - E-commerce MVC';
require_once 'View/layouts/header.php'; 
?>

<div class="container">
    <div class="home-hero">
        <h1>🛒 Sistema E-commerce MVC</h1>
        <p>Gerenciamento completo de produtos, categorias e clientes</p>
        <a href="index.php?controller=produto&action=catalogo" class="btn btn-primary">Ver Catálogo</a>
    </div>

    <div class="home-features">
        <div class="feature-card">
            <h3>📦 Produtos</h3>
            <p>Gerencie seu catálogo de produtos com facilidade. Adicione, edite e exclua produtos com controle de estoque.</p>
            <a href="index.php?controller=produto&action=index" class="btn btn-secondary">Gerenciar Produtos</a>
        </div>

        <div class="feature-card">
            <h3>📑 Categorias</h3>
            <p>Organize seus produtos em categorias para facilitar a navegação e busca dos clientes.</p>
            <a href="index.php?controller=categoria&action=index" class="btn btn-secondary">Gerenciar Categorias</a>
        </div>

        <div class="feature-card">
            <h3>👥 Clientes</h3>
            <p>Mantenha um cadastro completo de seus clientes com informações de contato e endereço.</p>
            <a href="index.php?controller=cliente&action=index" class="btn btn-secondary">Gerenciar Clientes</a>
        </div>
    </div>
</div>

<?php require_once 'View/layouts/footer.php'; ?>
