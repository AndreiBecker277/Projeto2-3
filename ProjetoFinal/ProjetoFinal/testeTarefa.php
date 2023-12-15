<?php
include_once 'config/config.php';
include_once 'classes/Crud.php';
$crud = new Crud($db);
$data = $crud->read();
?>

<!DOCTYPE html>
<html>

<head>
<!-- <link rel="stylesheet" href="./css/footer.css">
<link rel="stylesheet" href="./css/header.css"> -->

    <title>Exemplo de CRUD</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        a {
            text-decoration: none;
            margin-right: 10px;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .edit {
            background-color: #4caf50;
            color: white;
        }

        .delete {
            background-color: #f44336;
            color: white;
        }

        .register {
            background-color: #2196f3;
            color: white;
        }

    </style>
</head>

<body>
  
    <a href="cadUsu.php"> Cadastrar</a>
    <a href="feedback.php"> Feedback</a>
    <a href="login.php"> Login</a>
    <a href="relacionamentos.php"> relacionamentos</a>
    <a href="produto.php"> produtos</a>
    <table>
        <tr>
            <th>Nome</th>
            <th>email</th>
            <th>papel</th>
            <th>senha</th>
            <th>Ações</th>
        </tr>
        <?php

        while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <tr>
                <td><?php echo $row['nome']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['papel']; ?></td>
                <td><?php echo $row['senha']; ?></td>
                <td> <a href="edit.php?id=<?php echo $row['id']; ?>">Editar</a> <a href="delete.php?id=<?php echo $row['id']; ?>">Excluir</a> </td>
                
            </tr>
        <?php } ?>

    
    </table>
</body>

</html>

