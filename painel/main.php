<?php 
if(isset($_GET['logout'])){
    Painel::logout();
    Painel::redirecionar();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php INCLUDE_PATH_PAINEL ?>css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/zebra_datepicker@latest/dist/css/default/zebra_datepicker.min.css">
    <script src="https://kit.fontawesome.com/b534f9c505.js" crossorigin="anonymous"></script>   
    <title>Painel de Controle</title>
</head>
<body>

<base base="<?php echo INCLUDE_PATH_PAINEL?>">
    <div class="menu">
        <div class="boxUsuario">
            <div class="avatarUser">
            <?php
if (!isset($_SESSION['adminImg'])) {
    echo '<i class="fa-solid fa-user fa-lg" style="color: #ffffff;"></i>';
} /* else {
    echo '<div class="avatarUser"> <i> <img src="' . $_SESSION["adminImg"] . '" alt="">  </i>   </div>';
} */
?>

        </div>

        <div class="nomeUser">
        <div class="infoUser"><h3><?php echo $_SESSION['adminName']; ?></h3></div><!-- infoUser -->
        </div><!-- nomeUser -->
        <div class="cargoUser">
        <div class="infoUser"><span><h3><?php echo $_SESSION['adminCargo']; ?></h3></span></div><!-- infoUser -->
        </div><!-- CargoUser -->
        </div><!-- boxUsuario -->


        <div class="itens-menu">
        <!-- Administração Painel -->
        <h2>Administração do Painel</h2>
        <a <?php selecionadoMenu('editar-usuario'); ?> href="<?php INCLUDE_PATH_PAINEL ?>editar-usuario">Editar Usuários</a>
        <a <?php selecionadoMenu('adicionar-usuario'); ?> href="<?php INCLUDE_PATH_PAINEL ?>adicionar-usuario">Adicionar Usuários</a>
        <!-- Administração Painel -->

        <!-- Gestão de clientes -->
        <h2>Gestão de clientes </h2>
        <a <?php selecionadoMenu('cadastrar-clientes'); ?> href="<?php INCLUDE_PATH_PAINEL ?>cadastrar-clientes">Cadastrar Clientes</a>
        <a <?php selecionadoMenu('gerenciar-clientes'); ?> href="<?php INCLUDE_PATH_PAINEL ?>gerenciar-clientes">Gerenciar Clientes</a>
        <a <?php selecionadoMenu('visualizar-chamados'); ?> href="<?php INCLUDE_PATH_PAINEL ?>visualizar-chamados">Visualizar Chamados</a>

        <!-- Controle Estoque  -->

        <h2>Controle Financeiro</h2>
        <a <?php selecionadoMenu('visualizar-pagamentos'); ?> href="<?php INCLUDE_PATH_PAINEL ?>visualizar-pagamentos">Visualizar Pagamentos</a>
        <a <?php selecionadoMenu('visualizar-pedidos'); ?> href="<?php INCLUDE_PATH_PAINEL ?>visualizar-pedidos">Visualizar Pedidos</a>

        <!-- Controle Estoque -->
        <h2>Controle Estoque</h2>
        <a <?php selecionadoMenu('cadastrar-produtos'); ?> href="<?php INCLUDE_PATH_PAINEL ?>cadastrar-produtos">Cadastrar Produtos</a>
        <a <?php selecionadoMenu('listar-produtos'); ?> href="<?php INCLUDE_PATH_PAINEL ?>listar-produtos">Listar Produtos</a>
        <a <?php selecionadoMenu('editar-produtos'); ?> href="<?php INCLUDE_PATH_PAINEL ?>editar-produtos">Editar Produtos</a>
        <a <?php selecionadoMenu('adicionar-descontos'); ?> href="<?php INCLUDE_PATH_PAINEL ?>adicionar-descontos">Adicionar Descontos</a>

        <!-- Serviços  -->
        <h2>Serviços</h2>
        <a <?php selecionadoMenu('agenda-servicos'); ?> href="<?php INCLUDE_PATH_PAINEL ?>agenda-servicos">Agenda de Serviços</a>
        <a <?php selecionadoMenu('cadastrar-servicos'); ?> href="<?php INCLUDE_PATH_PAINEL ?>cadastrar-servicos">Cadastrar Serviço</a>
        <a <?php selecionadoMenu('listar-servicos'); ?> href="<?php INCLUDE_PATH_PAINEL ?>listar-servicos">Listar Serviços</a>
        <a <?php selecionadoMenu('editar-servicos'); ?> href="<?php INCLUDE_PATH_PAINEL ?>editar-servicos">Editar Serviços</a>
        </div><!-- itens menu -->
        
        
        
    </div><!-- menu -->
   
    <header>
    <div class="center">
        <div class="menu-btn">
            <a href="<?php echo INCLUDE_PATH_PAINEL ?>chat-online"><i class="fa-solid fa-comment" id="menuBtn" style="color: #ffffff;"></i></a>
        </div><!-- menu-btn -->
        <div class="home logout">
        <a href="<?php INCLUDE_PATH_PAINEL ?>voltar"><i class="fa-solid fa-house" style="color: #ffffff;"></i></a>
        </div>
        <div class="logout">
            <a href="<?php INCLUDE_PATH_PAINEL ?>?logout"><i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i></a>
        </div><!-- logout -->
      
    </header>
    </div><!-- center -->

    <div class="content"> 
   <?php Painel::carregarPagina(); ?>
    </div><!-- content -->

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/zebra_datepicker@latest/dist/zebra_datepicker.min.js"></script>
<script src="<?php INCLUDE_PATH_PAINEL ?>js/main.js"></script>
<script src="<?php INCLUDE_PATH_PAINEL ?>js/jquery.ajaxform.js"></script>
<script src="<?php INCLUDE_PATH_PAINEL ?>js/jquery.maskMoney.js"></script>
<script src="<?php INCLUDE_PATH_PAINEL ?>js/jquery.mask.js"></script>
<script src="<?php INCLUDE_PATH_PAINEL ?>js/ajax.js"></script>
<script src="<?php INCLUDE_PATH_PAINEL ?>js/helperMask.js"></script>
<script src="<?php INCLUDE_PATH_PAINEL ?>js/constants.js"></script>
<?php Painel::loadJs(array('ajax.js') , ('gerenciar-clientes'))?>
<?php Painel::loadJs(array('ajax.js') , ('cadastrar-clientes'))?>
<?php Painel::loadJs(array('ajax.js') , ('editar-clientes'))?>
<?php Painel::loadJs(array('ajax.js') , ('chat-online'))?>
<?php Painel::loadJs(array('controleFinanceiro.js') , ('editar-clientes'))?>
<?php Painel::loadJs(array('helperMask.js') , ('editar-produtos'))?>
<?php Painel::loadJs(array('jquery.maskMoney.js') , ('editar-produtos'))?>

</body>
</html>

<?php 

     if(Painel::logadoPainel() == true)
     {
         
     }
     else{
         header('Location: ', INCLUDE_PATH_PAINEL);
         die();
     }
?>