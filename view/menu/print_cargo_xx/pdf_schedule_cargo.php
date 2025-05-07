<?php
// https://www.araksa.com/mks/entry/print_cargo/pdf_schedule_cargo.php

//api_hvc_main
ob_end_clean();
require_once('tcpdf/tcpdf.php');

use setasign\Fpdi;

require_once('tcpdf/tcpdf.php');
require_once('fpdi/src/autoload.php');

$no_polis = '01-C-00548-000-07-2023';

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
$pdf->SetTitle('SCHEDULE');
$pdf->SetSubject('Araksa');
$pdf->SetKeywords('Araksa, SCHEDULE');


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
<td></td>
<td></td>
<td width ="173" align="right" >' .$no_polis. '<br></td>  
</tr> 

<tr>
<td></td>
<td align="center" colspan="2"  style="font-size:15px"><b>SCHEDULE <br><i>(IKHTISAR PERTANGGUNGAN)</i></b><br></td>
<td width ="173" style="font-size: 15px;" align="right"><b>'.$orig.'</b></td>
';

$accept .= '
<td></td>
<td></td>
<td></td>
</tr>

<tr>
<td >Policy/Certificate No <br><i>(No. Polis/Sertifikat)</i><br></td>
<td style="width:15" align="right">:</td>
<td >' . $polis_no . '</td>
</tr>

<tr>
<td>Master Policy No.<br>(<i>No. Master Polis</i>)<br></td>
<td style="width:15" align="right">:</td>
<td colspan="2">' . $insured_name . '<br \>' . $code_list . ' ' . $polis_name . '<br></td>
</tr>

<tr>
    <td>Name of the insured<br>(<i>Nama Tertanggung</i>)<br></td>
    <td style="width:15" align="right">:</td>
    <td colspan="2">' . $insured_name . '<br \>' . $code_list . ' ' . $polis_name . '<br></td>
</tr>

<tr>
    <td>Register No.<br>(<i>No. Register</i>)<br></td>
    <td style="width:15" align="right">:</td>
    <td colspan="2">' . $insured_name . '<br \>' . $code_list . ' ' . $polis_name . '<br></td>
</tr>

<tr>
    <td>Reference No. <br>(<i>No. Referensi</i>)<br></td>
    <td style="width:15" align="right">:</td>
    <td colspan="2">' . $insured_name . '<br \>' . $code_list . ' ' . $polis_name . '<br></td>
</tr>

<tr>
    <td>Pos Code<br>(<i>Kode Pos</i>)<br></td>
    <td style="width:15" align="right">:</td>
    <td colspan="2">' . $insured_name . '<br \>' . $code_list . ' ' . $polis_name . '<br></td>
</tr>

<tr>
    <td>Address<br>(<i>Alamat</i>)<br></td>
    <td style="width:15" align="right">:</td>
    <td colspan="2">' . $insured_name . '<br \>' . $code_list . ' ' . $polis_name . '<br></td>
</tr>

<tr>
    <td>Own Risk<br>(<i>Resiko Sendiri</i>)<br></td>
    <td style="width:15" align="right">:</td>
    <td colspan="2">' . $insured_name . '<br \>' . $code_list . ' ' . $polis_name . '<br></td>
</tr>

<tr>
    <td>TOTAL SUM INSURED<br>(<i>Total Harga Pertanggungan</i>)<br></td>
    <td style="width:15" align="right">:</td>
    <td colspan="2">' . $insured_name . '<br \>' . $code_list . ' ' . $polis_name . '<br></td>
</tr>

<tr>
    <td>SAYS<br>(<i>Terbilang</i>)<br></td>
    <td style="width:15" align="right">:</td>
    <td colspan="2"> (RUPIAH : '.$insured_period .')<br>(<i>' . $bulan . ' bulan</i>)</td>
</tr>

</table>';

$pdf->AddPage();
$pdf->writeHTML($accept, true, false, true, false);


// $pdf->Output('htmlout.pdf', 'I');

// $create_date    = DateTime::createFromFormat('U.u', microtime(true));
// $epolhvc_pdf8    = 'accept'.$no_polis.'.pdf';
// $path_epol8      = $_SERVER['DOCUMENT_ROOT'] . 'mks/epol/hvc/pdf/';

//Close and output PDF document
$pdf->Output($path_epol8 . $epolhvc_pdf8, 'I');