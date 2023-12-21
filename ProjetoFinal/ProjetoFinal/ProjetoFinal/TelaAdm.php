<?php
include_once 'config/config.php';
include_once 'classes/Crud.php';
include_once 'classes/CrudTarefa.php';
$crudtarefa = new CrudTarefa($db);


$data = $crudtarefa->read();
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="./css/cssgeral.css">
    <link rel="stylesheet" href="./css/telaadm.css">
    <title>Exemplo de CRUD</title>

</head>
<?php
include_once('viacep.php');
if (isset($_POST['buscar'])) {
    $cep = $_POST['cep'];
    $dados = retornarCep($cep);
    $endereco = $dados->logradouro;
    $bairro = $dados->bairro;
    $cidade = $dados->localidade;
}



?>

<body>
    <header>

        <i class="fa-solid fa-signal fa-fade" style="color: #ff0000;"></i>
        <h1 class="usuario">Admin</h1>

    </header>
    <main>
        <a href="cadTarefa.php"> Cadastrar tarefa </a>

        <table>
            <tr>
                <th>Nome</th>
                <th>tarefa</th>
                <th>descrição</th>
                <th>Ações</th>
            </tr>
            <?php
            $data = $crudtarefa->readWithUsers();

            while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
            ?>

                <tr>
                    <td><?php echo $row['nome']; ?></td>
                    <td><?php echo $row['tarefa']; ?></td>
                    <td><?php echo $row['descricao']; ?></td>



                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>">Editar</a>
                        <a href="deltarefa.php?id=<?php echo $row['id']; ?>">Excluir</a>

                    </td>

                </tr>
            <?php } ?>


        </table>

        <div class="ladoa">
            <form id="submit" action="#" method="post">
                <p>digite o cep</p><br>
                <input type="text" name="cep"><br>
                <input type="submit" name="buscar"><br>
            </form>
        </div>
        <div class="ladob">
            <form id="dados" action="#" method="POST">
                <p>Rua:</p><br>
                <input type="text" name="rua" value="<?php echo $endereco ?>"><br>
                <p>bairro:</p><br>
                <input type="text" name="bairro" value="<?php echo $bairro ?>"><br>
                <p>Cidade:</p><br>
                <input type="text" name="cidade" value="<?php echo $cidade ?>"><br>
            </form>
        </div>
    </main>

</body>

</html>