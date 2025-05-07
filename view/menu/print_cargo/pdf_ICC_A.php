<?php
//https://www.araksa.com/mks/entry/print_cargo/pdf_ICC_A.php

//api_hvc_main
ob_end_clean();
require_once('tcpdf/tcpdf.php');

use setasign\Fpdi;

require_once('tcpdf/tcpdf.php');
require_once('fpdi/src/autoload.php');

$no_polis = '07-M-00248-000-2023-08';

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
<td align="center" colspan="2"  style="font-size:15px"><b> INSTITUTE CARGO CLAUSES (A) 1.1.82 </b><br></td>
<td width ="173" style="font-size: 15px;" align="right"><b>'.$orig.'</b></td>
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
<td colspan="2">' . $insured_name . '<br \>' . $code_list . ' ' . $polis_name . '<br></td>
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
}
$data_api_klausula = array(
"input_policy_no"     => $no_polis
);

$web_url = curl_init('https://raksa-service.com/mks_work_to_b/index.php/ch_api_policy_mst/policy_clauses_bilingual');

curl_setopt($web_url, CURLOPT_CUSTOMREQUEST , "POST");
curl_setopt($web_url, CURLOPT_POSTFIELDS    , $data_api_klausula);
curl_setopt($web_url, CURLOPT_RETURNTRANSFER, true);
curl_setopt($web_url, CURLOPT_SSL_VERIFYPEER, false);

$result_unit  = curl_exec($web_url);
$info_unit    = curl_getinfo($web_url);
curl_close($web_url);
$data_unit_klausula  = json_decode($result_unit);
//   print_r($data_unit_klausula);

foreach($data_unit_klausula->code as $nopol_cargo)
{
    $clause_code      = $nopol_cargo->CLAUSE_CODE;
    // print_r($clause_code);
    if($clause_code  == 'CL 252')
    {
        $cl252 .=
        '
        <table border="" cellspacing="" cellpadding="" >
        <tr>
            <td>SAYS<br>(<i>Terbilang</i>)<br></td>
            <td style="width:35" align="right">:</td>
            <td style="width:400" colspan="4">(RUPIAH : '.$duit_dalam.')<br>(<i>' . $duit_luar . '</i>)</td>
        </tr>
        </table>';
        $pdf->AddPage();
        $pdf->writeHTML($cl252, true, false, true, false);
    }
}
$pdf->AddPage();
$pdf->writeHTML($accept, true, false, true, false);


// $pdf->Output('htmlout.pdf', 'I');

$create_date    = DateTime::createFromFormat('U.u', microtime(true));
$epolhvc_pdf8    = 'accept'.$no_polis.'.pdf';
$path_epol8      = $_SERVER['DOCUMENT_ROOT'] . 'mks/epol/hvc/pdf/';

//Close and output PDF document
$pdf->Output('I');