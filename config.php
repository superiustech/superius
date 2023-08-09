<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
define('INCLUDE_PATH','http://localhost/SuperiusTech/');
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
include('classes/Negocio/Painel.php');
include('classes/Negocio/MySql.php');
include('classes/Negocio/Site.php');
include('classes/Negocio/GDA.php');
include('classes/Persistencia/PainelSQL.php');
include('classes/Persistencia/SiteSQL.php');
include('classes/Persistencia/MySqlSQL.php');

//FUNÇÕES 

function selecionadoMenu($par){
    $url = explode('/',@$_GET['url'])[0];
    if($url == $par){
        echo 'class="menu-active"';
    }
}

function verificaPermissaoMenu($permissao){
    if($_SESSION['cargo'] >= $permissao){
        return;
    }else{
        echo 'style="display:none;"';
    }
}

function verificaPermissaoPagina($permissao){
    if($_SESSION['cargo'] >= $permissao){
        return;
    }else{
        include('painel/pages/permissao_negada.php');
        die();
    }
}


?>
