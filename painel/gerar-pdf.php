<?php 


use Mpdf\Mpdf;

ob_start();
include('template-financeiro.php');
$conteudo = ob_get_contents();
ob_end_clean();

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => 'A4', // Formato do papel (tamanho padrão A4)
    'orientation' => 'P', // Orientação da página (P = Retrato, L = Paisagem)
    'default_font_size' => 0,
    'margin_left' => 10,
    'margin_right' => 10,
    'margin_top' => 10,
    'margin_bottom' => 10,
]);
$mpdf->WriteHTML($conteudo);
$mpdf->Output();

?>