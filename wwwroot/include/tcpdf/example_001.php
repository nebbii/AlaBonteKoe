<?php
require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false, false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Uitgaanscentrum de Bonte Koe');
$pdf->SetTitle('E-Ticket');
$pdf->SetSubject('Bioscoop ticket');
$pdf->SetKeywords('De Bonte Koe, Uitgaan, Bioscoop, ticket');


$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, 
					PDF_HEADER_STRING, array(255,165,0), array(0,0,255));
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

$pdf->setFooterData(array(255,165,0), array(0,0,255));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);


$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// ---------------------------------------------------------

$pdf->setFontSubsetting(true);
$pdf->SetFont('dejavusans', '', 11, '', true);

$pdf->AddPage();

$html = <<<EOD
<br /><h1>E-ticket</h1>
<p> Dank voor uw reservering bij uitgaanscentrum de bonte koe.</p>
<p style="font-style:italic;background-color:#CC0000;color:white;text-align:center;">
Print dit ticket uit en neem deze mee bij uw bioscoopbezoek!</p> 
EOD;
$pdf->writeHTMLCell(0, 0, '', '40', $html, array('LTRB' => array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0))), 1, 0, true, '', true);

$pdf->Image('../../images/bioscoopzaal.jpg', '', '100', 100, 50, '', '', 'T', false, 300, 'C', false, false, 1, false, false, false);
// ---------------------------------------------------------

$pdf->Output('tickets.pdf', 'I');

?>