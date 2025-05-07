<?php
// https://www.araksa.com/mks/entry/print_cargo/pdf_klausula_cargo.php

//api_hvc_main
ob_end_clean();
require_once('tcpdf/tcpdf.php');

use setasign\Fpdi;

require_once('tcpdf/tcpdf.php');
require_once('fpdi/src/autoload.php');
//include "API_Cargo_baru.php";
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
$pdf->SetTitle('ACCEPTANCE OF POLICY');
$pdf->SetSubject('Araksa');
$pdf->SetKeywords('Araksa, ACCEPTANCE OF POLICY');


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
$subtable = '<table border="1" cellspacing="6" cellpadding="4"><td>a</td><td>b</td></tr><tr><td>c</td><td>d</td></table>';
$subtable2 = '<table border="1" cellspacing="6" cellpadding="4"><td>a</td><td>b</td></table>';


$accept = '<table border="" cellspacing="" cellpadding="" >           

<tr>
    <td></td>
    <td align="center" colspan="2"  style="font-size:15px"><b>CLAUSES<br><i>(KLAUSULA)</i></b><br></td>
    <td width ="173" style="font-size: 15px;" align="right"></td>
</tr>

<tr>
<td colspan = "3"> We hereby confirm acceptance of the Policy below :<br><i>(Dengan ini Kami memberikan persetujuan Polis di bawah ini): </i></td>
<td></td>
<td></td>
</tr>
<br> 
<tr>';
$accept .= '
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<td >Policy No.<br>(No.Polis)<br></td>
<td style="width:15" align="right">:</td>
<td >' . $polis_no . '</td>

</tr>
<tr>
<td>Name of the Insured<br>(<i>Nama Tertanggung</i>)<br></td>
<td style="width:15" align="right">:</td>
<td colspan="2">' . $klausula_indo . '<br \>' . $code_list . ' ' . $polis_name . '<br></td>
</tr>
<tr>
<td>Estimated Departure Date<br>(<i>Perkiraan Tanggal Keberangkatan</i>)<br></td>
<td style="width:15" align="right">:</td>
<td colspan="2">' . $insured_period . ' (' . $terbilang . ') months <br>(<i>' . $bulan . ' bulan</i>)</td>
</tr>
<tr>
<td style="width:150" >SPE-5902 / - /SPE-5902 / MARTIN / NAJIBAH<br>FOOD / FOOD - CCF9BD865487654</td>
<td style="width:15" align="right"></td>
</tr>

<tr>
<td width="285">' . $footer . '</td>
<td style="width:55%; text-align:right;">' . $sign_explode[0] . ',' . date("j F Y", strtotime($sign_explode[1])) . '</td>
</tr>
<tr>

<tr>
<td>' . $footer2 . '</td>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td style="width:76%;"></td>
<td style="text-align:center;width:24%;"><u> Doni Yuska </u><br>Authorized Signature<br>(<i>Penanggung</i>)</td>
</tr>
</table>';

$pdf->AddPage();
$pdf->writeHTML($accept, true, false, true, false);


$file_name_pdf = "klausla.pdf";
// $pdf->Output(  $_SERVER['DOCUMENT_ROOT'] . "mks/entry/print_cargo/mix_all_Cargo/" . $file_name_pdf ,'F');

$pdf->Output(  $_SERVER['DOCUMENT_ROOT'] . "/mks/entry/print_cargo/mix_all_Cargo/" . $file_name_pdf ,'F');
// unlink($_SERVER['DOCUMENT_ROOT'] . "mks/entry/print_cargo/mix_all_cargo/" . $file_name_pdf);
//echo json_encode("https://www.araksa.com/mks/entry/print_cargo/mix_all_Cargo/".$file_name_pdf);
