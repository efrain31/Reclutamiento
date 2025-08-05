<?php

use Dompdf\Dompdf;

function generar_pdf($html, $filename = 'documento.pdf')
{
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream($filename, ["Attachment" => true]);
}