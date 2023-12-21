<?php
function retornarCep($cep){

 $url = "https://viacep.com.br/ws/{$cep}/json/";

 $endereco = json_decode(file_get_contents($url) );
 return $endereco;
}
 //var_dump( $endereco->logradouro);
 ?>