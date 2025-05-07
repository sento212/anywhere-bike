<?php
// https://www.araksa.com/mks/entry/print_cargo/pdf_multi_cargo.php

//api_hvc_main
ob_end_clean();
require_once('tcpdf/tcpdf.php');

use setasign\Fpdi;

require_once('tcpdf/tcpdf.php');
require_once('fpdi/src/autoload.php');
// include ('../print_cargo/API_Cargo.php');

class Pdf extends Fpdi\Tcpdf\Fpdi
{
    protected $tplId;
    //Page header
    public $background;
    public function Header()
    {   
        global $background;
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
        if ($background == 'si_pdf')
        {
            $img_file = 'image/TTD_new_800.jpg';
            $this->Image($img_file, 0, 0, 210, 299, '', '', '', false, 300, '', false, false, 0);      
        } 
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        $this->SetFont('courier', '', 8);
        $this->Cell(0, 15, $polis, 0, false, 'R', 0, '', 0, false, 'M', 'M');
        // set the starting point for the page content
        $this->setPageMark();
        $status = $_POST['status'];
        if($status == "copy" )
        {
            $copy = "Copy";
            $this->setFont('courier','B',8);
            $this->SetXY(143,22);

            $this->Cell(110,5, $copy,0,0,'C');
        }
        else
        {
            $copy="";
        }
    }
}

$branch = substr($no_polis,0,2);
$total = $gpr_amount+$premi_amount;
{
    $curl = curl_init();
    $arr_data_terbilang = array
    (
        "nilai"       => $total,
        "currency"    => $currency_code,
        "key_id"      => "jhbjhasdsa"
    );

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://www.araksa.com/prog-x/api/General/api_terbilang.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => json_encode($arr_data_terbilang),
    CURLOPT_HTTPHEADER => array(
        'Content-Type: text/plain'
    ),
    ));

    $response      = curl_exec($curl);
    $response_time = curl_getinfo($curl);
    curl_close($curl);

    $response_decode = json_decode($response,TRUE);

    $duit_dalam = $response_decode['angka_convert'];
    // print_r($angka);
}

{
    // -------------------------<>----------------------------------------------

    $curl = curl_init();
    $arr_data_terbilang = array
    (
        "nilai"       => $total,
        "currency"    => 'USD',
        "key_id"      => "jhbjhasdsa"
    );

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://www.araksa.com/prog-x/api/General/api_terbilang.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => json_encode($arr_data_terbilang),
    CURLOPT_HTTPHEADER => array(
        'Content-Type: text/plain'
    ),
    ));

    $response      = curl_exec($curl);
    $response_time = curl_getinfo($curl);
    curl_close($curl);

    $response_decode = json_decode($response,TRUE);

    $luar_uang = $response_decode['angka_convert'];
    // print_r($angka_dollar);
    // echo '<br><pre>'; print_r($response_decode); echo '</pre>';echo "<br>----";

}

// -------------------------
{
    // -------------------------<>----------------------------------------------

    $curl = curl_init();
    $arr_data_terbilang = array
    (
        "nilai"       => $sum_ins,
        "currency"    => 'USD',
        "key_id"      => "jhbjhasdsa"
    );

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://www.araksa.com/prog-x/api/General/api_terbilang.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => json_encode($arr_data_terbilang),
    CURLOPT_HTTPHEADER => array(
        'Content-Type: text/plain'
    ),
    ));

    $response      = curl_exec($curl);
    $response_time = curl_getinfo($curl);
    curl_close($curl);

    $response_decode = json_decode($response,TRUE);

    $uang_Sums = $response_decode['angka_convert'];
    // print_r($angka_dollar);
    // echo '<br><pre>'; print_r($response_decode); echo '</pre>';echo "<br>----";

}
// ----------------------

