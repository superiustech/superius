
<div class="box-content w100">

<div class="title-content">
    <i class="fa-solid fa-pencil" style="color: #1f71ff;"></i>
    <h3>Cadastrar Produtos - <?php echo NOME_EMPRESA ?></h3> 
</div>

<form method="post" enctype="multipart/form-data">
    

<?php 

if(isset($_POST['acao'])){
    $sucesso = true;
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $categoria = $_POST['descricao'];
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
        $sucesso = false;
        Painel::alert('erro', 'Você precisa selecionar pelo menos uma imagem.');
    }

    if($sucesso){
        // CADASTRAR INFORMAÇÕES E IMAGENS E REALIZAR UPLOAD.

        Painel::cadastrarServico($nome,$descricao,$descricaoDetalhada, $preco, $categoria, $bFlAtivo);
        
        for($i = 0; $i < $amountFiles; $i++){        
            $imagemAtual = ['tmp_name'=>$_FILES['imagens']['tmp_name'][$i],
            'name'=>$_FILES['imagens']['name'][$i]];
            $imagens[] = Painel::uploadFile($imagemAtual);
        }

        $lastId = MySql::conectar()->lastInsertId();
        foreach($imagens as $key => $value){
            if($value != null)
            Painel::insereImagemServico($lastId,$value);
        }
        Painel::alert('sucesso', 'Cadastrado com sucesso!');
    }
    
}   

?>

    <div class="form-group">
        <label>Nome do Serviço: </label>
        <input type="text" name="nome" >
    </div>
    <div class="form-group">
        <label>Descrição do Serviço: </label>
        <textarea name="descricao"></textarea>
    </div>
    <div class="form-group">
        <label>Descrição detalhada: </label>
        <textarea name="descricao-detalhada"></textarea>
    </div>
    <div class="form-group">
        <label>Preço: </label>
        <input type="text" name="preco">
    </div>
    <div class="form-group">
        <label>Categoria: </label>
        <input type="text" name="categoria">
    </div>
    <div class="form-group">
        <label> Selecione as imagens: </label>
        <input multiple type="file" name="imagens[]">
    </div>
        <input type="hidden" name="bFlAtivo" value="1">
    <div class="form-group">
        <input type="submit" name="acao" value="Cadastrar">
    </div>
</form>

</div>

