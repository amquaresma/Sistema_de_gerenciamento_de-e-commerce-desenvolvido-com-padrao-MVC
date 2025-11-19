<?php 
$titulo = 'Editar Cliente - E-commerce';
require_once 'View/layouts/header.php'; 
?>

<div class="container">
    <div class="page-header">
        <h2>Editar Cliente</h2>
        <a href="index.php?controller=cliente&action=index" class="btn btn-secondary">Voltar</a>
    </div>

    <div class="form-container">
        <form method="POST" action="" id="formCliente" class="form">
            <div class="form-group">
                <label for="nome_cliente">Nome Completo *</label>
                <input type="text" id="nome_cliente" name="nome_cliente" class="form-control" 
                       value="<?php echo htmlspecialchars($cliente['nome_cliente'] ?? ''); ?>" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" class="form-control" 
                           value="<?php echo htmlspecialchars($cliente['email'] ?? ''); ?>" required>
                </div>

                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="tel" id="telefone" name="telefone" class="form-control" 
                           value="<?php echo htmlspecialchars($cliente['telefone'] ?? ''); ?>" placeholder="(00) 00000-0000">
                </div>
            </div>

            <div class="form-group">
                <label for="endereco">Endereço Completo</label>
                <textarea id="endereco" name="endereco" class="form-control" rows="3"><?php echo htmlspecialchars($cliente['endereco'] ?? ''); ?></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Atualizar Cliente</button>
                <a href="index.php?controller=cliente&action=index" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<?php require_once 'View/layouts/footer.php'; ?>
