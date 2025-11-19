<?php 
$titulo = 'Criar Categoria - E-commerce';
require_once 'View/layouts/header.php'; 
?>

<div class="container">
    <div class="page-header">
        <h2>Nova Categoria</h2>
        <a href="index.php?controller=categoria&action=index" class="btn btn-secondary">Voltar</a>
    </div>

    <div class="form-container">
        <form method="POST" action="" id="formCategoria" class="form">
            <div class="form-group">
                <label for="nome_categoria">Nome da Categoria *</label>
                <input type="text" id="nome_categoria" name="nome_categoria" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea id="descricao" name="descricao" class="form-control" rows="4"></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Salvar Categoria</button>
                <a href="index.php?controller=categoria&action=index" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<?php require_once 'View/layouts/footer.php'; ?>
