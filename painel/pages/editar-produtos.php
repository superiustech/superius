<?php 
if(isset($_GET['editar_item']))
$id = $_GET['editar_item'];
else{
    $id = 0;
}



?>
<div class="box-content w100 ">
    
<div class="title-content">
<i class="fa-solid fa-magnifying-glass" style="color: #1f71ff;"></i>
    <h3>Editar produto <?php echo $id?> - <?php echo NOME_EMPRESA ?></h3> 
</div>



<form method="get">
<div class="form-group">
        <input type="text" name="editar_item" placeholder="Procure por: nome, id.">
    </div>
    <div class="form-group">
    <input type="submit" name="acao" value="Buscar" >
    </div>
    </form>
</div>

<div class="box-content w100 ">

<div class="title-content">
    <i class="fa-solid fa-pencil" style="color: #1f71ff;"></i>
    <h3>Imagens do Produto <?php echo $id?>  - <?php echo NOME_EMPRESA ?></h3> 
</div>
<div class="boxes-content-edit">



<?php 
$infoProduto = Painel::retornaProdutoPorId($id);

//DELETAR IMAGENS   

if(isset($_GET['deletar_imagem'])){
        $id_imagem = (int)$_GET['deletar_imagem'];
        $sDsImagem = Painel::retornaImagemPorId($id_imagem);
        foreach($sDsImagem as $caminho){
        Painel::deletarImagemPorId($id_imagem);
        $imagemPath = BASE_DIR_PAINEL . '\\uploads\\' . $caminho['sDsImagem'];
        }
        @unlink($imagemPath);
        Painel::alert('sucesso', 'Imagem deletada com sucesso!');   
}


// MOSTRAR IMAGENS
if(isset($_GET['editar_item'])){
$id = (int)$_GET['editar_item'];
$imagens = Painel::retornaImagem($id);
foreach($imagens as $img){
?>
<div class="boxes boxes-produtos">
<div class="boxes-topo" style="background-color: rgba(2,2,2,0);" style="width: 90%;" style="height: 90%;">
        <img src="<?php echo INCLUDE_PATH_PAINEL.'uploads/'.$img['sDsImagem']?>" alt="">
</div>
    <a class="btn deletex" href="<?php INCLUDE_PATH_PAINEL?>editar-produtos?editar_item=<?php echo $id ?>&deletar_imagem=<?php echo $img['nCdImagem'] ?>"><i class="fa fa-times"></i>Excluir</a>
</div>
<?php }}{
}?>

</div>

</div>

<div class="box-content w100 ">
    
<div class="title-content">
<i class="fa-solid fa-magnifying-glass" style="color: #1f71ff;"></i>
    <h3>Formulário de Edição - <?php echo NOME_EMPRESA ?></h3> 
</div>

<form method="post" enctype="multipart/form-data">

<?php
if(isset($_POST['acao'])){

    $nome = $_POST['nome'];
    $quantidade = $_POST['quantidade'];
    $descricao = $_POST['descricao'];
    $peso = $_POST['peso'];
    $largura = $_POST['largura'];
    $altura = $_POST['altura'];
    $comprimento = $_POST['comprimento'];
    $preco = Painel::formataMoedaBD($_POST['preco']);
    $sucesso = true;
    $descricaoDetalhada = $_POST['descricao-detalhada'];
    $imagens = array();
    $amountFiles =  count($_FILES['imagens']['name']);
    
    if($_FILES['imagens']['name'][0] != '')

    for($i = 0; $i < $amountFiles; $i++){
        $imagemAtual = ['type'=>$_FILES['imagens']['type'][$i],
        'size'=>$_FILES['imagens']['size'][$i]];
        if(Painel::imagemValida($imagemAtual) == false){
            Painel::alert('erro', 'Uma das imagens selecionadas não são válidas!');
            $sucesso = false;
            break;
        }
    }
    else {
        $sucesso = true;
    }

    if($sucesso){
        // CADASTRAR INFORMAÇÕES E IMAGENS E REALIZAR UPLOAD.
        
        for($i = 0; $i < $amountFiles; $i++){
            
            $imagemAtual = ['tmp_name'=>$_FILES['imagens']['tmp_name'][$i],
            'name'=>$_FILES['imagens']['name'][$i]];

            $imagens[] = Painel::uploadFile($imagemAtual);
        }

        $lastId = MySql::conectar()->lastInsertId();
        foreach($imagens as $value){
            if($value != null)
            Painel::insereImagem($id,$value);
        }
        Painel::atualizaProdutoPorId($nome, $descricao , $largura , $altura , $comprimento ,$peso ,$quantidade,$preco,$descricaoDetalhada ,$id);
        Painel::alert('sucesso', 'Atualizado com sucesso!');
    }
}
?>

    <div class="form-group">
        <label>Nome do Produto: </label>
        <input type="text" name="nome" value="<?php echo $infoProduto['sNmProduto']?>">
    </div>
    <div class="form-group">
        <label>Descrição do Produto: </label>
        <textarea name="descricao"><?php echo $infoProduto['sDsProduto']?></textarea>
    </div>
    <div class="form-group">
        <label>Descrição detalhada: </label>
        <textarea name="descricao-detalhada"><?php echo $infoProduto['sDsProdutoDetalhada']?></textarea>
    </div>
    <div class="form-group">
        <label>Quantidade do Produto: </label>
        <input type="text" name="quantidade" value="<?php echo $infoProduto['dQtItem']?>">
    </div>
    <div class="form-group">
        <label>Preço: </label>
        <input type="text" name="preco" value="<?php echo $infoProduto['dVlPreco']?>">
    </div>
    <div class="form-group">
        <label>Peso do Produto: </label>
        <input type="text" name="peso" value="<?php echo $infoProduto['sDsPeso']?>">
    </div>
    <div class="form-group">
        <label>Largura do Produto: </label>
        <input type="number" value="<?php echo $infoProduto['sDsLargura']?>" step="5" name="largura" min="0" max="100" >
    </div>
    <div class="form-group">
        <label>Altura do Produto: </label>
        <input type="number" value="<?php echo $infoProduto['sDsAltura']?>" step="5" name="altura" min="0" max="100">
    </div>
    <div class="form-group">
        <label>Comprimento do Produto: </label>
        <input type="number" value="<?php echo $infoProduto['sDsComprimento']?>" step="5" name="comprimento" min="0" max="100">
    </div>
    <div class="form-group">
        <label> Selecione as imagens: </label>
        <input multiple type="file" name="imagens[]">
    </div>
    <div class="form-group">
        <input type="submit" name="acao" value="Atualizar!">
    </div>

</div>

</form>



</div>
