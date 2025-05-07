 <?php
// ini_set ('error_reporting', E_ALL ~E_DEPRECATED);
// ini_set ('display_errors', '1');
// error_reporting (E_ALL|E_STRICT);
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED);
ini_set('display_errors', 1);

date_default_timezone_set("Asia/Jakarta");
require_once __DIR__ . '/../../../settings/DAO_builder.php';
$koneksi = new DAO_builder(['LITE']);
$login_db_lite = $koneksi->conn['ARAKSA'];
//  https://www.rks-w.com/mks/entry/print_cargo/API_Cargo_Print.php
// $no_polis = "01-C-00873-000-11-2023";

// 07-m-00095-000-12-2023
// nomor polis tumbal 01-C-00873-000-11-2023
// $no_polsss    = $_POST['no_polis'];

//
// $web_url = curl_init('https://raksa-service.com/mks_work_to_b/index.php/mks_api_person_name_mst/list_branch');
// curl_setopt($web_url, CURLOPT_CUSTOMREQUEST , "POST");
// curl_setopt($web_url, CURLOPT_POSTFIELDS    , '');
// curl_setopt($web_url, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($web_url, CURLOPT_SSL_VERIFYPEER, false);
// $result_unit  = curl_exec($web_url);
// $info_unit    = curl_getinfo($web_url);
// curl_close($web_url);
// $data_unit = json_decode($result_unit);
// foreach ($data_unit->code as $mks_data)
// {
//     $value[$aaa]  = $mks_data->BRANCH_NAME;
//     $aaa++;
// }
//
//
// $ar_mks = array(  "no"      => $no_polsss,
//                   "message" => 'aaaaaa',
//                   "xxxxxx"  => $value
//               );
// echo json_encode($ar_mks);
// exit();



    // nomor polis single tidak ada masternya
    // nomor polisnya =  01-C-00001-000-07-2023, 01-C-00001-000-08-2023, 01-C-00009-000-05-2023
    // $no_polis = "01-C-00009-000-05-2023";

    // nomor polis single ada masternya
    // 01-C-00013-000-07-2023 , 01-C-00028-000-05-2023,01-C-00029-000-09-2023
    // $no_polis = "01-C-00435-000-12-2023";

    //  Nomor polis multi ada masternya
    //  01-C-00422-000-04-2023,01-C-00310-000-06-2023,01-C-00625-000-06-2023
    //  $no_polis = "01-C-00027-000-05-2023";

    //  nomor polis multi tidak ada masternya
    //  01-C-00423-000-01-2023, 01-C-00367-000-01-2023, 01-C-00027-000-05-2023

    // single non coc perlu cover
    // $no_polis = "01-C-00037-000-03-2024";

    // multi non coc perlu cover

    $no_polis = "01-C-00039-000-08-2023";

    // $no_polis = "01-C-00541-000-03-2024"; // USD 
    // $no_polis = "01-C-00001-000-05-2022"; // KRW korea selatan
    // $no_polis = "01-C-00055-000-01-2024"; //CNY
    // $no_polis = "01-C-00002-000-06-2023"; // euro 
    // $no_polis = "01-C-00003-000-04-2022"; // INR
    // $no_polis = "01-C-00004-000-11-2018"; // SGD 
    // $no_polis = "01-C-00016-000-02-2024"; // JPY 

    // $no_polis = "01-C-00002-000-07-2024";

    // $no_nota      = array($_POST['no_nota']);
    // $no_polis     = $_POST['no_polis'];
    // $status       = $_POST['status'];
    // $key_idkey_id = $_POST['key_id'];
    // $background   = $_POST['background'];
    
    $SQL_sel = "SELECT * FROM epolis_log_cargo
                WHERE no_polis =  '$no_polis'";
    $cek_select = mysqli_num_rows( mysqli_query($login_db_lite,$SQL_sel));
    // echo json_encode($SQL_sel);

    if ($cek_select == 0  && $status == 'ori') 
    {
        $sql_insert = "INSERT INTO epolis_log_cargo 
                        (tgl_masuk,
                        user_id,
                        type_polis,
                        doc_type,
                        no_polis
                        )
                        values 
                        (
                         now(),
                         '$_POST[user_id]',
                         '$_POST[status]',
                         '$_POST[tipe_pdf]',
                         '$no_polis'
                        )";

            // echo "$sql_insert";
        mysqli_query($login_db_lite,$sql_insert);
    }
    elseif ($cek_select > 0 && $status == 'ori')
    {
        echo json_encode('Sudah Tidak Dapat Print Ori!');
    }
    elseif ($status == 'copy')
    {
        $sql_insert = "INSERT INTO epolis_log_cargo 
                                    (tgl_masuk,
                                    user_id,
                                    type_polis,
                                    doc_type,
                                    no_polis
                                    )
                                    values 
                                    (
                                    now(),
                                    '$_POST[user_id]',
                                    '$_POST[status]',
                                    '$_POST[tipe_pdf]',
                                    '$no_polis'
                                    )";
        mysqli_query($login_db_lite,$sql_insert);
    }
    // else
    // {
    //     echo json_encode('Input Error!');
    // }

    // if($status == "copy")
    // {
    //     $copy = "COPY";
    // }
    // else
    // {
    //     $copy = "";
    // }
    

    // if($no_polis == "")
    // {
    //     $no_polis = "01-C-00417-000-05-2023";
    // }
    // $no_polis = "01-C-00011-000-01-2023";
    // $no_polis = "01-C-00558-000-10-2023";
    

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
    // echo '<pre>'; print_r($response_cargo_all); echo '</pre>';echo "<br>----";
    // exit();


    // klausula bilingual
    $policy_clauses_bilingual       = new API_OOP_CARGO('https://raksa-service.com/mks_work_to_b/index.php/ch_api_policy_mst/policy_clauses_bilingual');
    $data_policy_clauses_bilingual  = array(
        "input_policy_no"           => $no_polis
    );
    $response_policy_clauses_bilingual = $policy_clauses_bilingual->post($data_policy_clauses_bilingual);
    // echo '<pre>'; print_r($response_policy_clauses_bilingual); echo '</pre>';echo "<br>----";

    // data premi call 2
    $premi_calcution2          = new API_OOP_CARGO('https://raksa-service.com/mks_work_to_b/index.php/ch_api_policy_mst/data_premi_cal2');
    $data_premi_calcution2     = array(
        "input_policy_no"      => $no_polis
    );
    $response_premi_calcution2 = $premi_calcution2->post($data_premi_calcution2);
    // echo '<pre>'; print_r($response_premi_calcution2); echo '</pre>';echo "<br>----";

    // data premi call
    $premi_calcution        = new API_OOP_CARGO('https://raksa-service.com/mks_work_to_b/index.php/ch_api_policy_mst/cargo_premi_cal');
    $data_premi_calcution   = array(
        "input_policy_no"   => $no_polis
    );
    $response_premi_calcution = $premi_calcution->post($data_premi_calcution);
    // echo '<pre>'; print_r($response_premi_calcution); echo '</pre>';echo "<br>----";


    // api klausula
    {
        $arr_data_polis  = array( "input_policy_no"  => $no_polis  );
        $url  = curl_init('http://raksa-service.com/mks_work_to_b/index.php/ch_api_policy_mst/policy_clauses_bilingual');
        curl_setopt($url, CURLOPT_CUSTOMREQUEST , "POST");
        curl_setopt($url, CURLOPT_POSTFIELDS    , $arr_data_polis);
        curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url, CURLOPT_SSL_VERIFYPEER, false);
        $result_data_polis  = curl_exec($url);
        $info_unit   = curl_getinfo($url);
        curl_close($url);
  
        $hvc_clauses = json_decode($result_data_polis, TRUE);
        $polis_no    = $hvc_clauses['code'][0]['POLICY_NO'];
    
        function build_sorter($key)
        {
            return function ($a, $b) use ($key) {
                return strnatcmp($a[$key], $b[$key]);
            };
        }
        usort($hvc_clauses['code'], build_sorter('CLAUSE_CODE'));
        // echo $result_data_polis;
    }

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
            $no_register    = $main_pol['REG_NO'];
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


    {   
        $x3 = 0;
        foreach($response_cargo_all['Policy_main'] as $codecode)
        {
            $code1    = $codecode['CODE'];
            $red_name = $codecode['POLICY_INSURED_NAME'];
        }
        $x3++;
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
                $polis_master   = $cargo_pol['POLICY_NO_MST'];
                $no_reg         = $cargo_pol['REG_NO'];
                $class_vess     = $cargo_pol['VESSEL_CLASS'];
                $klaus_titel    = $cargo_pol['CLAUSE_TITLE'];
                $crg_invoice    = $cargo_pol['CARGO_INVOICE_NO'];

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
                "vessel_class"  => $vessel_class,
                "polis_master"  => $polis_master,
                "no_reg"        => $no_reg,
                "class_vess"    => $class_vess,
                "klaus_titel"   => $klaus_titel,
                "crg_invoice"   => $crg_invoice
            );
            $x1++;
        }
    }

    {   
        $xx2 = 0;
        foreach($response_cargo_all['Insured_list'] as $kodekode)
        {
            $kode_qq    = $kodekode['CODE'];
            $namanya    = $kodekode['POLICY_INSURED_NAME']; 

            if ($kode_qq == 'QQ')
            {
                // $kode_qq = "$kode_qq $namanya <br>";
                $kodqppk[$xx2] = "$kode_qq $namanya";

            }
            $xx2++;
        }
    }


    // data premi account
    {
        $f1 = 0;
        $no_nota = array();
        foreach ($response_cargo_all['policy_acc'] as $nota)
        {
          if ($nota['NOTE_TYPE']=='DR')
          {
            $note_no = $nota['NOTE_NO'];
            array_push($no_nota, $note_no);
            $f1++;
          }
        }

       $no_nota = array($note_no);

        //   print_r($no_nota);
    }


    // api nota
    {
        $note_nomor  = array($note_no);
        $encode_nota = json_encode($note_nomor,true);
        // print_r($note_no);
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
    
          $base64_nota = $data_unit['encode']; // echo "$debit . $credit <br>";
    
        // $debit  = $data_unit['html1'];
        // $credit = $data_unit['html2'];
        // exit();
    }
    

    // data premi call
    {
        $tambah22 =0;
        foreach ($response_cargo_all ['Prem_call'] as $premi_cal)
        {
            $major_code     = $premi_cal['UW_COVERAGE_MAJOR_CODE'];
            $si_amount      = $premi_cal['SI_AMOUNT'];
            $hit            = $premi_cal['HIT'];
            $idrnya         = $premi_cal['COVERAGE_GPRM_CURRENCY'];
            $no_endors      = $premi_cal['POLICY_ENDORSEMENT_NO'];
            $gpr_amount     = $premi_cal['GPRM_AMOUNT'];

            $gprm_amount_int = (float)$premi_cal['GPRM_AMOUNT'];
            $tambah22 += $gprm_amount_int;
        }
        // print_r($major_code);
    }

    // tambah lagi 
    {
        foreach($response_cargo_all ['Policy_unit'] as $major)
        {
            $kode_mayor = $major['UW_COVERAGE_MAJOR_CODE'];
            $kurensi    = $major['CURRENCY_CODE'];
        }
    }

    // data klausula billingual
    {
        $b1 = 0;
        foreach ($response_policy_clauses_bilingual['code'] as $main_pol)
        {
            $clause_code   [$b1]  = $main_pol['CLAUSE_CODE'];
            $klau_inggris  [$b1]  = $main_pol['CLAUSE_TITLE_ENGLISH'];
            $klausula_indo [$b1]  = $main_pol['CLAUSE_TITLE_INDO'];
            $b1++;
        }
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
        $arr_data_terbilang = array (
                                        "nilai"       => $sum_ins,
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

        $angka = $response_decode['angka_convert'];
        // print_r($angka);

        // -------------------------<>----------------------------------------------

        $curl = curl_init();
        $arr_data_terbilang2 = array (
                                        "nilai"       => $sum_ins,
                                        "currency"    => 'USD',
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
        CURLOPT_POSTFIELDS => json_encode($arr_data_terbilang2),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: text/plain'
        ),
        ));

        $response      = curl_exec($curl);
        $response_time = curl_getinfo($curl);
        curl_close($curl);

        $response_decode = json_decode($response,TRUE);

        $angka_luar_negri = $response_decode['angka_convert'];
        // print_r($angka_luar_negri);
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

        $angka_luar = $response_decode['angka_convert'];
        // print_r($angka_luar);
    }

    //PERSIAPAN MEMBELAH LAUTAN
    // echo "<pre>";print_r(count($response_cargo_all['Policy_unit'])); echo"</prev>";
    $tot_isi_obj_cargo = count($response_cargo_all['Policy_unit']);
    // echo "<pre>";print_r($response_cargo_all); echo"</prev>";
    // $i =0;
    // $l=0;

    if($tot_isi_obj_cargo == 1)
    {
        // $no = 0;
        // for($i = 0; $i <= $tot_isi_obj_cargo; $i++)
        {
            $polis_single = $no_polis;
            $nota_single  = $no_nota;
            // echo json_encode('kontol');
            if($response_cargo_all['Policy_main'][0]['POLICY_NO_MST'] != "-----" )
            {
            //    echo json_encode("-------");
                // // include "pdf_single_cargo.php";
                //     echo "lonte";
                echo 'xxxxx';
                include "pdf_single_cargo_master.php";
            //   break;/
            }
            else
            {

                echo 'yyyyy';

                // echo "lonte exclusif";
                // echo json_encode("sacadscdsccadcads");
                //include "pdf_klausula_cargo";
               include "pdf_single_cargo.php";
                // include "pdf_goublokan.php";
            //    break;
            }
            // $no++;
        }
    }
    else if($tot_isi_obj_cargo > 1)
    {
        // for($l = 1; $l <= $tot_isi_obj_cargo; $l++)
        {
            $polis_multi  = $no_polis;
            $nota_multi   = $no_nota;
            if($response_cargo_all['Policy_main'][0]['POLICY_NO_MST'] != "-----")
            {
                // echo "lonte gb";
                // json_encode($isi_main_cargo);
                echo 'dddddd';
                include "pdf_multi_cargo_master.php";
            }
            else
            {
                // echo "lonte gb ++";
                echo 'eeeeee';
                include "pdf_multi_cargo.php";
            }
        }
    }
    else
    {
        // echo "error";
    }
    // echo $tot_isi_obj_cargo;

?>
