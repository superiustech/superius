
    <div class="largeBox">
    <?php

use Mpdf\Shaper\Sea;

    if(isset($_POST['acao']))
    {
        if(!isset($_COOKIE['contato'])){
            setcookie('contato',true,time() + (60*60*6));
        $sucesso = true;
        $assunto = $_POST['assunto'];
        $mensagem = $_POST['mensagem'];

        if(isset($_SESSION['codigo'])){

        if(contatoModel::contato($_SESSION['codigo'], $assunto, $mensagem)){
            Painel::alert('sucesso', 'Enviado para o nosso sistema!');
        }else{
            Painel::alert('erro' , 'Ocorreram erros no processamento!');
        }
    }else{
        Painel::alert('erro' , 'Ocorreram erros no processamento: Você não está logado!');
    }}else{
        Painel::alert('erro' , 'Ocorreram erros no processamento: Tente novamente mais tarde!');
    }
    }
    
    ?>
<div class="container-login">
    <div class="img-box">
    <h1>Superius, campeã em projetos. Não somente um site, não somente uma empresa. Nós somos Superius.</h1>
    <img src="<?php echo INCLUDE_PATH ?>uploads/contato.png" id="img1">
    </div>
    <div class="content-box">
    <div class="form-box">

    <h2>Formulário de contato</h2>
    <form method="post" class="form">
        <div class="input-box">
            <span>  Assunto</span>
            <input type="text" name="assunto" placeholder="Nome...">
        </div>
        <div class="input-box">
            <span>  Mensagem</span><br>
            <textarea name="mensagem" id=""></textarea>
        </div>
       
        <div class="input-box">
        <input type="submit" value="Enviar!" name="acao">
        </div>
        

    </form>
