<?php

function pdfwriter(){
    return 'test';
}

use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;
function download(){
    
    require_once('fpdf182/fpdf.php');
    require_once('FPDI-2.3.6/src/autoload.php');

    $pdf = new Fpdi();
    $pdf->AddPage();
    $pdf->setSourceFile('pdf.pdf');
    $pageId = $pdf->importPage(1, PdfReader\PageBoundaries::MEDIA_BOX);

    $pdf->addPage();
    $pdf->useImportedPage($pageId, 10, 10, 90);

    ob_start();
    $pdf->Output('I', 'generated.pdf');
    ob_end_flush();
    return '<p>all went well</p>';
}

?>