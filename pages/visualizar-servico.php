<?php

use Composer\InstalledVersions;

    if(isset($_GET['servico'])){
        $id = $_GET['servico'];
        $img = Painel::retornaImagemServicoPorId($id);
        $produto = Painel::retornaServicoPorId($id);

        $precoDividido = $produto['sDsPreco'] / 12;
        $precoDividido = Loja::convertMoney($precoDividido);

        
    if(isset($_GET['servico']) && isset($_GET['cliente'])){

      if(!isset($_COOKIE['servico'])){
        setcookie('servico',true,time() + (60*60));

      $id_servico = $_GET['servico'];
      $cliente = $_GET['cliente'];
      $data = date('Y-m-d');
      if(Painel::insereServico($id_servico , $cliente,$data) == true){
          Painel::alert('sucesso', 'O servico foi enviado para analise. Entraremos em contato!');
      }else{
        Painel::alert('erro' , 'Ocorreram erros no processamento!');
      }
    }else{
      Painel::alert('erro' , 'Você já enviou um chamado nas ultimas 1 hora. Tente mais tarde!');
    }
    }

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
    <div class="boxes-tipo descricao "></h5><h2><?php echo $produto['sDsServicoDetalhada'];?></h2></div>
    <div class="preco"><hr>
    <div class="boxes-tipo oficial"><h5> R$ <?php echo $produto['sDsPreco'];?></h5></div><hr>
</div>  
    <div class="btn comprar"><a href="<?php echo INCLUDE_PATH ?>visualizar-servico?servico=<?php echo $id?>&cliente=<?php echo $_SESSION['codigo']?>"><h2>Contratar!</h2></a>
</div>
<h5>Compra 100% segura.
  Pagamentos auditados pelo Pag Seguro</h5>

</div><!-- produto-info -->
</div><!-- all-info -->
<div class="descricao">
<div class="ulcontainer">
     <h3>INFORMAÇÕES IMPORTANTES</h3> 
    <ul>
      <li>Esse serviço é autêntico!</li>
      <li>As imagens dos serviços e/ou seus componentes são meramente ilustrativos, exceto quando indicado o contrário no próprio anúncio;</li>
      <li>Este servico será prestado pelos profissionais da Superius Tech.</li>
      <li>Contrate e nós entraremos em contato pelo seu e-mail.</li>
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