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


<?php     if (isset($_GET['pago'])){
        $nCdControleFinanceiro = $_GET['pago'];
        // $dataAtual = date("Y-m-d");
        if (Painel::atualizarStatusFinanceiro($nCdControleFinanceiro) == true){
            Painel::alert('sucesso', ' O pagamento foi quitado com sucesso!');
        }else{
            Painel::alert('erro', 'Houve algum erro no processamento!');
        }
    }
    
?>
<div class="gerar-pdf" style="margin: 20px 20px;"><a target="blank" class="btn pdf" href="<?php echo INCLUDE_PATH_PAINEL ?>gerar-pdf.php?pagamentos=pendentes"pa><i class="fa fa-envelope"></i>  Gerar PDF</a></div>


<div class="wrapper">
    <table class="table-header">
        <tr>
            <td>Nome do pagamento</td>
            <td>Cliente</td>
            <td>Valor</td>
            <td>Venciemento</td>
            <td>Enviar e-mail</td>
            <td>Marcar como pago</td>
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
$pendentes = Painel::retornaTodoFinanceiro($status,$query);

foreach ($pendentes as $value) {    
$style = "";
if(strtotime(date('Y-m-d')) >= strtotime($value['tDtVencimento'])){
    $style = 'style="background-color: #ff2b2b;"';
} ?>

<div class="wrapper">
    <table>
        <tr <?php echo $style;?>>
            <td> <?php echo $value['sNmControle']; ?></td>
            <td><?php echo $value['sDsApelido']; ?></td>
            <td><?php echo $value['sDsValor']; ?></td>
            <td><?php echo date('d/m/Y',strtotime($value['tDtVencimento'])); ?></td>
            <td><a style="background-color: orange;" class="btn"   href="<?php echo INCLUDE_PATH_PAINEL?>"><i class="fa fa-envelope"></i> E-mail</a></td>
            <td><a style="background-color: #00bfa5;" class="btn"   href="<?php echo INCLUDE_PATH_PAINEL?>visualizar-pagamentos?id=<?php echo $value['nCdCliente']?> &pago=<?php echo $value['nCdControleFinanceiro']?>"><i class="fa-solid fa-check"></i> Pago</a></td>
        </tr>
    </table>
</div>

<?php } ?> 

</div>

<div class="box-content w100">

<div class="title-content">
    <i class="fa-solid fa-pencil" style="color: #1f71ff;"></i>
    <h3>Pagamentos pendentes - <?php echo NOME_EMPRESA ?></h3> 
</div>
<div class="gerar-pdf" style="margin: 20px 20px;"><a target="blank" class="btn pdf" href="<?php echo INCLUDE_PATH_PAINEL ?>gerar-pdf.php?pagamentos=concluidos"><i class="fa fa-envelope"></i>  Gerar PDF</a></div>

<div class="wrapper">
    <table class="table-header">
        <tr>
            <td>Nome do pagamento</td>
            <td>Cliente</td>
            <td>Valor</td>
            <td>Venciemento</td>
        </tr>
    </table>
</div>

<?php 

$status = 1;
$pendentes = Painel::retornaTodoFinanceiro($status,$query);
foreach ($pendentes as $value) {    
if(strtotime(date('Y-m-d')) >= strtotime($value['tDtVencimento'])){
    $style = 'style="background-color: #ff2b2b;"';
} ?>

<div class="wrapper">
    <table>
        <tr>
            <td> <?php echo $value['sNmControle']; ?></td>
            <td><?php echo $value['sDsApelido']; ?></td>
            <td><?php echo $value['sDsValor']; ?></td>
            <td><?php echo date('d/m/Y',strtotime($value['tDtVencimento'])); ?></td>
         </tr>
    </table>
</div>

<?php } ?> 

</div>

</div>


</div>

