<?php

include('../config.php');

/* MUDAR ISSO ABAIXO */
 
if(Painel::logado() == false)
    include('login.php');
else
    include('main.php');

?>

