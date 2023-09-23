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
    <h3>Imagens do Servico <?php echo $id?>  - <?php echo NOME_EMPRESA ?></h3> 
</div>
<div class="boxes-content-edit">



<?php 
$infoProduto = Painel::retornaServicoPorId($id);

//DELETAR IMAGENS   

if(isset($_GET['deletar_imagem'])){
    $id_imagem = (int)$_GET['deletar_imagem'];
    $sDsImagem = Painel::retornaImagemServicoPorId($id_imagem);
    foreach($sDsImagem as $caminho){
    Painel::deletarImagemServicoPorId($id_imagem);
    $imagemPath = BASE_DIR_PAINEL . '\\uploads\\' . $caminho['sDsImagem'];
    }
    @unlink($imagemPath);
    Painel::alert('sucesso', 'Imagem deletada com sucesso!');       
}


// MOSTRAR IMAGENS
if(isset($_GET['editar_item'])){
$id = (int)$_GET['editar_item']; 
$imagens = Painel::retornaImagemServico($id);
foreach($imagens as $img){
?>
<div class="boxes boxes-produtos">
<div class="boxes-topo" style="background-color: rgba(2,2,2,0);" style="width: 90%;" style="height: 90%;">
        <img src="<?php echo INCLUDE_PATH_PAINEL.'uploads/'.$img['sDsImagem']?>" alt="">
</div>
    <a class="btn deletex" href="<?php INCLUDE_PATH_PAINEL?>editar-servicos?editar_item=<?php echo $id ?>&deletar_imagem=<?php echo $img['nCdImagem'] ?>"><i class="fa fa-times"></i>Excluir</a>
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
    $sucesso = true;
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $categoria = intval($_POST['categoria']);
    $preco = Painel::formataMoedaBD($_POST['preco']);
    $bFlAtivo = $_POST['bFlAtivo'];
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
            Painel::insereImagemServico($id,$value);
        }
        Painel::atualizaServicoPorId($nome,$descricao,$descricaoDetalhada, $preco, $categoria, $bFlAtivo,$id);
        Painel::alert('sucesso', 'Atualizado com sucesso!');
    }
}
?>

    <div class="form-group">
        <label>Nome do Serviço: </label>
        <input type="text" name="nome" value="<?php echo $infoProduto['sDsNome'] ?? ''?>">
    </div>
    <div class="form-group">
        <label>Descrição do Serviço: </label>
        <textarea name="descricao"><?php echo $infoProduto['sDsServico'] ?? ''?></textarea>
    </div>
    <div class="form-group">
        <label>Descrição detalhada: </label>
        <textarea name="descricao-detalhada"><?php echo $infoProduto['sDsServicoDetalhada'] ?? '';?></textarea>
    </div>
    <div class="form-group">
        <label>Preço: </label>
        <input type="text" name="preco" value="<?php echo $infoProduto['sDsPreco'] ?? ''?>">
    </div>
    <div class="form-group">
        <label>Categoria: </label>
        <input type="text" name="categoria" value="<?php echo $infoProduto['sNmCategoria'] ?? ''?>">
    </div>
    <div class="form-group">
        <label>Status: </label>
        <input type="text" name="bFlAtivo" value="<?php echo $infoProduto['bFlAtivo'] ?? ''?>">
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
