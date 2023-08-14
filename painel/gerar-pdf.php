<?php 

ob_start();
include('template-financeiro.php');
$conteudo = ob_get_contents();
ob_end_clean();

include('../arquivos/mpdf60/mpdf.php');


?>