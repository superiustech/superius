<div class="box-content w100">

<div class="title-content">
    <i class="fa-solid fa-pencil" style="color: #1f71ff;"></i>
    <h3>Editar Usuário - <?php echo NOME_EMPRESA ?></h3> 
</div>

<form method="post">
    

<?php 

if(isset($_POST['acao'])){

   
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    
    if (!Painel::verificarUsuario($nome)){
        Painel::alert('erro','Usuário inexistente!');
    }
    else{
        Painel::atualizarUsuario($senha, $nome);
    Painel::alert('sucesso' , 'Usuário editado com sucesso!');
    }
}   

?>

<div class="form-group">
        <label>Nome: </label>
        <input type="text" name="nome" required>
    </div>
    <div class="form-group">
        <label>Senha: </label>
        <input type="password" name="senha" required>
    </div>
    <div class="form-group">
        <label>Imagem: </label>
        <input type="file" name="imagem" >
    </div>
    <div class="form-group">
        <input type="submit" name="acao" value="Atualizar">
        <input type="hidden" name="imagem_atual" value=" <?php echo $_SESSION['adminImg'] ?> ">

    </div>
</form>

</div>

