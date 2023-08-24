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
  <div class="container">
    <div class="logo"><img src="uploads/logobranca-sf.png" alt=""></div>
    
	  <a href="<?php echo INCLUDE_PATH ?>"><i class="fa-solid fa-house" style="color: #ffffff;"></i></a>

    <div class="finalizar-carrinho">
      <a href="<?php INCLUDE_PATH ?>finalizar"><i class="fa-solid fa-bag-shopping" style="color: #ffffff;"></i></a>
      <a href="javascript:void(0)"><i class="fa-solid fa-truck" style="color: #ffffff;"></i>(<?php echo homeModel::retornaTotalCarrinho() ?>)</a>
    </div>
  </div>
</header>

