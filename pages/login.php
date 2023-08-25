<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH ?>css/style.css">
    <script src="https://kit.fontawesome.com/b534f9c505.js" crossorigin="anonymous"></script>
    <title>Login Painel</title>
</head>
<body>
    <div class="largeBox">
    <?php 
    if(isset($_POST['acao']))
    {
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        $bFlExiste = Loja::verificaLogin($nome, $senha);
        

        if ($bFlExiste == true) {
             // logamos com sucesso
            
            $_SESSION['login'] = true;
            $_SESSION['nome'] = $nome;
            $_SESSION['senha'] = $senha;
            echo "TESTEEEEEEEEEEE";

            // Redireciona 
            
            header('Location: ' . INCLUDE_PATH . 'home');
            die();
        } else {

            // login falhou        }
        
    }
}
    
    ?>
<div class="container-login">
    <div class="img-box">
    <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/sentadologin.png" id="img2">
    </div>
    <div class="content-box">
    <div class="form-box">

    <h2>Login loja</h2>
    <form method="post" class="form">

        <div class="input-box">
            <span>  Usuário</span>
            <input type="text" name="nome" placeholder="Nome...">
        </div>
        <div class="input-box">
            <span>  Senha</span>
            <input type="password" name="senha" placeholder="Senha...">
        </div>
        <div  class="remember">
            <label>
                <input type="checkbox" value=""> Lembrar me
            </label>
            <a href="#">Esqueceu a Senha?</a>
        </div>
        <div class="input-box">
        <input type="submit" value="Entrar!" name="acao">
        </div>
        <div class="input-box">
            <p>Não Tem Uma Conta?<a href="#">Inscrever-se?</a></p>
        </div>

    </form>
</body>
</html>

</body>
</html>