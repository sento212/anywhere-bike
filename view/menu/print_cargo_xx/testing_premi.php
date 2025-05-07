<?php
// $polis = '01-HVC-00104-000-04-2022';
// $no_polis = $polis;
// Include the main TCPDF library (search for installation path).
// include 'api_tes.php';

ob_end_clean();
require_once('tcpdf/tcpdf.php');
use setasign\Fpdi;

require_once('tcpdf/tcpdf.php');
require_once('fpdi/src/autoload.php');

$no_polis = '01-C-00009-000-05-2023';

class Pdf extends Fpdi\Tcpdf\Fpdi
{
    protected $tplId;
    //Page header
    public function Header() {
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
        // $prem = 'halo';
        // if ($premcal == 1){
        //  $this -> writeHTML( $prem, true, false, true, false, '');
        // }
        // else{

        // }
        $this->Cell(0, 15, $polis, 0, false, 'R', 0, '', 0, false, 'M', 'M');
        // set the starting point for the page content

    
        $this->setPageMark();
    }
}


{
  $curl = curl_init();
  $arr_data_terbilang = array
  (
      "nilai"       => $jumlah,
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

  $duit_dalam_prem_calcu = $response_decode['angka_convert'];
  // print_r($duit_dalam_prem_calcu);

  // -------------------------<>----------------------------------------------

}

// create new PDF document
$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);

// set document information
// $pdf->SetProtection(array( 'modify','copy','annot-forms','fill-forms','extract','assemble'), '','mks',3);
$pdf->SetCreator('Araksa');
$pdf->SetAuthor('Araksa');
$pdf->SetTitle('HVC');
$pdf->SetSubject('Araksa');
$pdf->SetKeywords('Araksa, HVC');


$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 30, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(32);
$pdf->SetFooterMargin(0);

// remove default footer
$pdf->setPrintFooter(false);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

class API_OOP_CARGO
{
    private $baseURL;

    public function __construct($baseURL)
    {
        $this->baseURL = $baseURL;
    }

    public function post($data)
    {
        $url = $this->baseURL;

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST , "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);

        curl_close($ch);

        return json_decode($response, true);
    }
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('courier', '', 8);
$pdf->AddPage('P', 'A4');
// HVC_CHASSIS_NO


$prem = '<table border="" cellspacing="2" cellpadding="4">
  <tr>
  <td width ="650" style="font-size: 15px;" align="right"><b>COPY</b></td> 

  </tr>
  <h1 align="center" >PREMIUM CALCULATION<br>(<i>PERHITUNGAN PREMI</i>) </h1>                
  <p align="center"  style="margin-top:-15px;">  (Attaching to and forming part of Policy No.01-M-00009-000-12-2024 Endorsement No.04)
  <br>
  (Dilekatkan dan merupakan bagian dari Polis No. 01-M-00009-000-12-2024 Endorsemen No. 00)</p>  
  

  ';
  

  // foreach ($body_array as $row) 
  // {
  //     if(count($row['HVC_BODY_TYPE']) > 1)
  //       {
  //         for ($k = 0; $k < count($row['HVC_BODY_TYPE']); $k++)
  //           {
  //             $prem .='<tr><td width="20%">Year<br>(<i>Tahun</i>)<br>Category<br>(<i>Kategori</i>)<br>';
  //             if(count($row['UW_COVERAGE_MAJOR_CODE']) > 1)
  //             {
  //               for ($j = 0; $j < count($row['UW_COVERAGE_MAJOR_CODE']); $j++) 
  //               {
  //                 $prem .= '' . $row['UW_COVERAGE_MAJOR_CODE'][$j]  . '<br>';
  //               }
  //             }
  //             else
  //             {
  //               $prem .= '' . $row['UW_COVERAGE_MAJOR_CODE']  . '<br>';
  //             }
  //             $prem .= '</td>';
  //             //looping body
  //             $prem .= '<td width="55%">' . $row['POLICY_YEAR'] . ' <br><br>';
  //             $prem .= ''.$row['HVC_BODY_TYPE'][$k]. '<br>';
  //             //looping SI HIT
  //             $prem .= '<br>';
  //             if(count($row['SI_AMOUNT']) > 1 && count($row['HIT']) > 1)  
  //             {
  //               $subtable_prem1 = '<table align ="1"  border="" width="87%"><tr><td>' . number_format($row['SI_AMOUNT'][$k],2) . '' . $row['HIT'][$k]  . '</td></tr></table>';
  //               $prem .= '' . $row['COVERAGE_GPRM_CURRENCY'] . '.' . $subtable_prem1 . ' <br>';
  //             }
  