{
    $curl = curl_init();
    $arr_data_terbilang = array
    (
        "nilai"       => (float)$si_amount,
        "currency"    => "IDR",
        "key_id"      => "jhbjhasdsa"
    );

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://www.rks-w.com/prog-x/api/General/api_terbilang.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => json_encode($arr_data_terbilang),
    CURLOPT_HTTPHEADER => array(
        'Content-Type: text/plain'
    ),
    ));

    $response      = curl_exec($curl);
    $response_time = curl_getinfo($curl);
    curl_close($curl);

    $response_decode = json_decode($response,TRUE);

    $terbilang_idn_1= $response_decode['angka_convert'];
    // print_r($duit_dalam_INDONESIA_AA);

    // -------------------------<>---------------------------------------------
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

$accept = '<table border="" cellspacing="" cellpadding="" >
<tr>
<td></td>
<td></td>
<td></td>
<td width ="173" align="right" >' .$polis_multi. '<br></td>
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
$accept .= '
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<td >Policy No.<br>(No.Polis)<br></td>
<td style="width:15" align="right">:</td>
<td >' . $polis_multi . '</td>

</tr>
<tr>
    <td>Name of the Insured<br>(<i>Nama Tertanggung</i>)<br></td>
    <td style="width:15" align="right">:</td>
    <td colspan="2">';
    $accept.= ''.$ins_name.'';
    foreach ( $kodqppk as $knt)
    {
      $accept.='<br>'.$knt.'';
    }
    $accept.='
    </td>
</tr>

<tr>
    <td>Estimated Departure Date<br>(<i>Perkiraan Tanggal Keberangkatan</i>)<br></td>
    <td style="width:15" align="right">:</td>
    <td colspan="2">'.date("j F Y", strtotime($est_date)).'</td>
</tr>

<tr>
    <td width="285">' . $footer . '</td>
    <td style="width:55%; text-align:right;">' . $sign_explode[0] . '' . $sign . '</td>
</tr>

<tr>
    <td>' . $footer2 . '</td>
</tr>

<tr>
    <td width="570" style="text-align:right;"><img src="https://www.araksa.com/mks/epol/hvc/stamp/'.$branch.'-stamp.png" width="90" height="98" ></td>
    <td width="120" rowspan="3"  style="text-align:right;"><img src="https://www.rks-w.com/mks/entry/view/menu/print_cargo/image/TTD_baru.png" ></td>
</tr>

<tr>
<td></td>
<td></td>
</tr>';

$accept .='
<tr>
  <td style="width:76%;"></td>
  <td style="text-align:center;width:24%;"><u> Doni Yuska </u><br>Authorized Signature<br>(<i>Penanggung</i>)</td>
</tr>';


$pdf->AddPage();
$pdf->writeHTML($accept, true, false, true, false);

$accept = '<table border="" cellspacing="" cellpadding="" >
<tr>
<td></td>
<td></td>
<td></td>
<td width ="173" align="right" >' .$polis_multi. '<br></td>
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
<td >' . $polis_multi . '</td>
</tr>

<tr>
<td>Master Policy No.<br>(<i>No. Master Polis</i>)<br></td>
<td style="width:15" align="right">:</td>
<td colspan="2">' . $polis_mst . '</td>
</tr>

<tr>
    <td>Name of the insured<br>(<i>Nama Tertanggung</i>)<br></td>
    <td style="width:15" align="right">:</td>
    <td colspan="2">' . $ins_name . '<br \>' . $code_list . ' ' . $polis_name . '<br></td>';
    foreach ( $kodqppk as $knt)
    {
      $accept.='<br>'.$knt.'';
    }
    $accept.='
    </td>
</tr>

<tr>
    <td>Register No.<br>(<i>No. Register</i>)<br></td>
    <td style="width:15" align="right">:</td>
    <td colspan="2">' . $no_reg . '</td>
</tr>

<tr>
    <td>Reference No. <br>(<i>No. Referensi</i>)<br></td>
    <td style="width:15" align="right">:</td>
    <td colspan="2">' . $no_ref . '</td>
