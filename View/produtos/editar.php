<?php 
$titulo = 'Editar Produto - E-commerce';
require_once 'View/layouts/header.php'; 
?>

<div class="container">
    <div class="page-header">
        <h2>Editar Produto</h2>
        <a href="index.php?controller=produto&action=index" class="btn btn-secondary">Voltar</a>
    </div>

    <div class="form-container">
        <form method="POST" action="" id="formProduto" class="form">
            <div class="form-group">
                <label for="nome_produto">Nome do Produto *</label>
                <input type="text" id="nome_produto" name="nome_produto" class="form-control" 
                       value="<?php echo htmlspecialchars($produto['nome_produto'] ?? ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea id="descricao" name="descricao" class="form-control" rows="4"><?php echo htmlspecialchars($produto['descricao'] ?? ''); ?></textarea>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="preco">Preço (R$) *</label>
                    <input type="number" id="preco" name="preco" class="form-control" step="0.01" min="0" 
                           value="<?php echo htmlspecialchars($produto['preco'] ?? ''); ?>" required>
                </div>

                <div class="form-group">
                    <label for="estoque">Estoque *</label>
                    <input type="number" id="estoque" name="estoque" class="form-control" min="0" 
                           value="<?php echo htmlspecialchars($produto['estoque'] ?? ''); ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label for="id_categoria">Categoria</label>
                <select id="id_categoria" name="id_categoria" class="form-control">
                    <option value="">Selecione uma categoria</option>
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?php echo $categoria['id_categoria']; ?>" 
                                <?php echo ($produto['id_categoria'] == $categoria['id_categoria']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($categoria['nome_categoria']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Atualizar Produto</button>
                <a href="index.php?controller=produto&action=index" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<?php require_once 'View/layouts/footer.php'; ?>
