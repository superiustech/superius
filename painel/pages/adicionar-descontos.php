<div class="box-content w100 ">
    
<div class="title-content">
<i class="fa-solid fa-magnifying-glass" style="color: #1f71ff;"></i>
    <h3>Buscar produtos - <?php echo NOME_EMPRESA ?></h3> 
</div>

<?php 

if(isset($_POST['acao'])){
    $id = $_POST['id_produto'];
    $prod = Painel::retornaProdutoPorId($id);
    $precoAtual = $prod['dVlPreco'];
    $desconto = $_POST['desconto'];
    $sucesso = true;

    if($desconto == null || $id == null ){
        $sucesso = false;
    }
    if($desconto > 100){
        $sucesso = false;
        Painel::alert('erro', "Não insira uma porcentagem maior que <b>100</b>.");
    }

    if($sucesso == true){
    $precoDesconto = $precoAtual - (($desconto * $precoAtual) / 100);
    Painel::formataMoedaBD($precoDesconto);
    if(Painel::insereDesconto($precoDesconto, $desconto, $id) == true){
        Painel::alert('sucesso',"O produto de id<b> $id </b> recebeu um desconto de <b>$desconto%</b>. Valor atual: <b>R$ ". Loja::convertMoney($precoDesconto)."</b>");
    }else{
        Painel::alert('erro', 'Ocorreram erros no processamento!');
    }
    }

}else{
}


?>

<form method="post">
    <div class="form-group">
        <label>Id:</label>
        <input type="text" name="id_produto" placeholder="Procure por: id." value="<?php if(isset($_GET['id_produto'])) echo $_GET['id_produto']  ?>">
    </div>
    <div class="form-group">
        <label>Desconto</label>
        <input type="text" name="desconto">
    </div>
    <div class="form-group">
    <input type="submit" name="acao" value="Aplicar Desconto">
    </div>
    </form>
</div>


<div class="box-content w100 ">
<div class="title-content">
    <i class="fa-solid fa-pencil" style="color: #1f71ff;"></i>
    <h3>Produtos - <?php echo NOME_EMPRESA ?></h3> 
</div>
<div class="boxes-content-edit">
<?php   

?>
<div class="boxes" id="boxes-produtos">
<div class="boxes-topo" style="background-color: rgba(2,2,2,0);" style="width: 90%;" style="height: 90%;">
      
</div>
<div class="boxes-content">

    <div class="boxes-tipo bproduto"><i class="fa fa-pencil"></i><h5>Id: </h5><p><?php echo $prod['nCdProduto'] ?? ''; ?></p></div>
    <div class="boxes-tipo bproduto"><i class="fa fa-pencil"></i><h5>Valor: </h5><p>R$  <?php echo $prod['dVlPreco'] ?? ''; ?></p></div>
    <div class="boxes-tipo bproduto"><i class="fa fa-pencil"></i><h5>Valor Desconto: </h5><p>R$ <?php echo $prod['dVlPrecoDesconto'] ?? ''; ?></p></div>
    <div class="boxes-tipo bproduto"><i class="fa fa-pencil"></i><h5>Desconto: </h5><p><?php echo $prod['dVlDesconto'] ?? ''; ?></p></div>

    <div class="boxes-btn">
    </div>
</div>
</div><!-- boxes -->

</div>
</div>

