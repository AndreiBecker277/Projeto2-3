
<?php
include_once('viacep.php');
if (isset($_POST['buscar'])){
$cep = $_POST['cep'];
$dados = retornarCep($cep);
$endereco = $dados->logradouro;
$bairro = $dados->bairro;
$cidade = $dados->localidade;

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Cep</title>
    <link rel="stylesheet" href="./css/cssgeral.css">
    <link rel="stylesheet" href="./css/api.css">
</head>

<body>
<header>
        
    <i class="fa-solid fa-signal fa-fade" style="color: #ff0000;"></i><h1 class="usuario">Usuario</h1>
   
    </header>
    <main>
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
        <input type="text" name="rua" value="<?php echo $endereco?>"><br>
        <p>bairro:</p><br>
        <input type="text" name="bairro"  value="<?php echo $bairro?>"><br>
        <p>Cidade:</p><br>
        <input type="text" name="cidade"  value="<?php echo $cidade?>"><br>
    </form>
    </div>
    </main>
</body>

</html>