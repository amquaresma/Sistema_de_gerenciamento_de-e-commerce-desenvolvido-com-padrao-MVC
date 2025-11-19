<?php 
$titulo = 'Catálogo de Produtos - E-commerce';
require_once 'View/layouts/header.php'; 
?>

<div class="container">
    <div class="page-header">
        <h2>Catálogo de Produtos</h2>
    </div>

    <div class="product-grid">
        <?php if (!empty($produtos)): ?>
            <?php foreach ($produtos as $produto): ?>
                <div class="product-card">
                    <div class="product-image">
                        <div class="placeholder-image">🛍️</div>
                    </div>
                    <div class="product-info">
                        <h3><?php echo htmlspecialchars($produto['nome_produto']); ?></h3>
                        <p class="product-category"><?php echo htmlspecialchars($produto['nome_categoria'] ?? 'Sem categoria'); ?></p>
                        <p class="product-description"><?php echo htmlspecialchars(substr($produto['descricao'], 0, 100)); ?><?php echo strlen($produto['descricao']) > 100 ? '...' : ''; ?></p>
                        <div class="product-footer">
                            <span class="product-price">R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></span>
                            <span class="product-stock <?php echo $produto['estoque'] > 0 ? 'in-stock' : 'out-of-stock'; ?>">
                                <?php echo $produto['estoque'] > 0 ? 'Estoque: ' . $produto['estoque'] : 'Esgotado'; ?>
                            </span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">Nenhum produto disponível no momento.</p>
        <?php endif; ?>
    </div>
</div>

<?php require_once 'View/layouts/footer.php'; ?>
