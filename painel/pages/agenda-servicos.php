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

if(isset($_GET['agenda']) && isset($_GET['servico'])){
    $agenda_id = $_GET['agenda'];
    $servico_id = $_GET['servico'];
    $sucesso = true;
    $servicoAgenda = Painel::retornaAgendaServicoPorId($agenda_id);
    if( $sucesso == true){
        //inserido com sucesso!

        $sucesso = true;

        if(Painel::verificaAgenda($agenda_id) == false){
            // já existe , não inserir
            Painel::atualizaStatusServicoAgenda(1 , $_SESSION['nCdUsuario'] , $agenda_id);
            Painel::aceitaServico($agenda_id, $servico_id, $_SESSION['nCdUsuario']) ;
            if($sucesso){ 
                
                painel::alert('sucesso' , "O serviço foi aceito com sucesso!");
                }
                else{
                Painel::alert('erro', "Ocorreram erros no processamento, contacte um administrador.");
                }
        }else{
                Painel::alert('atencao' , 'Serviço já agendado!');
        }
    }
}
$pendentes = Painel::retornaAgendaServico($query , 0 ,$_SESSION['nCdUsuario']);

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
    <h3>Serviç pendentes - <?php echo NOME_EMPRESA ?></h3> 
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
$pendentes = Painel::retornaAgendaServico($query, $status);

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
            <td><a style="background-color: orange;" class="btn"   href="<?php echo INCLUDE_PATH_PAINEL?>"><i class="fa fa-envelope"></i> Rejeitar</a></td>
            <td><a style="background-color: #00bfa5;" class="btn"   href="<?php echo INCLUDE_PATH_PAINEL?>agenda-servicos?servico=<?php echo $value['nCdServico']?> &agenda=<?php echo $value['nCdAgendaServico']?>"><i class="fa-solid fa-check"></i> Aceitar</a></td>
        </tr>
    </table>
</div>

<?php } ?> 

</div>



</div>

