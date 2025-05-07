<?php
// 021 22035037  ext 3115 cs  KRISTINA ANATA67

// // https://www.rks-w.com/mks/entry/print_cargo/pdf_single_cargo.php
//api_hvc_main
ob_end_clean();
require_once('tcpdf/tcpdf.php');

use setasign\Fpdi;

require_once('tcpdf/tcpdf.php');
require_once('fpdi/src/autoload.php');
// include ('API_Cargo_baru.php');
// include ('../print_cargo/API_Cargo.php');

// $no_polis = '01-C-00548-000-07-2023';
$jumlah = $gpr_amount+$premi_amount;
// echo $premi_amount;
$branch = substr($no_polis,0,2);
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

    // -------------------------<>----------------------------------------------

}

{
    $curl = curl_init();
    $array_luar = array
    (
      "nilai"       => $total,
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
    $number_with_comma = str_replace('.', ',', $duit_luar_negri);
}


// convert 
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

    $duit_dalam_idr = $response_decode['angka_convert'];
    $number_with_comma = str_replace('.', ',', $duit_dalam_idr);
    // print_r($number_with_comma);

    // -------------------------<>----------------------------------------------

}

{
    (float)$after_coma = (float)$jumlah - (int)$jumlah;
    (int)$toint      =  round($after_coma,2) * 100;

    $curl = curl_init();
    $array_luar = array
    (
      "nilai"       => (float)$toint,
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
    $trn_amount_str = (string)$jumlah;

    // kedua -----------------------------------------------
    $arr_data2  = array(
        "nilai"  => (int)$jumlah,
        "currency" => 'USD',
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
      
    $duit_luar_negri_after = $rata2_after['angka_convert'];

    $arr_data2  = array(
        "nilai"  => (float)$toint,
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
      
    $terbilang_ina_after_22 = $rata2_after['angka_convert'];

}

// untuk marine caergo isnurance
{
    $curl = curl_init();
    $arr_data_terbilang = array
    (
        "nilai"       => (float)$sum_ins,
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

    $duit_dalam_INDONESIA_AA = $response_decode['angka_convert'];
    // print_r($duit_dalam_INDONESIA_AA);

    // -------------------------<>---------------------------------------------
}

{
    $curl = curl_init();
    $array_luar = array
    (
      "nilai"       => (int)$sum_ins,
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

    $angka_luar_luar_anjg = $response_decode['angka_convert'];

}

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
  
$terbilang_ina_after_2 = $rata2_after['angka_convert'];

// premi new 
$trn_amount_int = (float)$premi_amount;
// echo ($gprm_amount);
(float)$total =  (float)number_format($tambah22,2,'.','') + $trn_amount_int;
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
  
$terbilang_eur = $rata2['angka_convert'];
$trn_amount_str = (string)$total;


//===============
  (float)$after_coma = (float)$sum_ins - (int)$sum_ins;
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

  if ($idrnya == 'IDR')
  {
    $idrnya = 'RUPIAH';
  }
  elseif ($idrnya == 'USD') 
  {
    $idrnya = 'US DOLLAR';
  }
  else
  {
    $idrnya = '';
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

    // foreach($data_unit->code as $no_polis_bca )
    // {
    //     $code             = $no_polis_bca->CODE;
    //     $pol_insured_name = $no_polis_bca->POLICY_INSURED_NAME;

    //     if($code == 'QQ')
    //     {
    //     $pol_insured_name_x = "$pol_insured_name_x $code $pol_insured_name <br>";
    //     }
    //     if($code == 'PH')
    //     {
    //     $pol_insured_name_ph = "$pol_insured_name_ph $pol_insured_name <br>";
    //     }
    // }
    // echo '<pre>'; print_r($data_unit); echo '</pre>';echo "<br>----";
    
}



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
            $this->SetXY(143,24);

            $this->Cell(110,5, $copy,0,0,'C');
        }
        else
        {
            $copy="";
        }
    
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

//add a page
// $pdf->AddPage();

// create some HTML content
if($status == "ori")
{
    
    $subtable  = '<table border="1" cellspacing="6" cellpadding="4"><td>a</td><td>b</td></tr><tr><td>c</td><td>d</td></table>';
    $subtable2 = '<table border="1" cellspacing="6" cellpadding="4"><td>a</td><td>b</td></table>';
    
    $accept = '
    <table border="" cellspacing="" cellpadding="">
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
    
      <tr>
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
          <td colspan="2">'. date("j F Y", strtotime($est_date)) . '</td>
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
    
    // create some HTML content
    $subtable = '<table border="1" cellspacing="6" cellpadding="4"><tr><td>a</td><td>b</td></tr><tr><td>c</td><td>d</td></tr></table>';
    $subtable2 = '<table border="1" cellspacing="6" cellpadding="4"><tr><td>a</td><td>b</td></tr></table>';
    
    $html = '<table border="0" cellspacing="2" cellpadding="" >
            <tr>
                <td ></td>
                <td width="70"></td>
                <td width="380" align="left" colspan="2" style="font-size:15px"><b>MARINE CARGO INSURANCE CERTIFICATE</b><br><b>(<i>SERIFIKAT ASURANSI PENGANGKUTAN</i>)</b><br></td>
                <td></td>
                <td style="font-size: 15px;" align="right"><b>'.$orig.'</b></td>
            </tr>
    
            <tr>
                <td width="560" align="left" colspan = "2"> We hereby Cerify that the company covers the marine cargo Insurance Subject to terms and conditions of Marine Cargo open cover as described hereunder : </td>
                <td></td>
                <td></td>
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
        <td >Policy/Certificate No<br>(<i>No.Polis / Serifikat</i>)<br></td>
            <td style="width:15" align="right">:</td>
            <td>' . $polis_single . '</td>
            <td>Register No. &nbsp;&nbsp;&nbsp;:'.$no_register.'<br>(<i>No. Register</i>)</td>
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
            <td>Name Of The Insured<br>(<i>Nama Tertanggung</i>)<br></td>
            <td style="width:15" align="right">:</td>
            <td colspan="2">';
            $html.=''.$ins_name.'';
            foreach ($kodqppk as $kk)
            {
                $html.='<br>'.$kk.'';
            }
            $html.='
            </td>
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
            <td></td>
            <td></td>
        </tr>
    
        <tr>
            <td>Conveyance<br>(<i>Alat Angkut</i>)<br></td>
            <td style="width:15" align="right">:</td>
            <td colspan="8"><i>'.$vessel.''. $car_conveyage .'</i>)<br> Year : &nbsp;'.$vessel_year.'&nbsp; &nbsp; GRT : &nbsp;'.$vessel_grt.'&nbsp; &nbsp; Class : &nbsp;'.$class_vess.'&nbsp; &nbsp; Cons : &nbsp;'.$vessel_const.' </td>
        </tr>
    
        <tr>
            <td>Estimated Departure Date<br>(<i>Perkiraan Tanggal Keberangkatan</i>)<br></td>
            <td style="width:15" align="right">:</td>
            <td>' . date("j F Y", strtotime($estimasi)) . '</td>
        </tr>
    
        <tr>
            <td>Interest Insured<br>(<i>Objek Pertanggungan</i>)<br></td>
            <td style="width:15" align="right">:</td>
            <td colspan="2"></td>
        </tr>
        </table>';
    
        $html .='
        <div>
            <td align="left" style="width:600">'.nl2br($cov_desc).'<br></td>
            <td></td>
        </tr>
        </div>';

        $html .='
        <tr>
            <td>INVOICE / DECLA NO.<br></td>
            <td style="width:15" align="right">:</td>
            <td colspan="2">'.$crg_invoice.'</td>
            <td></td>
            <td></td>
        </tr>';
    
        $html .='
        <tr>
            <td>BL/L No. / AWB No.<br>(<i>Nomor B/L / Nomor AWB</i>)<br></td>
            <td style="width:15" align="right">:</td>
            <td colspan="2">'.$no_bl.'</td>
            <td></td>
        </tr>
    
        <tr>
            <td>Total Sum Insured<br>(<i>Total Harga Pertanggungan</i>)<br></td>
            <td style="width:15" align="right">:</td>
            <td>' . $currency_code . '&nbsp;' .(number_format($sum_ins, 2)) . '</td>
        </tr>
    
        <tr>
            <td>Says<br>(<i>Terbilang</i>)<br></td>
            <td style="width:15" align="right">:</td>
            <td style="width:420" align="justify">('.$currency_code.'&nbsp; :'.$angka_luar_luar_anjg.'&nbsp;'.$and.'&nbsp;'.$terbilang_eng_after.'&nbsp;'.$cent.' only)<br>('.$currency_code.'&nbsp; :'.$duit_dalam_INDONESIA_AA.'&nbsp;'.$dan.'&nbsp;'.$terbilang_ina_after.'&nbsp;'.$sen.')</td>
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
        </td>
        </tr>
            <tr>
            <td>Deductible<br>(<i>Risiko Sendiri</i>)<br></td>
            <td style="width:15" align="right">:</td>
            <td style="width:60%">'.nl2br($ownrisk).'';
            $html .= '<br>
        </td>
        </tr>
    
        <tr>
            <td style="width:650" align="left" colspan="5">IT IS UNDERSTOOD AND AGREED THAT THIS CERTIFICATE REPRESENTS AND TAKES THE PLACE OF THE ORIGINAL STAMPED POLICY CINVRYS ALL THE RIGHTS OF THE ORIGINAL POLICY HOLDER ( FOR THE PURPOSE COLLECTING ANY LOSS OR CLAIM ) AS FULLY AS IF THE PROPERTY WAS COVERED BY A SPECIAL POLICY DIRECT TO THE HOLDER OF THIS CERTIFICATE AND FREE OF ANY LIABILITY FOR UNPAID PREMIUMS.</td>
        </tr>';
    
            // $subtable1 = '<table border= "" cellspacing="" cellpadding="2">';
            // for($i= 0;$i<=$b1;$i++)
            // {
            //    $subtable1 .= '<tr>
            //     <br>
            //     <td style="width: 167"><br>'. $clause_code[$i] .'<br></td>
            //     <td style="width: 495"><br>'. $klau_inggris[$i].'<br>(<i>' .  $klausula_indo[$i].'</i>)
            //                     </td></tr>';
    
            //                     // echo $a1;
            //                     // print_r($main_pol);
            //                     // $a1++;
            // }
    
    
            // $subtable1.='
            // </table>';
            // $html .= '<tr>
            // <td>'.$subtable1.'</td>
            // <td colspan = "4"></td>
            // </tr></table>';
    
        // $html .= '<table border="" cellspacing="6" cellpadding="4">
        // <tr>
        // <td style="width: 495">' . "<br>" . str_replace("\r\n", "<br>", $car_remarks);
        // // for($i=0; $i < count($explode_remarks); $i++){
        // //     if ($explode_remarks[$i] == "-"){
        // //        "<br>";
        // //      }
        // //     $explode_remarks[$i]." ";
        // // }
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
        <td style="width:35" align="right">:</td>
        <td style="width:250">'.$currency_code.'&nbsp;'.number_format($si_amount,2).''.$hit.'</td>
        <td>=&nbsp;'.$currency_code.'&nbsp;&nbsp;&nbsp;'.number_format($gpr_amount,2).'</td>
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
            <td colspan="2" >&nbsp;'.$prem_currency.'&nbsp;&nbsp;&nbsp;'.number_format($premi_amount,2).'<br></td>
            <br><br>
            <td style="width:557" align="right">___________________</td>';
        }
        elseif ($currency_code == "KRW")
        {
            $accept.='
            <td colspan="2" >&nbsp;'.$prem_currency.'&nbsp;&nbsp;&nbsp;&nbsp;'.number_format($premi_amount).'<br></td>
            <br><br>
            <td style="width:557" align="right">___________________</td>';
        }
        elseif ($currency_code == "EUR")
        {
            $accept.='
            <td colspan="2" >&nbsp;'.$currency_code.'&nbsp;&nbsp;&nbsp;&nbsp;'.number_format($premi_amount,2).'<br></td>
            <br><br>
            <td style="width:557" align="right">___________________</td>';
        }
        elseif ($currency_code == "INR")
        {
            $accept.='
            <td colspan="2" >&nbsp;'.$prem_currency.'&nbsp;&nbsp;&nbsp;&nbsp;'.number_format($premi_amount).'<br></td>
            <br><br>
            <td style="width:557" align="right">___________________</td>';
        }
        elseif ($currency_code == "SGD")
        {
            $accept.='
            <td colspan="2" >&nbsp;'.$prem_currency.'&nbsp;&nbsp;&nbsp;&nbsp;'.number_format($premi_amount).'<br></td>
            <br><br>
            <td style="width:557" align="right">___________________</td>';
        }
        elseif ($currency_code == "CNY")
        {
            $accept.='
            <td colspan="2" >&nbsp;'.$prem_currency.'&nbsp;&nbsp;&nbsp;&nbsp;'.number_format($premi_amount).'<br></td>
            <br><br>
            <td style="width:557" align="right">___________________</td>';
        }
        elseif ($currency_code == "JPY")
        {
            $accept.='
            <td colspan="2" >&nbsp;'.$prem_currency.'&nbsp;&nbsp;&nbsp;&nbsp;'.number_format($premi_amount,2).'<br></td>
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
            <td colspan="2">&nbsp;'.$prem_currency.'&nbsp;&nbsp;&nbsp;'.number_format($total ).'</td><br>';
        }
        elseif($currency_code == "USD")
        {
            $accept.='
            <td style="width:450" align="right"> = </td>
            <td colspan="2">&nbsp;'.$prem_currency.'&nbsp;&nbsp;&nbsp;'.number_format($total).'</td><br>';
        }
        elseif($currency_code == "EUR")
        {
            $accept.='
            <td style="width:450" align="right"> = </td>
            <td colspan="2">&nbsp;'.$currency_code.'&nbsp;&nbsp;&nbsp;'.number_format($total,2).'</td><br>';
        }
        elseif($currency_code == "INR")
        {
            $accept.='
            <td style="width:450" align="right"> = </td>
            <td colspan="2">&nbsp;'.$prem_currency.'&nbsp;&nbsp;&nbsp;'.number_format($total).'</td><br>';
        }
        elseif($currency_code == "SGD")
        {
            $accept.='
            <td style="width:450" align="right"> = </td>
            <td colspan="2">&nbsp;'.$prem_currency.'&nbsp;&nbsp;&nbsp;'.number_format($total).'</td><br>';
        }
        elseif($currency_code == "CNY")
        {
            $accept.='
            <td style="width:450" align="right"> = </td>
            <td colspan="2">&nbsp;'.$prem_currency.'&nbsp;&nbsp;&nbsp;'.number_format($total).'</td><br>';
        }
        elseif($currency_code == "JPY")
        {
            $accept.='
            <td style="width:450" align="right"> = </td>
            <td colspan="2">&nbsp;'.$prem_currency.'&nbsp;&nbsp;&nbsp;'.number_format($total,2).'</td><br>';
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
        <td width="10%">Says</td>
        <td width="80%">('.$currency_code.' : '.$duit_luar_negri_after.'&nbsp;'.$and.'&nbsp;'.$duit_luar_negri .' '.$cent.' only) </td>
    </tr>
    
    <tr>
        <td width="10%"><i>Terbilang</i></td>
        <td width="80%"><i>('.$currency_code.' : ' .$terbilang_ina . ' '.$dan.' '.$terbilang_ina_after_22.' '.$sen.')</i></td>
    </tr>
    </table>';
    
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
}
elseif ($status == "copy")
{
    
    $subtable  = '<table border="1" cellspacing="6" cellpadding="4"><td>a</td><td>b</td></tr><tr><td>c</td><td>d</td></table>';
    $subtable2 = '<table border="1" cellspacing="6" cellpadding="4"><td>a</td><td>b</td></table>';
    
    $accept = '
    <table border="" cellspacing="" cellpadding="">
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
    
      <tr>
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
          <td colspan="2">'. date("j F Y", strtotime($est_date)) . '</td>
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
    
    // create some HTML content
    $subtable = '<table border="1" cellspacing="6" cellpadding="4"><tr><td>a</td><td>b</td></tr><tr><td>c</td><td>d</td></tr></table>';
    $subtable2 = '<table border="1" cellspacing="6" cellpadding="4"><tr><td>a</td><td>b</td></tr></table>';
    
    $html = '<table border="0" cellspacing="2" cellpadding="" >
            <tr>
                <td ></td>
                <td width="70"></td>
                <td width="380" align="left" colspan="2" style="font-size:15px"><b>MARINE CARGO INSURANCE CERTIFICATE</b><br><b>(<i>SERIFIKAT ASURANSI PENGANGKUTAN</i>)</b><br></td>
                <td></td>
                <td style="font-size: 15px;" align="right"><b>'.$orig.'</b></td>
            </tr>
    
            <tr>
                <td width="560" align="left" colspan = "2"> We hereby Cerify that the company covers the marine cargo Insurance Subject to terms and conditions of Marine Cargo open cover as described hereunder : </td>
                <td></td>
                <td></td>
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
        <td >Policy/Certificate No<br>(<i>No.Polis / Serifikat</i>)<br></td>
            <td style="width:15" align="right">:</td>
            <td>' . $polis_single . '</td>
            <td>Register No. &nbsp;&nbsp;&nbsp;:'.$no_register.'<br>(<i>No. Register</i>)</td>
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
            <td>Name Of The Insured<br>(<i>Nama Tertanggung</i>)<br></td>
            <td style="width:15" align="right">:</td>
            <td colspan="2">';
            $html.=''.$ins_name.'';
            foreach ($kodqppk as $kk)
            {
                $html.='<br>'.$kk.'';
            }
            $html.='
            </td>
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
            <td></td>
            <td></td>
        </tr>
    
        <tr>
            <td>Conveyance<br>(<i>Alat Angkut</i>)<br></td>
            <td style="width:15" align="right">:</td>
            <td colspan="8"><i>'.$vessel.''. $car_conveyage .'</i>)<br> Year : &nbsp;'.$vessel_year.'&nbsp; &nbsp; GRT : &nbsp;'.$vessel_grt.'&nbsp; &nbsp; Class : &nbsp;'.$class_vess.'&nbsp; &nbsp; Cons : &nbsp;'.$vessel_const.' </td>
        </tr>
    
        <tr>
            <td>Estimated Departure Date<br>(<i>Perkiraan Tanggal Keberangkatan</i>)<br></td>
            <td style="width:15" align="right">:</td>
            <td>' . date("j F Y", strtotime($estimasi)) . '</td>
        </tr>
    
        <tr>
            <td>Interest Insured<br>(<i>Objek Pertanggungan</i>)<br></td>
            <td style="width:15" align="right">:</td>
            <td colspan="2"></td>
        </tr>
        </table>';
    
        $html .='
        <div>
            <td align="left" style="width:600">'.nl2br($cov_desc).'<br></td>
            <td></td>
        </tr>
        </div>';

        $html .='
        <tr>
            <td>INVOICE / DECLA NO.<br></td>
            <td style="width:15" align="right">:</td>
            <td colspan="2">'.$crg_invoice.'</td>
            <td></td>
            <td></td>
        </tr>';
    
        $html .='
        <tr>
            <td>BL/L No. / AWB No.<br>(<i>Nomor B/L / Nomor AWB</i>)<br></td>
            <td style="width:15" align="right">:</td>
            <td colspan="2">'.$no_bl.'</td>
            <td></td>
        </tr>
    
        <tr>
            <td>Total Sum Insured<br>(<i>Total Harga Pertanggungan</i>)<br></td>
            <td style="width:15" align="right">:</td>
            <td>' . $currency_code . '&nbsp;' .(number_format($sum_ins, 2)) . '</td>
        </tr>
    
        <tr>
            <td>Says<br>(<i>Terbilang</i>)<br></td>
            <td style="width:15" align="right">:</td>
            <td style="width:420" align="justify">('.$currency_code.'&nbsp; :'.$angka_luar_luar_anjg.'&nbsp;'.$and.'&nbsp;'.$terbilang_eng_after.'&nbsp;'.$cent.' only)<br>('.$currency_code.'&nbsp; :'.$duit_dalam_INDONESIA_AA.'&nbsp;'.$dan.'&nbsp;'.$terbilang_ina_after.'&nbsp;'.$sen.')</td>
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
        </td>
        </tr>
            <tr>
            <td>Deductible<br>(<i>Risiko Sendiri</i>)<br></td>
            <td style="width:15" align="right">:</td>
            <td style="width:60%">'.nl2br($ownrisk).'';
            $html .= '<br>
        </td>
        </tr>
    
        <tr>
            <td style="width:650" align="left" colspan="5">IT IS UNDERSTOOD AND AGREED THAT THIS CERTIFICATE REPRESENTS AND TAKES THE PLACE OF THE ORIGINAL STAMPED POLICY CINVRYS ALL THE RIGHTS OF THE ORIGINAL POLICY HOLDER ( FOR THE PURPOSE COLLECTING ANY LOSS OR CLAIM ) AS FULLY AS IF THE PROPERTY WAS COVERED BY A SPECIAL POLICY DIRECT TO THE HOLDER OF THIS CERTIFICATE AND FREE OF ANY LIABILITY FOR UNPAID PREMIUMS.</td>
        </tr>';
    
            // $subtable1 = '<table border= "" cellspacing="" cellpadding="2">';
            // for($i= 0;$i<=$b1;$i++)
            // {
            //    $subtable1 .= '<tr>
            //     <br>
            //     <td style="width: 167"><br>'. $clause_code[$i] .'<br></td>
            //     <td style="width: 495"><br>'. $klau_inggris[$i].'<br>(<i>' .  $klausula_indo[$i].'</i>)
            //                     </td></tr>';
    
            //                     // echo $a1;
            //                     // print_r($main_pol);
            //                     // $a1++;
            // }
    
    
            // $subtable1.='
            // </table>';
            // $html .= '<tr>
            // <td>'.$subtable1.'</td>
            // <td colspan = "4"></td>
            // </tr></table>';
    
        // $html .= '<table border="" cellspacing="6" cellpadding="4">
        // <tr>
        // <td style="width: 495">' . "<br>" . str_replace("\r\n", "<br>", $car_remarks);
        // // for($i=0; $i < count($explode_remarks); $i++){
        // //     if ($explode_remarks[$i] == "-"){
        // //        "<br>";
        // //      }
        // //     $explode_remarks[$i]." ";
        // // }
        $html .= '</td>
        </tr>
        </table>';
    $pdf->AddPage();
    $pdf->writeHTML($html, true, false, true, false);
}

// //Close and output PDF document
$file_name_pdf = $no_polis. ".pdf";
$pdf->Output(  $_SERVER['DOCUMENT_ROOT'] . "mks/entry/view/menu/print_cargo/mix_all_Cargo/" . $file_name_pdf ,'F');
echo json_encode("https://www.rks-w.com/mks/entry/view/menu/print_cargo/mix_all_Cargo/".$file_name_pdf);


// echo"<a href='https://www.rks-w.com/mks/entry/print_cargo/mix_all_Cargo/01-C-00026-000-07-2023.pdf' target='_blank'> opennnn </a>";


// $pdf->Output(  $_SERVER['DOCUMENT_ROOT'] . "/mks/entry/print_cargo/mix_all_Cargo/" . $file_name_pdf ,'I');

// $b64Doc_single = chunk_split(base64_encode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/mks/entry/print_cargo/mix_all_Cargo/" . $file_name_pdf)));
// ECHO "<br> $b64Doc_single <br>";
// echo json_encode($b64Doc_single);
// unlink($_SERVER['DOCUMENT_ROOT'] . "mks/entry/print_cargo/mix_all_cargo/" . $file_name_pdf);
