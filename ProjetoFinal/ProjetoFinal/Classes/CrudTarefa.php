<?php
class CrudTarefa
{
    private $conn;
    private $table_name = "tbtarefa";
    
    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function create($tarefa, $descricao)
    {
        $query = "INSERT INTO " . $this->table_name . " (tarefa, descricao) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$tarefa, $descricao]);
        return $stmt;
    }

    public function read()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function readEdit($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt;
    }
    public function update($tarefa, $descricao)
    {
        $query = "UPDATE " . $this->table_name . " SET tarefa = ? descricao = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$tarefa, $descricao]);
        return $stmt;
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt;
    }
}