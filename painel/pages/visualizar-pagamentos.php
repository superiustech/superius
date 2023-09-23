<div class="box-content w100">

<div class="title-content">
    <i class="fa-solid fa-pencil" style="color: #1f71ff;"></i>
    <h3>Filtros - <?php echo NOME_EMPRESA ?></h3> 
</div>

<?php 
$query = "";
if(isset($_POST['acao']) && $_POST['acao'] == "Buscar"){
    $busca = $_POST['busca'];
    $query = "WHERE sNmCliente LIKE '%$busca%'";

}

$pendentes = Painel::retornaTodoFinanceiroSemStatus($query);

if(isset($_GET['agenda']) && isset($_GET['servico'])){
    $agenda_id = $_GET['agenda'];
    $servico_id = $_GET['servico'];
    Painel::atualizaStatusServicoAgenda(2 ,$_SESSION['nCdUsuario'] , $agenda_id );
    Painel::atualizaStatusServicoRealizar(2 , $agenda_id );
}

if(isset($_GET['deletar']) && isset($_GET['servico'])){
    $agenda_id = $_GET['deletar'];
    $servico_id = $_GET['servico'];
    Painel::deletaAgendarServico($agenda_id);
}

?>

<form method="post">
<div class="form-group">
        <input type="text" name="busca" placeholder="Procure por: nome, id.">
    </div>
    <div class="form-group">
    <input type="submit" name="acao" value="Buscar">
    <div class="linhas-retornadas"><p>Foram encontrados<b> <?php echo count($pendentes) ?> pagamento(s).</b></p></div>
    </div>
    </form>


</div>

<div class="box-content w100">

<div class="title-content">
    <i class="fa-solid fa-pencil" style="color: #1f71ff;"></i>
    <h3>Pagamentos pendentes - <?php echo NOME_EMPRESA ?></h3> 
</div>

<div class="gerar-pdf" style="margin: 20px 20px;"><a target="blank" class="btn pdf" href="<?php echo INCLUDE_PATH_PAINEL ?>gerar-pdf.php?pagamentos=pendentes"pa><i class="fa fa-envelope"></i>  Gerar PDF</a></div>



<div class="wrapper">
    <table class="table-header">
        <tr>
            <td>Nome do Serviço</td>
            <td>Cliente</td>
            <td>Valor</td>
            <td>Data serviço</td>
            <td>Rejeitar serviço</td>
            <td>Aceitar serviço</td>
        </tr>
    </table>
</div>

<?php 


$query = "";
    if(isset($_POST['acao']) && $_POST['acao'] == "Buscar"){
        $busca = $_POST['busca'];
        $query = "WHERE sNmCliente LIKE '%$busca%'";

    }

$status = 0;
$pendentes = Painel::retornaAgendaServicoId($query, 1 , $_SESSION['nCdUsuario']);

foreach ($pendentes as $value) {    
$style = "";
if(strtotime(date('Y-m-d')) >= strtotime($value['tDtServico'])){
    $style = 'style="background-color: #ff2b2b;"';
} ?>
<div class="wrapper">
    <table>
        <tr <?php echo $style;?>>
            <td> <?php echo $value['sDsNome']; ?></td>
            <td><?php echo $value['sNmCliente']; ?></td>
            <td><?php echo $value['sDsPreco']; ?></td>
            <td><?php echo date('d/m/Y',strtotime($value['tDtServico'])); ?></td>
            <td><a style="background-color: orange;" class="btn"   href="<?php echo INCLUDE_PATH_PAINEL?>visualizar-pagamentos?servico=<?php echo $value['nCdServico']?> &deletar=<?php echo $value['nCdAgendaServico']?>"><i class="fa fa-times"></i> Cancelar </a></td>
            <td><a style="background-color: #00bfa5;" class="btn"   href="<?php echo INCLUDE_PATH_PAINEL?>visualizar-pagamentos?servico=<?php echo $value['nCdServico']?> &agenda=<?php echo $value['nCdAgendaServico']?>"><i class="fa-solid fa-check"></i> Pago </a></td>
        </tr>
    </table>
</div>

<?php } ?> 

</div>

<div class="box-content w100">

<div class="title-content">
    <i class="fa-solid fa-pencil" style="color: #1f71ff;"></i>
    <h3>Pagamentos concluidos - <?php echo NOME_EMPRESA ?></h3> 
</div>
<div class="gerar-pdf" style="margin: 20px 20px;"><a target="blank" class="btn pdf" href="<?php echo INCLUDE_PATH_PAINEL ?>gerar-pdf.php?pagamentos=concluidos"><i class="fa fa-envelope"></i>  Gerar PDF</a></div>


<div class="wrapper">
    <table class="table-header">
        <tr>
            <td>Nome do Serviço</td>
            <td>Cliente</td>
            <td>Valor</td>
            <td>Data serviço</td>
            <td>Rejeitar serviço</td>
            <td>Aceitar serviço</td>
        </tr>
    </table>
</div>
<?php 

$status = 2;
$concluidos = Painel::retornaAgendaServicoId($query, $status , $_SESSION['nCdUsuario']);
foreach ($concluidos as $value) {    
if(strtotime(date('Y-m-d')) >= strtotime($value['tDtServico'])){
    $style = 'style="background-color: #ff2b2b;"';
} ?>

<div class="wrapper">
    <table>
        <tr>
            <td> <?php echo $value['sDsNome']; ?></td>
            <td><?php echo $value['sNmCliente']; ?></td>
            <td><?php echo $value['sDsPreco']; ?></td>
            <td><?php echo date('d/m/Y',strtotime($value['tDtServico'])); ?></td>
            <td><a style="background-color: orange;" class="btn"   href="<?php echo INCLUDE_PATH_PAINEL?>visualizar-pagamentos?servico=<?php echo $value['nCdServico']?> &deletar=<?php echo $value['nCdAgendaServico']?>"><i class="fa fa-times"></i> Cancelar </a></td>
            <td><a style="background-color: #00bfa5;" class="btn"   href="<?php echo INCLUDE_PATH_PAINEL?>visualizar-pagamentos?servico=<?php echo $value['nCdServico']?> &agenda=<?php echo $value['nCdAgendaServico']?>"><i class="fa-solid fa-check"></i> Pago </a></td>
    </table>
</div>

<?php } ?> 

</div>

</div>


</div>

