<?php 

session_start();
date_default_timezone_set('America/Sao_Paulo');
define('INCLUDE_PATH','http://localhost/superius/');
define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');
define('BASE_DIR_PAINEL',__DIR__.'/painel');
define('HORARIO_ATUAL', date('Y-m-d H:i:s'));
define('IP_ADDR', $_SERVER['REMOTE_ADDR']);
define('DATA_ATUAL', date('Y-m-d'));

// CONSTANTES DO BANCO DE DADOS.

define('HOST','localhost');
define('DATABASE', 'SuperiusTech');
define('USER', 'root');
define('PASSWORD', '');

// CONSTANTES PARA O PAINEL DE CONTROLE

define('NOME_EMPRESA', 'Superius Tech');


// INCLUDES 

include('../../classes/Negocio/Painel.php');
include('../../classes/Negocio/MySql.php');
include('../../classes/Persistencia/MySqlSQL.php');
include('../../classes/Persistencia/PainelSQL.php');


if(Painel::logado() == false)
{
    die('Você não está logado!');

    /* colocar uma tela 404 aqui*/
}


if(isset($_POST['tipo_acao']) && $_POST['tipo_acao'] == 'enviar_mensagem'){
    $sucesso = true;
    $id = $_POST['id'];
    $texto = $_POST['texto'];
    $response = array('status' => 'success'); // ou 'error' em caso de erro
    Painel::enviarMensagem($id,$texto);
}
if (isset($_POST['tipo_acao']) && $_POST['tipo_acao'] == 'atualizar_mensagens') {
    $chat = Painel::retornaMensagem();
    header('Content-Type: application/json');
    echo json_encode($chat);
    exit; // Encerrar a execução após enviar a resposta JSON
}

?>