</tr>

<tr>
    <td>Pos Code<br>(<i>Kode Pos</i>)<br></td>
    <td style="width:15" align="right">:</td>
    <td colspan="2">' . $postal_kode . '</td>
</tr>

<tr>
    <td>Address<br>(<i>Alamat</i>)<br></td>
    <td style="width:15" align="right">:</td>
    <td colspan="2">' . $ins_address1 . '<br \>' . $ins_address2 . '<br \>' . $ins_address3 . $kota . '<br></td>
</tr>

<tr>
    <td>Own Risk<br>(<i>Resiko Sendiri</i>)<br></td>
    <td style="width:15" align="right">:</td>
    <td colspan="2">' . $ownrisk  . '<br></td>
</tr>

<tr>
    <td>TOTAL SUM INSURED<br>(<i>Total Harga Pertanggungan</i>)<br></td>
    <td style="width:15" align="right">:</td>
    <td colspan="2">'.$idrnya.'&nbsp;'.number_format($si_amount).'<br></td>
</tr>

<tr>
    <td>SAYS<br>(<i>Terbilang</i>)<br></td>
    <td style="width:15" align="right">:</td>
    <td style="width:500" colspan="1"> ('.$currency_name.' :'.$uang_Sums .')<br>(<i>'.$currency_name.' :' . $terbilang_idn_1 . '</i>)</td>
</tr>

</table>';

$pdf->AddPage();
$pdf->writeHTML($accept, true, false, true, false);

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
    <td align="center" width ="600"><i>Attaching to and forming part of Policy No. : '.$no_polis.' Endorsement No. '.$no_endors.'</i>
<br>
<i>( Dilekatkan dan merupakan bagian dari Polis No. '.$no_polis.' Endorsemen No. '.$no_endors.') </i></td>
</tr>

<br>
<br>';

$kalian = $si_amount * $hit;
$accept .=
'
<table border="" cellspacing="" cellpadding="" >
<tr>
    <td>'.$kode_mayor.'</td>
    <td style="width:35" align="right">:</td>
    <td style="width:250">'.$idrnya.'&nbsp;'.number_format($si_amount).''.$hit.'</td>
    <td>=&nbsp;'.$idrnya.'&nbsp;'.number_format($gpr_amount).'</td>
</tr>
<br>
<tr>
    <td>Administration Cost<br>(<i>Biaya Administrasi</i>)<br></td>
    <td style="width:290" align="right"> = </td>
    <td colspan="2" >&nbsp;'.$prem_currency.'&nbsp;&nbsp;&nbsp;&nbsp;'.number_format($premi_amount).'<br></td>
    <br><br>
    <td style="width:557" align="right">___________________</td>
</tr>

<tr>
    <td style="width:450" align="right"> = </td>
    <td colspan="2">&nbsp;'.$idrnya.'&nbsp;'.number_format($total).'</td><br>
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
    <td style="width:400" colspan="4">(RUPIAH : '.$luar_uang.')<br>(<i>RUPIAH : '.$duit_dalam.'</i>)</td>
</tr>
</table>';

