<div class="box-content w100 ">
    
<div class="title-content">
<i class="fa-solid fa-magnifying-glass" style="color: #1f71ff;"></i>
    <h3>Editar produtos - <?php echo NOME_EMPRESA ?></h3> 
</div>

<?php 

if(isset($_GET['acao'])){
    $produto_idd = $_GET['editar_id'];
}

$query = "";
$produto = Painel::carregarProdutosComFiltro($query);

?>

<form method="get">
<div class="form-group">
        <input type="text" name="editar_id" placeholder="Procure por: nome, id.">
    </div>
    <div class="form-group">
    <input type="submit" name="acao" value="Buscar" >
    <div class="linhas-retornadas"><p>Foram encontrados<b> <?php echo count($produto) ?> produto(s).</b></p></div>
    </div>
    </form>
</div>

<div class="box-content w100 ">

<div class="title-content">
    <i class="fa-solid fa-pencil" style="color: #1f71ff;"></i>
    <h3>Imagens dos Produtos - <?php echo NOME_EMPRESA ?></h3> 
</div>
<div class="boxes-content-edit">



<?php 

    $query = "";
    $produto = Painel::carregarProdutosComFiltro($query);
    // Painel::alert('sucesso', 'Foram retornados <b>'.count($produto).' produtos.</b>');

    foreach($produto as $prod){
?>
<div class="boxes boxes-produtos">
<div class="boxes-topo" style="background-color: rgba(2,2,2,0);" style="width: 90%;" style="height: 90%;">
        <img src="<?php echo INCLUDE_PATH_PAINEL.'uploads/'.$prod['sDsImagem']?>" alt="">
</div>
    <a class="btn deletex" href="<?php INCLUDE_PATH_PAINEL?>editar-produtos?deletar_imagem=8"><i class="fa fa-times"></i>Excluir</a>
</div>
<?php }?>

</div>

</div>

<div class="box-content w100 ">
    
<div class="title-content">
<i class="fa-solid fa-magnifying-glass" style="color: #1f71ff;"></i>
    <h3>Formulário de Edição - <?php echo NOME_EMPRESA ?></h3> 
</div>

<div class="form-group">
        <label>Nome do Produto: </label>
        <input type="text" name="nome" >
    </div>
    <div class="form-group">
        <label>Descrição do Produto: </label>
        <textarea name="descricao"></textarea>
    </div>
    <div class="form-group">
        <label>Quantidade do Produto: </label>
        <input type="text" name="quantidade">
    </div>
    <div class="form-group">
        <label>Peso do Produto: </label>
        <input type="text" name="peso">
    </div>
    <div class="form-group">
        <label>Largura do Produto: </label>
        <input type="number" value="0" step="5" name="largura" min="0" max="100">
    </div>
    <div class="form-group">
        <label>Altura do Produto: </label>
        <input type="number" value="0" step="5" name="altura" min="0" max="100">
    </div>
    <div class="form-group">
        <label>Comprimento do Produto: </label>
        <input type="number" value="0" step="5" name="comprimento" min="0" max="100">
    </div>
    <div class="form-group">
        <label> Selecione as imagens: </label>
        <input multiple type="file" name="imagens[]">
    </div>
    <div class="form-group">
        <input type="submit" name="acao" value="Atualizar!">
    </div>
</form>

</div>



</div>
