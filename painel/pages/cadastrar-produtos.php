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
    $quantidade = $_POST['quantidade'];
    $largura = $_POST['largura'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $comprimento = $_POST['comprimento'];
    $preco = Painel::formataMoedaBD($_POST['preco']);
    $desconto = 0;
    $descricaoDetalhada = $_POST['descricao-detalhada'];
    $imagens = array();
    $amountFiles =  count($_FILES['imagens']['name']);
    $id = 14;
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
        
        for($i = 0; $i < $amountFiles; $i++){
            
            $imagemAtual = ['tmp_name'=>$_FILES['imagens']['tmp_name'][$i],
            'name'=>$_FILES['imagens']['name'][$i]];

            $imagens[] = Painel::uploadFile($imagemAtual);
        }

        $sql = Painel::lastIdProduto($nome,$quantidade, $descricao,$largura, $altura, $peso, $comprimento, $preco, $preco, $desconto ,$descricaoDetalhada);
        $lastId = MySql::conectar()->lastInsertId();
        foreach($imagens as $key => $value){
            if($value != null)
            Painel::insereImagem($lastId,$value);
        }
        Painel::alert('sucesso', 'Cadastrado com sucesso!');
    }
    
}   

?>

    <div class="form-group">
        <label>Nome do Produto: </label>
        <input type="text" name="nome" >
    </div>
    <div class="form-group">
        <label>Descrição do Produto: </label>
        <textarea name="descricao"></textarea>
    </div>
    <div class="form-group">
        <label>Descrição detalhada: </label>
        <textarea name="descricao-detalhada"></textarea>
    </div>
    <div class="form-group">
        <label>Quantidade do Produto: </label>
        <input type="text" name="quantidade">
    </div>
    <div class="form-group">
        <label>Preço: </label>
        <input type="text" name="preco">
    </div>
    <div class="form-group">
        <label>Peso do Produto: </label>
        <input type="text" name="peso">
    </div>
    <div class="form-group">
        <label>Largura do Produto: </label>
        <input type="number" value="0" step="1" name="largura" min="0" max="100">
    </div>
    <div class="form-group">
        <label>Altura do Produto: </label>
        <input type="number" value="0" step="1" name="altura" min="0" max="100">
    </div>
    <div class="form-group">
        <label>Comprimento do Produto: </label>
        <input type="number" value="0" step="1" name="comprimento" min="0" max="100">
    </div>
    <div class="form-group">
        <label> Selecione as imagens: </label>
        <input multiple type="file" name="imagens[]">
    </div>
    <div class="form-group">
        <input type="submit" name="acao" value="Cadastrar">
    </div>
</form>

</div>

