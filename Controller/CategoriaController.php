<?php

require_once 'Model/CategoriaModel.php';

class CategoriaController {
    private $model;
    private $db;

    public function __construct($db) {
        $this->db = $db;
        $this->model = new CategoriaModel($db);
    }

    public function index() {
        $categorias = $this->model->getAll();
        require_once 'View/categorias/listar.php';
    }

    public function criar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nome_categoria' => $_POST['nome_categoria'] ?? '',
                'descricao' => $_POST['descricao'] ?? ''
            ];

            if ($this->model->create($data)) {
                $_SESSION['mensagem'] = 'Categoria criada com sucesso!';
                $_SESSION['tipo_mensagem'] = 'success';
                header('Location: index.php?controller=categoria&action=index');
                exit;
            } else {
                $_SESSION['mensagem'] = 'Erro ao criar categoria.';
                $_SESSION['tipo_mensagem'] = 'error';
            }
        }
        require_once 'View/categorias/criar.php';
    }

    public function editar() {
        $id = $_GET['id'] ?? null;
        
        if (!$id) {
            header('Location: index.php?controller=categoria&action=index');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nome_categoria' => $_POST['nome_categoria'] ?? '',
                'descricao' => $_POST['descricao'] ?? ''
            ];

            if ($this->model->update($id, $data)) {
                $_SESSION['mensagem'] = 'Categoria atualizada com sucesso!';
                $_SESSION['tipo_mensagem'] = 'success';
                header('Location: index.php?controller=categoria&action=index');
                exit;
            } else {
                $_SESSION['mensagem'] = 'Erro ao atualizar categoria.';
                $_SESSION['tipo_mensagem'] = 'error';
            }
        }

        $categoria = $this->model->getById($id);
        require_once 'View/categorias/editar.php';
    }

    public function excluir() {
        $id = $_GET['id'] ?? null;
        
        if ($id && $this->model->delete($id)) {
            $_SESSION['mensagem'] = 'Categoria excluída com sucesso!';
            $_SESSION['tipo_mensagem'] = 'success';
        } else {
            $_SESSION['mensagem'] = 'Erro ao excluir categoria.';
            $_SESSION['tipo_mensagem'] = 'error';
        }
        
        header('Location: index.php?controller=categoria&action=index');
        exit;
    }
}
