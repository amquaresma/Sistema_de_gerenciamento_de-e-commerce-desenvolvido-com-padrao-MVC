<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo ?? 'E-commerce MVC'; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <div class="logo">
                <h1>🛒 E-commerce</h1>
            </div>
            <ul class="nav-menu" id="navMenu">
                <li><a href="index.php">Início</a></li>
                <li><a href="index.php?controller=produto&action=catalogo">Catálogo</a></li>
                <li><a href="index.php?controller=categoria&action=index">Categorias</a></li>
                <li><a href="index.php?controller=produto&action=index">Produtos</a></li>
                <li><a href="index.php?controller=cliente&action=index">Clientes</a></li>
            </ul>
            <div class="menu-toggle" id="menuToggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>
    
    <main class="main-content">
        <?php if (isset($_SESSION['mensagem'])): ?>
            <div class="alert alert-<?php echo $_SESSION['tipo_mensagem']; ?>">
                <?php 
                    echo $_SESSION['mensagem']; 
                    unset($_SESSION['mensagem']);
                    unset($_SESSION['tipo_mensagem']);
                ?>
            </div>
        <?php endif; ?>
