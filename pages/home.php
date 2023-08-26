
<div class="landing-box">
    <div class="img-landing">
    <img src="uploads/amazonspeaker.png">
    </div>
    <div class="content-box">
    </div>
    </div>

<div class="center">

<?php 

$itens = homeModel::retornaEstoqueCompleto();
foreach($itens as $prod){
if(($prod['dQtItem'] <= 0) == false){
$precoDividido = $prod['dVlPreco'] / 12;
$precoPix =$prod['dVlPrecoDesconto'] - ((1 * 10) / 100);
$precoDividido = Loja::convertMoney($precoDividido);
$precoPix = Loja::convertMoney($precoPix);

?>
<div class="boxes boxes-produtos">
<div class="boxes-topo" style="background-color: rgba(2,2,2,0);" style="width: 90%;" style="height: 90%;">
    <?php if($prod['sDsImagem'] == ''){?>
            <i class="fa fa-pencil"></i> 
            <?php }else{?>
        <a href="<?php INCLUDE_PATH ?>visualizar-produto?id=<?php echo $prod['nCdProduto']; ?>"><img src="<?php echo INCLUDE_PATH_PAINEL.'uploads/'.$prod['sDsImagem']?>" alt=""></a>
            <?php }?>
</div>
<div class="boxes-content">
    <div class="boxes-tipo bproduto"></h5><h2><?php echo $prod['sDsProduto'];?></h2></div>
    <div class="preco">
    <div class="boxes-tipo desconto"><h5>De: R$ <?php echo $prod['dVlPreco'];?></h5></div>
    <div class="boxes-tipo oficial"><h5> R$ <?php echo $prod['dVlPrecoDesconto'];?></h5></div>
    </div>
   
    <div class="parcelamento">
        <p>Parcele em até 12x sem juros de <b>R$ <?php echo $precoDividido;  ?></b> sem juros
        ou até <b>R$ <?php echo $precoPix;?></b> no PIX </p>
    </div>
    <div class="box-adicionar">
    <a href="<?php INCLUDE_PATH ?>?adicionar-carrinho=<?php echo $prod['nCdProduto']; ?>"><p>Adicionar ao carrinho!</p></a>
    </div>

</div>
</div>

<?php }else{ ?>
    
<div class="boxes boxes-produtos esgotado">
<div class="boxes-topo" style="background-color: rgba(2,2,2,0);" style="width: 90%;" style="height: 90%;">
    <?php if($prod['sDsImagem'] == ''){?>
            <i class="fa fa-pencil"></i> 
            <?php }else{?>
        <img src="<?php echo INCLUDE_PATH_PAINEL.'uploads/'.$prod['sDsImagem']?>" alt="">
            <?php }?>
</div>
<div class="boxes-content">
    <div class="boxes-tipo bproduto"></h5><h2><?php echo $prod['sDsProduto'];?></h2></div>
    <div class="preco">
    <div class="boxes-tipo desconto"><h5>De: R$ <?php echo $prod['dVlPreco'];?></h5></div>
    <div class="boxes-tipo oficial"><h5> R$ <?php echo $prod['dVlPrecoDesconto'];?></h5></div>
    </div>
</div>
   
<div class="box-esgotado">
    <a href="#"><i class="fa fa-face-sad-cry"></i><p>Esgotado!</p></a>
    </div>
</div>

<?php }}?>
</div>
           