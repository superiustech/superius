<?php

include('../config.php');

/* MUDAR ISSO ABAIXO */
 
if(Painel::logadoPainel() == false)
    include('login.php');
else
    include('main.php');

?>

