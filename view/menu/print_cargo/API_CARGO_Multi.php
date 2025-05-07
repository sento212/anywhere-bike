<?php
// $polis_single = '01-C-00417-000-05-2023';
$polis_multi  = '01-C-00548-000-07-2023';
$note_no        = array('01-PO-D0003367-07-2023');

// https://www.araksa.com/mks/entry/print_cargo/API_Cargo.php
// api insured list cargo
// -------------------------<>---------------------------------------------
{
    {
        $data_api_ins = array(
            "input_policy_no" => $polis_multi
        );
    }

    $web_url = curl_init('http://raksa-service.com/mks_work_to_b/index.php/ch_api_policy_mst/policy_insured_list');
    curl_setopt($web_url, CURLOPT_CUSTOMREQUEST , "POST");
    curl_setopt($web_url, CURLOPT_POSTFIELDS    , $data_api_ins);
    curl_setopt($web_url, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($web_url, CURLOPT_SSL_VERIFYPEER, false);

    $result_unit  = curl_exec($web_url);
    $info_unit    = curl_getinfo($web_url);
    curl_close($web_url);

    $data_unit  = json_decode($result_unit, true);
    // echo 'INSURED CARGO'. '<pre>'; print_r($data_unit); echo '</pre>';echo "<br>----";

    $b = 0;
    foreach ($data_unit['code'] as $ins_list) 
    {
        $pol_no     = $ins_list['POLICY_NO'];
    }

    // [code] => Array
    //     (
    //         [0] => Array
    //             (
    //                 [POLICY_NO] => 01-C-00417-000-05-2023
    //                 [POLICY_INSURED_KEY] => 001
    //                 [CODE] => PH
    //                 [POLICY_INSURED_NAME] => PT. SAPPE INDONESIA
    //                 [POLICY_INSURED_ADDRESS1] => GENERALI TOWER, GRAN RUBINA BUSINESS PARK 
    //                 [POLICY_INSURED_ADDRESS2] => AT RASUNA EPICENTRM 17TH FLOOR KAW. RASUNA
    //                 [POLICY_INSURED_ADDRESS3] => EPICENTRUM, JL. HR. RASUNA SAID
    //                 [POLICY_INSURED_ADDRESS4] => 
    //                 [CITY] => KOTA JAKARTA SELATAN
    //                 [STATE_PROVINCE] => DKI JAKARTA
    //                 [COUNTRY] => INDONESIA
    //                 [POSTAL_CODE] => 12940
    //             )

    //     )

}
// -------------------------<>----------------------------------------------


// api unit cargo
// -------------------------<>----------------------------------------------
{   
    {
        $data_api_unit = array(
            "input_policy_no" => $polis_multi 
        );
    }
    
    $web_url = curl_init('http://raksa-service.com/mks_work_to_b/index.php/ch_api_policy_mst/policy_cargo_unit');
    curl_setopt($web_url, CURLOPT_CUSTOMREQUEST , "POST");
    curl_setopt($web_url, CURLOPT_POSTFIELDS    , $data_api_unit);
    curl_setopt($web_url, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($web_url, CURLOPT_SSL_VERIFYPEER, false);
    
    $result_unit  = curl_exec($web_url);
    $info_unit    = curl_getinfo($web_url);
    curl_close($web_url);
    
    $data_unit  = json_decode($result_unit, true);
    // echo 'UNIT CARGO'. '<pre>'; print_r($data_unit); echo '</pre>';echo "<br>----";

    $x1 = 0;
    foreach ($data_unit['code'] as $cargo_pol)
    {
        $cov_desc       = $cargo_pol['COVERAGE_DESCRIPTION'];
        $car_voyage     = $cargo_pol['CARGO_VOYAGE'];
        $car_conveyage  = $cargo_pol['CARGO_CONVEYANCE'];
        $car_remarks    = $cargo_pol['REMARKS'];
        $estimasi       = $cargo_pol['CARGO_SAIL_DATE'];
        $no_bl          = $cargo_pol['CARGO_BILL_OF_LADING_NO'];
        $currency_code  = $cargo_pol['CURRENCY_CODE'];
        $sum_ins        = $cargo_pol['SUM_INSURED'];
        $currency_name  = $cargo_pol['CURRENCY_NAME'];
        $x1++;
    }

    // print_r($cov_desc);

}
// -------------------------<>----------------------------------------------



// api premi detail cargo
// -------------------------<>---------------------------------------------- 
{
    {
        $data_api_prem_det = array(
            "input_policy_no" => $polis_multi,
            "input_endors_n0" => "01"
        );
    }

    $web_url = curl_init('http://raksa-service.com/mks_work_to_b/index.php/ch_api_policy_mst/data_premi_cal2');
    curl_setopt($web_url, CURLOPT_CUSTOMREQUEST , "POST");
    curl_setopt($web_url, CURLOPT_POSTFIELDS    , $data_api_prem_det);
    curl_setopt($web_url, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($web_url, CURLOPT_SSL_VERIFYPEER, false);

    $result_unit  = curl_exec($web_url);
    $info_unit    = curl_getinfo($web_url);
    curl_close($web_url);

    $data_unit  = json_decode($result_unit, true);
    // echo 'CARGO PREMI DETAIL'.'<pre>'; print_r($data_unit); echo '</pre>';echo "<br>----";
}
// -------------------------<>----------------------------------------------


// api premi cargo
// -------------------------<>---------------------------------------------- 
{
    {
        $data_api_prem = array(
            "input_policy_no" => $polis_multi
        );
    }

    $web_url = curl_init('http://raksa-service.com/mks_work_to_b/index.php/ch_api_policy_mst/cargo_premi_cal');
    curl_setopt($web_url, CURLOPT_CUSTOMREQUEST , "POST");
    curl_setopt($web_url, CURLOPT_POSTFIELDS    , $data_api_prem);
    curl_setopt($web_url, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($web_url, CURLOPT_SSL_VERIFYPEER, false);

    $result_unit  = curl_exec($web_url);
    $info_unit    = curl_getinfo($web_url);
    curl_close($web_url);

    $data_unit  = json_decode($result_unit, true);
    // echo 'PREMI CARGO'.'<pre>'; print_r($data_unit); echo '</pre>';echo "<br>----";
}
// -------------------------<>----------------------------------------------


// Api nota cargo
// -------------------------<>---------------------------------------------- 
{
    {
        $data_api_nota = array(
            "input_policy_no" => $polis_multi,
            "input_endors_no" => '00'
        );
    }

    $web_url = curl_init('http://raksa-service.com/mks_work_to_b/index.php/ch_api_policy_mst/data_accounts');
    curl_setopt($web_url, CURLOPT_CUSTOMREQUEST , "POST");
    curl_setopt($web_url, CURLOPT_POSTFIELDS    , $data_api_nota);
    curl_setopt($web_url, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($web_url, CURLOPT_SSL_VERIFYPEER, false);

    $result_unit  = curl_exec($web_url);
    $info_unit    = curl_getinfo($web_url);
    curl_close($web_url);

    $data_unit  = json_decode($result_unit, true);

    $f1 = 0;
    foreach ($data_unit['code'] as $nota)
    {
        $note_no = $nota['NOTE_NO'];
        $f1++;
    }
    // echo $note_no;


    // echo 'ACCOUNT CARGO'. '<pre>'; print_r($data_unit); echo '</pre>';echo "<br>----";
    // -------------------------<>----------------------------------------------
}

// api nota detail cargo 
// -------------------------<>----------------------------------------------
{
    {
        $data_api_nota = array(
            "input_policy_no" => $no_polis,
            "input_endors_no" => '00',
            "input_detail_no" => '0001'
        );
    }

    $web_url = curl_init('http://raksa-service.com/mks_work_to_b/index.php/ch_api_policy_mst/data_accounts_detail');
    curl_setopt($web_url, CURLOPT_CUSTOMREQUEST , "POST");
    curl_setopt($web_url, CURLOPT_POSTFIELDS    , $data_api_nota);
    curl_setopt($web_url, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($web_url, CURLOPT_SSL_VERIFYPEER, false);

    $result_unit  = curl_exec($web_url);
    $info_unit    = curl_getinfo($web_url);
    curl_close($web_url);

    $data_unit  = json_decode($result_unit, true);
    // echo 'ACCOUNT DETAIL'.'<pre>'; print_r($data_unit); echo '</pre>';echo "<br>----";
}
// -------------------------<>----------------------------------------------

// api main cargo
// -------------------------<>----------------------------------------------
{
    {
        $data_api_main = array(
            "input_policy_no" => $polis_multi,
            "input_endors_no" => "00"
        );
    }

    $web_url = curl_init('http://raksa-service.com/mks_work_to_b/index.php/ch_api_policy_mst/policy_cargo_main');
    curl_setopt($web_url, CURLOPT_CUSTOMREQUEST , "POST");
    curl_setopt($web_url, CURLOPT_POSTFIELDS    , $data_api_main);
    curl_setopt($web_url, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($web_url, CURLOPT_SSL_VERIFYPEER, false);

    $result_unit  = curl_exec($web_url);
    $info_unit    = curl_getinfo($web_url);
    curl_close($web_url);

    $data_unit  = json_decode($result_unit, true);

    $a1 = 0;
    foreach ($data_unit['code'] as $main_pol)
    {
        $ins_name       = $main_pol['INSURED_NAME'];
        $ins_address1   = $main_pol['POLICY_INSURED_ADDRESS1'];
        $ins_address2   = $main_pol['POLICY_INSURED_ADDRESS2'];
        $ins_address3   = $main_pol['POLICY_INSURED_ADDRESS3'];
        $ins_address4   = $main_pol['POLICY_INSURED_ADDRESS4'];
        $kota           = $main_pol['CITY'];
        $postal_kode    = $main_pol['POSTAL_CODE'];
        $no_reg         = $main_pol['REG_NO'];
        $no_ref         = $main_pol['REF_NO'];
        $polis_mst      = $main_pol['POLICY_NO_MST'];
        $sign           = $main_pol['SIGN'];
        $footer         = $main_pol['FOOTER'];
        $footer2        = $main_pol['FOOTER_2'];
        $prevpol        = $main_pol['PREVPOL'];
        $ownrisk        = $main_pol['ADDITIONAL_DEDUCTIBLE'];
        $est_date       = $main_pol['POLICY_EFFECTIVE_DATE'];
        $a1++;
    }

    // echo 'CARGO MAIN'.'<pre>'; print_r($data_unit); echo '</pre>';echo "<br>----";
}
// -------------------------<>----------------------------------------------

// klausula bilingual
// -------------------------<>----------------------------------------------
{
    {
        $data_api_main = array(
            "input_policy_no" => $polis_multi
        );
    }

    $web_url = curl_init('http://raksa-service.com/mks_work_to_b/index.php/ch_api_policy_mst/policy_clauses_bilingual');
    curl_setopt($web_url, CURLOPT_CUSTOMREQUEST , "POST");
    curl_setopt($web_url, CURLOPT_POSTFIELDS    , $data_api_main);
    curl_setopt($web_url, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($web_url, CURLOPT_SSL_VERIFYPEER, false);

    $result_unit  = curl_exec($web_url);
    $info_unit    = curl_getinfo($web_url);
    curl_close($web_url);

    $data_unit  = json_decode($result_unit, true);

    $b1 = 0;
    foreach ($data_unit['code'] as $main_pol)
    {
        $clause_code [$b1]   = $main_pol['CLAUSE_CODE'];
        $klau_inggris [$b1]  = $main_pol['CLAUSE_TITLE_ENGLISH'];
        $klausula_indo [$b1] = $main_pol['CLAUSE_TITLE_INDO'];
        $b1++;
    }

    // echo 'BILLINGUAL'.'<pre>'; print_r($data_unit); echo '</pre>';echo "<br>----";
}

// api terbilang tembak 2 kali 
// -------------------------<>----------------------------------------------
{
    $curl = curl_init();
    $arr_data_terbilang = array
    (
        "nilai"       => $sum_ins,
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

    $angka = $response_decode['angka_convert'];
    // print_r($angka);

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

    $angka_dollar = $response_decode['angka_convert'];
    // print_r($angka_dollar);
    // echo '<br><pre>'; print_r($response_decode); echo '</pre>';echo "<br>----";

}
// -------------------------<>----------------------------------------------

// API DEBIT NOTA 
{   
    $encode_nota = json_encode($note_no,true);
    //  https://www.araksa.com/mks/entry/print_cargo/api_debit_credit.php   
    
      $data_api_agent = array(
        "key_id"      => "ASDAS#!@Dasdkl123ljldasdl",
        "no_polis"    => $polis_multi,
        "nota"        => $encode_nota,
        "background"  => "NO",
        "sign"        => "YES",
        "stamp"       => "YES",
        "data_mentah" => "NO"
      );

    //   echo '<br><pre>'; print_r($data_api_agent); echo '</pre>';echo "<br>----";
      $web_url = curl_init('https://www.araksa.com/mks/epol/hvc/nota_auto.php');

      curl_setopt($web_url, CURLOPT_CUSTOMREQUEST , "POST");
      curl_setopt($web_url, CURLOPT_POSTFIELDS    , $data_api_agent);
      curl_setopt($web_url, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($web_url, CURLOPT_SSL_VERIFYPEER, false);

      $result_unit  = curl_exec($web_url);
      $info_unit    = curl_getinfo($web_url);
      curl_close($web_url);

      $data_unit  = json_decode($result_unit, true);

      $base64_nota = $data_unit[encode]; // echo "$debit . $credit <br>";
    //   echo $base64_nota;
}
// -------------------------<>----------------------------------------------

// api premi detail
{
    {
        $data_api_main = array(
            "input_policy_no" => $polis_multi,
            "input_endors_no" => '01'
        );
    }

    $web_url = curl_init('http://raksa-service.com/mks_work_to_b/index.php/ch_api_policy_mst/data_premi_cal2');
    curl_setopt($web_url, CURLOPT_CUSTOMREQUEST , "POST");
    curl_setopt($web_url, CURLOPT_POSTFIELDS    , $data_api_main);
    curl_setopt($web_url, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($web_url, CURLOPT_SSL_VERIFYPEER, false);

    $result_unit  = curl_exec($web_url);
    $info_unit    = curl_getinfo($web_url);
    curl_close($web_url);

    $data_unit  = json_decode($result_unit, true);

    $a1 = 0;
    foreach ($data_unit['code'] as $prem)
    {
        $prem_currency = $prem['ENDORSEMENT_TRN_CURRENCY'];
        $premi_amount  = $prem['ENDORSEMENT_TRN_AMOUNT'];
        $a1++;
    }

    // tembak bilingual uang
    {
        $curl = curl_init();
        $arr_data_terbilang = array
        (
            "nilai"       => $premi_amount,
            "currency"    => $prem_currency,
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
    
        $angka_indo = $response_decode['angka_convert'];

        // -------------------------<>----------------------------------------------

        $curl = curl_init();
        $arr_data_terbilang = array
        (
            "nilai"       => $premi_amount,
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
    
        $angka_luar = $response_decode['angka_convert'];
    }
}
// -------------------------<>----------------------------------------------







?>