  //             if(count($row['SI_AMOUNT']) > 1 && count($row['HIT']) == 1){
  //               $subtable_prem1 = '<table align =""  border="" width="87%"><tr><td>' . number_format($row['SI_AMOUNT'][$k],2) . '' . $row['HIT']  . '</td></tr></table>';
  //               $prem .= '' . $row['COVERAGE_GPRM_CURRENCY'] . '.' . $subtable_prem1 . ' <br>';
  //             }
            
  //             if(count($row['HIT']) > 1  && count($row['SI_AMOUNT']) == 1){
  //               $subtable_prem1 = '<table align =""  border="" width="87%"><tr><td>' . number_format($row['SI_AMOUNT'],2) . '' . $row['HIT'][$k]  . '</td></tr></table>';
  //               $prem .= '' . $row['COVERAGE_GPRM_CURRENCY'] . '.' . $subtable_prem1 . ' <br>';
  //             }
  
  //             if(count($row['HIT']) ==  1  && count($row['SI_AMOUNT']) == 1){
  //               $subtable_prem1 = '<table align =""  border="" width="87%"><tr><td>' . number_format($row['SI_AMOUNT'],2) . '' . $row['HIT']  . '</td></tr></table>';
  //               $prem .= '' . $row['COVERAGE_GPRM_CURRENCY'] . '.' . $subtable_prem1 . ' <br>';
  //             }
  
  //             $prem .= '<br></td><td width="60%" align=""><br><br><br><br><br>';
  //             $subtable_prem2 = '<table align ="right"  border="" width="37%"><tr><td>'.number_format($row['GPRM_AMOUNT'][$k],2).'</td></tr></table>';
  //             $prem.='=&nbsp;'.$row['COVERAGE_GPRM_CURRENCY'].'.'.$subtable_prem2.'<br>';
  //             $prem .= '______________________________<br>';
      
  //             $jum = 0;
  //             if(count($row['HIT']) > 1){
  //             for ($j = 0; $j < count($row['GPRM_AMOUNT']); $j++) {
  //               $gprm_jum_int = (int)$row['GPRM_AMOUNT'][$j];
  //               $jum += $gprm_jum_int;
  //             }
  //             $count_hit = $jum;
  //            }
  //            else
  //            {
  //              $count_hit = $row['GPRM_AMOUNT'][$k];
  //              // $gprm_jum_int == $jum;
  //              // $count_hit == $gprm_int;
           
  //            }
              
  //             $subtable_prem3 = '<table align ="right"  border="" width="37%"><tr><td>' . number_format($count_hit,2) . '</td></tr></table>';
  //             $prem.='=&nbsp;'.$row['COVERAGE_GPRM_CURRENCY'].'.'.$subtable_prem3.'
  //             </td>
  //             </tr>';
  
  //           } 
  //       }
  //     else
  //       {
  //           $prem .='<tr><td width="20%">Year<br>(<i>Tahun</i>)<br>Category<br>(<i>Kategori</i>)<br>';
  //             if(count($row['UW_COVERAGE_MAJOR_CODE']) > 1)
  //             {
  //               for ($j = 0; $j < count($row['UW_COVERAGE_MAJOR_CODE']); $j++) 
  //               {
  //                 $prem .= '' . $row['UW_COVERAGE_MAJOR_CODE'][$j]  . '<br>';
  //               }
  //             }
  //             else
  //             {
  //               $prem .= '' . $row['UW_COVERAGE_MAJOR_CODE']  . '<br>';
  //             }
  //             $prem .= '</td>';
  //             $prem .= '<td width="55%">' . $row['POLICY_YEAR'] . ' <br><br>';
  //             $prem .= '' . $row['HVC_BODY_TYPE']  . '';
          
  
  //         //looping SI HIT
  //         $prem .= '<br><br>';
  //         if(count($row['SI_AMOUNT']) > 1 && count($row['HIT']) > 1)  {
  //           for ($j = 0; $j < count($row['SI_AMOUNT']); $j++){
  //           $subtable_prem1 = '<table align =""  border="" width="87%"><tr><td>' .number_format($row['SI_AMOUNT'][$j],2) . '' . $row['HIT'][$j]  . '</td></tr></table>';
  //           $prem .= '' . $row['COVERAGE_GPRM_CURRENCY'] . '.' . $subtable_prem1 . ' <br>';
  //         }
  //         }
  
