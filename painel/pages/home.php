<?php

$usuariosOnline = Painel::listarUsuariosOnline();
$vistasSite = Painel::mostrarVisitas();
$vistasHoje = Painel::mostrarVisitasHoje();
?>
<div class="box-content left w100">
        <div class="title-content">
        <i class="fa-solid fa-house" style="color: #1f71ff;"></i>
        <h3>Painel de Controle - <?php echo NOME_EMPRESA ?></h3> 
        </div>
        <div class="center">
            <div class="onlineUsuario boxItem"><h4>Usuários Online</h4> <p><?php echo count($usuariosOnline); ?></p> </div>
            <div class="totalVisitas boxItem"><h4>Total de Visitas</h4> <p><?php echo count($vistasSite);?></p></div>
            <div class="visitasHoje boxItem"><h4>Visitas Hoje</h4>      <p><?php echo count($vistasHoje);?></p></div>
        </div>
    </div>
<div class="box-content left w100">
<div class="title-content">
<i class="fa-solid fa-rocket" style="color: #1f71ff;"></i>
        <h3>Usuários Online - <?php echo NOME_EMPRESA ?></h3> 
        </div>
        <div class="center tabela-responsiva">
            <div class="row">
                <div class="col">
                    <span>IP</span>
                </div>
                <div class="col"><span>Ultima Ação</span></div>
                <div class="clear"></div>
            </div>

            <?php
            
            if($usuariosOnline == null){
                Echo '<div class="boxItem totalVisitas"> Não existe usuários online. </div>';
            }
            else{
            foreach ($usuariosOnline as $key => $value) {
                
            }
            ?>

            <div class="row">
                <div class="col">
                    <span><?php echo $value['sNmIpUsuario'] ?></span>
                </div>
                <div class="col"> <span><?php echo $value['tDtUltimaAcao'] ?></span> </div> 
                <div class="clear"></div>
            </div>

            <?php }?>
           
           

        </div>
    </div>

    <div class="box-content left w100">
<div class="title-content">
<i class="fa-solid fa-rocket" style="color: #1f71ff;"></i>
        <h3>Usuários Cadastrados - <?php echo NOME_EMPRESA ?></h3> 
        </div>
        <div class="center tabela-responsiva">
            <div class="row">
                <div class="col"><span>Nome</span></div>
                <div class="col"><span>Cargo</span></div>
                <div class="clear"></div>
            </div>

            <?php

            $usuarios = Painel::carregarUsuarios();
            foreach($usuarios as $value){

            ?>

            <div class="row">
                <div class="col"><span><?php echo $value['nNmPessoal'] ?></span></div>
                <div class="col"> <span><?php echo Painel::pegaCargo($value['sNmUsuario']); ?></span> </div> 
            </div>

            
            <?php } ?>
           

        </div>
    </div>
</div>

    <!-- <div class="box-content left w100"></div>
    <div class="box-content left w80"></div>
    <div class="box-content left w80"></div> -->