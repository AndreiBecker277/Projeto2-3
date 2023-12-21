<?php
include_once("Config/config.php");
include_once("Classes/CrudTarefa.php");
include_once("Classes/Crud.php");

// Inicializa a classe Crud para obter a lista de usuários
$crudUsuario = new Crud($db);
$usuarios = $crudUsuario->read();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $crudTarefa = new CrudTarefa($db);
    $tarefa = $_POST['tarefa'];
    $descricao = $_POST['descricao'];
    $fkidusuario = $_POST['usuario'];
    $crudTarefa->create($tarefa, $descricao, $fkidusuario);
    echo 'Registro salvo com sucesso!!';
    header('refresh:1, telaAdm.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Cadastro de Tarefa</title>
    <link rel="stylesheet" href="./css/cssgeral.css">
    <link rel="stylesheet" href="./css/cadtarefa.css">
</head>

<body>
    <header>

        <i class="fa-solid fa-signal fa-fade" style="color: #ff0000;"></i>
        <h1 class="usuario">Admin</h1>

    </header>

    <main class="container">
        <form method="POST">
            <a href="telaAdm.php"> Voltar</a>
            <h2>Nome da tarefa:</h2>
            <input type="text" name="tarefa" placeholder="Insira o nome da tarefa" required>
            <h2>Descrição:</h2>
            <input type="text" name="descricao" placeholder="Insira a descrição" required>
            <h2>Usuário:</h2>
            <select name="usuario" required>
                <?php while ($row = $usuarios->fetch(PDO::FETCH_ASSOC)) : ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nome']; ?></option>
                <?php endwhile; ?>
            </select><br>
            <div class="botao">
                <input type="submit" value="Cadastrar!">
            </div>
        </form>
    </main>
</body>

</html>