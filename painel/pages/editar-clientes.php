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

    if(strtotime($vencimento_original) < strtotime(date('Y-m-d'))){
        Painel::alert('erro', "Você selecionou uma data menor do que a atual.");
    }else if($valor == ''){
        Painel::alert('erro', "Insira um valor!");
    }
    else if($numero_parcelas == ''){
        Painel::alert('erro', "Entre com o número de parcelas!");
    }else if ($intervalo == ''){
        Painel::alert('erro', "Selecione um intervalo!");
    }   else{
        for ($i=0; $i < $numero_parcelas; $i++) { 
            $vencimento = strtotime($vencimento_original) + (($i* $intervalo) * (60*60*24));
            Painel::inserirPagamento($cliente_id,$valor,date('Y-m-d',$vencimento),$nome,$status);
    
        }
        Painel::alert('sucesso', 'Os pagamentos foram inseridos com sucesso!');
    }   
}



 ?>
 
<form method="post">

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

<?php     if (isset($_GET['pago'])){
        $nCdControleFinanceiro = $_GET['pago'];
        // $dataAtual = date("Y-m-d");
        if (Painel::atualizarStatusFinanceiro($nCdControleFinanceiro) == true){
            Painel::alert('sucesso', ' O pagamento foi quitado com sucesso!');
        }else{
            Painel::alert('erro', 'Houve algum erro no processamento!');
        }
    }
    
?>


<div class="wrapper">
    <table class="table-header">
        <tr>
            <td>Nome do pagamento</td>
            <td>Cliente</td>
            <td>Valor</td>
            <td>Venciemento</td>
            <td>Enviar e-mail</td>
            <td>Marcar como pago</td>
        </tr>
    </table>
</div>

<?php 
$cliente_id = $id;
$status = 0;
$pendentes = Painel::retornaFinanceiroCliente($cliente_id,$status);
foreach ($pendentes as $value) { 
    
$style = "";
if(strtotime(date('Y-m-d')) >= strtotime($value['tDtVencimento'])){
    $style = 'style="background-color: #ff2b2b;"';
} ?>

<div class="wrapper">
    <table >
        <tr <?php echo $style;?>>
            <td> <?php echo $value['sNmControle']; ?></td>
            <td><?php echo $value['sDsApelido']; ?></td>
            <td><?php echo $value['sDsValor']; ?></td>
            <td><?php echo date('d/m/Y',strtotime($value['tDtVencimento'])); ?></td>
            <td><a style="background-color: orange;" class="btn"   href="<?php echo INCLUDE_PATH_PAINEL?>"><i class="fa fa-envelope"></i> E-mail</a></td>
            <td><a style="background-color: #00bfa5;" class="btn"   href="<?php echo INCLUDE_PATH_PAINEL?>editar-clientes?id=<?php echo $value['nCdCliente']?> &pago=<?php echo $value['nCdControleFinanceiro']?>"><i class="fa-solid fa-check"></i> Pago</a></td>
        </tr>
    </table>
</div>

<?php } ?> 

</div>

<div class="box-content w100">



<div class="title-content">
    <i class="fa-solid fa-pencil" style="color: #1f71ff;"></i>
    <h3>Pagamentos concluídos - <?php echo NOME_EMPRESA ?></h3> 
</div>


<div class="wrapper">
    <table class="table-header">
        <tr>
            <td>Nome do pagamento</td>
            <td>Cliente</td>
            <td>Valor</td>
            <td>Vencimento</td>
            <td>Pagamento</td>
        </tr>
    </table>
</div>

<?php 
$cliente_id = $id;
$status = 1;
$pendentes = Painel::retornaFinanceiroCliente($cliente_id,$status);
foreach ($pendentes as $value) { 
    
$style = "";
if(strtotime(date('Y-m-d')) >= strtotime($value['tDtVencimento'])){
    $style = 'style="background-color: #ff2b2b;"';
} ?>

<div class="wrapper">
    <table>
        <tr>
            <td> <?php echo $value['sNmControle']; ?></td>
            <td><?php echo $value['sDsApelido']; ?></td>
            <td><?php echo $value['sDsValor']; ?></td>
            <td><?php echo date('d/m/Y',strtotime($value['tDtVencimento'])); ?></td>
            <td><?php echo "EM IMPLEMENTAÇÃO"; ?></td>
         </tr>
    </table>
</div>

<?php } ?> 



</div>



