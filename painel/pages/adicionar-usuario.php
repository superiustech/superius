<div class="box-content w100">

<div class="title-content">
    <i class="fa-solid fa-pencil" style="color: #1f71ff;"></i>
    <h3>Cadastrar Usuário - <?php echo NOME_EMPRESA ?></h3> 
</div>

<form method="post">
    

<?php 

if(isset($_POST['acao'])){

    $nomeLogin = $_POST['nomeLogin'];
    $nomePessoal = $_POST['nomePessoal'];
    $senha = $_POST['senha'];
    $cargo = $_POST['cargo'];
    $imagem = "imagens\background\bgnovo.png";

    if(Painel::verificarUsuario($nomeLogin)){
        Painel::alert('erro','Usuário já existente!');
    }else{
        Painel::cadastrarUsuario($nomeLogin, $senha,$imagem,$cargo,$nomePessoal);
        Painel::alert('sucesso' , 'Usuário cadastrado com sucesso!');
    }

    // if (Painel::verificarRetorno($senha, $nome)){  // echo '<div class="msgCadastro"> <p> Usuário editado com sucesso! </p> </div>'; }
}   

?>

    <div class="form-group">
        <label>Nome: </label>
        <input type="text" name="nomeLogin" required>
    </div>
    <div class="form-group">
        <label>Nome Pesoal: </label>
        <input type="text" name="nomePessoal" required>
    </div>
    <div class="form-group">
        <label>Senha: </label>
        <input type="password" name="senha" required>
    </div>
    <div class="form-group">
        <label>Código do cargo: </label>
        <input type="text" name="cargo" required>
    </div>
    <div class="form-group">
        <label>Imagem: </label>
        <input type="file" name="imagem" >
    </div>
    <div class="form-group">
        <input type="submit" name="acao" value="Cadastrar">
        <input type="hidden" name="imagem_atual" value=" <?php echo $_SESSION['adminImg'] ?> ">

    </div>
</form>

</div>

