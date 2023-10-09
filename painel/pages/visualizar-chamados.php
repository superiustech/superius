<?php

$query = "";
    if(isset($_POST['acao']) && $_POST['acao'] == "Buscar"){
        $busca = $_POST['busca'];
        $query = "AND CT.nCdContato LIKE '%$busca%' OR CT.nCdCliente LIKE '%$busca%' OR CT.sDsAssunto  LIKE '%$busca%'";
    }
$pendentes = Painel::retornaContato($query);

?>
<div class="box-content w100">

<div class="title-content">
    <i class="fa-solid fa-pencil" style="color: #1f71ff;"></i>
    <h3>Visualizar Chamados - <?php echo NOME_EMPRESA ?></h3> 
</div>

<form method="post">
<div class="form-group">
        <input type="text" name="busca" placeholder="Procure por: id, reference, status..">
    </div>
    <div class="form-group">
    <input type="submit" name="acao" value="Buscar">
    <div class="linhas-retornadas"><p>Foram encontrados<b> <?php echo count($pendentes) ?> chamados(s).</b></p></div>
    </div>
    </form>
</div>

<div class="box-content w100">
<?php 
if(isset($_GET['chamado'])){
    $contato_id = $_GET['chamado'];
    if(Painel::respondeChamado($contato_id) == true){
        Painel::alert('sucesso' , "O chamado $contato_id foi marcado como respondido!");
    }else{
        Painel::alert('erro' , 'Ocorreram erros no processamento!');
    }
}elseif(isset($_GET['deletar_chamado'])){
    $contato_id = $_GET['deletar_chamado'];
    if(Painel::deletaChamado($contato_id) == true){
        Painel::alert('sucesso' , "O chamado $contato_id foi deletado!");
    }else{
        Painel::alert('erro' , 'Ocorreram erros no processamento!');
    }
}
?>
<div class="title-content">
    <i class="fa-solid fa-pencil" style="color: #1f71ff;"></i>
    <h3>Visualizar Chamados - <?php echo NOME_EMPRESA ?></h3> 
</div>
<div class="wrapper">
    <table class="table-header">
        <tr>
            <td>Cliente</td>
            <td>Assunto</td>
            <td>Código</td>
            <td>Deletar Chamado</td>
            <td>Marcar como:</td>
        </tr>
    </table>
</div>


<?php 
foreach ($pendentes as $value) {    
?>
<div class="wrapper">
    <table>
            <td><?php echo $value['nCdCliente']; ?></td>
            <td><?php echo $value['sDsAssunto']; ?></td>
            <td><?php echo $value['nCdContato']?></td>
            <td><a style="background-color: rgb(251, 49, 49);" class="btn"   href="<?php echo INCLUDE_PATH_PAINEL?>visualizar-chamados?deletar_chamado=<?php echo $value['nCdContato']?>"><i class="fa fa-times"></i> Deletar </a></td>
            <td><a style="background-color: #00bfa5;" class="btn"   href="<?php echo INCLUDE_PATH_PAINEL?>visualizar-chamados?chamado=<?php echo $value['nCdContato']?>"><i class="fa-solid fa-check"></i> Respondido </a></td>
        </tr>
    </table>
</div>

<?php } ?> 

</div>
<div class="box-content w100">

<div class="title-content">
    <i class="fa-solid fa-pencil" style="color: #1f71ff;"></i>
    <h3>Mensagens Detalhadas - <?php echo NOME_EMPRESA ?></h3> 
</div>
<div class="container-pedidos">

<?php 
foreach($pendentes as $prod){?>
<div class="boxes" id="boxes-pedidos">
<div class="boxes-topo" style="background-color: rgba(2,2,2,0);" style="width: 90%;" style="height: 90%;">
</div>
<div class="boxes-content">

    <div class="boxes-tipo bproduto"><i class="fa fa-pencil"></i><h5>Id: </h5><p><?php echo $prod['nCdCliente'] ?? ''; ?></p></div>
    <div class="boxes-tipo bproduto"><i class="fa fa-pencil"></i><h5>E-mail: </h5><p><?php echo $prod['sDsEmail'] ?? ''; ?></p></div>
    <div class="boxes-tipo bproduto"><i class="fa fa-pencil"></i><h5>Assunto: </h5><p><?php echo $prod['sDsAssunto'] ?? ''; ?></p></div>
    <div class="boxes-tipo bproduto"><i class="fa fa-pencil"></i><h5>Mensagem: </h5><p> <b><?php echo $prod['sDsMensagem'] ?? ''; ?></b></p></div>
    </div>
</div>
<?php }?>   
</div>

</div>


</div>




