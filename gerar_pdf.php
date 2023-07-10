<?php
require_once 'vendor/autoload.php';

use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;

//if ($_FILES) {
 //  if (move_uploaded_file($_FILES['arquivo']['tmp_name'],'imagens/'.$_FILES['arquivo']['name'])) {
    # code...
  // }
//}
// Referenciar o namespace Dompdf


Settings::setPdfRendererPath('vendor/dompdf/dompdf');

$phpWord = IOFactory::load('imagens/Testando1.docx');
$phpWord->save('imagens/img.pdf', 'PDF');

























// Instanciar e usar a classe dompdf
$dompdf = new Dompdf(['enable_remote' => true]);

$dados = "<h1>Celke - Gerar PDF com PHP</h1>";

$dados .= "<img src='http://localhost/teste/imagens/Testando1.docx'>";

// Instanciar o metodo loadHtml e enviar o conteudo do PDF
$dompdf->loadHtml($dados);

// Configurar o tamanho e a orientacao do papel
// landscape - Imprimir no formato paisagem
//$dompdf->setPaper('A4', 'landscape');
// portrait - Imprimir no formato retrato
$dompdf->setPaper('A4', 'portrait');

// Renderizar o HTML como PDF
$dompdf->render();

// Gerar o PDF
$dompdf->stream();