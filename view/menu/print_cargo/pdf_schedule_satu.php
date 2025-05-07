<?php

//  https://www.araksa.com/mks/entry/print_cargo/pdf_schedule_satu.php


ob_end_clean();
require_once('tcpdf/tcpdf.php');

use setasign\Fpdi;

require_once('tcpdf/tcpdf.php');
require_once('fpdi/src/autoload.php');
include '../koneksi_lite.php';
include ('../print_cargo/API_Cargo.php');
class Pdf extends Fpdi\Tcpdf\Fpdi
{
    protected $tplId;
    public $no_polis;
    //Page header

    public function Header()
    {
        global $no_polis;
        // get the current page break margin
        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // set bacground image

        // $img_file = 'image/IT.jpg';
        // $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        // $polis = $polis_no;
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        $this->SetFont('courier', '', 8);
        $this->MultiCell(55, 5, $no_polis, 0, 'R', 0, 0, '144', '32', false);
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
$pdf->SetTitle('HVC');
$pdf->SetSubject('Araksa');
$pdf->SetKeywords('Araksa, HVC');


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
$subtable = '<table border="1" cellspacing="6" cellpadding="4"><tr><td>a</td><td>b</td></tr><tr><td>c</td><td>d</td></tr></table>';
$subtable2 = '<table border="1" cellspacing="6" cellpadding="4"><tr><td>a</td><td>b</td></tr></table>';

$pdf->AddPage();

$html = '<table border="0" cellspacing="2" cellpadding="" >
        <tr>
            <td ></td>
            <td width="70"></td>
            <td width="280" align="center" colspan="2"  style="font-size:15px"><b>SCHEDULE</b><br><b>(<i>IKHTISAR PERTANGGUNGAN</i>)</b><br></td>
            <td></td>
            <td style="font-size: 15px;" align="right"><b>'.$orig.'</b></td>
        </tr>

        <tr>
            <td width="150"></td>
            <td style="width:15" align="right"></td>
            <td style="width:40%"></td>
            <td width="230" ></td>
            <td ></td>
        </tr>

        <tr>';

$html .= '
    <td >Policy/Certificate No<br>(<i>No.Polis</i>)<br></td>
        <td style="width:15" align="right">:</td>
        <td>' . $no_polis . '</td>
        <td>Register No. &nbsp;&nbsp;&nbsp;:'.$no_reg.'<br>(<i>No. Register</i>)</td>
    </tr>

    <tr>
        <td width="150">Master Policy No.<br>(<i>No.Master Polis</i>)<br></td>
        <td style="width:15" align="right">:</td>';
        if ($polis_mst != '---0--')
        {$html .= '<td >' . $polis_mst . '</td>';}
        else 
        {
            $html .= '<td >   ---0-- </td>';
        }

$html .='
    <td >Reference No. &nbsp;&nbsp;:' . $no_ref . '<br>(<i>No. Referensi</i>)</td>

    </tr>
        <tr>
        <td>Name of Insured<br>(<i>Nama Tertanggung</i>)<br></td>
        <td style="width:15" align="right">:</td>
        <td colspan="2">' .  $ins_name . '<br></td>
    </tr>

    <tr>
        <td>Address<br>(<i>Alamat</i>)</td>
        <td style="width:15" align="right">:</td>
        <td >' . $ins_address1 . '<br \>' . $ins_address2 . '<br \>' . $ins_address3 . $kota . '<br></td>
        <td>Postal Code &nbsp;&nbsp;&nbsp;&nbsp;:' . $postal_kode  . '<br>(<i>Kode Pos</i>)</td>
    </tr>

    <tr>
        <td>Voyage<br>(<i>Perjalanan</i>)<br></td>
        <td style="width:15" align="right">:</td>
        <td>' . $car_voyage . '</td>
        <td ></td>
        <td></td>
    </tr>

    <tr>
        <td>Conveyance<br>(<i>Alat Angkut</i>)<br></td>
        <td style="width:15" align="right">:</td>
        <td colspan="2"><i>'. $car_conveyage .'</i>)</td>
    </tr>

    <tr>
        <td>Estimated Departure Date<br>(<i>Perkiraan Tanggal Keberangkatan</i>)<br></td>
        <td style="width:15" align="right">:</td>
        <td>' . date("j F Y", strtotime($estimasi)) . '</td>
        <td width="200">Sum Insured &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<br>'.$idr1.'<br></td>
    </tr>

