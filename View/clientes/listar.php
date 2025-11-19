<?php 
$titulo = 'Clientes - E-commerce';
require_once 'View/layouts/header.php'; 
?>

<div class="container">
    <div class="page-header">
        <h2>Gerenciar Clientes</h2>
        <a href="index.php?controller=cliente&action=criar" class="btn btn-primary">+ Novo Cliente</a>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($clientes)): ?>
                    <?php foreach ($clientes as $cliente): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($cliente['id_cliente']); ?></td>
                            <td><?php echo htmlspecialchars($cliente['nome_cliente']); ?></td>
                            <td><?php echo htmlspecialchars($cliente['email']); ?></td>
                            <td><?php echo htmlspecialchars($cliente['telefone']); ?></td>
                            <td><?php echo htmlspecialchars($cliente['endereco']); ?></td>
                            <td class="actions">
                                <a href="index.php?controller=cliente&action=editar&id=<?php echo $cliente['id_cliente']; ?>" class="btn btn-small btn-edit">Editar</a>
                                <a href="index.php?controller=cliente&action=excluir&id=<?php echo $cliente['id_cliente']; ?>" class="btn btn-small btn-delete" onclick="return confirm('Tem certeza que deseja excluir este cliente?')">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Nenhum cliente encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'View/layouts/footer.php'; ?>
