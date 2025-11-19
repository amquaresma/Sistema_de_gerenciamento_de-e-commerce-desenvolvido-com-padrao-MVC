<?php 
$titulo = 'Produtos - E-commerce';
require_once 'View/layouts/header.php'; 
?>

<div class="container">
    <div class="page-header">
        <h2>Gerenciar Produtos</h2>
        <a href="index.php?controller=produto&action=criar" class="btn btn-primary">+ Novo Produto</a>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome do Produto</th>
                    <th>Categoria</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($produtos)): ?>
                    <?php foreach ($produtos as $produto): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($produto['id_produto']); ?></td>
                            <td><?php echo htmlspecialchars($produto['nome_produto']); ?></td>
                            <td><?php echo htmlspecialchars($produto['nome_categoria'] ?? 'Sem categoria'); ?></td>
                            <td>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
                            <td><?php echo htmlspecialchars($produto['estoque']); ?></td>
                            <td class="actions">
                                <a href="index.php?controller=produto&action=editar&id=<?php echo $produto['id_produto']; ?>" class="btn btn-small btn-edit">Editar</a>
                                <a href="index.php?controller=produto&action=excluir&id=<?php echo $produto['id_produto']; ?>" class="btn btn-small btn-delete" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Nenhum produto encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'View/layouts/footer.php'; ?>
