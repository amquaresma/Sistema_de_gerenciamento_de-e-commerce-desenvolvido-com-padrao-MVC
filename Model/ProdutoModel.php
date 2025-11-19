<?php

class ProdutoModel {
    private $conn;
    private $table = 'tbl_produto';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT p.*, c.nome_categoria 
                  FROM " . $this->table . " p 
                  LEFT JOIN tbl_categoria c ON p.id_categoria = c.id_categoria 
                  ORDER BY p.nome_produto ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $query = "SELECT p.*, c.nome_categoria 
                  FROM " . $this->table . " p 
                  LEFT JOIN tbl_categoria c ON p.id_categoria = c.id_categoria 
                  WHERE p.id_produto = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table . " 
                  (nome_produto, descricao, preco, estoque, id_categoria) 
                  VALUES (:nome, :descricao, :preco, :estoque, :id_categoria)";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':nome', $data['nome_produto']);
        $stmt->bindParam(':descricao', $data['descricao']);
        $stmt->bindParam(':preco', $data['preco']);
        $stmt->bindParam(':estoque', $data['estoque']);
        $stmt->bindParam(':id_categoria', $data['id_categoria']);
        
        return $stmt->execute();
    }

    public function update($id, $data) {
        $query = "UPDATE " . $this->table . " 
                  SET nome_produto = :nome, descricao = :descricao, preco = :preco, 
                      estoque = :estoque, id_categoria = :id_categoria 
                  WHERE id_produto = :id";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $data['nome_produto']);
        $stmt->bindParam(':descricao', $data['descricao']);
        $stmt->bindParam(':preco', $data['preco']);
        $stmt->bindParam(':estoque', $data['estoque']);
        $stmt->bindParam(':id_categoria', $data['id_categoria']);
        
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id_produto = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
