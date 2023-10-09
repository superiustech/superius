<!DOCTYPE html>
<html>
<head>
	<title>Loja Virtual</title>
	<meta charset="viewport" content="width=device-width;initial-scale=1.0;maximum-scale=1.0">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH ?>css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH ?>css/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/zebra_datepicker@latest/dist/css/default/zebra_datepicker.min.css">
    <script src="https://kit.fontawesome.com/b534f9c505.js" crossorigin="anonymous"></script>  
</head>
<body>
<header>
    <div class="logo"><img src="  uploads/logoazul-sf.png" alt=""></div>
    <nav>
        <a href="<?php echo INCLUDE_PATH ?>">Home</a>
        <a href="<?php echo INCLUDE_PATH ?>home">Loja</a>
        <a href="<?php INCLUDE_PATH ?>servicos">Serviços</a>
        <a href="<?php INCLUDE_PATH ?>contato">Contato</a>
    </nav>
    <div class="end-header">
      <i class="fa fa-user"><a href="<?php $_SESSION['nome'] ?? INCLUDE_PATH ?>login"><?php echo $_SESSION['nome'] ?? 'usuario';?></a></i>
      <i class="fa fa-bag-shopping"><a href="<?php echo INCLUDE_PATH ?>finalizar">finalizar</a></i>
      <a href="javascript:void(0)"><i class="fa fa-cart-shopping"><span><?php echo homeModel::retornaTotalCarrinho() ?></span></i></a>
      
    </div>
 </header>

