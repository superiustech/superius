
<div class="container-login">
    <div class="img-box">
    <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/sentadologin.png" id="img2">
    </div>
    <div class="content-box">
    <div class="form-box">
    <h2>Cadastro</h2>

    <?php 
     if(isset($_POST['tipo_acao']) && $_POST['tipo_acao'] == 'cadastrar_cliente'){

        // O CÓDIGO COMEÇA AQUI!
        $nome = $_POST['nome'];
        $apelido = $_POST['apelido'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $tipo = 'fisico';
        $cpf = "";
        $cnpj = "";
        $imagem = "";
        $data['sucesso'] = true;

        if($tipo == 'fisico'){
            $cpf = $_POST['cpf'];
        }else if($tipo == 'juridico'){
            $cnpj = $_POST['cnpj'];
        }
    
        if($nome == '' || $apelido == ''  || $senha == ''  || $email == '') {
            $data['sucesso'] = false;
            Painel::alert('erro' , 'Campos vazios não são permitidos!');
        }
    
        if(isset($_FILES['imagem'])){
            if(Painel::imagemValida($_FILES['imagem'])){
                $imagem = $_FILES['imagem'];
            }else{
                $imagem = "";
                $data['sucesso'] = false;
                Painel::alert('erro' , 'As imagens são inválidas ou maiores que 900 KB!');
            }
        }
        if(Painel::verificarCliente($nome)){
            Painel::alert('erro' , 'Usuário já existente');

             $data['sucesso'] = false;
            }
    
        if($data['sucesso']){
            // TUDO CERTO, PODE CADASTRAR 
            if(is_array($imagem)) $imagem = Painel::uploadFile($imagem);
            $documento = ($tipo == 'fisico') ? $cpf : $cnpj;
            Painel::insereCliente($nome,$apelido,$email,$senha,$tipo,$documento,$imagem);
            Painel::alert('sucesso' , 'Usuário cadastrado com sucesso!');
        }
    
        }

    ?>
   
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Usuario: </label>
        <input type="text" name="nome">
    </div>
    <div class="form-group">
        <label>Apelido: </label>
        <input type="text" name="apelido">
    </div>
    <div class="form-group">
        <label>Email: </label>
        <input type="text" name="email" >
    </div>
    <div class="form-group">
        <label>Senha: </label>
        <input type="password" name="senha">
    </div>

    <div rel="cpf"class="form-group">
        <label>CPF</label>
        <input type="text" name="cpf" >
    </div>

    <input type="hidden" name="tipo_acao" value="cadastrar_cliente" ><br>

    <div class="form-group">
        <input type="submit" name="acao" id="acao" value="Cadastrar!">
    </div>
</form>

