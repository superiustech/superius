<?php 

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $img = Painel::retornaImagem($id);
        $produto = Painel::retornaProdutoPorId($id);

        $precoDividido = $produto['dVlPreco'] / 12;
        $precoPix =$produto ['dVlPrecoDesconto'] - (($produto['dVlPrecoDesconto'] * 10) / 100);
        $precoDividido = Loja::convertMoney($precoDividido);
        $precoPix = Loja::convertMoney($precoPix);

?>
<div class="all-info">
<div class="slider-wrapper" id="slider">
  <ul class="slider-img">
    <?php foreach($img as $prodImagem){?>
    <li>
      <img
        src="<?php echo INCLUDE_PATH_PAINEL.'uploads/'.$prodImagem['sDsImagem'];?>" alt=""/>
    </li>
    <?php }?>
  </ul>
</div>
<div class="produto-info visualizar">
    <div class="boxes-tipo descricao "></h5><h2><?php echo $produto['sDsProduto'];?></h2></div>
    <div class="preco"><hr>
    <div class="boxes-tipo desconto"><h5>De: R$ <?php echo $produto['dVlPreco'];?></h5></div> 
    <div class="boxes-tipo oficial"><h5> R$ <?php echo $produto['dVlPrecoDesconto'];?></h5></div><hr>
    
    <div class="parcelamento">
        <p>Parcele em até 12x sem juros de <b>R$ <?php echo $precoDividido;  ?></b> sem juros
        ou até <b>R$ <?php echo $precoPix;?></b> no PIX </p>
    </div>
</div>  
    <div class="btn comprar"><a href="<?php echo INCLUDE_PATH ?>visualizar-produto?id=<?php echo $id?>&adicionar-carrinho=<?php echo $produto['nCdProduto']; ?>"><h2>Comprar!</h2></a>
</div>
<h5>Compra 100% segura.
  Pagamentos auditados pelo Pag Seguro</h5>

</div><!-- produto-info -->
</div><!-- all-info -->
<div class="descricao">
<div class="ulcontainer">
     <h3>INFORMAÇÕES IMPORTANTES</h3> 
    <ul>
      <li>Esse produto é novo!</li>
      <li>As imagens dos produtos e/ou seus componentes são meramente ilustrativos, exceto quando indicado o contrário no próprio anúncio;</li>
      <li>Este item foi adquirido pelo MeuGameUsado, porém o item é 100% novo e LACRADO.</li>
      <li>Item NUNCA aberto, NOVO de FÁBRICA.</li>
    </ul></div>
</div>
<div class="descricao">
<div class="especificacao">
     <h3>ESPECIFICAÇÕES TÉCNICAS</h3> 
      <ul>
        <li><?php echo $produto['sDsProdutoDetalhada'];?></li>
      </ul>
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

<?php  } ?>