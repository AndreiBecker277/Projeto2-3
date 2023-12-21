<?php
include_once 'config/config.php';
include_once 'classes/CrudTarefa.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $idTarefa = $_GET['id'];

    // Instancie a classe CrudTarefa com a conexão do banco de dados
    $crudTarefa = new CrudTarefa($db);

    // Exclui a tarefa do banco de dados
    $crudTarefa->delete($idTarefa);

    echo "Tarefa excluída com sucesso!";
} else {
    echo "ID da tarefa não fornecido ou método de requisição inválido.";
}
header("Location: ./telaAdm.php");
?>