  //         if(count($row['SI_AMOUNT']) > 1 && count($row['HIT']) == 1){
  //           for ($j = 0; $j < count($row['SI_AMOUNT']); $j++){
  //           $subtable_prem1 = '<table align =""  border="" width="87%"><tr><td>' . number_format($row['SI_AMOUNT'][$j],2) . '' . $row['HIT']  . '</td></tr></table>';
  //           $prem .= '' . $row['COVERAGE_GPRM_CURRENCY'] . '.' . $subtable_prem1 . ' <br>';
  //         }
  //         }
  
  //         if(count($row['HIT']) > 1  && count($row['SI_AMOUNT']) == 1){
  //           for ($j = 0; $j < count($row['HIT']); $j++){
  //           $subtable_prem1 = '<table align =""  border="" width="87%"><tr><td>' . number_format($row['SI_AMOUNT'],2) . '' . $row['HIT'][$j]  . '</td></tr></table>';
  //           $prem .= '' . $row['COVERAGE_GPRM_CURRENCY'] . '.' . $subtable_prem1 . ' <br>';
  //         }
  //         }
  //         if(count($row['HIT']) ==  1  && count($row['SI_AMOUNT']) == 1){
  //           $subtable_prem1 = '<table align =""  border="" width="87%"><tr><td>' . number_format($row['SI_AMOUNT'],2) . '' . $row['HIT']  . '</td></tr></table>';
  //           $prem .= '' . $row['COVERAGE_GPRM_CURRENCY'] . '.' . $subtable_prem1 . ' <br>';
  
  //         }
  
  
  
  //         $prem .= '<br></td>
  
  //         <td width="60%" align=""><br><br><br><br><br>';
  //         if(count($row['GPRM_AMOUNT']) > 1){
  //         for ($j = 0; $j < count($row['GPRM_AMOUNT']); $j++) {
  //           $subtable_prem2 = '<table align ="right"  border="" width="37%"><tr><td>'.number_format($row['GPRM_AMOUNT'][$j],2).'</td></tr></table>';
  //           $prem.='=&nbsp;'.$row['COVERAGE_GPRM_CURRENCY'].'.'.$subtable_prem2.'<br>';
  //         }
  //         }
  //         else{
  //           $subtable_prem2 = '<table align ="right"  border="" width="37%"><tr><td>'.number_format($row['GPRM_AMOUNT'],2).'</td></tr></table>';
  //           $prem.='=&nbsp;'.$row['COVERAGE_GPRM_CURRENCY'].'.'.$subtable_prem2.'<br>';
  //         }
  //         $prem .= '_______________________________<br>';
  
  //         $jum = 0;
  //         if(count($row['HIT']) > 1){
  //         for ($j = 0; $j < count($row['GPRM_AMOUNT']); $j++) 
  //         {
  //             $gprm_jum_int = (int)$row['GPRM_AMOUNT'][$j];
  //             $jum += $gprm_jum_int;
  //         }
  //           $count_hit = $jum;
  //         }
  //         else
  //         {
  //           $count_hit = $row['GPRM_AMOUNT'];
  //         }
  //         $subtable_prem3 = '<table align ="right"  border="" width="37%"><tr><td>' . number_format($count_hit,2) . '</td></tr></table>';
  //         $prem.='=&nbsp;'.$row['COVERAGE_GPRM_CURRENCY'].'.'.$subtable_prem3.'
  //         </td>
  //         </tr>';
  //       }
  
        
  // }

  $policy_cargo_all     = new API_OOP_CARGO('https://raksa-service.com/mks_work_to_b/index.php/ch_api_policy_mst/policy_cargo_all');
$data_cargo_all       = array(
    "input_policy_no" => $no_polis,
    "key_id"          => "pKYM31CFf2oyoKjlcyszi490O3VCyy"
);
$response_cargo_all = $policy_cargo_all->post($data_cargo_all);
// echo '<pre>'; print_r($response_cargo_all); echo '</pre>';echo "<br>----";

  foreach ($response_cargo_all ['Prem_call'] as $premi_cal)
  {
      $major_code     = $premi_cal['UW_COVERAGE_MAJOR_CODE'];
      $si_amount      = $premi_cal['SI_AMOUNT'];
      $hit            = $premi_cal['HIT'];
      $idrnya         = $premi_cal['COVERAGE_GPRM_CURRENCY'];
      $no_endors      = $premi_cal['POLICY_ENDORSEMENT_NO'];
      $trn_amount     = $premi_cal['GPRM_AMOUNT'];
      $currency       = $premi_cal['CURRENCY_NAME'];

      $gprm_amount_int = (float)$gprm['GPRM_AMOUNT'];
      $tambah += $tambah;
  }
  // echo '<pre>'; print_r($gprm_amount_int); echo '</pre>';echo "<br>----";

