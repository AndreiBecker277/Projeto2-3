<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pao</title>
</head>
<body>
<?php
$url = "https://swapi.dev/api/people/?page=2";
$ch = curl_init($url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
$result_json = curl_exec($ch);

if ($result_json === false) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    $result = json_decode($result_json);
    var_dump($result);
}

curl_close($ch);


?>


</body>
</html>
 -->
<?php
include_once('viacep.php');
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
    <form action="." method="post">
        <p>digite o cep</p>
        <input type="text" name="cep" >
        <input type="submit" >
        <input type="text" name="rua" >
        <input type="text" name="bairro" >
        <input type="text" name="cidade" >
        <input type="text" name="estado" >
</form>
 </body>
 </html>