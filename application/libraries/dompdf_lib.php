<?php 
require_once APPPATH.'libraries/dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();
use Dompdf\Dompdf;

class Dompdf_lib {
	function renderPdf($template, $typepaper = 'potrait')
	{
	    $pdf = new Dompdf(['isHtml5ParserEnabled' => true]);

	    $pdf->set_paper('A4',$typepaper);
	    $pdf->load_html($template);
	    $pdf->render();
	    return $pdf->output();
	}

	function renderPdfAttachment($template, $typepaper = 'potrait')
	{
	    $pdf = new Dompdf(['isHtml5ParserEnabled' => true]);

	    $pdf->set_paper('A4', $typepaper);
	    $pdf->load_html($template);
	    $pdf->render();
	    return $pdf->stream("invoice.pdf",array("Attachment" => false));
	}

	function renderPdfDownload($template, $typepaper = 'potrait', $paper = 'A4')
	{
	    $pdf = new Dompdf(['isHtml5ParserEnabled' => true]);
	    $pdf->set_paper($paper, $typepaper);
	    $pdf->load_html($template);
	    $pdf->render();
	    return $pdf->stream();
	}
}

?>