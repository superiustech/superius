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

    $data['sucesso'] = true;


    if(isset($_POST['tipo_acao']) && $_POST['tipo_acao'] == 'cadastrar_cliente'){

    // O CÓDIGO COMEÇA AQUI!
    $nome = $_POST['nome'];
    $apelido = $_POST['apelido'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tipo = $_POST['tipo'];
    $cpf = "";
    $cnpj = "";
    $imagem = "";
    
    if($tipo == 'fisico'){
        $cpf = $_POST['cpf'];
    }else if($tipo == 'juridico'){
        $cnpj = $_POST['cnpj'];
    }

    if($nome == '' || $apelido == ''  || $senha == ''  || $email == '') {
        $data['sucesso'] = false;
        $data['mensagens'] = "Campos vazios não são permitidos!";
    }

    if(isset($_FILES['imagem'])){
        if(Painel::imagemValida($_FILES['imagem'])){
            $imagem = $_FILES['imagem'];
        }else{
            $imagem = "";
            $data['sucesso'] = false;
            $data['mensagens'] = "As imagens são inválidas ou maiores que 900 KB!";
        }
    }
    if(Painel::verificarCliente($nome)){
         $data['mensagens'] = "Usuário já existente!"; 
         $data['sucesso'] = false;
        }

    if($data['sucesso']){
        // TUDO CERTO, PODE CADASTRAR 
        if(is_array($imagem)) $imagem = Painel::uploadFile($imagem);
        $documento = ($tipo == 'fisico') ? $cpf : $cnpj;
        Painel::insereCliente($nome,$apelido,$email,$senha,$tipo,$documento,$imagem);
        $data['mensagens'] = "O cliente foi cadastrado com sucesso!";
    }

    }else if(isset($_POST['tipo_acao']) && $_POST['tipo_acao'] == 'editar_cliente'){

        $nome = $_POST['nome'];
        $apelido = $_POST['apelido'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $tipo = $_POST['tipo'];
        $id = $_POST['id'];
        $cpf = "";
        $cnpj = "";
        $imagem = "";

        $data['sucesso'] = true;
        $data['mensagens'] = " O cliente foi editado com sucesso!";
        
        if($tipo == 'fisico'){
            $cpf = $_POST['cpf'];
        }else if($tipo == 'juridico'){
            $cnpj = $_POST['cnpj'];
        }
    
        if($nome == '' || $apelido == ''  || $senha == ''  || $email == '') {
            $data['sucesso'] = false;
            $data['mensagens'] = "Campos vazios não são permitidos!";
        }
        if($data['sucesso']){
            // TUDO CERTO, PODE ATUALIZAR 
            $documento = ($tipo == 'fisico') ? $cpf : $cnpj;
            Painel::atualizarCliente($nome,$apelido,$email,$senha,$tipo,$documento,$imagem,$id);
            $data['mensagens'] = " O cliente foi editado com sucesso!";
        }
    }
    else if(isset($_POST['tipo_acao']) && $_POST['tipo_acao'] == 'deletar_cliente'){
        if(isset($_POST['id'])) {
            $id = $_POST['id'];
            if(MySql::deleteById("CLIENTES" , "nCdCliente", $id) == true){
                $data['sucesso'] = true;
                $data['mensagens'] = " Cliente deletado com sucesso!";
            }
            else{
                $data['sucesso'] = false;
                $data['mensagens'] = " Houve algum erro no processamento!";
            }
           
        }
    }
    
    die(json_encode($data)); 

?>