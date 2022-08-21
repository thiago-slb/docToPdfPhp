<?php
require_once './vendor/autoload.php';

use \PhpOffice\PhpWord\Settings as Settings;
use \PhpOffice\PhpWord\IOFactory as IOFactory;

function convertDocToPdf($docInputPath, $pdfOutputPath)
{
    try {
        $domPdfPath = './vendor/dompdf/dompdf';
        Settings::setPdfRendererName('DomPDF');
        Settings::setPdfRendererPath($domPdfPath);

        $Content = IOFactory::load($docInputPath);

        $PDFWriter = IOFactory::createWriter($Content, 'PDF');
        $PDFWriter->save($pdfOutputPath);
        return $PDFWriter;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}


convertDocToPdf('./file-sample_100kB.docx', './myPdf.pdf');
