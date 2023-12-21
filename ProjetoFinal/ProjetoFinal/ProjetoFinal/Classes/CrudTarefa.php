<?php
class CrudTarefa
{
    private $conn;
    private $table_name = "tbtarefa";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create($tarefa, $descricao, $fkidusuario)
    {
        $query = "INSERT INTO " . $this->table_name . " (tarefa, descricao, fkidusuario) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$tarefa, $descricao, $fkidusuario]);
        return $stmt;
    }

    public function read()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readWithUsers()
    {
        $query = "SELECT t.*, u.nome
                  FROM " . $this->table_name . " t
                  INNER JOIN tbusuario u ON t.fkidusuario = u.id";

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
        $query = "UPDATE " . $this->table_name . " SET tarefa = ?, descricao = ? WHERE id = ?";
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

    public function readUserTasks($userId)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE fkidusuario = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$userId]);
        return $stmt;
    }
}
?>
