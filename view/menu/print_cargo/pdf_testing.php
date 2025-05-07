<?php

//api_hvc_main
ob_end_clean();
require_once('tcpdf/tcpdf.php');

use setasign\Fpdi;

require_once('tcpdf/tcpdf.php');
require_once('fpdi/src/autoload.php');
class Pdf extends Fpdi\Tcpdf\Fpdi
{
    
    public $no_polis;
    public $branch;

    protected $tplId;
    //Page header
    
    public function Header()
    {
        global $no_polis;
        global $branch;

        // get the current page break margin
        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // set bacground image
      
        // $img_file = 'image/IT.jpg';
        // $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        $polis = $polis_no;
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        $this->SetFont('courier', '', 8);
        $this->MultiCell(55, 100, $no_polis, 0, 'R', 0, 0, '144', '37', false);
        // $this->Cell(0, 15, $polis, 0, false, 'R', 0, '', 0, false, 'M', 'M');
        // set the starting point for the page content
        $this->setPageMark();
    }
}
$no_polis = "01-C-00026-000-07-2023";

// create new PDF document
$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);

// set document information
// $pdf->SetProtection(array( 'modify','copy','annot-forms','fill-forms','extract','assemble'), 'abc','mks',3);
// $pdf->SetProtection(array('modify', 'copy', 'annot-forms', 'fill-forms', 'extract', 'assemble'), '', 'mks', 3);
$pdf->SetCreator('Araksa');
$pdf->SetAuthor('Araksa');
$pdf->SetTitle('HVC');
$pdf->SetSubject('Araksa');
$pdf->SetKeywords('Araksa, HVC');


$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 47, PDF_MARGIN_RIGHT);
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
$subtable = '<table border="1" cellspacing="6" cellpadding="4"><tr><td>a</td><td>b</td></tr><tr><td>c</td><td>d</td></tr></table>';
$subtable2 = '<table border="1" cellspacing="6" cellpadding="4"><tr><td>a</td><td>b</td></tr></table>';


$setuju = '<table border="" cellspacing="" cellpadding="" >           
<tr>
<td></td>
<td></td>
<td></td>
<td width ="173" align="right" ></td>  
</tr> 

<tr>
<td></td>
<td align="center" colspan="2"  style="font-size:15px"><b>ACCEPTANCE OF POLICY <br><i>(PERSETUJUAN POLIS)</i></b><br></td>
<td width ="173" style="font-size: 15px;" align="right"><b>'.$orig.'</b></td>

</tr>
<tr>
<td colspan = "3"> We hereby confirm acceptance of the Policy below :<br><i>(Dengan ini Kami memberikan persetujuan Polis di bawah ini): </i></td>
<td></td>
<td></td>
</tr>
<br> 
<tr>';
$setuju .= '
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<td >Policy No.<br>(<i>No.Polis</i>)<br></td>
<td style="width:15" align="right">:</td>
<td >' . $polis_no . '</td>

</tr>
<tr>
<td>Name of the Insured<br>(<i>Nama Tertanggung</i>)<br></td>
<td style="width:15" align="right">:</td>
<td colspan="2">' . $insured_name . '<br \>';

foreach ( $list_arr as $row)
    {   
        // echo $row['code']; echo $row['name'].'<br>';
        $setuju .= ''. $row['code'] . ' ' . $row['name'] . '<br>';
    }


//     <tr>
// <td width="290">' . $footer . '</td>
// <td style="width:52%; text-align:right;">' . $sign_explode[0] . ',' . date("j F Y", strtotime($sign_explode[1])) . '</td>
// </tr>
// <tr>
// <td>Ex. Pol No:' . $prevpol . '</td>
// <td width="250" rowspan="3" style="text-align:right;"><img src="https://www.araksa.com/mks/epol/hvc/stamp/01-stamp.png" width="100" height="98" ></td>
// <td width="100" rowspan="3" style="text-align:right;"><img src="image/TTD_baru.png" width="170" height="110" ></td>

$setuju .='
</td>
</tr>
<tr>
<td>Insurance Period<br>(<i>Periode Pertanggungan</i>)<br></td>
<td style="width:15" align="right">:</td>
<td colspan="2">' . $insured_period . ' (' . $terbilang . ') days <br>(<i>' . $hari . ' hari</i>)</td>
</tr>
<tr>
<td>Inception<br>(<i>Mulai dari</i>)<br></td>
<td style="width:15" align="right">:</td>
<td>' . date("j F Y", strtotime($inception)) . '</td>
<td width="200">Expiration :' . date("j F Y", strtotime($expiration)) . '<br>(<i>Sampai</i>)<br></td>
</tr>

<tr>
<td width="290">' . $footer . '</td>
<td style="width:52%; text-align:right;">' . $sign_explode[0] . ',' . date("j F Y", strtotime($sign_explode[1])) . '</td>
</tr>
<tr>
<td>Ex. Pol No:' . $prevpol . '</td>';

// $setuju .='
// <td width="350" rowspan="3" style="text-align:right;"><img src="image/TTD_baru.png" width="165" height="95" ></td>';


$setuju .='
<td width="270" rowspan="3" style="text-align:right;"><img src="https://www.araksa.com/mks/epol/hvc/stamp/'.$branch.'-stamp.png" width="90" height="98" ></td>
<td width="120" rowspan="3" style="text-align:right;"><img src="image/TTD_baru.png" width="190" height="150" ></td>';



$setuju .='
</tr>
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
$pdf->writeHTML($setuju, true, false, true, false);


// $pdf->Output('htmlout.pdf', 'I');

$create_date    = DateTime::createFromFormat('U.u', microtime(true));
$epolhvc_pdf8    = 'accept'.$no_polis.'.pdf';
$path_epol8      = $_SERVER['DOCUMENT_ROOT'] . 'mks/epol/hvc/pdf/';

//Close and output PDF document
$pdf->Output($path_epol8 . $epolhvc_pdf8, 'I');