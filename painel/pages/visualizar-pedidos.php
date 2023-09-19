<div class="box-content w100">

<div class="title-content">
    <i class="fa-solid fa-pencil" style="color: #1f71ff;"></i>
    <h3>Filtros - <?php echo NOME_EMPRESA ?></h3> 
</div>

<?php 
$query = "";
if(isset($_POST['acao']) && $_POST['acao'] == "Buscar"){
    $busca = $_POST['busca'];
    $query = "WHERE nCdPedido LIKE '%$busca%' OR nCdReference LIKE '%$busca%' OR sDsStatus LIKE '%$busca%'";

}

$pedidos = Painel::retornaProdutoComFiltro($query);

?>

<form method="post">
<div class="form-group">
        <input type="text" name="busca" placeholder="Procure por: id, reference, status..">
    </div>
    <div class="form-group">
    <input type="submit" name="acao" value="Buscar">
    <div class="linhas-retornadas"><p>Foram encontrados<b> <?php echo count($pedidos) ?> pedidos(s).</b></p></div>
    </div>
    </form>
</div>

<div class="box-content w100">

<div class="title-content">
    <i class="fa-solid fa-pencil" style="color: #1f71ff;"></i>
    <h3>Pedidos - <?php echo NOME_EMPRESA ?></h3> 
</div>
<div class="container-pedidos">

<?php foreach($pedidos as $prod){?>
<div class="boxes" id="boxes-pedidos">
<div class="boxes-topo" style="background-color: rgba(2,2,2,0);" style="width: 90%;" style="height: 90%;">
</div>
<div class="boxes-content">

    <div class="boxes-tipo bproduto"><i class="fa fa-pencil"></i><h5>Id: </h5><p><?php echo $prod['nCdPedido'] ?? ''; ?></p></div>
    <div class="boxes-tipo bproduto"><i class="fa fa-pencil"></i><h5>Valor: </h5><p>R$ <?php echo $prod['sDsPreco'] ?? ''; ?></p></div>
    <div class="boxes-tipo bproduto"><i class="fa fa-pencil"></i><h5>Status: </h5><p> <b><?php echo $prod['sDsStatus'] ?? ''; ?></b></p></div>
    <div class="boxes-tipo bproduto"><i class="fa fa-pencil"></i><h5>Referencia: </h5><p><?php echo $prod['nCdReference'] ?? ''; ?></p></div>    </div>
</div>
<?php }?>   
</div>

</div>
</div>
