<?php
include_once("Config/config.php");
include_once("Classes/CrudTarefa.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $crud = new CrudTarefa($db);
    $tarefa = $_POST['tarefa'];
    $descricao = $_POST['descricao'];
    $crud->create($tarefa, $descricao );
    echo 'Registro salvo com sucesso!!';
    header('refresh:3,tarefa.php');
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
            <h2>Nome da tarefa:</h2>
            <input type="text" name="tarefa" placeholder="Insira o nome da tarefa " required>
            <h2>descrição:</h2>
            <input type="email" name="descricao" placeholder="Insira a descrição " required>
            <div class="botao">
                <input type="submit" value="Cadastrar!">
            </div>
        </form>
    </main>
       
   
    
</body>

</html>