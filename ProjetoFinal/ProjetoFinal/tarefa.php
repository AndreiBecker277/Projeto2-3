<?php
include_once 'config/config.php';
include_once 'classes/CrudTarefa.php';
$crud = new CrudTarefa($db);
$data = $crud->read();
?>

<!DOCTYPE html>
<html>

<head>
    <title>tarefa</title>
    <link rel="stylesheet" href="./css/cssgeral.css">
    
</head>

<body>
    <h1>tarefa</h1>
    <a href="cadTarefa.php"> Cadastrar tarefa </a>
    <table>
        <main>
        <tr>
            <th>tarefa</th>
            
            <th>descrição</th>
        
           
        </tr>
</main>
        <?php

        while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <tr>
                <td><?php echo $row['tarefa']; ?></td>
                <td><?php echo $row['descricao']; ?></td>
                <td> <a href="edittarefa.php?id=<?php echo $row['id']; ?>">Editar</a>
                 <a href="deletetarefa.php?id=<?php echo $row['id']; ?>">Excluir</a>
                 <a href="comtarefa.php?id=<?php echo $row['id']; ?>"> concluir</a> </td>
                
            </tr>
        <?php } ?>

    </table>
</body>

</html>