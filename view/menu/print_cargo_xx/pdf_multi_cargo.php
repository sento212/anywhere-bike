<?php
// https://www.araksa.com/mks/entry/print_cargo/pdf_multi_cargo.php

//api_hvc_main
ob_end_clean();
require_once('tcpdf/tcpdf.php');

use setasign\Fpdi;

require_once('tcpdf/tcpdf.php');
require_once('fpdi/src/autoload.php');
// include ('../print_cargo/API_Cargo.php');

// $no_polis = '01-C-00548-000-07-2023';
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
$jumlah = $gpr_amount+$premi_amount;

{   
    $curl = curl_init();
    $arr_data_terbilang = array
    (
        "nilai"       => $jumlah,
        "currency"    => $currency_code,
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

    $duit_dalam = $response_decode['angka_convert'];
    // print_r($angka);

    // -------------------------<>---------------------------------------------
}

{

    $curl = curl_init();
    $array_luar = array
    (
      "nilai"       => $jumlah,
      "currency"    => "USD",
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
    CURLOPT_POSTFIELDS => json_encode($array_luar),
    CURLOPT_HTTPHEADER => array(
        'Content-Type: text/plain'
    ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    // echo $response;

    $response_decode = json_decode($response,TRUE);

    $duit_luar_negri = $response_decode['angka_convert'];

}

{
    $curl = curl_init();
    $array_luar = array
    (
      "nilai"       => $si_amount,
      "currency"    => "USD",
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
    CURLOPT_POSTFIELDS => json_encode($array_luar),
    CURLOPT_HTTPHEADER => array(
        'Content-Type: text/plain'
    ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    // echo $response;

    $response_decode = json_decode($response,TRUE);

    $angka_luar_luar_asu = $response_decode['angka_convert'];

}

{   
    $curl = curl_init();
    $arr_data_terbilang = array
    (
        "nilai"       => $si_amount,
        "currency"    => $currency_code,
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

    $duit_dalam_ngri = $response_decode['angka_convert'];
    // print_r($angka);

    // -------------------------<>---------------------------------------------
}

// TARIK DATA QQ 
{
    $data_api_QQ = array(
        "input_policy_no"     => $no_polis
    );

    $web_url = curl_init('http://raksa-service.com/mks_work_to_b/index.php/ch_api_policy_mst/policy_insured_list');

    curl_setopt($web_url, CURLOPT_CUSTOMREQUEST , "POST");
    curl_setopt($web_url, CURLOPT_POSTFIELDS    , $data_api_QQ);
    curl_setopt($web_url, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($web_url, CURLOPT_SSL_VERIFYPEER, false);

    $result_unit  = curl_exec($web_url);
    $info_unit    = curl_getinfo($web_url);
    curl_close($web_url);
    $data_unit  = json_decode($result_unit);

    foreach($data_unit->code as $no_polis_bca )
    {
        $code             = $no_polis_bca->CODE;
        $pol_insured_name = $no_polis_bca->POLICY_INSURED_NAME;

        if($code == 'QQ')
        {
        $pol_insured_name_x = "$pol_insured_name_x $code $pol_insured_name <br>";
        }
        if($code == 'PH')
        {
        $pol_insured_name_ph = "$pol_insured_name_ph $pol_insured_name <br>";
        }
    }
    // echo '<pre>'; print_r($data_unit); echo '</pre>';echo "<br>----";
    
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

$cover_multi = '<table border="" cellspacing="" cellpadding="" > <tr>';
$cover_multi .= '
<td style="width:110;"></td>
<td style="height:40;"></td>
<td></td>

</tr>
<tr>
<td></td> 
<td style="width:125; font-size:10;"><b>No.Polis</b><br></td>
<td style="width:10;" align="">:</td>
<td style="font-size:10; width:240;" ><b>' . $polis_multi . '</b></td>
</tr>
<tr>
<td></td>
<td style="font-size:10;"><b>Nama Tertanggung</b><br></td>
<td style="width:10;" align="">:</td>
<td colspan="2" style="font-size:10;"><b>' . $pol_insured_name_ph .  $pol_insured_name_x  .  '</b><br></td>
</tr>
</table>';

$pdf->AddPage();
$pdf->writeHTML($cover_multi, true, false, true, false);

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
<td width="285">' .  $footer . '</td>
<td style="width:55%; text-align:right;">' . $sign_explode[0]. '' .$sign.'</td>
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
<td></td>
</tr>';

$accept .='
<tr>
    <td style="width:76%;"> </td>
    <td style="text-align:center;width:24%"> <u><br>Authorized Signature<br>(<i>Penanggung</i>)</u></td>
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
    <td colspan="2">' . $no_register . '</td>
</tr>

<tr>
    <td>Reference No. <br>(<i>No. Referensi</i>)<br></td>
    <td style="width:15" align="right">:</td>
    <td colspan="2">' . $no_ref . '</td>
</tr>

<tr>
    <td>Postal Code<br>(<i>Kode Pos</i>)<br></td>
    <td style="width:15" align="right">:</td>
    <td colspan="2">' . $postal_kode . '</td>
</tr>

<tr>
    <td>Address<br>(<i>Alamat</i>)<br></td>
    <td style="width:15" align="right">:</td>
    <td colspan="2">' . $ins_address1 . '<br \>' . $ins_address2 . '<br \>' . $ins_address3 . $kota . '<br></td>
</tr>

<tr>
    <td>Deductible<br>(<i>Resiko Sendiri</i>)<br></td>
    <td style="width:15" align="right">:</td>
    <td colspan="2">' . $ownrisk  . '<br></td>
</tr>

<tr>
    <td>TOTAL SUM INSURED<br>(<i>Total Harga Pertanggungan</i>)<br></td>
    <td style="width:15" align="right">:</td>
    <td colspan="2">' . $currency_code . '&nbsp;' .(number_format($si_amount)) . '<br></td>
</tr>

<tr>
    <td>SAYS<br>(<i>Terbilang</i>)<br></td>
    <td style="width:15" align="right">:</td>
    <td colspan="2"> ('.$currency_name.' :'.$angka_luar_luar_asu .')<br>(<i>' . $duit_dalam_ngri . '</i>)</td>
</tr>';
$pdf->AddPage();
$pdf->writeHTML($accept, true, false, true, false);

$html .= '
    </td>
    </tr>
        <tr>
        <br>
        <td colspan="4">Clauses, Endorsements, Special Conditions, Warranties<br>(<i>Klausula, Endorsemen, Kondisi Khusus dan Pembatasan</i>)</td>
        </tr>';

        $subtable1 = '<table border= "" cellspacing="" cellpadding="2">';
        foreach ($hvc_clauses['code'] as $row) {
          $subtable1 .= '<tr>
          <td style="width: 600"><br>'.$row['CLAUSE_TITLE_ENGLISH'].'<br>(<i>' . $row['CLAUSE_TITLE_INDO'].'</i>)
                              </td></tr>';
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
    
        $dols_dolar = $response_decode['angka_convert'];
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
    
        $rupi_rupiah = $response_decode['angka_convert'];
        // print_r($angka_dollar);
        // echo '<br><pre>'; print_r($response_decode); echo '</pre>';echo "<br>----";
    }

    $html .='
    <tr>
            <td align="center" width = "30px">'.$no.'</td>
            <td align ="justify" width = "180px" height ="203px">'.$isi_obj_cargo[$i][estimasi].'<br>'.$isi_obj_cargo[$i][vessel].''.$isi_obj_cargo[$i][car_conveyage].''.$isi_obj_cargo[$i][car_voyage].'<br>'.$isi_obj_cargo[$i][vessel_year].'/'.$isi_obj_cargo[$i][vessel_grt].'/'.$isi_obj_cargo[$i][vessel_class].'/'.$isi_obj_cargo[$i][vessel_const].'<br>('.nl2br($isi_obj_cargo[$i][remarkss]).')</td>
            <td align ="justify" width = "155px" height ="203px">'.nl2br($isi_obj_cargo[$i][cov_desc]).'</td>
            <td align ="center" width = "130px" height = "203px">'.$currency_code.'&nbsp;'.number_format($isi_obj_cargo[$i][sum_ins]).'<br> Says : '.$dols_dolar.'<br> Terbilang : '.$rupi_rupiah.' </td>
            <td align ="center" width = "100px" height = "203px"><i> - ; - ; -</i></td>
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
    <td>'.$major_code.'</td>
    <td style="width:35" align="right">:</td>
    <td style="width:250">'.$idrnya.'&nbsp;'.number_format($si_amount).''.$hit.'</td>
    <td>=&nbsp;'.$idrnya.'&nbsp;'.number_format($gpr_amount).'</td>
</tr>
<br>
<tr>
    <td>Administration Cost<br>(<i>Biaya Administrasi</i>)<br></td>
    <td style="width:290" align="right"> = </td>';
    if ($currency_code == "IDR")
    {   
        $accept .='
        <td colspan="2" >&nbsp;'.$prem_currency.'&nbsp;&nbsp;&nbsp;&nbsp;'.number_format($premi_amount).'<br></td>
        <br><br>
        <td style="width:557" align="right">___________________</td>';
    }
    elseif ($currency_code == "USD")
    {
        $accept.='
        <td colspan="2" >&nbsp;'.$prem_currency.'&nbsp;&nbsp;&nbsp;&nbsp;'.number_format($premi_amount, 2).'<br></td>
        <br><br>
        <td style="width:557" align="right">___________________</td>';
    }
    $accept.='
</tr>

<tr>';
    if ($currency_code == "IDR")
    {   
        $accept.='
        <td style="width:450" align="right"> = </td>
        <td colspan="2">&nbsp;'.$idrnya.'&nbsp;&nbsp;&nbsp;'.number_format($jumlah).'</td><br>';
    }
    elseif($currency_code == "USD")
    {
        $accept.='
        <td style="width:450" align="right"> = </td>
        <td colspan="2">&nbsp;'.$idrnya.'&nbsp;&nbsp;&nbsp;'.number_format($jumlah, 2).'</td><br>';
    }
    $accept.='
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
    <td style="width:400" colspan="4">(RUPIAH : '.$duit_luar_negri.')<br>(<i>RUPIAH : '.$duit_dalam.'</i>)</td>
</tr>
</table>';

$pdf->AddPage();
$pdf->writeHTML($accept, true, false, true, false);

$pageCount = $pdf->setSourceFile('mix_all_Cargo/Wording_Cargo_2.pdf');
for ($z = 1; $z <= $pageCount; $z++)
{
    $tplIdx = $pdf->importPage($z, '/MediaBox');
    $pdf->AddPage('P', 'A4');
    $pdf->useTemplate($tplIdx, -5, 20.2, null, null,FALSE);
    $pdf->SetFont('freeserif', 'B', 8);
    $pdf->SetXY(147,42);
    if ($z ==1)
    {
        $pdf->SetFont('freeserif', 'B', 13);
        $pdf->SetXY(6,62);
        $pdf->Cell(95, 5, $no_register, 0, 0, 'C');   
    }
    $pdf->SetFont('freeserif', '', 8);
    $pdf->SetXY(134,37);
    $pdf->Cell(95, 5, $no_polis, 0, 0, 'C');
}

$accept = '
<table border="" style="width:100%" >
    <tr>
        <td></td>
        <td align="center" colspan="2"  style="font-size:15px"><b>CLAUSES <br><i>(KLAUSULA)</i></b><br></td>
        <td width ="173" style="font-size: 15px;" align="right"></td>
    </tr>';
      foreach ($hvc_clauses['code'] as $row)
      {
        $row = preg_replace("/\r\n|\r|\n/", '<br/>', $row);

        $accept .= '
        <tr  style = "font-size:12px" >
            <th width = "320"><b>' . $row['CLAUSE_TITLE_ENGLISH'] . '</b></th>
            <th width = "17"></th>
            <th width = "300"><b>' . $row['CLAUSE_TITLE_INDO'] . '</b></th>
        </tr>

        <tr>
            <td width = "300" align="justify">' . $row['CLAUSE_DESC_ENGLISH'] . '</td>
            <td></td>
            <td width = "17"></td>
            <td width = "300" align="justify">' . $row['CLAUSE_DESC_INDO'] . '</td>
        </tr>

        <tr>
            <td width = "300" align="justify">' . $row['CLAUSE_DESC_ENGLISH2'] . '</td>
            <td></td>
            <td width = "17"></td>
            <td width = "300" align="justify">' . $row['CLAUSE_DESC_INDO2'] . '</td>
        </tr>

        <tr>
            <td width = "300" align="justify">' . $row['CLAUSE_DESC_ENGLISH3'] . '</td>
            <td></td>
            <td width = "17"></td>
            <td width = "300" align="justify">' . $row['CLAUSE_DESC_INDO3'] . '</td>
        </tr>

        <tr>
            <td width = "300" align="justify">' . $row['CLAUSE_DESC_ENGLISH4'] . '</td>
            <td></td>
            <td width = "17"></td>
            <td width = "300" align="justify">' . $row['CLAUSE_DESC_INDO4'] . '</td>
        </tr>

        <tr>
            <td width = "300" align="justify">' . $row['CLAUSE_DESC_ENGLISH5'] . '</td>
            <td></td>
            <td width = "17"></td>
            <td width = "300" align="justify">' . $row['CLAUSE_DESC_INDO5'] . '</td>
        </tr>
        ';
    }

$accept .= '</table>';


$pdf->AddPage();
$pdf->writeHTML($accept, true, false, true, false);


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

        $file_name_pdf = $no_polis. ".pdf";
        $pdf->Output(  $_SERVER['DOCUMENT_ROOT'] . "mks/entry/view/menu/print_cargo/mix_all_Cargo/" . $file_name_pdf ,'F');
        echo json_encode("https://www.rks-w.com/mks/entry/view/menu/print_cargo/mix_all_Cargo/".$file_name_pdf);
