<?php

    //https://www.araksa.com/mks/entry/print_cargo/API_Cargo_baru.php

    
    // $no_nota = array("01-PO-D0003409-05-2023");
    //$no_nota = array($_POST['no_nota']);
    $no_polis = $_POST['no_polis'];
    if($no_polis == "")
    {
        $no_polis = "01-C-00548-000-07-2023";
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

    // data api all
    $policy_cargo_all     = new API_OOP_CARGO('https://raksa-service.com/mks_work_to_b/index.php/ch_api_policy_mst/policy_cargo_all');
    $data_cargo_all       = array(
        "input_policy_no" => $no_polis,
        "key_id"          => "pKYM31CFf2oyoKjlcyszi490O3VCyy"
    );
    $response_cargo_all = $policy_cargo_all->post($data_cargo_all);

    // klausula bilingual
    $policy_clauses_bilingual       = new API_OOP_CARGO('https://raksa-service.com/mks_work_to_b/index.php/ch_api_policy_mst/policy_clauses_bilingual');
    $data_policy_clauses_bilingual  = array(
        "input_policy_no"           => $no_polis
    );
    $response_policy_clauses_bilingual = $policy_clauses_bilingual->post($data_policy_clauses_bilingual);

    // data premi call 2
    $premi_calcution2          = new API_OOP_CARGO('https://raksa-service.com/mks_work_to_b/index.php/ch_api_policy_mst/data_premi_cal2');
    $data_premi_calcution2     = array(
        "input_policy_no"      => $no_polis
    );
    $response_premi_calcution2 = $premi_calcution2->post($data_premi_calcution2);

    // data premi call 
    $premi_calcution        = new API_OOP_CARGO('https://raksa-service.com/mks_work_to_b/index.php/ch_api_policy_mst/cargo_premi_cal');
    $data_premi_calcution   = array(
        "input_policy_no"   => $no_polis
    );
    $response_premi_calcution = $premi_calcution->post($data_premi_calcution);

    // data didalam polis main
    {
        foreach($response_cargo_all['Policy_main'] as $main_pol)
        {
            $ins_name       = $main_pol['INSURED_NAME'];
            $nomor_polis    = $main_pol['POLICY_NO'];
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
        }
        // echo "<pre>";print_r($ins_address1); echo"</prev>";
    }

    // data didalam polis unit
    {
        $x1 = 0;
        foreach($response_cargo_all['Policy_unit'] as $cargo_pol)
        {
                $polis_unit     = $cargo_pol['POLICY_UNIT_NO'];
                $cov_desc       = $cargo_pol['COVERAGE_DESCRIPTION'];
                $car_voyage     = $cargo_pol['CARGO_VOYAGE'];
                $car_conveyage  = $cargo_pol['CARGO_CONVEYANCE'];
                $car_remarks    = $cargo_pol['REMARKS'];
                $estimasi       = $cargo_pol['CARGO_SAIL_DATE'];
                $no_bl          = $cargo_pol['CARGO_BILL_OF_LADING_NO'];
                $currency_code  = $cargo_pol['CURRENCY_CODE'];
                $sum_ins        = $cargo_pol['SUM_INSURED'];
                $currency_name  = $cargo_pol['CURRENCY_NAME'];
                $vessel         = $cargo_pol['VESSEL_NAME'];
                $cov_desc       = $cargo_pol['COVERAGE_DESCRIPTION'];
                $vessel_class   = $cargo_pol['VESSEL_CLASS'];
                $remarkss       = $cargo_pol['REMARKS'];
                $vessel_year    = $cargo_pol['VESSEL_YEAR'];
                $vessel_grt     = $cargo_pol['VESSEL_GRT'];
                $vessel_const   = $cargo_pol['VESSEL_CONSTRUCTION'];

                $isi_obj_cargo[$x1] = array(
                "estimasi"      => $estimasi,
                "vessel"        => $vessel,
                "car_conveyage" => $car_conveyage,
                "car_voyage"    => $car_voyage,
                "cov_desc"      => $cov_desc,
                "sum_ins"       => $sum_ins,
                "remarkss"      => $remarkss,
                "vessel_year"   => $vessel_year,
                "vessel_grt"    => $vessel_grt,
                "vessel_class"  => $vessel_class,
                "vessel_const"  => $vessel_const,
                "vessel_class"  => $vessel_class
            );
            $x1++;
        }
    }

    // data premi account
    {
        $f1 = 0;
        foreach ($response_cargo_all['policy_acc'] as $nota)
        {
            $note_no = $nota['NOTE_NO'];
            $f1++;
        }
       $no_nota = array($note_no);
    }

    // api nota
    {
        $encode_nota = json_encode($no_nota,true);
        //  https://www.araksa.com/mks/entry/print_cargo/api_debit_credit.php   
        
          $data_api_agent = array(
            "key_id"      => "ASDAS#!@Dasdkl123ljldasdl",
            "no_polis"    => $no_polis,
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
    }

    // data premi call 
    {
        foreach ($response_cargo_all ['Prem_call'] as $premi_cal)
        {
            $major_code     = $premi_cal['UW_COVERAGE_MAJOR_CODE'];
            $si_amount      = $premi_cal['SI_AMOUNT'];
            $hit            = $premi_cal['HIT'];
            $idrnya         = $premi_cal['COVERAGE_GPRM_CURRENCY'];
            $no_endors      = $premi_cal['POLICY_ENDORSEMENT_NO'];
            $gpr_amount     = $premi_cal['GPRM_AMOUNT'];
        }
        // print_r($major_code);
    }

    // data klausula billingual
    {   
        $b1 = 0;
        foreach ($response_policy_clauses_bilingual['code'] as $main_pol)
        {
            $clause_code [$b1]   = $main_pol['CLAUSE_CODE'];
            $klau_inggris [$b1]  = $main_pol['CLAUSE_TITLE_ENGLISH'];
            $klausula_indo [$b1] = $main_pol['CLAUSE_TITLE_INDO'];
            $b1++;
        }    
        // print_r($clause_code);
    }

    // premi calcution
    {
        $zz1 = 0;
        foreach ($response_premi_calcution2['code'] as $prem)
        {
            $prem_currency = $prem['ENDORSEMENT_TRN_CURRENCY'];
            $premi_amount  = $prem['ENDORSEMENT_TRN_AMOUNT'];
            $zz1++;
        }
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

    // api terbilang tembak 2 kali lagiiiiiiiiiiiiiii
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
        // print_r($angka_indo);

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
        // print_r($angka_luar);
    }

    //PERSIAPAN MEMBELAH LAUTAN

    $tot_isi_obj_cargo = count($isi_obj_cargo);
    // echo "<pre>";print_r($isi_obj_cargo); echo"</prev>";
    if($tot_isi_obj_cargo == 1)
    {

        $polis_single = $no_polis;
        $nota_single  = $no_nota;
        include "pdf_single_cargo.php";
    }
    else if($tot_isi_obj_cargo > 1)
    {

        $polis_multi  = $no_polis;
        $nota_multi   = $no_nota;
        include "pdf_multi_cargo.php";
    }
    else
    {
        echo "err";
    }


?>