<?php 
if (isset($_GET['pendentes']) == false){
?>

<div class="box-content w100 ">
    
<div class="title-content">
<i class="fa-solid fa-magnifying-glass" style="color: #1f71ff;"></i>
    <h3>Buscar produtos - <?php echo NOME_EMPRESA ?></h3> 
</div>

<?php 

$query = "";
if(isset($_POST['acao']) && $_POST['acao'] == "Buscar"){
    $busca = $_POST['busca'];
    $query = "AND sNmProduto LIKE '%$busca%'";

}

$produto = Painel::carregarProdutosComFiltro($query);

?>

<form method="post">
<div class="form-group">
        <input type="text" name="busca" placeholder="Procure por: nome, id.">
    </div>
    <div class="form-group">
    <input type="submit" name="acao" value="Buscar">
    <div class="linhas-retornadas"><p>Foram encontrados<b> <?php echo count($produto) ?> produto(s).</b></p></div>
    </div>
    </form>
</div>
<div class="box-content w100 ">

<div class="title-content">
    <i class="fa-solid fa-pencil" style="color: #1f71ff;"></i>
    <h3>Listar Produtos - <?php echo NOME_EMPRESA ?></h3> 
</div>
<div class="boxes-content-edit">

<?php 

    if (isset($_GET['deletar_item'])){
        $produto_id = $_GET['deletar_item'];
        $imagem = Painel::retornaImagem($produto_id);
       
        if (Painel::deletarProduto($produto_id) && Painel::deletarImagemProduto($produto_id)) {
            Painel::alert('sucesso', 'Produto deletado com sucesso!');

            foreach ($imagem as $imgDeletar) {
                $imagemPath = BASE_DIR_PAINEL . '\\uploads\\' . $imgDeletar['sDsImagem'];
                @unlink($imagemPath);
            }
            
        }
        else{
            Painel::alert('erro', 'Ocorreram erros no proessamento!');
        }
    }

    if(isset($_POST['atualizar'])){
        $produto_id = $_POST['produto_id'];
        $quantidade = $_POST['quantidade'];
        if($quantidade < 0){
            Painel::alert('erro', 'Você não pode inserir um valor menor ou igual a zero!');
        }else{
            if(Painel::atualizarQuantidadeProduto($quantidade,$produto_id) == true)
                Painel::alert('sucesso', 'Você atualizou a quantidade do produto com id: '.$produto_id.' com sucesso!');
            else
                Painel::alert('erro','Ocorreu algum erro no processamento, tente novamente.');
            
        }
    }

    $sql = Painel::verificaEstoque();
    if($sql->rowCount() > 0){
    Painel::alert('atencao','Você está com produtos em falta clique <b> <a href="'.INCLUDE_PATH_PAINEL.'listar-produtos?pendentes"> aqui </a> </b> para visualiza-los.');
    }
?>

<?php 

    $query = "";
    if(isset($_POST['acao']) && $_POST['acao'] == "Buscar"){
        $busca = $_POST['busca'];
        $query = "AND sNmProduto LIKE '%$busca%'";

    }

    $produto = Painel::carregarProdutosComFiltro($query);
    // Painel::alert('sucesso', 'Foram retornados <b>'.count($produto).' produtos.</b>');

    foreach($produto as $prod){
?>
<div class="boxes" id="boxes-produtos">
<div class="boxes-topo" style="background-color: rgba(2,2,2,0);" style="width: 90%;" style="height: 90%;">
        <img src="<?php echo INCLUDE_PATH_PAINEL.'uploads/'.$prod['sDsImagem']?>" alt="">
</div>
<div class="boxes-content">
    <div class="boxes-tipo bproduto"><i class="fa fa-pencil"></i><h5>Nome: </h5><p><?php echo $prod['sNmProduto'];?></p></div>
    <div class="boxes-tipo bproduto"><i class="fa fa-pencil"></i><h5>Descrição: </h5><p><?php echo $prod['sDsProduto'];?></p></div>
    <div class="boxes-tipo bproduto"><i class="fa fa-pencil"></i><h5>Largura: </h5><p><?php echo $prod['sDsLargura'];?></p></div>
    <div class="boxes-tipo bproduto"><i class="fa fa-pencil"></i><h5>Altura: </h5><p><?php echo $prod['sDsAltura'];?></p></div>
    <div class="boxes-tipo bproduto"><i class="fa fa-pencil"></i><h5>Comprimento: </h5><p><?php echo $prod['sDsComprimento'];?></p></div>
    <div class="boxes-btn">
        <form id="boxes-form" method="post">
            <div class="boxes-tipo"><i class="fa fa-pencil"></i><h5>Quantidade: </h5></div> 
            <input type="number" name="quantidade" min="0" step="1" value="<?php echo $prod['dQtItem'];?>">
            <input type="hidden" name="produto_id" value="<?php echo $prod['nCdProduto'];?>">
            <input type="submit" name="atualizar" value="Enviar" style="width: 70px;" style="margin-bottom: 5px;">
        </form>
    </div>
    <div class="boxes-btn">
    <a class="btn deletex" href="<?php INCLUDE_PATH_PAINEL?>listar-produtos?deletar_item=<?php echo $prod['nCdProduto']?>"><i class="fa fa-times"></i>Excluir</a>
    <a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL?>editar-produtos?editar_item=<?php echo $prod['nCdProduto']?>"><i class="fa-solid fa-pencil"></i>Editar</a>
    </div><!-- boxes-btn -->
</div>

</div><!-- boxes -->
<?php }?>


</div>
</div>

<?php }else { ?>

<div class="box-content w100 ">

<div class="title-content">
    <i class="fa-solid fa-pencil" style="color: #1f71ff;"></i>
    <h3> <a href="<?php INCLUDE_PATH_PAINEL ?>listar-produtos">Produtos em estoque</a> -> Produtos em falta - <?php echo NOME_EMPRESA ?></h3> 
</div>
<div class="boxes-content-edit">

<?php

if (isset($_GET['deletar_item'])){
    $produto_id = $_GET['deletar_item'];
    $imagem = Painel::retornaImagem($produto_id);
   
    if (Painel::deletarProduto($produto_id) && Painel::deletarImagemProduto($produto_id)) {
        Painel::alert('sucesso', 'Produto deletado com sucesso!');

        foreach ($imagem as $imgDeletar) {
            $imagemPath = BASE_DIR_PAINEL . '\\uploads\\' . $imgDeletar['sDsImagem'];
            @unlink($imagemPath);
        }
        
    }
    else{
        Painel::alert('erro', 'Ocorreram erros no processamento!');
    }
}

    if(isset($_POST['atualizar'])){
        $produto_id = $_POST['produto_id'];
        $quantidade = $_POST['quantidade'];
        if($quantidade < 0){
            Painel::alert('erro', 'Você não pode inserir um valor menor ou igual a zero!');
        }else{
            if(Painel::atualizarQuantidadeProduto($quantidade,$produto_id) == true)
                Painel::alert('sucesso', 'Você atualizou a quantidade do produto com id: '.$produto_id.' com sucesso!');
            else
                Painel::alert('erro','Ocorreu algum erro no processamento, tente novamente.');
        }
    }
?>

<?php 
    $query = "";
    $produto = Painel::carregarProdutosFalta();
    foreach($produto as $prod){

?>
<div class="boxes" id="boxes-produtos">
<div class="boxes-topo" style="background-color: rgba(2,2,2,0);" style="width: 90%;" style="height: 90%;">
        <img src="<?php echo INCLUDE_PATH_PAINEL.'uploads/'.$prod['sDsImagem']?>" alt="">
</div>
<div class="boxes-content">
    <div class="boxes-tipo bproduto"><i class="fa fa-pencil"></i><h5>Nome: </h5><p><?php echo $prod['sNmProduto'];?></p></div>
    <div class="boxes-tipo bproduto"><i class="fa fa-pencil"></i><h5>Descrição: </h5><p><?php echo $prod['sDsProduto'];?></p></div>
    <div class="boxes-tipo bproduto"><i class="fa fa-pencil"></i><h5>Largura: </h5><p><?php echo $prod['sDsLargura'];?></p></div>
    <div class="boxes-tipo bproduto"><i class="fa fa-pencil"></i><h5>Altura: </h5><p><?php echo $prod['sDsAltura'];?></p></div>
    <div class="boxes-tipo bproduto"><i class="fa fa-pencil"></i><h5>Comprimento: </h5><p><?php echo $prod['sDsComprimento'];?></p></div>
    <div class="boxes-btn">
        <form id="boxes-form" method="post">
            <div class="boxes-tipo"><i class="fa fa-pencil"></i><h5>Quantidade: </h5></div> 
            <input type="number" name="quantidade" min="0" step="1" value="<?php echo $prod['dQtItem'];?>">
            <input type="hidden" name="produto_id" value="<?php echo $prod['nCdProduto'];?>">
            <input type="submit" name="atualizar" value="Enviar" style="width: 70px;" style="margin-bottom: 5px;">
        </form>
    </div>
    <div class="boxes-btn">
    <a class="btn deletex" item_id="0" href="<?php INCLUDE_PATH_PAINEL?>listar-produtos?deletar_item=<?php echo $prod['nCdProduto']?>"><i class="fa fa-times"></i>Excluir</a>
    <a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL?>editar-clientes?id=0"><i class="fa-solid fa-pencil"></i>Editar</a>
    </div><!-- boxes-btn -->
</div>

</div><!-- boxes -->
<?php } ?>


</div>
</div>

    


    
    <?php }?>