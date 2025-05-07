<?php
// https://www.araksa.com/mks/entry/print_cargo/pdf_spesifikasi_cargo.php

//api_hvc_main
ob_end_clean();
require_once('tcpdf/tcpdf.php');

use setasign\Fpdi;

require_once('tcpdf/tcpdf.php');
require_once('fpdi/src/autoload.php');
include ('print_cargo/API_Cargo.php');

$no_polis = '01-C-00548-000-2023-07';

class Pdf extends Fpdi\Tcpdf\Fpdi
{
    protected $tplId;
    //Page header
    
    public function Header()
    {
        // get the current page break margin
        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // set bacground image
      
        // $img_file = 'image/IT.jpg';
        // $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        $polis = $no_polis;
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        $this->SetFont('courier', '', 8);
        $this->Cell(0, 15, $polis, 0, false, 'R', 0, '', 0, false, 'M', 'M');
        // set the starting point for the page content
        $this->setPageMark();
    }
}


// create new PDF document
$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);

// set document information
// $pdf->SetProtection(array( 'modify','copy','annot-forms','fill-forms','extract','assemble'), 'abc','mks',3);
// $pdf->SetProtection(array('modify', 'copy', 'annot-forms', 'fill-forms', 'extract', 'assemble'), '', 'mks', 3);
$pdf->SetCreator('Araksa');
$pdf->SetAuthor('Araksa');
$pdf->SetTitle('SPECIFICATION');
$pdf->SetSubject('Araksa');
$pdf->SetKeywords('Araksa, SPECIFICATION');


$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 35, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(32);
$pdf->SetFooterMargin(0);

// remove default footer
$pdf->setPrintFooter(false);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('courier', '', 8);

// add a page
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print a table

// add a page
// $pdf->AddPage();

// create some HTML content
// $subtable = '<table border="1" cellspacing="6" cellpadding="4"><td>a</td><td>b</td></tr><tr><td>c</td><td>d</td></table>';
// $subtable2 = '<table border="1" cellspacing="6" cellpadding="4"><td>a</td><td>b</td></table>';

$html= 
'   
    <table border="0" cellspacing="" cellpadding="4">
        <tr>
        <td></td>
        <td></td>
        <td></td>
        <td width ="173" align="right" >' .$no_polis. '<br></td>  
    </tr> 

    <tr>
    <td></td>
    <td align="center" width ="300" style="font-size:15px"><b> SPECIFICATION <br><i>(SPESIFIKASI)</i></b><br></td>
    </tr>
    
    <tr>
    <td align="center" width ="600"><i>Attaching to and forming part of Policy No. : '.$no_polis.' Endorsement No. 00</i>
    <br>
    <i>( Dilekatkan dan merupakan bagian dari Polis No. '.$no_polis.' Endorsemen No. 00) </i></td>
    </tr>

    <tr>
        <td width = "15px" ></td>
        <td></td>
    </tr>';

$html .= '
<table border="1" cellspacing="" cellpadding="4">
<tr> 
    <td colspan ="2" align ="center" width = "30px" height ="40px"><b>No.</b></td>
    <td align ="center" width = "180px"><b>ETD / <i>(Perkiraan Tanggal Keberangkatan)</i>/CONVEYANCE / <i>(Perjalanan)</i> YEAR/GRT/CLASS/CONST<br></b></td>
    <td colspan ="2" align ="center" width = "155px"><b>INTEREST INSURED</b><br><i><b>(Ojek Pertanggungan)</b></i></td>
    <td colspan ="2" align ="center" width = "130px"><b>SUM INSURED (IDR)</b><br><i><b>(Harga Pertanggungan)</b></i></td>
    <td colspan ="2" align ="center" width = "100px"><b>REMARKS</b><br><i><b>(Catatan)</b></i></td>
</tr>

<tr>    
        <td align="center" width = "30px">1</td>
        <td align ="center" width = "180px" height ="240px"> uoudauosbouasbda</td>
        <td align ="center" width = "155px" height ="240px">sdovbaofbasouifbaoidnawiodnasidon</td>
        <td align ="center" width = "130px" height = "240px">oifnasofnweuofnewqofneowfbewojf</td>
</tr>
</table>'; 

$pdf->AddPage();
$pdf->writeHTML($html, true, false, true, false);


// $pdf->Output('htmlout.pdf', 'I');

$create_date    = DateTime::createFromFormat('U.u', microtime(true));
$epolhvc_pdf8    = 'accept'.$no_polis.'.pdf';
$path_epol8      = $_SERVER['DOCUMENT_ROOT'] . 'mks/epol/hvc/pdf/';

//Close and output PDF document
$pdf->Output('I');