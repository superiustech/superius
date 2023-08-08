<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php INCLUDE_PATH_PAINEL ?>css/login.css">
    <script src="https://kit.fontawesome.com/b534f9c505.js" crossorigin="anonymous"></script>
    <title>Login Painel</title>
</head>
<body>
    <div class="largeBox">
    <?php 
    if(isset($_POST['acao']))
    {
        $nome = $_POST['adminName'];
        $senha = $_POST['adminPassword'];
        $sql = MySql::conectar()->prepare(PainelSQL::verificaLogin());
        $sql->execute(array($nome, $senha));

        if ($sql->rowCount() == 1) {
             // logamos com sucesso
             // pega cargo
            $cargo = Painel::pegaCargo($nome, $senha);
            $imagem = Painel::pegaAvatar($nome);
            $infoUser = $sql->fetch();
        
            $_SESSION['login'] = true;
            $_SESSION['adminName'] = $nome;
            $_SESSION['adminPassword'] = $senha;
            $_SESSION['adminName'] = $infoUser['nNmPessoal'];
            $_SESSION['adminCargo'] = $infoUser['nCdCargo'];
            $_SESSION['adminCargo'] = $cargo;
            $_SESSION['adminImg'] = $imagem;
            
            // Redireciona 
            
            header('Location: ' . INCLUDE_PATH_PAINEL);
            die();
        } else {
            // login falhou
            echo '<div class="msgErro"> Usuário ou senha incorretos. </div>';
        }
        
    }
    
    ?>
    <div class="login-div">

        <form method="post" class="form">
            <h2>EFETUE O LOGIN!</h2>
            <input type="text" name="adminName" placeholder="Nome...">
            <input type="password" name="adminPassword" placeholder="Senha...">
            <input type="submit" value="Entrar!" name="acao">
        </form><!-- form -->
    </div><!-- login-div -->

    </div><!-- large box -->
</body>
</html>