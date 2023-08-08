<div class="box-content w100 ">
    
<div class="title-content">
<i class="fa-solid fa-magnifying-glass" style="color: #1f71ff;"></i>
    <h3>Buscar Usuário - <?php echo NOME_EMPRESA ?></h3> 
</div>


<form method="post">
<div class="form-group">
        <input type="text" name="busca" placeholder="Procure por: nome, apelido, email, cpf, cnpj">
    </div>
    <div class="form-group">
    <input type="submit" name="acao" value="Buscar">
    </div>
    </form>

</div>
<div class="box-content w100 ">

<div class="title-content">
    <i class="fa-solid fa-pencil" style="color: #1f71ff;"></i>
    <h3>Gerenciar clientes - <?php echo NOME_EMPRESA ?></h3> 
</div>
<div class="boxes-content-edit">

<?php 

$query = "";
if(isset($_POST['acao'])){
    $busca = $_POST['busca'];
    $query = "WHERE sDsApelido LIKE '%$busca%' OR sDsEmail LIKE '%$busca%' OR sNrCpfCnpj LIKE '%$busca%' OR sDsApelido LIKE '%$busca%'";
}
$clientes = Painel::carregarClientesComFiltro($query);

foreach($clientes as $values) { 

?>

<div class="boxes">
    <div class="boxes-topo">
        <i class="fa fa-user"></i>
    </div>
    <div class="boxes-tipo"><i class="fa fa-pencil"></i><h5>Nome: </h5> <p><?php echo $values['sDsApelido']; ?></p></div>
    <div class="boxes-tipo email"><i class="fa fa-pencil"></i><h5>Email: </h5> <p><?php echo $values['sDsEmail']; ?></p></div>
    <div class="boxes-tipo"><i class="fa fa-pencil"></i> <h5>Tipo: </h5> <p><?php echo  ucfirst($values['sDsTipoDocumento']); ?></p></div>
    <div class="boxes-tipo"><i class="fa fa-pencil"></i><h5>Documento: </h5> <p><?php echo $values['sNrCpfCnpj']; ?></p></div>
    <div class="boxes-btn">
    <a class="btn delete" item_id="<?php echo $values['nCdCliente'] ?>" href="<?php INCLUDE_PATH_PAINEL?>"><i class="fa fa-times"></i>Excluir</a>
    <a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL?>editar-clientes?id=<?php echo $values['nCdCliente']?>"><i class="fa-solid fa-pencil"></i>Editar</a>
    </div><!-- boxes-btn -->
</div><!-- boxes -->

<?php } ?>

</div>
</div>
