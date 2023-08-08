<div class="box-content w100">

<div class="title-content">
    <i class="fa-solid fa-pencil" style="color: #1f71ff;"></i>
    <h3>Cadastrar Clientes - <?php echo NOME_EMPRESA ?></h3> 
</div>

<form class="ajax" action="<?php echo INCLUDE_PATH_PAINEL ?>ajax/forms.php" method="post" enctype="multipart/form-data">
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
    <div class="form-group" >
        <label>Tipo:</label>
        <select name="tipo">
            <option value="fisico">Físico</option>
            <option value="juridico">Juridico</option>
        </select>
    </div>
    <div rel="cpf"class="form-group">
        <label>CPF</label>
        <input type="text" name="cpf" >
    </div>
    <div rel="cnpj"class="form-group" style="display: none;">
        <label>CNPJ</label>
        <input type="text" name="cnpj" >
    </div>
   
    <div class="form-group">
        <label>Imagem: </label>
        <input type="file" name="imagem" >
    </div> 
    <input type="hidden" name="tipo_acao" value="cadastrar_cliente" >

    <div class="form-group">
        <input type="submit" name="acao" value="Cadastrar!">
    </div>
</form>

</div>

