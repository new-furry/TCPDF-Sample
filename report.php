<?php
//include library
include('library/tcpdf.php');

//make TCPDF object
$pdf = new TCPDF('p', 'mm', 'A4'); // options for pdf generating

//remove default header and footer
$pdf -> setPrintHeader(false);
$pdf -> setPrintFooter(false);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

$pdf->SetFont('helvetica', '', 9);

//add page
$pdf -> Addpage();

$html = '<html>
<head></head>
<body><table border="1">
<tr><th>name</th>
<th>test</th></tr>
<tr>
<td>hello</td>
<td>test</td>
</tr>
</table>
</body>
</html>';

$download = 0;

pdfGenerate($pdf, $html, $download);

function pdfGenerate($pdf, $html, $download) {
	if ($download != 0) {
		$pdf->writeHTML($html, true, 0, true, 0);
		$pdf->Output('htmlout.pdf', 'I');
	}
	else {
		$pdf->writeHTML($html, true, 0, true, 0);
		$pdf->Output("down.pdf",'D');
	}
}

?>