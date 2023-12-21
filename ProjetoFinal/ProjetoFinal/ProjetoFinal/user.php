<?php
class User {
    private $conn;


    function __construct($conn) {
        $this->conn = $conn;
    }

    public function getUserIdByEmail($email) {
        try {
            $stmt = $this->conn->prepare("SELECT id FROM tbusuario WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['id']; // Retorna o ID do usuário ou null se não encontrar
        } catch (PDOException $e) {
            // Trate o erro adequadamente
            echo "Erro ao obter o ID do usuário por e-mail: " . $e->getMessage();
            return null;
        }
    }
    public function register($username, $password, $confirm_password, $email) {
        // Verifique se as senhas coincidem
        if ($password !== $confirm_password) {
            echo "As senhas não coincidem. Tente novamente.";
            return;
        }


        try {
            // Hash da senha (substitua esta linha pela sua lógica de hash)
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);


            // Insira no banco de dados
            $stmt = $this->conn->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':email', $email);
            $stmt->execute();


            echo "Registro bem-sucedido!";
        } catch (PDOException $e) {
            echo "Erro no registro: " . $e->getMessage();
        }
    }
    


    public function login($email, $password) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM tbusuario WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

//      if ($user && password_verify($password, $user['senha'])) {
            if ($user && $password == $user['senha']) {
                // Login bem-sucedido
                session_start();
                $_SESSION['username'] = $user['nome'];
                $_SESSION["administrador"]= $user['papel'];
                return true;
            } else {
                // Credenciais inválidas
                return false;
            }
        } catch (PDOException $e) {
            echo "Erro no login: " . $e->getMessage();
        }
    }


    public function logout() {
        try {
            session_start();
            session_destroy();
        } catch (PDOException $e) {
            echo "Erro no logout: " . $e->getMessage();
        }
    }
}
?>


