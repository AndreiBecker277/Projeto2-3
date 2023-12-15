<?php
include_once("Config/config.php");
include_once("Classes/Crud.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $crud = new Crud($db);
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $crud->create($nome, $email, $senha,);
    echo 'Registro salvo com sucesso!!';
    header('refresh:3,login.php');
    exit();
} ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadatro</title>
    <link rel="stylesheet" href="./css/cssgeral.css">

</head>

<body>
    
<main class="container">
        <form method="POST">
            <h2>Nome:</h2>
            <input type="text" name="nome" placeholder="Insira o nome " required>
            <h2>Email:</h2>
            <input type="email" name="email" placeholder="Insira o email " required>
            <h2>Senha:</h2>
            <input type="password" name="senha" placeholder="Insira a Senha " required>
            <div class="botao">
                <input type="submit" value="Cadastrar!">
            </div>
        </form>
    </main>
       
   
    
</body>

</html>