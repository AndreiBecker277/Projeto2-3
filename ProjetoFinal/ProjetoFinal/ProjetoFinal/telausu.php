<?php
session_start();
include_once 'config/config.php';
include_once 'classes/CrudTarefa.php';


$crudTarefa = new CrudTarefa($db);
$data = $crudTarefa->readUserTasks($_SESSION["fkidusuario"]);
?>



<!DOCTYPE html>
<html>

<head>
    <title>tarefa</title>
    <link rel="stylesheet" href="./css/cssgeral.css">
    <link rel="stylesheet" href="./css/telausu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

    <header>

        <i class="fa-solid fa-signal fa-fade" style="color: #ff0000;"></i>
        <h1 class="usuario">Usuario</h1>

    </header>


    <h1>Bem-vindo ao Sistema, <?php echo $_SESSION['username']; ?>!</h1>
    <main>
        <table>

            <tr>
                <th>tarefa</th>

                <th>descrição</th>
                <th>estado</th>


            </tr>

            <?php

            while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr>
                    <td><?php echo $row['tarefa']; ?></td>
                    <td><?php echo $row['descricao']; ?></td>
                    <td> <a href="deltarefa.php?id=<?php echo $row['id']; ?>"> concluir</a>
                    </td>

                </tr>
            <?php } ?>

        </table>
    </main>
</body>

</html>