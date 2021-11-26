<?php
tcpdf();
$your_width=400;
$your_height=400;
$custom_layout = array($your_width, $your_height);
$obj_pdf = new TCPDF('P', PDF_UNIT,$custom_layout, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "Cv Builder details";
$obj_pdf->SetTitle($title);
// $width = 175;  
// $height = 266; 
// $orientation = ($height>$width) ? 'P' : 'L';  
// $obj_pdf->addFormat("custom", $width, $height);  
// $obj_pdf->reFormat("custom", $orientation); 
// $obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '',9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();
ob_start();
    // we can have any view part here like HTML, PHP etc
$this->load->view($view_name);
    $content = ob_get_contents();
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$pdf_name="Cv_bulder_details".'.'.'pdf';
if(!empty($print))
{
	$obj_pdf->Output($pdf_name, 'D');
}else{
$obj_pdf->Output($pdf_name, 'D');
}
?>
