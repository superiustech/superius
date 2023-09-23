<?php 
include('..\arquivos\includeConstants.php');
?>


<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,300;1,700&display=swap');
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: montserrat;
}
h3{
    background-color: #333;
    color: white;
    padding: 10px;
    width: 900px;
    margin: 0 auto;
    text-align: center;
}
.wrapper
{
    border: 1px solid black;
    width: 900px;
    margin: 0 auto;
}
.table-header{
font-weight: bold;
}
tr{
    
    width: 900px;
    display: flex;
    justify-content: space-between;
}
td{
    font-size: 50px;
    padding: 5px;
    margin-left: 20px;
    /* border-right: 1px solid black; */
    width: 800px;

}

</style>


<?php $nome = (isset($_GET['pagamentos']) && $_GET['pagamentos'] == 'concluidos') ? "Concluidos" : "Pendentes";

?>

<div class="title-content">
    <i class="fa-solid fa-pencil" style="color: #1f71ff;"></i>
    <h3>Pagamentos <?php echo $nome ?> - <?php echo NOME_EMPRESA ?></h3> 
</div>

<div class="wrapper">
    <table class="table-header">
        <tr>
            <td>Nome do pagamento</td>
            <td>Cliente</td>
            <td>Valor</td>
            <td>Vencimento</td>
        </tr>
    </table>
</div>


<?php 

$query="";

if ($nome == "Pendentes")
    $status = 1;
else
    $status = 2;
    
$pendentes = Painel::retornaAgendaServicoTMP($query, $status , $_SESSION['nCdUsuario']);
foreach ($pendentes as $value) {    
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
         </tr>
    </table>
</div>

<?php } ?> 

</div>

</div>