    <tr>
        <td>Interest Insured<br>(<i>Objek Pertanggungan</i>)<br></td>
        <td style="width:15" align="right">:</td>
        <td colspan="2"></td>
    </tr>
    </table>';
    
    $html .='
    <div>
        <td align="left" style="width:600">'.$cov_desc.'<br></td>
        <td></td>
    </tr>
    </div>';

    $html .='
    <tr>
        <td>BL/L No. / AWB No.<br>(<i>Nomor B/L / Nomor AWB</i>)<br></td>
        <td style="width:15" align="right">:</td>
        <td colspan="2">'.$no_bl.'</td>
        <td></td>
        <td></td>
    </tr>

    <tr>
        <td>Total Sum Insured<br>(<i>Total Harga Pertanggungan</i>)<br></td>
        <td style="width:15" align="right">:</td>
        <td>' . $hvc_year . '</td>
    </tr>

    <tr>
        <td>Says<br>(<i>Terbilang</i>)<br></td>
        <td style="width:15" align="right">:</td>
        <td>' . $serial_no . '</td>
    </tr>

    <tr>
        <td>Original Conditions<br>(<i>Kondisi Asli</i>)<br></td>
        <td style="width:15" align="right">:</td>
        <td>' . $chassis_no . ' / ' . $engine_no . '</td>
    </tr>';
        
        // $html .= '
        // <br></td>
        // <td style="width:70%">';
        // foreach ($UW_COVERAGE_DESC as $row) {
        //     $sql3 = "SELECT indo FROM epolis_coverage WHERE desc_2='$row'";
        //     $result3 = $conn->query($sql3);
        //     // print_r ($result);
        //     if ($result3 ->num_rows > 0) {
        //     // output data of each row
        //     while($row3 = $result3 ->fetch_assoc()) {
        //         $row_code3 =  $row3['indo'];

        //     }
        // }
        //     $html .= '<br />' . $row.'<br />(<i>'.$row_code3.'</i>)';
        // }

    $html .= '
    <br></td>
    </tr>
        <tr>
        <td>Own Risk<br>(<i>Risiko Sendiri</i>)<br></td>
        <td style="width:15" align="right">:</td>
        <td style="width:6%">';
        foreach ($UW_COVERAGE_MINOR_CODE as $row) {
            $html .= '<br/>' . $row;
        }
        $html .= '
    </td>
    </tr>

        <tr>
        <br>
        <td colspan="4">Clauses, Endorsements, Special Conditions, Warranties<br>(<i>Klausula, Endorsemen, Kondisi Khusus dan Pembatasan</i>)</td>
        </tr>';
        $subtable1 = '<table border= "" cellspacing="" cellpadding="2">';
        foreach ($data_unit['code'] as $main_pol) {
        $subtable1 .= '<tr>
        <td style="width: 167"><br>'.$main_pol['CLAUSE_CODE'].'<br></td>
        <td style="width: 495"><br>'. $main_pol['CLAUSE_TITLE_ENGLISH'].'<br>(<i>' .  $main_pol['CLAUSE_TITLE_INDO'].'</i>)
                            </td></tr>';
        }
        $subtable1.='</table>';
        $html .= '<tr>
        <td>'.$subtable1.'</td>
        <td colspan = "4"></td>
        </tr></table>';
    $html .= '
    <tr>
    <td colspan="4">' . "<br>" . str_replace("\r\n", "<br>", $car_remarks);
    // for($i=0; $i < count($explode_remarks); $i++){
    //     if ($explode_remarks[$i] == "-"){
    //        "<br>";
    //      }
    //     $explode_remarks[$i]." ";
    // }
    $html .= '</td>
    </tr>
    </table>';


// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
// reset pointer to the last page
$pdf->lastPage();


// $pdf->Output('htmlout.pdf', 'I');

$create_date    = DateTime::createFromFormat('U.u', microtime(true));
$epolhvc_pdf5   = 'schedule'.$no_polis.'.pdf';
$path_epol5      = $_SERVER['DOCUMENT_ROOT'] . 'mks/epol/hvc/pdf/';

//Close and output PDF document
$pdf->Output($path_epol5 . $epolhvc_pdf5, 'I');
