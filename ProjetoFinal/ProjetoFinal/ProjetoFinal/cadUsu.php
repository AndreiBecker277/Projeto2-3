<?php
include_once("Config/config.php");
include_once("Classes/Crud.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $crud = new Crud($db);
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cep = $_POST['cep'];
    $crud->create($nome, $email, $senha,$cep);
    echo 'Registro salvo com sucesso!!';
    header('refresh:3,login.php');
    exit();
} ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Cadatro</title>
    <link rel="stylesheet" href="./css/cssgeral.css">
    <link rel="stylesheet" href="./css/cadusu.css">

</head>

<body>
    
<header>
        
    <i class="fa-solid fa-signal fa-fade" style="color: #ff0000;"></i><h1 class="usuario">Usuario</h1>
   
    </header>


<main class="container">
        <form method="POST">
           <H1> CRIE UMA NOVA CONTA</H1> 
        <a href="login.php">Ja tenho cadastro, fazer login!</a>
            <h2>Nome:</h2>
            <input type="text" name="nome" placeholder="Insira o nome " required>
            <h2>Email:</h2>
            <input type="email" name="email" placeholder="Insira o email " required>
            <h2>Senha:</h2>
            <input type="password" name="senha" placeholder="Insira a Senha " required>
            <h2>Cep:</h2>
            <input type="number" name="cep" placeholder="Insira o seu Cep " required>
            <div class="botao">
                <input type="submit" value="Cadastrar!">
            </div>
        </form>
    </main>
       
   
    
</body>

</html>