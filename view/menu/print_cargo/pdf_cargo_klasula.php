<?php
// https://www.araksa.com/mks/entry/print_cargo/pdf_cargo_klausula.php
//api_hvc_main
ob_end_clean();
require_once('tcpdf/tcpdf.php');

use setasign\Fpdi;

require_once('tcpdf/tcpdf.php');
require_once('fpdi/src/autoload.php');
// include ('API_Cargo_baru.php');
// include ('../print_cargo/API_Cargo.php');

// $no_polis = '01-C-00548-000-07-2023';
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
$pdf->SetTitle('CARGO');
$pdf->SetSubject('Araksa');
$pdf->SetKeywords('Araksa, CARGO');


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

$accept = '<table border="" cellspacing="" cellpadding="">
<tr>
    <td></td>
    <td></td>
    <td></td>
    <td width ="173" align="right" >' .$polis_single. '<br></td>  
</tr> 

<tr>
    <td></td>
    <td align="center" colspan="2"  style="font-size:15px"><b>ACCEPTANCE OF POLICY <br><i>(PERSETUJUAN POLIS)</i></b><br></td>
    <td width ="173" style="font-size: 15px;" align="right"><b></b></td>
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
    <td>Policy No.<br>(No.Polis)<br></td>
    <td style="width:15" align="right">:</td>
    <td>' . $polis_single . '</td>
</tr>

<tr>
    <td>Name of the Insured<br>(<i>Nama Tertanggung</i>)<br></td>
    <td style="width:15" align="right">:</td>
    <td colspan="2">' . $ins_name . '<br></td>
</tr>

<tr>
    <td>Estimated Departure Date<br>(<i>Perkiraan Tanggal Keberangkatan</i>)<br></td>
    <td style="width:15" align="right">:</td>
    <td colspan="2">'. date("j F Y", strtotime($est_date)) . '</td>
</tr>

<tr>
    <td width="285">' . $footer . '</td>
    <td style="width:55%; text-align:right;">' . $sign_explode[0] . '' . $sign . '</td>
</tr>

<tr>
    <tr>
    <td>' . $footer2 . '</td>
</tr>

<tr>
    <td style="width:76%;"></td>
    <td style="text-align:center;width:24%;">
    <img src="./image/TTD_baru.png" width="100" height="100">
    </td>
</tr>

<tr>
    <td style="width:76%;"></td>
    <td style="text-align:center;width:24%;"><u> Doni Yuska </u><br>Authorized Signature<br>(<i>Penanggung</i>)</td>
</tr>

</table>';

$pdf->AddPage();
$pdf->writeHTML($accept, true, false, true, false);

// create some HTML content
$subtable = '<table border="1" cellspacing="6" cellpadding="4"><tr><td>a</td><td>b</td></tr><tr><td>c</td><td>d</td></tr></table>';
$subtable2 = '<table border="1" cellspacing="6" cellpadding="4"><tr><td>a</td><td>b</td></tr></table>';

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
        <td>' . $polis_single . '</td>
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
        <td>' . $ins_address1 . '<br \>' . $ins_address2 . '<br \>' . $ins_address3 . $kota . '<br></td>
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
        <td width="200">Sum Insured &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>'.$currency_code.'&nbsp;'.(number_format($sum_ins)).'<br></td>
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
        <td>' . $currency_code . '&nbsp;' .(number_format($sum_ins)) . '</td>
    </tr>

    <tr>
        <td>Says<br>(<i>Terbilang</i>)<br></td>
        <td style="width:15" align="right">:</td>
        <td style="width:420" align="justify">('.$currency_name.' :'.$angka_dollar    .')<br>(<i>' . $angka . '</i>)</td>
    </tr>

    <tr>
        <td>Original Conditions<br>(<i>Kondisi Asli</i>)<br></td>
        <td style="width:15" align="right">:</td>
        <td></td>
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
        <td style="width:60%">'.$ownrisk .'';
        $html .= '
    </td>
    </tr>

        <tr>
        <br>
        <td colspan="4">Clauses, Endorsements, Special Conditions, Warranties<br>(<i>Klausula, Endorsemen, Kondisi Khusus dan Pembatasan</i>)</td>
        </tr>';
        $subtable1 = '<table border= "" cellspacing="" cellpadding="2">';
        for($i= 0;$i<=$b1;$i++)
        {
           $subtable1 .= '<tr>
        <br>
        <td style="width: 167"><br>'. $clause_code[$i] .'<br></td>
        <td style="width: 495"><br>'. $klau_inggris[$i].'<br>(<i>' .  $klausula_indo[$i].'</i>)
                            </td></tr>';

                            // echo $a1;
                            // print_r($main_pol);
                            // $a1++; 
        }
        
        
        $subtable1.='
        </table>';
        $html .= '<tr>
        <td>'.$subtable1.'</td>
        <td colspan = "4"></td>
        </tr></table>';
        
    $html .= '<table border="" cellspacing="6" cellpadding="4">
    <tr>
    <td style="width: 495">' . "<br>" . str_replace("\r\n", "<br>", $car_remarks);
    // for($i=0; $i < count($explode_remarks); $i++){
    //     if ($explode_remarks[$i] == "-"){
    //        "<br>";
    //      }
    //     $explode_remarks[$i]." ";
    // }
    $html .= '</td>
    </tr>
    </table>';
