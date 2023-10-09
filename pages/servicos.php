
<div class="landing-box">
    <div class="img-landing">
    <img src="uploads/amazonspeaker.png">
    </div>
    <div class="content-box">
    </div>
    </div>

<div class="center">

<?php

$id = 1;
$query = "sNmCategoria = 'desenvolvimento'";

$itens = servicosModel::retornaTodosServicos($id, $query);
foreach($itens as $prod){
$precoBase = doubleval(Loja::convertMoney($prod['sDsPreco']));
$precoDividido = Loja::convertMoney(doubleval($precoBase) / 12);
$precoPix = Loja::convertMoney($precoBase - ($precoBase * 10) / 100);
?>
<div class="boxes boxes-produtos">
<div class="boxes-topo" style="background-color: rgba(2,2,2,0);" style="width: 90%;" style="height: 90%;">
    <?php if($prod['sDsImagem'] == ''){?>
            <i class="fa fa-pencil"></i>
            <?php }else{?>
        <a href="<?php INCLUDE_PATH ?>visualizar-produto?id=<?php echo $prod['nCdServico']; ?>"><img src="<?php echo INCLUDE_PATH_PAINEL.'uploads/'.$prod['sDsImagem']?>" alt=""></a>
            <?php }?>
</div>
<div class="boxes-content">
    <div class="boxes-tipo bproduto"></h5><h2><?php echo $prod['sDsServico'];?></h2></div>
    <div class="preco">
    <div class="boxes-tipo desconto"><h3>Preço base</h3><h5>De: R$ <?php echo $prod['sDsPreco'];?></h5></div>
    </div>

    <div class="parce">


    <p>Parcele em até 12x sem juros de <b>R$ <?php echo $precoDividido;  ?></b> sem juros
        ou até <b>R$ <?php echo $precoPix;?></b> no PIX </p>

    </div>
    <div class="box">
    <a href="<?php INCLUDE_PATH ?>visualizar-servico?servico=<?php echo $prod['nCdServico']; ?>"><p>Adicionar ao carrinho!</p></a>
    </div>
</div>
</div>

<?php }?>
</div>
