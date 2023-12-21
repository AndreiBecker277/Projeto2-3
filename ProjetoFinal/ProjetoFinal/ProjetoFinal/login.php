<?php
session_start();
include './config/config.php';
include 'user.php';

$user = new User($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($user->login($email, $password)) {
        // Defina a variável de sessão para o ID do usuário
        $_SESSION["fkidusuario"] = $user->getUserIdByEmail($email); // Substitua pelo método real para obter o ID do usuário
        if ($_SESSION["administrador"] == 'administrador') {
            header("Location: ./telaAdm.php");
        } else if ($_SESSION["administrador"] == 'usuario') {
            header("Location: ./telaUsu.php");
        }
        exit();
    } else {
        echo "Login falhou. Tente novamente";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Login</title>
    <link rel="stylesheet" href="./css/cssgeral.css">
    <link rel="stylesheet" href="./css/login.css">

</head>

<body>

    <header> <i class="fa-solid fa-signal fa-fade" style="color: #ff0000;"></i><h1 class="usuario">Usuario</h1>
   

    </header>
    <main class="container">

        <form method="post" action="">
            <h1>Login</h1>
                <label for="email">Email:</label><br>
                <input type="text" name="email" required><br>
                        <label for="password">Senha:</label><br>
                        <input type="password" name="password" required><br>
                    <div class="botao"><br>
                        <input type="submit" value="Login"><br>
                        <a href="cadUsu.php">Não tem cadastro, Clique aqui!!</a>
                    </div>
        </form>
    </main>


</body>

</html>