$pdf->AddPage();
$pdf->writeHTML($html, true, false, true, false);

$accept = '<table border="" cellspacing="" cellpadding="" >           
<tr>
    <td></td>
    <td></td>
    <td></td>
</tr> 

<tr>
    <td></td>
    <td align="center" width ="180" style="font-size:15px"><b>PREMI CALCULATIONS <br><i>(PERHITUNGAN PREMI)</i></b><br></td>
</tr>

<tr>
    <td align="center" width ="600"><i>Attaching to and forming part of Policy No. : '.$no_polis.' Endorsement No. 00</i>
<br>
<i>( Dilekatkan dan merupakan bagian dari Polis No. '.$no_polis.' Endorsemen No. 00) </i></td>
</tr>

<br>
<br>';

$accept .= 
'
<table border="" cellspacing="" cellpadding="" >
<tr>
    <td>'.$major_code.'</td>
    <td style="width:35" align="right">:</td>
    <td style="width:250">'.$idrnya.'&nbsp;'.number_format($si_amount).''.$hit.'</td>
    <td>=&nbsp;'.$idrnya.'&nbsp;'.number_format($gpr_amount).'</td>
</tr>
<br>
<tr>
    <td>Administration Cost<br>(<i>Biaya Administrasi</i>)<br></td>
    <td style="width:290" align="right"> = </td>
    <td colspan="2">&nbsp;'.$prem_currency.'.&nbsp;'.number_format($premi_amount).'<br></td>
    <br><br>
    <td style="width:557" align="right">___________________</td>
</tr>

<tr>
    <td style="width:450" align="right"> = </td>
    <td colspan="2">&nbsp;'.$idrnya.'&nbsp;'.number_format($jumlah).'</td><br>
</tr>

<tr>
    <td></td>
</tr>
<tr>
    <td></td>
</tr>
</table>';

$accept .= 
'
<table border="" cellspacing="" cellpadding="" >
<tr>
    <td>SAYS<br>(<i>Terbilang</i>)<br></td>
    <td style="width:35" align="right">:</td>
    <td style="width:400" colspan="4">(RUPIAH : '.$duit_dalam.')<br>(<i>' . $duit_luar . '</i>)</td>
</tr>
</table>';

$pdf->AddPage();
$pdf->writeHTML($accept, true, false, true, false);
$pageCount = $pdf->setSourceFile('mix_all_Cargo/Wording_Cargo.pdf');
        for ($z = 1; $z <= $pageCount; $z++) 
        {
            $tplIdx = $pdf->importPage($z, '/MediaBox');
            $pdf->AddPage();
            $pdf->useTemplate($tplIdx, -5, 20.2, null, null,FALSE);
            $pdf->SetFont('freeserif', 'B', 8);
            $pdf->SetXY(147,42);
        }


        $pdf->writeHTML($nota_pdf, true, false, true, false);
        $epol_debit = "mix_all_Cargo/oke2" . '.pdf';
        $nota_pdf  = file_put_contents($epol_debit,base64_decode($base64_nota));
        
        $pageCount = $pdf->setSourceFile($epol_debit);
        for ($aa = 1; $aa <= $pageCount; $aa++) 
        {
            $tplIdx = $pdf->importPage($aa, '/MediaBox');
            $pdf->AddPage('P', 'A4');
            $pdf->useTemplate($tplIdx);
        //     $pdf->SetFont('freeserif', 'B', 8);
        //     $pdf->SetXY(147,42);
        }

//Close and output PDF document
$file_name_pdf = $no_polis. ".pdf";
// $pdf->Output(  $_SERVER['DOCUMENT_ROOT'] . "mks/entry/print_cargo/mix_all_Cargo/" . $file_name_pdf ,'F');

$pdf->Output(  $_SERVER['DOCUMENT_ROOT'] . "/mks/entry/print_cargo/klausula_cargo/" . $file_name_pdf ,'I');
// echo json_encode("https://www.araksa.com/mks/entry/print_cargo/klausula_cargo/".$file_name_pdf);

// $b64Doc_single = chunk_split(base64_encode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/mks/entry/print_cargo/mix_all_Cargo/" . $file_name_pdf)));
// ECHO "<br> $b64Doc_single <br>";
// echo json_encode($b64Doc_single);
// unlink($_SERVER['DOCUMENT_ROOT'] . "mks/entry/print_cargo/mix_all_cargo/" . $file_name_pdf);


?>