$pdf->AddPage();
$pdf->writeHTML($accept, true, false, true, false);

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
</table>';
$html .='<table border="1" cellspacing="" cellpadding="4">';
$no = 1;
for($i = 0; $i < $tot_isi_obj_cargo; $i++)
{
    {
        // -------------------------<>----------------------------------------------
        $curl = curl_init();
        $arr_data_terbilang = array
        (
            "nilai"       => $isi_obj_cargo[$i][sum_ins],
            "currency"    => 'USD',
            "key_id"      => "jhbjhasdsa"
        );
    
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://www.araksa.com/prog-x/api/General/api_terbilang.php',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($arr_data_terbilang),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: text/plain'
        ),
        ));
    
        $response      = curl_exec($curl);
        $response_time = curl_getinfo($curl);
        curl_close($curl);
    
        $response_decode = json_decode($response,TRUE);
    
        $dols_usd = $response_decode['angka_convert'];
        // print_r($angka_dollar);
        // echo '<br><pre>'; print_r($response_decode); echo '</pre>';echo "<br>----";
    }

    {
        // -------------------------<>----------------------------------------------
        $curl = curl_init();
        $arr_data_terbilang = array
        (
            "nilai"       => $isi_obj_cargo[$i][sum_ins],
            "currency"    => $currency_code,
            "key_id"      => "jhbjhasdsa"
        );
    
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://www.araksa.com/prog-x/api/General/api_terbilang.php',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($arr_data_terbilang),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: text/plain'
        ),
        ));
    
        $response      = curl_exec($curl);
        $response_time = curl_getinfo($curl);
        curl_close($curl);
    
        $response_decode = json_decode($response,TRUE);
    
        $dols_rupiah = $response_decode['angka_convert'];
        // print_r($angka_dollar);
        // echo '<br><pre>'; print_r($response_decode); echo '</pre>';echo "<br>----";
    }
    
    $html .='
    <tr>
            <td align="center" width = "30px">'.$no.'</td>
            <td align ="justify" width = "180px" height ="200px">'.$isi_obj_cargo[$i][estimasi].'<br>'.$isi_obj_cargo[$i][vessel].''.$isi_obj_cargo[$i][car_conveyage].''.$isi_obj_cargo[$i][car_voyage].'<br>'.$isi_obj_cargo[$i][vessel_year].'/'.$isi_obj_cargo[$i][vessel_grt].'/'.$isi_obj_cargo[$i][vessel_class].'/'.$isi_obj_cargo[$i][vessel_const].'<br>('.$isi_obj_cargo[$i][remarkss].')</td>
            <td align ="justify" width = "155px" height ="200px">'.nl2br($isi_obj_cargo[$i][cov_desc]).'</td>
            <td align ="center" width = "130px" height = "200px">'.$currency_code.'&nbsp;'.number_format($isi_obj_cargo[$i][sum_ins]).'<br> Says : '.$dols_usd.'<br> Terbilang : '.$dols_rupiah.' </td>
            <td align ="center" width = "100px" height = "200px"><i> - ; - ; -</i></td>
    </tr>';
    $no++;
}
$html .='</table>';


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
    <td>Administration Cost<br>(<i>Biaya Administrasi</i>)<br></td>
    <td style="width:35" align="right"> = </td>
    <td colspan="2">'.$prem_currency.'.'.number_format($premi_amount).'</td>
</tr>

<br><br>

<tr>
    <td>SAYS<br>(<i>Terbilang</i>)<br></td>
    <td style="width:35" align="right">:</td>
    <td colspan="2"> (RUPIAH : '.$angka_luar .')<br>(<i>' . $angka_indo . '</i>)</td>
</tr>

</table>';

$pdf->writeHTML($nota_pdf, true, false, true, false);
$epol_debit = $note_nomor.".pdf";
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

// $pdf->Output('htmlout.pdf', 'I');

// $create_date    = DateTime::createFromFormat('U.u', microtime(true));
// $epolhvc_pdf8    = 'accept'.$no_polis.'.pdf';
// $path_epol8      = $_SERVER['DOCUMENT_ROOT'] . 'mks/epol/hvc/pdf/';

//Close and output PDF document
// $pdf->Output($path_epol8 . $epolhvc_pdf8, 'I');

$file_name_pdf = $no_polis. ".pdf";
$pdf->Output(  $_SERVER['DOCUMENT_ROOT'] . "mks/entry/view/menu/print_cargo/mix_all_Cargo/" . $file_name_pdf ,'F');
echo json_encode("https://www.rks-w.com/mks/entry/view/menu/print_cargo/mix_all_Cargo/".$file_name_pdf);

