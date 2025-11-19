<?php 
$titulo = 'Categorias - E-commerce';
require_once 'View/layouts/header.php'; 
?>

<div class="container">
    <div class="page-header">
        <h2>Gerenciar Categorias</h2>
        <a href="index.php?controller=categoria&action=criar" class="btn btn-primary">+ Nova Categoria</a>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome da Categoria</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($categorias)): ?>
                    <?php foreach ($categorias as $categoria): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($categoria['id_categoria']); ?></td>
                            <td><?php echo htmlspecialchars($categoria['nome_categoria']); ?></td>
                            <td><?php echo htmlspecialchars($categoria['descricao']); ?></td>
                            <td class="actions">
                                <a href="index.php?controller=categoria&action=editar&id=<?php echo $categoria['id_categoria']; ?>" class="btn btn-small btn-edit">Editar</a>
                                <a href="index.php?controller=categoria&action=excluir&id=<?php echo $categoria['id_categoria']; ?>" class="btn btn-small btn-delete" onclick="return confirm('Tem certeza que deseja excluir esta categoria?')">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Nenhuma categoria encontrada.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'View/layouts/footer.php'; ?>
