<?php
session_start();
include './config/config.php';
include 'user.php';


$user = new User($db);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];


    if ($user->login($email, $password)) {
        header("Location: tarefa.php");
        exit();
    } else {
        echo "Login falhou. Verifique suas credenciais.";
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
    
    <header> <i class="fa-solid fa-signal fa-fade" style="color: #ff0000;"></i>
   
    </header>
    <main class="container">

        <form method="post" action=""><div>
            <label for="email">Email:</label>
            <input type="text" name="email" required><br>
<           </div>
            <div>
            <label for="password">Senha:</label>
            <input type="password" name="password" required><br>
            </div>
            <div class="botao">
                <input type="submit" value="Login">
                <a href="cadUsu.php">Não tem cadastro, Clique aqui!!</a>
            </div>
        </form>
    </main>
    
    
</body>

</html>