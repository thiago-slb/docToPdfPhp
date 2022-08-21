<?php
require_once './vendor/autoload.php';

use PhpOffice\PhpWord\Settings as PhpOfficeWordSettings;

function convertDocToPdf($docInputPath, $pdfOutputPath)
{
    try {
        $domPdfPath = './vendor/dompdf/dompdf';
        PhpOfficeWordSettings::setPdfRendererName('DomPDF');
        PhpOfficeWordSettings::setPdfRendererPath($domPdfPath);

        $Content = \PhpOffice\PhpWord\IOFactory::load($docInputPath);

        $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content, 'PDF');
        $PDFWriter->save($pdfOutputPath);
        return $PDFWriter;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}


convertDocToPdf('./file-sample_100kB.docx', './myPdf.pdf');