  $trn_amount_int = (float)$trn_amount;
  // echo ($gprm_amount);
  (float)$total =  (float)number_format($tambah,2,'.','') + $trn_amount_int;
  
  $subtable_prem4 = '<table align ="right"  border="" width="51.5%"><tr><td>'.number_format($trn_amount,2).'</td></tr></table>';
  if($trn_desc != ' ')
  {
    $prem .= ' 
        <tr>
          <td width="30%">' . $major_code . '<br>(Biaya Administrasi)</td> 
          <td style="width:250">'.$idrnya.'&nbsp;'.number_format($si_amount).''.$hit.'</td>
          <td width="45%">'.$total.'</td>
          <td width="45%">=&nbsp;'.$trn_current.'.<br>_______________________________
          </td>
          </tr>';
  }

  else
  {
    $prem .= ' 
      <tr>
        <td></td> 
        <td width="60%"></td>
        <td width="30%">_______________________________
        </td>
        </tr>';
  }
  
  $subtable_prem5='<table align ="right"  border="" width="85%"><tr><td>'.number_format($total,2).'</td></tr></table>';      
  $prem.='<tr>
          <td width="75.3%"></td>
          <td width="30%">=&nbsp;'.$currency.'.'.$subtable_prem5.'</td>

          </tr>'; 
// <td width="30%">=&nbsp;'.$currency.'.'.$subtable_prem5.'</td>

          
  
  //===============
  $total_terbilang = (float)number_format($total,2);
  $arr_data1  = array(
      "nilai"  => (int)$total,
      "currency" => 'USD',
      "key_id" => "jhbjhasdsa"     
    );
    $array_data_convert = json_encode($arr_data1);
    $url  = curl_init('https://www.araksa.com/prog-x/api/General/api_terbilang.php');
    curl_setopt($url, CURLOPT_CUSTOMREQUEST , "POST");
    curl_setopt($url, CURLOPT_POSTFIELDS    , $array_data_convert);
    curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($url, CURLOPT_SSL_VERIFYPEER, false);
    $result_data1  = curl_exec($url);
    $info_unit1   = curl_getinfo($url);
    curl_close($url);
    $rata1 = json_decode($result_data1, TRUE);
    $terbilang_eng = $rata1['angka_convert'];
  //
    $arr_data2  = array(
      "nilai"  => (float)$total,
      "currency" => 'IDR',
      "key_id" => "jhbjhasdsa"     
    );
    $array_data_convert = json_encode($arr_data2);
    $url  = curl_init('https://www.araksa.com/prog-x/api/General/api_terbilang.php');
    curl_setopt($url, CURLOPT_CUSTOMREQUEST , "POST");
    curl_setopt($url, CURLOPT_POSTFIELDS    , $array_data_convert);
    curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($url, CURLOPT_SSL_VERIFYPEER, false);
    $result_data2  = curl_exec($url);
    $info_unit   = curl_getinfo($url);
    curl_close($url);
    
    $rata2 = json_decode($result_data2, TRUE);
    
  $terbilang_ina = $rata2['angka_convert'];
  $trn_amount_str = (string)$total;
  // echo $total;
  

  //===============
    (float)$after_coma = (float)$total - (int)$total;
    (int)$toint      =  round($after_coma,2) * 100;
  
