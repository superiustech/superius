<?php
session_start();

require('mpdf/vendor/autoload.php');

date_default_timezone_set('America/Sao_Paulo');
define('INCLUDE_PATH','http://localhost/superius/superius/');
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
include('../classes/Negocio/Loja.php');
include('../classes/Negocio/MySql.php');
include('../classes/Negocio/Site.php');
include('../classes/Negocio/GDA.php');
include('../classes/Negocio/Painel.php');
include('../classes/Persistencia/PainelSQL.php');
include('../classes/Persistencia/LojaSQL.php');
include('../classes/Persistencia/MySqlSQL.php');


?>