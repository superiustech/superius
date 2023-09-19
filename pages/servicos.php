<?php $serv = servicosModel::retornaTodosServicos();
      $servId = servicosModel::retornaTodosServicosPorId(1);
?>

<div class="content-servicos">
<div class="date-form">
    <div class="box-topo">
        <div class="img"></div>
    </div>
    <div class="opcoes-servicos">
        <select name="servicos" id="servicos">
            <option value="" disabled></option>
            <?php foreach($serv as $servicos){?>
                    <option value="<?php echo $servicos['nCdServico']; ?>" id="opt"><?php echo $servicos['sDsNome'];?></option>
               <?php }?>
        </select>
        <input type="button" name="selecionar" id="selecionar" onclick="selecionar();" value="Atualizar">
    </div>
    <div class="info-produto">

    <label>Descrição: </label><span><?php echo $servId['sDsServico']?></span><br>
    <label>Preço: R$ </label><span><?php echo $servId['sDsPreco']?></span><br>
    <label>Categoria: </label><span><?php echo $servId['sNmCategoria']?></span><br>


    </div>
</div>
<div class="conclude">

</div>
</div><!-- content-servicos -->

<script>
// var selecionarOpt = document.getElementById("selecionar");
//FAZER AJAX

function selecionar(){
    var opt = document.getElementById("opt").value;
    console.log(opt);
}

</script>