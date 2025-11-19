<?php

require_once 'Model/ProdutoModel.php';
require_once 'Model/CategoriaModel.php';

class ProdutoController {
    private $model;
    private $categoriaModel;
    private $db;

    public function __construct($db) {
        $this->db = $db;
        $this->model = new ProdutoModel($db);
        $this->categoriaModel = new CategoriaModel($db);
    }

    public function index() {
        $produtos = $this->model->getAll();
        require_once 'View/produtos/listar.php';
    }

    public function catalogo() {
        $produtos = $this->model->getAll();
        require_once 'View/produtos/catalogo.php';
    }

    public function criar() {
        $categorias = $this->categoriaModel->getAll();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nome_produto' => $_POST['nome_produto'] ?? '',
                'descricao' => $_POST['descricao'] ?? '',
                'preco' => $_POST['preco'] ?? 0,
                'estoque' => $_POST['estoque'] ?? 0,
                'id_categoria' => $_POST['id_categoria'] ?? null
            ];

            if ($this->model->create($data)) {
                $_SESSION['mensagem'] = 'Produto criado com sucesso!';
                $_SESSION['tipo_mensagem'] = 'success';
                header('Location: index.php?controller=produto&action=index');
                exit;
            } else {
                $_SESSION['mensagem'] = 'Erro ao criar produto.';
                $_SESSION['tipo_mensagem'] = 'error';
            }
        }
        require_once 'View/produtos/criar.php';
    }

    public function editar() {
        $id = $_GET['id'] ?? null;
        $categorias = $this->categoriaModel->getAll();
        
        if (!$id) {
            header('Location: index.php?controller=produto&action=index');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nome_produto' => $_POST['nome_produto'] ?? '',
                'descricao' => $_POST['descricao'] ?? '',
                'preco' => $_POST['preco'] ?? 0,
                'estoque' => $_POST['estoque'] ?? 0,
                'id_categoria' => $_POST['id_categoria'] ?? null
            ];

            if ($this->model->update($id, $data)) {
                $_SESSION['mensagem'] = 'Produto atualizado com sucesso!';
                $_SESSION['tipo_mensagem'] = 'success';
                header('Location: index.php?controller=produto&action=index');
                exit;
            } else {
                $_SESSION['mensagem'] = 'Erro ao atualizar produto.';
                $_SESSION['tipo_mensagem'] = 'error';
            }
        }

        $produto = $this->model->getById($id);
        require_once 'View/produtos/editar.php';
    }

    public function excluir() {
        $id = $_GET['id'] ?? null;
        
        if ($id && $this->model->delete($id)) {
            $_SESSION['mensagem'] = 'Produto excluído com sucesso!';
            $_SESSION['tipo_mensagem'] = 'success';
        } else {
            $_SESSION['mensagem'] = 'Erro ao excluir produto.';
            $_SESSION['tipo_mensagem'] = 'error';
        }
        
        header('Location: index.php?controller=produto&action=index');
        exit;
    }
}
