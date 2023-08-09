<?php 
if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $cliente = MySql::select('CLIENTES','nCdCliente = ?',array($id));
}
else{
    Painel::alert('erro', 'Você precisa passar o parâmetro ID.');
    die();
}
?>
<div class="box-content w100">

<div class="title-content">
    <i class="fa-solid fa-pencil" style="color: #1f71ff;"></i>
    <h3>Editar Clientes - <?php echo NOME_EMPRESA ?></h3> 
</div>

<form class="ajax" action="<?php echo INCLUDE_PATH_PAINEL ?>ajax/forms.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Usuário: </label>
        <input type="text" name="nome" value="<?php echo $cliente['sNmCliente']?>">
    </div>
    <div class="form-group">
        <label>Apelido: </label>
        <input type="text" name="apelido" value="<?php echo $cliente['sDsApelido']?>">
    </div>
    <div class="form-group">
        <label>Email: </label>
        <input type="text" name="email" value="<?php echo $cliente['sDsEmail']?>">
    </div>
    <div class="form-group">
        <label>Senha: </label>
        <input type="password" name="senha" value="<?php echo $cliente['sDsSenha']?>">
    </div>
    <div class="form-group" >
        <label>Tipo:</label>
        <select name="tipo" value="<?php echo $cliente['sDsTipoDocumento']?>">
            <option <?php if($cliente['sDsTipoDocumento'] == 'fisico') echo 'selected' ?> value="fisico">Físico</option>
            <option <?php if($cliente['sDsTipoDocumento'] == 'juridico') echo 'selected' ?> value="juridico">Juridico</option>
        </select>
    </div>

    <?php  if($cliente['sDsTipoDocumento'] == 'fisico'){    ?> 
    <div rel="cpf"class="form-group">
        <label>CPF</label>
        <input type="text" name="cpf" value="<?php echo $cliente['sNrCpfCnpj']?>">
    </div>
    <div rel="cnpj"class="form-group" style="display: none;">
        <label>CNPJ</label>
        <input type="text" name="cnpj">
    </div>
   <?php }else{ ?>
    <div rel="cpf"class="form-group" style="display: none;">
        <label>CPF</label>
        <input type="text" name="cpf" >
    </div>
    <div rel="cnpj"class="form-group">
        <label>CNPJ</label>
        <input type="text" name="cnpj" value="<?php echo $cliente['sNrCpfCnpj']?>">
  <?php }?>
    <!-- AINDA NÃO TRABALHAMOS COMPLETAMENTE COM IMAGEM -->

    <div rel="cpf"class="form-group">
        <label>Id:</label>
        <input type="text" name="id" value="<?php echo $cliente['nCdCliente']?>">
    </div>

    <div class="form-group">
        <label>Imagem: </label>
        <input type="file" name="imagem" value="<?php echo $cliente['sDsImagem']?>">
    </div> 
    <div rel="cnpj"class="form-group" style="display: none;">
        <input type="hidden" name="imagem_original" value="" >
    </div>
    <div class="form-group">
        <input type="hidden" name="tipo_acao" value="editar_cliente" >
    </div> 
    <div class="form-group">
        <input type="submit" name="acao" value="Atualizar!">
    </div>
</form>
</div>

<div class="box-content w100">

<div class="title-content">
    <i class="fa-solid fa-pencil" style="color: #1f71ff;"></i>
    <h3>Adicionar Pagamentos - <?php echo NOME_EMPRESA ?></h3> 
</div>

<form method="post">

<?php
if(isset($_POST['acao'])){
    $nome = $_POST['nome_pagto'];
    // $valor  = str_replace('.', '' ,$_POST['valor']);
    // $valor = str_replace(',' , '.',$valor );
    $valor = $_POST['valor'];
    $cliente_id = $id;
    $vencimento = $_POST['vencimento'];
    $numero_parcelas = $_POST['parcelas'];  
    $intervalo = $_POST['intervalo']; 
    $status = 0;
    $vencimento_original = $_POST['vencimento'];
    for ($i=0; $i < $numero_parcelas; $i++) { 
        $vencimento = strtotime($vencimento_original) + (($i* $intervalo) * (60*60*24));
        Painel::inserirPagamento($cliente_id,$valor,date('Y-m-d',$vencimento),$nome,$status);

    }
    Painel::alert('sucesso', 'Os pagamentos foram inseridos com sucesso!');

}
 ?>


<div class="form-group">
        <label>Nome do pagamento: </label>
        <input type="text" name="nome_pagto">
    </div>
<div class="form-group">
        <label>Valor pagamento: </label>
        <input type="text" name="valor">
    </div>
    <div class="form-group">
        <label>N° Parcelas: </label>
        <input type="text" name="parcelas">
    </div>
    <div class="form-group">
        <label>Intervalo: </label>
        <input type="text" name="intervalo">
    </div>
    <div class="form-group">
    <div class="date-wrapper">
        <label>Vencimento: </label>
        <input type="text" name="vencimento">
        </div>
    </div>
 

<div class="form-group">
        <input type="submit" name="acao" value="Inserir Pagamentos!">
    </div>

</form>

</div>

<div class="box-content w100">

<div class="title-content">
    <i class="fa-solid fa-pencil" style="color: #1f71ff;"></i>
    <h3>Pagamentos pendentes- <?php echo NOME_EMPRESA ?></h3> 
</div>

<div class="wrapper">
    <table>
        <tr>
            <td>Nome do pagamento</td>
            <td>Cliente</td>
            <td>Valor</td>
            <td>Venciemento</td>
            <td>#</td>
        </tr>
    </table>
</div>

</div>

<div class="box-content w100">

<div class="title-content">
    <i class="fa-solid fa-pencil" style="color: #1f71ff;"></i>
    <h3>Pagamentos concluídos - <?php echo NOME_EMPRESA ?></h3> 
</div>

<div class="wrapper">
    <table>
        <tr>
            <td>Nome do pagamento</td>
            <td>Cliente</td>
            <td>Valor</td>
            <td>Venciemento</td>
        </tr>
    </table>
</div>

</div>