    // $prem .= ''.(float)$total.'<br>';
    // $prem .= ''.(int)$total.'<br>';
    // $prem .= ''.round($after_coma,2).'<br>';
    // $prem .= ''.(int)$toint.'<br>';
    if ((int)$toint != 0)
    {
          $arr_data1  = array(
            "nilai"  => (int)$toint,
            "currency" => 'USD',
            "key_id" => "jhbjhasdsa"     
          );
          $array_data_convert = json_encode($arr_data1);
          $url  = curl_init('https://www.araksa.com/prog-x/api/General/api_terbilang.php');
          curl_setopt($url, CURLOPT_CUSTOMREQUEST , "POST");
          curl_setopt($url, CURLOPT_POSTFIELDS    , $array_data_convert);
          curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($url, CURLOPT_SSL_VERIFYPEER, false);
          $result_data1_after  = curl_exec($url);
          $info_unit1_after   = curl_getinfo($url);
          curl_close($url);
          $rata1_after = json_decode($result_data1_after, TRUE);
          $terbilang_eng_after = $rata1_after['angka_convert'];
        //
          $arr_data2  = array(
            "nilai"  => (int)$toint,
            "currency" => 'IDR',
            "key_id" => "jhbjhasdsa"     
          );
          $array_data_convert = json_encode($arr_data2);
          $url  = curl_init('https://www.araksa.com/prog-x/api/General/api_terbilang.php');
          curl_setopt($url, CURLOPT_CUSTOMREQUEST , "POST");
          curl_setopt($url, CURLOPT_POSTFIELDS    , $array_data_convert);
          curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($url, CURLOPT_SSL_VERIFYPEER, false);
          $result_data2_after  = curl_exec($url);
          $info_unit_after   = curl_getinfo($url);
          curl_close($url);
          
          $rata2_after = json_decode($result_data2_after, TRUE);
          
        $terbilang_ina_after = $rata2_after['angka_convert'];
        $dan = 'dan';
        $and = 'and';
        $sen = 'sen';
        $cent = 'cent';
      
    }
    else
    {
      
    }

    if ($row['COVERAGE_GPRM_CURRENCY'] == 'IDR')
    {
      $currency_t = 'RUPIAH';
    }
    elseif ($row['COVERAGE_GPRM_CURRENCY'] == 'USD') 
    {
      $currency_t = 'US DOLLAR';
    }
    else
    {
      $currency_t = '';
    }
  
  $prem .= 
  '
  <tr>
  <td width="10%">Says</td>
  <td width="80%">('.$currency_t.' : ' .$terbilang_eng . ' '.$and.' '.$terbilang_eng_after.' '.$cent.' only) </td>
  </tr>
  <tr>
  <td width="10%"><i>Terbilang</i></td>
  <td width="80%"><i>('.$currency_t.' : ' .$terbilang_ina . ' '.$dan.' '.$terbilang_ina_after.' '.$sen.')</i></td>
  </tr>
  </table>';
  
  $pdf->writeHTML($prem, true, false, true, false, '');
  $pdf->lastPage();
  // output the HTML content

  // batass buatann nyoman dibawahhhhhhhhhhhhhhhhhhhhhhhhhhhh-------------------------------------------------------------------------------------------

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

$accept .=
'
<table border="" cellspacing="" cellpadding="" >
<tr>
    <td>'.$major_code.'</td>
    <td style="width:35" align="right">:</td>';
    if($currency_code == "IDR")
    {   
        $accept .='
        <td style="width:250">'.$idrnya.'&nbsp;'.number_format($si_amount).''.$hit.'</td>
        <td>=&nbsp;'.$idrnya.'&nbsp;&nbsp;&nbsp;'.number_format($gpr_amount).'</td>';
    }
    elseif($currency_code =="USD")
    {
        $accept .='
        <td style="width:250">'.$idrnya.'&nbsp;'.number_format($si_amount).''.$hit.'</td>
        <td>=&nbsp;'.$idrnya.'&nbsp;&nbsp;&nbsp;'.number_format($gpr_amount, 2).'</td>';
    }
    $accept.='
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
    <td style="width:400" colspan="4">('.$idrnya.' : '.$duit_luar_negri.')<br>(<i>RUPIAH : '.$number_with_comma.'</i>)</td>
</tr>
</table>';

$pdf->AddPage();
$pdf->writeHTML($accept, true, false, true, false);

    


// $create_date    = DateTime::createFromFormat('U.u', microtime(true));
// $epolhvc_pdf4    = 'premi'.$no_polis.'.pdf';
// $path_epol4      = $_SERVER['DOCUMENT_ROOT'] . 'mks/epol/hvc/pdf/';

// //Close and output PDF document
// $pdf->Output($path_epol4 . $epolhvc_pdf4, 'F');

//Close and output PDF document

// $pdf->Output($path_epol.$epolhvc_pdf, 'F');
$create_date    = DateTime::createFromFormat('U.u', microtime(true));
$epolhvc_pdf4    = 'premi'.$no_polis.'.pdf';
$path_epol4      = $_SERVER['DOCUMENT_ROOT'] . 'mks/epol/hvc/pdf/';

//Close and output PDF document
$pdf->Output($path_epol4 . $epolhvc_pdf4, 'I');