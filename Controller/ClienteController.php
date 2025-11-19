<?php

require_once 'Model/ClienteModel.php';

class ClienteController {
    private $model;
    private $db;

    public function __construct($db) {
        $this->db = $db;
        $this->model = new ClienteModel($db);
    }

    public function index() {
        $clientes = $this->model->getAll();
        require_once 'View/clientes/listar.php';
    }

    public function criar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nome_cliente' => $_POST['nome_cliente'] ?? '',
                'email' => $_POST['email'] ?? '',
                'telefone' => $_POST['telefone'] ?? '',
                'endereco' => $_POST['endereco'] ?? ''
            ];

            if ($this->model->create($data)) {
                $_SESSION['mensagem'] = 'Cliente cadastrado com sucesso!';
                $_SESSION['tipo_mensagem'] = 'success';
                header('Location: index.php?controller=cliente&action=index');
                exit;
            } else {
                $_SESSION['mensagem'] = 'Erro ao cadastrar cliente.';
                $_SESSION['tipo_mensagem'] = 'error';
            }
        }
        require_once 'View/clientes/criar.php';
    }

    public function editar() {
        $id = $_GET['id'] ?? null;
        
        if (!$id) {
            header('Location: index.php?controller=cliente&action=index');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nome_cliente' => $_POST['nome_cliente'] ?? '',
                'email' => $_POST['email'] ?? '',
                'telefone' => $_POST['telefone'] ?? '',
                'endereco' => $_POST['endereco'] ?? ''
            ];

            if ($this->model->update($id, $data)) {
                $_SESSION['mensagem'] = 'Cliente atualizado com sucesso!';
                $_SESSION['tipo_mensagem'] = 'success';
                header('Location: index.php?controller=cliente&action=index');
                exit;
            } else {
                $_SESSION['mensagem'] = 'Erro ao atualizar cliente.';
                $_SESSION['tipo_mensagem'] = 'error';
            }
        }

        $cliente = $this->model->getById($id);
        require_once 'View/clientes/editar.php';
    }

    public function excluir() {
        $id = $_GET['id'] ?? null;
        
        if ($id && $this->model->delete($id)) {
            $_SESSION['mensagem'] = 'Cliente excluído com sucesso!';
            $_SESSION['tipo_mensagem'] = 'success';
        } else {
            $_SESSION['mensagem'] = 'Erro ao excluir cliente.';
            $_SESSION['tipo_mensagem'] = 'error';
        }
        
        header('Location: index.php?controller=cliente&action=index');
        exit;
    }
}
